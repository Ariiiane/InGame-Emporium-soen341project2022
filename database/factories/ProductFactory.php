<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'product_id' => $this->faker->numberBetween(1, 10),
            'name' => $this->faker->name,
            'description' => 'a product description',
            'department' => $this->faker->company,
            'manufacturer' => $this->faker->company,
            'price' => $this->faker->numberBetween(1, 10),
            'unit' => $this->faker->numberBetween(1, 10),
            'format' => '123',
            'inventory' => 5,
            'image_path' => '/images/minecraft/bricks.png',
        ];
    }
}
