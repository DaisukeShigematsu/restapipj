<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Rest;





class RestControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $item = Rest::factory()->create();
        $response = $this->get('/api/v1/rest');
        $response->assertStatus(200);
        $response->assertJsonFragment([
            'message' => $item->message,
            'url' => $item->url
        ]);
    }





}
