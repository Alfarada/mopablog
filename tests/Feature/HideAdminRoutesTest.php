<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class HideAdminRoutesTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_does_not_allow_guest_to_discover_admin_urls()
    {   
        $this->get('categories/invalid-url')
            ->assertStatus(302)
            ->assertRedirect('/login');
    }

    /** @test */
    public function it_does_not_allow_guest_to_discover_admin_urls_using_post()
    {   
        $this->markTestSkipped();

        $this->post('categories/invalid-url')
            ->assertStatus(302)
            ->assertRedirect('/login');
    }

    /** @test */
    public function it_displays_404s_when_admins_visit_invalid_urls()
    {   
        $admin = factory(User::class)->create(['admin' => true]);

        $this->actingAs($admin)
            ->get('categories/invalid-url')
            ->assertStatus(404);
    }
}
