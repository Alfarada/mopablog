<?php

namespace Tests\BrowserKit;

use App\Category;
use Tests\BrowserTestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AdminCategoryTest extends BrowserTestCase
{
    use RefreshDatabase;

    function test_admin_can_see_the_index_categories_page()
    {   
        // Having
        $admin = $this->defaultUser(['admin' => true]);
        $categoryA = factory(Category::class)->create(['title' => 'category A']);
        $categoryB = factory(Category::class)->create(['title' => 'category B']);
        $categoryC = factory(Category::class)->create(['title' => 'category C']);

        // Then - Expect
        $this->actingAs($admin)
            ->visit(route('categories.index'))
            ->see('Lista de Categorías')
            ->see($categoryA->title)
            ->see($categoryB->title)
            ->see($categoryC->title);
    }

    function test_admin_create_a_category()
    {   
        // Having     
        $admin = $this->defaultUser(['admin' => true]);

        $category = factory(Category::class)->make([
            'title' => 'any cateogory title',
            'slug' => 'any-category-title',
            'body' => 'any category body'
        ]);

        $this->actingAs($admin);

        // When
        $this->visit('categories/create')
            ->see('Crear categoría')
            ->type($category->title, 'title')
            ->type($category->slug, 'slug')
            ->type($category->body, 'body')
            ->press('Guardar')
            ->see('Categoría creada con éxito');
        
        // Expect          
        $this->seeInDatabase('categories', [
            'title' => $category->title,
            'slug' => $category->slug,
            'body' => $category->body
        ]);
    }

    function test_the_admin_can_view_the_category_details()
    {
        $this->markTestIncomplete();

        $admin = $this->defaultUser(['admin' => true]);

        $category = factory(Category::class)->make();


        $this->actingAs($admin)
            ->visit('categories')
            ->click('ver')
            //SE DEBERÍA PODER MOSTRAR TANTO EL ID COMO EL SLUG
            ->seePageIs("categories/{$category->id}-{$category->slug}")
            ->see($category->title)
            ->see($category->slug)
            ->see($category->content);
    }
}
