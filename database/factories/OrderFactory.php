<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'order_id' => $this->faker->numberBetween(0, 10000),
            'customer_id'  => $this->faker->numberBetween(0, 10000),
            'order_date' => $this->faker->iso8601($max='now'),
            'delivery_date' => "TBD",
            'delivery_address' => $this->faker->address,
            'shipping_speed' => 'standard',
            'billing_address' => $this->faker->address,
            'total' => $this->faker->randomFloat(),
            'payment_card_number'  => $this->faker->creditCardNumber,
            'payment_card_expiry' => $this->faker->creditCardExpirationDateString,
            'payment_card_cvv' => $this->faker->numberBetween(100,999),
            'payment_card_name' => $this->faker->name,
        ];
    }
}