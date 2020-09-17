<?php 

namespace Tests\BrowserKit;

use App\Post;
use Tests\BrowserTestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AdminPostTest extends BrowserTestCase
{
    use RefreshDatabase;

    function test_its_admin_can_see_the_list_of_posts()
    {
        $admin = $this->defaultUser(['admin' => true]);

        $this->actingAs($admin)
            ->visitRoute('posts.index')
            ->see('Lista de Entradas');

    }

}
