<?php

namespace Tests\BrowserKit;

use App\Post;
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
            ->see('Lista de Posts')
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
            ->visit(route('posts.show', $post->url_attr))
            ->see($post->title)
            ->see($post->slug)
            ->see($post->file)
            ->see($post->status)
            ->see($post->excerpt)
            ->see($post->body);
    }

    
    function test_old_urls_are_redirected()
    {
        // Having

        $admin = $this->adminUser();

        $post = factory(Post::class)->make([
            'title' => 'old title'
        ]);

        $admin->posts()->save($post);
            
        // This $url has the old url ass value
        // route('posts.show',[$post->id,$post->slug])
        $url = $post->url; 

        $post->update(['title' => 'New title']);

        $this->actingAs($admin)
            ->visit($url)
            ->seePageIs($post->url);
        
    }


}
