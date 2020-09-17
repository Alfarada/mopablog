<?php

namespace Tests\Browser;

use Tests\TestHelpers;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class AdminDeletePostTest extends DuskTestCase
{
    use DatabaseMigrations, TestHelpers;
 
    public function test_admin_delete_post()
    {   
        $this->browse(function (Browser $browser) {
            
            $admin = $this->defaultUser(['admin' => true]);
            $post = $this->defaultPost(['title' => 'anyone post']);
            
            $admin->posts()->save($post);

            $browser->loginAs($admin)
                    ->visit(route('posts.index'))
                    ->press('Eliminar')
                    ->assertSee('Post eliminado con éxito.')
                    ->assertRouteIs('posts.index');
            
            $this->assertDatabaseMissing('posts', [
                'id' => $post->id,
                'title' => 'anyone post'
            ]);
        });
    }
}
