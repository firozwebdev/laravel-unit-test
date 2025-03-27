<?php

namespace Tests\Unit;

use App\Models\Post;
use PHPUnit\Framework\TestCase;

class PostTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_example(): void
    {
        $this->assertTrue(true);
    }

    public function test_post_can_be_created(): void
    {
       $post = new  Post([
            'title' => 'My First Post',
            'body' => 'This is the body of my first post'     
       ]);

       $this->assertEquals('My First Post', $post->title);
       $this->assertEquals('This is the body of my first post', $post->body);
       
    }
}
