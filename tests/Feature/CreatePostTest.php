<?php

namespace Tests\Feature;

use Tests\BrowserTestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreatePostTest extends BrowserTestCase
{
    use RefreshDatabase;

    public function test_a_user_create_a_post()
    {   
        // Having
        $title = 'Titulo del post';
        $excerpt = 'Extracto del post';
        $content = 'Contenido del post';

        $this->actingAs($user = $this->defaultUser());

        // When
        $this->visit(route('posts.create'))
            ->see('Crear post')
            ->type($title,'title')
            ->type($excerpt, 'excerpt')
            ->type($content, 'content')
            ->press('Publicar');

        // Then

        $this->seeInDatabase('posts',[
            'title' => $title,
            'excerpt' => $excerpt,
            'content' => $content,
            'user_id' => $user->id
        ]);

        $this->see($title);

    }
}
