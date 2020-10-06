<?php

namespace Tests\BrowserKit\User;

use App\Comment;
use Tests\BrowserTestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CommentTest extends BrowserTestCase
{
    use RefreshDatabase;

    function test_the_user_can_see_comment_field_and_button_in_post_detail()
    {
        // Having
        $post = $this->defaultPost([
            'title' => 'any post title',
            'status' => 'PUBLISHED' // IMPORTANT!
        ]);

        $this->visit('/blog')
            ->see($post->title)
            ->click('Leer más')
            ->seePageIs(route('post', $post->url_attr))
            ->see('Publicar comentario');
    }

    function test_user_can_create_a_comment()
    {
        // Having
        $user = $this->defaultUser([
            'name' => 'lorem ipsum'
        ]);

        $post = $this->defaultPost([
            'title' => 'any post title',
            'status' => 'PUBLISHED' // IMPORTANT!
        ]);

        // When
        $this->actingAs($user)
            ->visitRoute('post', $post->url_attr)
            ->see($post->title)
            ->type('Any comment', 'comment')
            ->press('Publicar comentario');

        // Expect 
        $this->seeInDatabase('comments', [
            'comment' => 'Any comment',
            'user_id' => $user->id,
            'post_id' => $post->id
        ]);

        $this->seePageIs(route('post', $post->url_attr));
    }

    function test_user_can_see_the_lastest_comment_in_the_post_detail()
    {
        // Having
        $user = $this->defaultUser([
            'name' => 'lorem ipsum'
        ]);

        $post = $this->defaultPost([
            'title' => 'any post title',
            'status' => 'PUBLISHED' // IMPORTANT!
        ]);

        $comment = factory(Comment::class)->create([
            'comment' => 'Any comment title',
            'post_id' => $post->id
        ]);

        // When - Excpect
        $this->actingAs($user)
            ->visitRoute('post', $post->url_attr)
            ->see($post->title)
            ->see($comment->comment);
    }

    function test_user_cannot_post_an_empty_comment()
    {
        
        // Having
        $user = $this->defaultUser();

        $post = $this->defaultPost([
            'status' => 'PUBLISHED' // IMPORTANT!
        ]);

        // When 
        $this->actingAs($user)
            ->visitRoute('post', $post->url_attr)
            ->type('','comment')
            ->press('Publicar comentario');
        
        // Expect 
        $this->seePageIs(route('post', $post->url_attr));
        
    }
}
