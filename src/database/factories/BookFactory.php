<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->text(5),
            'year' => $this->faker->year,
            'description' => $this->faker->text,
            'price' => $this->faker->randomFloat(2, 0, 150),
            'price_rent' => $this->faker->randomFloat(2, 0, 10),
            'image' => $this->faker->imageUrl(620, 480, 'book'),
        ];
    }


}
