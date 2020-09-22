<?php

namespace Tests\Feature;

use App\Category;
use App\Tag;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AdminCategoryTest extends TestCase
{
    use RefreshDatabase;

    function test_users_who_are_not_administrators_cannot_access_categories_page()
    {
        $user = $this->defaultUser();

        $this->actingAs($user)
            ->get('/categories')
            ->assertStatus(403)
            ->assertSee('You shell NOT pass!');
    }

    function test_guest_cannot_access_the_categories_page()
    {
        $this->get('/categories')
            ->assertStatus(302)
            ->assertRedirect('login');
    }
}
