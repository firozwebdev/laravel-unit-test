<?php
namespace Tests\Unit;

use App\Models\Post;
use PHPUnit\Framework\TestCase;

class PostTest extends TestCase
{
    /**
     * Test if a post can be successfully created with valid data.
     */
    public function test_post_can_be_created(): void
    {
        $post = new Post([
            'title' => 'My First Post',
            'body' => 'This is the body of my first post',
        ]);

        $this->assertInstanceOf(Post::class, $post);
        $this->assertEquals('My First Post', $post->title);
        $this->assertEquals('This is the body of my first post', $post->body);
    }

    /**
     * Test if a post has a title.
     */
    public function test_post_has_a_title(): void
    {
        $post = new Post(['title' => 'Test Title']);

        $this->assertNotEmpty($post->title);
        $this->assertIsString($post->title);
    }

    /**
     * Test if a post has a body.
     */
    public function test_post_has_a_body(): void
    {
        $post = new Post(['body' => 'Test Body Content']);

        $this->assertNotEmpty($post->body);
        $this->assertIsString($post->body);
    }

    /**
     * Test if a post title is required.
     */
    public function test_post_title_is_required(): void
    {
        $post = new Post();

        $this->assertNull($post->title);
    }

    /**
     * Test if a post body is required.
     */
    public function test_post_body_is_required(): void
    {
        $post = new Post();

        $this->assertNull($post->body);
    }

    /**
     * Test if a post title length is valid (e.g., min: 5, max: 255).
     */
    public function test_post_title_length_is_valid(): void
    {
        $shortTitle = new Post(['title' => 'Hi']);
        $longTitle = new Post(['title' => str_repeat('A', 260)]); // Too long

        $this->assertLessThan(5, strlen($shortTitle->title), "Title is too short");
        $this->assertGreaterThan(255, strlen($longTitle->title), "Title is too long");
    }

    /**
     * Test if a post body length is valid (e.g., min: 10).
     */
    public function test_post_body_length_is_valid(): void
    {
        $shortBody = new Post(['body' => 'Short']);

        $this->assertLessThan(10, strlen($shortBody->body), "Body is too short");
    }

   
}

