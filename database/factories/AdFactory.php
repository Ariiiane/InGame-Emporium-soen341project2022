<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AdFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'seller_id' => $this->faker->numberBetween(1, 10),
            'ad_link' => 'ad_link_example',
            'ad_image_path' => 'ad_image_path_example',
        ];
    }
}
