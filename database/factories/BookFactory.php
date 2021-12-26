<?php

namespace Database\Factories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => 'Example title',
            'description' => 'Example description',
            'author' => 'Example author',
            'rating' => 5.0,
            'price' => 15
        ];
    }
}
