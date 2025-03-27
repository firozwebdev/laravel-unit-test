<?php
namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Post;

class PostFeatureTest extends TestCase
{
    use RefreshDatabase;

    public function test_post_can_be_stored()
    {
        $response = $this->post('/posts', [
            'title' => 'New Post',
            'body' => 'This is a test post.',
        ]);

        $response->assertStatus(201);
        $this->assertDatabaseHas('posts', ['title' => 'New Post']);
    }
}
