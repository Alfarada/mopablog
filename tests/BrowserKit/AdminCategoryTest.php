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

    function test_administrator_can_load_the_page_to_create_category()
    {
        $admin = $this->adminUser();

        $this->actingAs($admin)
            ->visitRoute('categories.index')
            ->click('Crear categoría')
            ->assertResponseOk()
            ->seePageIs(route('categories.create'));
    }

    function test_admin_create_a_category()
    {
        // Having     
        $admin = $this->defaultUser(['admin' => true]);

        $category = new Category([
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

    function test_the_admin_can_see_the_category_details()
    {   
        // Having
        $admin = $this->adminUser();

        $category = factory(Category::class)->create([
            'title' => 'any category title',
            'slug' => 'any-category-title',
            'body' => 'any category content'
        ]);
        
        // When - Expect
        $this->actingAs($admin)
            ->visitRoute('categories.index')
            ->click('ver')
            ->seePageIs($category->url)
            ->see($category->title)
            ->see($category->slug)
            ->see($category->body);
    }

    function test_administrator_can_load_the_page_to_edit_category()
    {   
        // Having
        $admin = $this->adminUser();

        $category = factory(Category::class)->create([
            'title' => 'any category title',
            'slug' => 'any-category-title',
            'body' => 'any category content'
        ]);
        
        // When
        $this->actingAs($admin)
            ->visitRoute('categories.index')
            ->click('editar')
            ->assertResponseOk()
            ->seePageIs(route('categories.edit', [$category->id, $category->slug]))
            ->see('Editar Categoría');
    }

    function test_the_admin_can_edit_the_category_details()
    {   
        // Having
        $admin = $this->adminUser();

        $category = factory(Category::class)->create([
            'title' => 'any category title',
            'slug' => 'any-category-title',
            'body' => 'any category content'
        ]);
        
        // When
        $this->actingAs($admin)
            ->visitRoute('categories.edit', [$category->id, $category->slug])
            ->see('Editar Categoría')
            ->type('new category title', 'title')
            ->type('new-category-title', 'slug')
            ->type('new content category', 'body')
            ->press('Guardar')
            ->see('Categoría actualizada con exito');

        // Expect
        $this->seeInDatabase('categories', [
            'title' => 'new category title',
            'slug' => 'new-category-title',
            'body' => 'new content category'
        ]);
    }

    function test_admini_can_delete_to_cagetory()
    {  
        // Having
        $admin = $this->adminUser();

        $category = factory(Category::class)->create([
            'title' => 'any category title',
            'slug' => 'any-category-title',
            'body' => 'any category content'
        ]);
        
        // When
        $this->actingAs($admin)
            ->visitRoute('categories.index')
            //->see('Eliminar')
            ->press('Eliminar')
            ->see('Categoría eliminada con exito')
            ->seePageIs(route('categories.index'));

        // Expect
        $this->dontSeeInDatabase('categories', [
            'title' => $category->title,
            'slug' => $category->slug,
            'body' => $category->body
        ]);
    }
}
