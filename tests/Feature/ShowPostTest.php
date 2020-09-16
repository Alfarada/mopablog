<?php

namespace Tests\Feature;

use App\{Category,Post,Tag};
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
        
        //dd(route('posts.show', $post));
        // Expected

        // visit("/entrada/{$post->slug}")
        $this->actingAs($admin)
            ->visit(route('posts.show', [$post->id, $post->slug]))
            ->assertResponseOk()
            ->see($post->title)
            ->see($post->file)
            ->see($post->excerpt)
            ->see($post->body);
       
    }
}
