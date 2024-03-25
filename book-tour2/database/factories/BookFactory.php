<?php

namespace Database\Factories;
use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    protected $model = Book::class;

    public function definition()
    {
        return [
            'Title' => $this->faker->sentence,
            'Author' => $this->faker->name,
            'Genre' => $this->faker->word,
            'Price' => $this->faker->randomFloat(2, 5, 100),
            'Stock' => $this->faker->randomDigit,
            'file' => $this->faker->imageUrl(),
        ];
    }
}
