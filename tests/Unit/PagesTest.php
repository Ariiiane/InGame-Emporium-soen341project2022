<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

use App\Models\Ad;

class PagesTest extends TestCase
{
    use RefreshDatabase;
    /**
     * Tests landing page.
     *
     * @return void
     */
    public function test_landing_page_request()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    /**
     * Tests browsing all page.
     *
     * @return void
     */
    public function test_browsing_all()
    {
        Ad::factory()->create();
        $response = $this->get('/browsing/All');
        $response->assertStatus(200);
    }

    /**
     * Tests browsing tetris page.
     *
     * @return void
     */
    public function test_browsing_tetris()
    {
        Ad::factory()->create();
        $response = $this->get('/browsing/Tetris');
        $response->assertStatus(200);
    }

    /**
     * Tests browsing minecraft page.
     *
     * @return void
     */
    public function test_browsing_minecraft()
    {
        Ad::factory()->create();
        $response = $this->get('/browsing/Minecraft');
        $response->assertStatus(200);
    }

    /**
     * Tests cart page.
     *
     * @return void
     */
    public function test_cart_request()
    {
        $response = $this->get('/cart');
        $response->assertStatus(200);
    }
}
