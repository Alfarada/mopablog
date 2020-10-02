<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AdminDashboadTest extends TestCase
{   
    use RefreshDatabase;

    public function test_admin_can_see_admin_links()
    {
        $admin = $this->defaultUser(['admin' => true]);

        $this->actingAs($admin)
            ->get('/blog')
            ->assertStatus(200)
            ->assertSee('Categorías')
            ->assertSee('Posts')
            ->assertSee('Etiquetas');
    }

    public function test_non_admin_users_cant_see_admin_links()
    {
        $user = $this->defaultUser(['admin' => false]);

        $this->actingAs($user)
            ->get('/blog')
            ->assertDontSee('Categorías')
            ->assertDontSee('Entradas')
            ->assertDontSee('Etiquetas');
    }

    public function test_guests_cannot_see_admin_links()
    {
        $this->get('/blog')
            ->assertDontSee('Categorías')
            ->assertDontSee('Entradas')
            ->assertDontSee('Etiquetas');
    }
}
