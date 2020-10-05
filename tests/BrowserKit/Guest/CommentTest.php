<?php

namespace Tests\BrowserKit\Guest;

use Tests\BrowserTestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CommentTest extends BrowserTestCase
{
    use RefreshDatabase;

    function test_the_guest_can_see_comment_field_and_button_in_post_detail()
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

    function test_guest_cannot_create_a_comment()
    {   
        // Having
        $post = $this->defaultPost([
            'title' => 'any post title',
            'status' => 'PUBLISHED' // IMPORTANT!
        ]);
        
        // When
        $this->visitRoute('post', $post->url_attr)
            ->see($post->title)
            ->type('Any comment', 'comment')
            ->press('Publicar comentario');
        
        // Expect 
        $this->dontSeeInDatabase('comments', [
            'comment' => 'Any comment',
            'post_id' => $post->id
        ]);

        $this->seePageIs(route('login'));
    }
}
