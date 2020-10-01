<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestHelpers;

class AdminShowPostTest extends DuskTestCase
{   
    use DatabaseMigrations, TestHelpers;

    public function test_admin_can_se_the_post_detail()
    { 
        $this->markTestIncomplete();
        
        $this->browse(function (Browser $browser) {
            
            $admin = $this->defaultUser(['admin' => true]);  
            $post = $this->defaultPost(['title' => 'anyone post admin']);
            $admin->posts()->save($post);

            $browser->loginAs($admin)
                    ->visit(route('posts.index'))
                    ->clickLink('ver')
                    ->assertSee($post->title)
                    ->assertSee($post->slug)
                    ->assertSeeLink($post->file)
                    ->assertSee($post->status)
                    ->assertSee($post->excerpt)
                    ->assertSee($post->body);
        });
    }
}
