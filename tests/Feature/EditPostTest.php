<?php

namespace Tests\Feature;

use App\Post;
use Tests\BrowserTestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EditPostTest extends BrowserTestCase
{
    use RefreshDatabase;

    public function test_user_can_edit_post()
    {
        $post = factory(Post::class)->create([
            'title' => 'Post title'
        ]);

        $admin = $this->defaultUser(['admin' => true]);

        $this->actingAs($admin)
            ->visit(route('posts.edit', [$post->id, $post->slug]))
            ->assertResponseOk()
            ->type('edit title', 'title')
            ->press('Guardar');
    }
}
