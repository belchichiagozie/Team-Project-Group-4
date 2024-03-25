<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Book;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Database\Factories\BookFactory;
use Illuminate\Support\Facades\Session;



class AddToBasketTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function authenticated_user_can_add_item_to_basket()
    {
        $user = User::factory()->create();
        $book = Book::factory()->create();

        $response = $this->actingAs($user)
                         ->post(route('basket.add'), ['Book_ID' => $book->Book_ID, 'Quantity' => 1]);

        $response->assertRedirect();
        $this->assertDatabaseHas('basket', ['user_id' => $user->id, 'Book_ID' => $book->Book_ID, 'Quantity' => 1]);
    }

    /** @test */
    public function guest_can_add_item_to_session_basket()
    {
        $book = Book::factory()->create();

        $response = $this->post(route('basket.add'), ['Book_ID' => $book->Book_ID, 'Quantity' => 1]);

        $response->assertRedirect();
        $basket = Session::get('basket'); 
        $this->assertNotNull($basket);
        $this->assertArrayHasKey($book->Book_ID, session('basket'));
        $this->assertEquals(1, session('basket')[$book->Book_ID]);
    }
}

