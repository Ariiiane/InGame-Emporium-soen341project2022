<?php

namespace Tests\Feature\Checkout;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class PostingAdsTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Should be able to upload their own images
     */
    public function test_uploading_ads() 
    { 
        $file = UploadedFile::fake()->image('fakeAd.jpg');
 
        $response = $this->post('/seller/uploaded_file', [
            'AdImage' => $file,
        ]);
 
        $response->assertStatus(200);
    }
}
