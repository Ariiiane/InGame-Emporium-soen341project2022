<?php

namespace Tests\Feature\Checkout;

use App\Models\Order;
use App\Models\Sale;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CheckoutTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Should not be able to place an order if no payment information is provided
     */
    public function test_order_creation_no_payment() 
    {
        $order = Order::factory()->create();

        $response = $this->post('/order_confirmation', [
            'order_id' => '4545',
            'customer_id'  => $order->customer_id,
            'order_date' => $order->order_date,
            'delivery_date' => $order->delivery_date,
            'delivery_address' => $order->delivery_address,
            'shipping_speed' => $order->shipping_speed,
            'billing_address' => $order->billing_address,
            'total' => $order->total
            /**
             * Missing payment information
             */
        ]);

        $this->assertNotEquals(200, $response->getStatusCode());
        $this->assertDatabaseMissing('orders', ['order_id' => '4545']);	
    }

    /**
     * Should be able to place an order if all information fields are provided
     */
    public function test_order_creation() 
    {
        $order = Order::factory()->create();

        $response = $this->post('/order_confirmation', [
            'order_id' => '6969',
            'customer_id'  => $order->customer_id,
            'order_date' => $order->order_date,
            'delivery_date' => $order->delivery_date,
            'delivery_address' => $order->delivery_address,
            'shipping_speed' => $order->shipping_speed,
            'billing_address' => $order->billing_address,
            'total' => $order->total,
            
            'payment_card_number'  => $order->payment_card_number,
            'payment_card_expiry' => $order->payment_card_expiry,
            'payment_card_cvv' => $order->payment_card_cvv,
            'payment_card_name' => $order->payment_card_name,
        ]);

        $this->assertNotEquals(200, $response->getStatusCode());
        $this->assertDatabaseHas('orders', ['order_id' => $order->order_id]);	
    }
}
