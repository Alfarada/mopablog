<?php

namespace Tests\Feature;

use App\Category;
use App\Post;
use App\Tag;
use Tests\TestHelpers;
use Tests\BrowserTestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AdminPageTest extends BrowserTestCase
{
    use RefreshDatabase, TestHelpers;

    function test_the_admin_can_load_index_page()
    {
        $admin = $this->adminUser();

        $this->actingAs($admin)
            ->visit('/blog')
            ->assertResponseOk();
    }

    function test_the_admin_can_see_all_posts_details_in_the_index_page()
    {
        // Having
        $admin = $this->adminUser();

        $category = factory(Category::class)->create([
            'title' => 'Any category title'
        ]);

        $post = factory(Post::class)->create([
            'title' => 'Any post title',
            'user_id' => $admin->id,
            'category_id' => $category->id,
            'status' => 'PUBLISHED'
        ]);

        $tag = factory(Tag::class)->create([
            'title' => 'Lorem'
        ]);

        $post->tags()->save($tag);

        $this->actingAs($admin)
            ->visit('/blog')
            ->seeInElement('h1', 'Lista de artículos')
            ->see($post->title)
            ->click('Leer más')
            ->seePageIs(route('post', [$post->id, $post->slug]))
            ->see($post->category->title)
            ->see($post->title)
            ->see($post->excerpt)
            ->see($post->body)
            ->see($tag->title);
    }
}
