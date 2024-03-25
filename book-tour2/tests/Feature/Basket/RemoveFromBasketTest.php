<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Book;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Database\Factories\BookFactory;
use Illuminate\Support\Facades\Session;

class RemoveFromBasketTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function authenticated_user_can_remove_item_from_basket()
    {
        $user = User::factory()->create();
        $book = Book::factory()->create();
        $user->books()->attach($book->Book_ID, ['Quantity' => 2]); // Adding book to user's basket with quantity 2

        $response = $this->actingAs($user)
                         ->post(route('basket.remove'), ['Book_ID' => $book->Book_ID, 'Quantity' => 1]);

        $response->assertRedirect();
        $this->assertDatabaseHas('basket', ['user_id' => $user->id, 'Book_ID' => $book->Book_ID, 'Quantity' => 1]);
    }

    /** @test */
    public function guest_can_remove_item_from_session_basket()
    {
        $book = Book::factory()->create();
        session()->put('basket', [$book->Book_ID => 2]); // Adding book to session basket with quantity 2

        $response = $this->post(route('basket.remove'), ['Book_ID' => $book->Book_ID, 'Quantity' => 1]);

        $response->assertRedirect();
        $basket = Session::get('basket'); 
        $this->assertNotNull($basket);
        $this->assertEquals(1, session('basket')[$book->Book_ID]);
    }
}
