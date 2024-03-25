<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\User;
use App\Models\Book;
use Tests\TestCase;
use Database\Factories\BookFactory;
use Illuminate\Support\Facades\Session;

class BasketToCheckoutTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function authenticated_user_can_checkout()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get(route('basket.checkout'));
        
        $response->assertStatus(200);
    }

    /** @test */
    public function guest_can_checkout()
    {
        
        $response = $this->get(route('showLoginForm'));

        $response->assertStatus(200);
    }
}
