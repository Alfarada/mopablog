<?php

namespace Tests\Browser;

use App\{Category,Tag};
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Tests\TestHelpers;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class AdminCreatePostTest extends DuskTestCase
{
    use  DatabaseMigrations, TestHelpers;

    public function test_admin_create_post()
    {   
        $this->browse(function (Browser $browser) {

            $category = factory(Category::class)->create(['title'=>'lorem category']);
            $tag = factory(Tag::class)->create(['title' => 'lorem tag']);
            $admin = $this->defaultUser(['admin' => true]);

            $browser->loginAs($admin)
                ->visitRoute('posts.create')
                ->assertSee('Crear un nuevo post')
                ->select('category_id', $category->title)
                ->type('title', 'new title')
                ->radio('status', 'PUBLISHED')
                ->check(".tag{$tag->id}", $tag->title)
                ->type('@excerpt', 'post excerpt')
                ->type('#body', 'post content')
                ->press('Guardar');
        });
    }
}
