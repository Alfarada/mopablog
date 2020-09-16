<?php 

namespace Tests\BrowserKit;

use App\Category;
use Tests\BrowserTestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AdminCategoryTest extends BrowserTestCase
{
    use RefreshDatabase;

    public function test_admin_create_a_category()
    {
        // Having     
        $admin = $this->defaultUser([
            'name' => 'lorem ipsum',
            'admin' => true
        ]);

        $category = factory(Category::class)->make([
            'title' => 'category title',
            'slug' => 'category-title',
            'body' => 'category body'
        ]);

        $this->actingAs($admin);
        
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
            'title' => 'category title',
            'slug' => 'category-title',
            'body' => 'category body'
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
