<?php

namespace Tests\Browser;

use App\Category;
use App\Post;
use App\Tag;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Tests\TestHelpers;

class AdminUpdatePostTest extends DuskTestCase
{
    use DatabaseMigrations, TestHelpers;

    public function test_admin_update_post()
    {
        $this->browse(function (Browser $browser) {

            $category = factory(Category::class)->create(['title' => 'lorem category']);
            $tag = factory(Tag::class)->create(['title' => 'lorem tag']);
            $post = factory(Post::class)->create();

            $admin = $this->defaultUser(['admin' => true]);

            $category->posts()->save($post);
            $admin->posts()->save($post);

            $browser->loginAs($admin)
                ->visitRoute('posts.edit', [$post->id, $post->slug])
                ->assertSee('Editar Post')
                ->select('category_id', $category->title)
                ->type('title', 'new title')
                ->radio('status', 'PUBLISHED')
                ->check('.checkbox', $tag->title)
                ->type('@excerpt', 'post excerpt')
                ->type('#body', 'post content')
                ->press('Guardar');


            $this->assertDatabaseHas('posts', [
                'user_id' => $admin->id,
                'category_id' => $category->id
            ]);

            $this->assertDatabaseHas('categories', [
                'title' => $category->title
            ]);

            $this->assertDatabaseHas('tags',[
                'title' => $tag->title
            ]);
        });
    }
}
