<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\User;
use App\Models\Book;
use App\Models\Order;
use App\Models\OrderItem;
use Tests\TestCase;

class OrderControllerIntegrationTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function authenticated_user_can_checkout()
    {
        // Create a user
        $user = User::factory()->create();

        // Authenticate the user
        $this->actingAs($user);

        // Add items to the user's basket
        $books = Book::factory()->count(3)->create(['Price' => 10.00]);
    
        foreach ($books as $book) {
            $response = $this->post(route('basket.add'), ['Book_ID' => $book->Book_ID, 'Quantity' => 1]);
            $response->assertSessionHasNoErrors();
        }

        // $basketItems = $user->books()->select('books.*', 'basket.Quantity')->get();

        $basketItems = $user->books()->withPivot('Quantity')->get();

    $totalPrice = 0;
    foreach ($basketItems as $item) {
        $totalPrice += $item->Price * $item->pivot->Quantity;
    }

        // Make a POST request to the checkout route
        $response = $this->post(route('checkout.submit'), [
            'Shipping_First_Name' => 'John',
            'Shipping_Last_Name' => 'Doe',
            'Shipping_Address' => '123 Main St',
            'Shipping_City' => 'Anytown',
        ]);

        // Assert that the response status is 200 (OK)
        $response->assertStatus(200);

        // Assert that the order is created
        $this->assertDatabaseHas('orders', [
            'User_ID' => $user->id,
            'Shipping_First_Name' => 'John',
            'Shipping_Last_Name' => 'Doe',
            'Shipping_Address' => '123 Main St',
            'Shipping_City' => 'Anytown',
            'Order_Total' => $totalPrice
        ]);

       
        foreach ($books as $book) {
            $this->assertDatabaseHas('order_items', [
                'Book_ID' => $book->Book_ID,
                'Quantity' => 1
            ]);

            
            $this->assertEquals($book->fresh()->Stock - 1, $book->Stock);
        }

        
        $this->assertEquals(0, $user->books()->count());

        
    }
}
