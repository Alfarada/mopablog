<?php

namespace Tests\BrowserKit\Admin;

use Tests\BrowserTestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CommentTest extends BrowserTestCase
{
    use RefreshDatabase;

    function test_the_admin_can_see_comment_field_and_button_in_post_detail()
    {   
        $admin = $this->adminUser();
        
        $post = $this->defaultPost([
            'title' => 'any post title',
            'status' => 'PUBLISHED' // IMPORTANT!
        ]);

        $this->actingAs($admin)
            ->visit('/blog')
            ->see($post->title)
            ->click('Leer más')
            ->seePageIs(route('post', $post->url_attr))
            ->see('Publicar comentario');

    }

    function test_admin_can_create_comment()
    {   
        // Having
        $admin = $this->adminUser([
            'name' => 'lorem ipsum'
        ]);
        
        $post = $this->defaultPost([
            'title' => 'any post title',
            'status' => 'PUBLISHED' // IMPORTANT!
        ]);
        
        // When
        $this->actingAs($admin)
            ->visitRoute('post', $post->url_attr)
            ->see($post->title)
            ->type('Any comment', 'comment')
            ->press('Publicar comentario');
        
        // Expect 
        $this->seeInDatabase('comments', [
            'comment' => 'Any comment',
            'user_id' => $admin->id,
            'post_id' => $post->id
        ]);

        $this->seePageIs(route('post', $post->url_attr));
    }
    
}
