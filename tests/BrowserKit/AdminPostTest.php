<?php

namespace Tests\BrowserKit;

use App\Category;
use App\Post;
use App\Tag;
use Tests\BrowserTestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AdminPostTest extends BrowserTestCase
{
    use RefreshDatabase;

    function test_its_admin_can_see_the_list_of_posts()
    {
        $admin = $this->defaultUser(['admin' => true]);
        $postAnyone = $this->defaultPost(['title' => 'Anyone post']);

        $admin->posts()->save($postAnyone);

        $this->actingAs($admin)
            ->visitRoute('posts.index')
            ->see('Lista de Entradas')
            ->see($postAnyone->title);
    }

    function test_its_admin_can_load_detail_page()
    {
        $admin = $this->defaultUser(['admin' => true]);
        $post = $this->defaultPost();

        $admin->posts()->save($post);

        $this->actingAs($admin)
            ->visitRoute('posts.index')
            ->click('ver')
            ->assertResponseStatus(200)
            ->see('Detalles del Post');
    }

    function test_its_admin_can_see_the_details_of_posts()
    {
        // Having
        $admin = $this->defaultUser(['admin' => true]);
        $post = $this->defaultPost([
            'title' => 'post title',
            'slug' => 'post-title',
            'file' => 'post-file',
            'status' => 'PUBLISHED',
            'excerpt' => 'post-excerpt',
            'body' => 'post content'
        ]);

        // When - Expect
        $this->actingAs($admin)
            ->visit($post->url)
            ->see($post->title)
            ->see($post->slug)
            ->see($post->file)
            ->see($post->status)
            ->see($post->excerpt)
            ->see($post->body);
    }

    // function test_admin_create_a_post()
    // {
    //     $admin = $this->defaultUser(['admin' => true]);

    //     $category = factory(Category::class)
    //         ->create(['title' => 'category tite']);

    //     factory(Tag::class)->create(['title' => 'tag title']);

    //     $this->actingAs($admin)
    //         ->visitRoute('posts.create')
    //         ->select($category->id, 'category_id')
    //         ->type('post title', 'title')
    //         ->select('PUBLISHED', 'status')
    //         ->type('excerpt post', 'excerpt')
    //         ->type('post content', 'body')
    //         ->submitForm('Guardar', [
    //             'tags[0]' => 1
    //         ]);

    //     $this->assertSame(1, Post::first());
    // }
}
