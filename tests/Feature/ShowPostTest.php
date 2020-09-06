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

        $category = factory(Category::class)->create([
            'title' => 'category title'
        ]);

        $post = factory(Post::class)->make([
            'title' => 'post title',
        ]);

        $category->posts()->save($post);

        $tag = factory(Tag::class)->make([
            'title' => 'tag title'
        ]);

        $post->tags()->save($tag);
        
        // Expected

        $this->visit("/entrada/{$post->slug}")
            ->assertResponseOk()
            ->see($post->title)
            ->see($post->file)
            ->see($post->excerpt)
            ->see($post->body)
            ->see($category->title)
            ->see($tag->title);
       
    }
}
