<?php

namespace Tests\Feature;

use Tests\BrowserTestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ShowPostsTest extends BrowserTestCase
{   
    use RefreshDatabase;

    public function test_load_the_list_of_posts()
    {
        $this->visit('/blog')
            ->assertResponseOk()
            ->seeInElement('h1','Blog');
    }

}
