<?php

namespace Tests\Feature;

use App\{Category, Post, Tag};
use Tests\BrowserTestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ShowPostTest extends BrowserTestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_see_a_post_details()
    {
        // Having

        $admin = $this->defaultUser([
            'name' => 'lorem ipsum',
            'admin' => true
        ]);

        $post = factory(Post::class)->make([
            'title' => 'titulo del post',
            'excerpt' => 'extracto del post',
            'body' => 'cuerpo del post',
        ]);

        $admin->posts()->save($post);

        // Expected
        $this->actingAs($admin)
            ->visitRoute('posts.show', $post->values)
            ->assertResponseOk()
            ->see($post->title)
            ->see($post->file)
            ->see($post->excerpt)
            ->see($post->body);
    }

    function test_old_urls_are_redirected()
    {
        // Having

        $admin = $this->defaultUser([
            'admin' => true
        ]);

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

    function test_post_url_with_wrong_slugs_still_work()
    {
        $this->markTestSkipped();
        // Having

        $admin = $this->defaultUser([
            'admin' => true
        ]);

        $post = factory(Post::class)->make([
            'title' => 'old title'
        ]);

        $admin->posts()->save($post);

        $url = $post->url;

        $post->update(['title' => 'New title']);
        
        $this->actingAs($admin)
            ->visit($url)
            ->assertResponseStatus(404)
            ->see('New title');
    }
}
