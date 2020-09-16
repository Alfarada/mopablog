<?php

namespace Tests\Integration;

use App\Post;
use Tests\BrowserTestCase;

class PostIntegrationTest extends BrowserTestCase
{
    function test_a_slug_is_generated_and_saved_to_the_database()
    {
        $admin = $this->defaultUser(['admin' => true]);

        $post = factory(Post::class)->make([
            'title' => 'Como instalar laravel'
        ]);

        $admin->posts()->save($post);
        
        // dd($post->slug);

        $this->seeInDatabase('posts',[
            'slug' => 'como-instalar-laravel'
        ]);

        $this->assertSame('como-instalar-laravel', $post->slug);
    }


}
