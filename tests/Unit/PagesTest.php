<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class PagesTest extends TestCase
{
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
     * Tests browsing pages THIS IS SUPPOSED TO FAIL ON PURPOSE.
     * 
     * @return void
     */
    public function test_browsing_page_request()
    {
        $response = $this->get('/browsing/');
        $response->assertStatus(200);
    }

    /**
     * Tests browsing all page.
     *
     * @return void
     */
    public function test_browsing_all()
    {
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

    /**
     * Tests signup page.
     *
     * @return void
     */
    public function test_signup_request()
    {
        $response = $this->get('/register');
        $response->assertStatus(200);
    }

    /**
     * Tests login page.
     *
     * @return void
     */
    public function test_login_request()
    {
        $response = $this->get('/login');
        $response->assertStatus(200);
    }
}
