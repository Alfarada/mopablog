<?php

namespace Tests\Feature;

use App\Category;
use Tests\BrowserTestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreateCategoryTest extends BrowserTestCase
{
    use RefreshDatabase;

    public function test_a_user_create_a_category()
    {
        // Having     

        $user = $this->defaultUser([
            'name' => 'lorem ipsum'
        ]);

        $category = factory(Category::class)->make([
            'title' => 'category title',
            'slug' => 'category-title',
            'body' => 'category body'
        ]);

        $this->actingAs($user);
        
        // When

        $this->visit('categories/create')
            ->see('Crear categoría')
            ->type($category->title,'title')
            ->type($category->slug,'slug')
            ->type($category->body,'body')
            ->press('Guardar')
            ->see('Categoría creada con éxito');

        // Expect
                
        $this->seeInDatabase('categories', [
            'title' => $category->title,
            'slug' => $category->slug,
            'body' => $category->body
        ]);

    }
}
