<?php

namespace Tests\Unit;

use App\Post;
use PHPUnit\Framework\TestCase;

class PostModelTest extends TestCase
{
    function test_adding_a_title_generates_a_slug()
    {
        $post = new Post([
            'title' => 'Como instalar laravel'
        ]);
        
        $this->assertSame('como-instalar-laravel', $post->slug);
    }

    function test_editing_the_title_changes_the_slug()
    {
        $post = new Post([
            'title' => 'Como instalar laravel'
        ]);
        
        $post->title = 'Como instalar laravel 8';

        $this->assertSame('como-instalar-laravel-8', $post->slug);
    }
}
