<?php

namespace Tests\Browser;

use Tests\TestHelpers;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use App\{Post,Category,Tag};
use Illuminate\Foundation\Testing\DatabaseMigrations;

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

            $post->tags()->save($tag);
            $category->posts()->save($post);
            $admin->posts()->save($post);

            $browser->loginAs($admin)
                ->visitRoute('posts.edit', [$post->id, $post->slug])
                ->assertSee('Editar Post')
                ->select('category_id', $category->title)
                ->type('title', 'new title')
                ->radio('status', 'PUBLISHED')
                ->check(".tag{$tag->id}", $tag->title)
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

            $this->assertDatabaseHas('post_tag',[
                'post_id' => $post->id
            ]);

            $this->assertDatabaseHas('tags', [
                'title' => $tag->title
            ]);
        });
    }
}
