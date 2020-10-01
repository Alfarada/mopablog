<?php

namespace Tests\BrowserKit;

use App\Tag;
use Tests\BrowserTestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AdminTagTest extends BrowserTestCase
{
    use RefreshDatabase;

    function test_its_admin_can_see_the_list_of_tags()
    {
        $admin = $this->adminUser();
    
        $anyTag = factory(Tag::class)
                    ->create(['title' => 'Any tag']);

        $this->actingAs($admin)
            ->visitRoute('tags.index')
            ->assertResponseOk()
            ->see('Lista de Etiquetas')
            ->see($anyTag->title);
    }

    function test_its_admin_can_load_detail_tag_page()
    {
        $admin = $this->adminUser();
        
        $tag = factory(Tag::class)->create([
            'title' => 'any tag title',
            'slug' => 'any-tag-title'
        ]);

        $this->actingAs($admin)
            ->visitRoute('tags.index')
            ->click('ver')
            ->assertResponseOk()
            ->seePageIs(route('tags.show', $tag->url_attr));
    }

    function test_its_admin_can_see_the_details_of_tag()
    {
        // Having
        $admin = $this->adminUser();

        $tag = factory(Tag::class)->create([
            'title' => 'Any tag title',
            'slug' => 'any-tag-title'
        ]);

        // When - Expect
        $this->actingAs($admin)
            ->visitRoute('tags.show', $tag->url_attr)
            ->see($tag->title)
            ->see($tag->slug)
            ->see($tag->created_at);
    }

    function test_admin_can_edit_tag_form_tag_list()
    {   
        // Having
        $admin = $this->adminUser();
        $tag = factory(Tag::class)->create();

        // When - Expect
        $this->actingAs($admin)
            ->visitRoute('tags.index')
            ->click('editar')
            ->seePageIs(route('tags.edit', $tag->url_attr));
    }

    function test_the_admin_can_edit_the_tag()
    {   
        // Having
        $admin = $this->adminUser();

        $tag = factory(Tag::class)->create([
            'title' => 'Any tag title'
        ]);

        // When
        $this->actingAs($admin)
            ->visitRoute('tags.edit', $tag->url_attr)
            ->assertResponseOk()
            ->see('Editar etiqueta')
            ->type('new tag title', 'title')
            ->type('new-tag-title', 'slug')
            ->press('Guardar');

        // Expect
        $this->seeInDatabase('tags', [
            'title' => 'new tag title',
            'slug' => 'new-tag-title'
        ]);
    }

    function test_admin_can_delete_tag()
    {
        // Having
        $admin = $this->adminUser();
        $tag = factory(Tag::class)->create();

        // When
        $this->actingAs($admin)
            ->visitRoute('tags.index')
            ->press('eliminar')
            ->assertResponseOk()
            ->see('Etiqueta eliminada con éxito')
            ->seePageIs(route('tags.index'));

        // Expect
        $this->dontSeeInDatabase('tags', [
            'title' => $tag->title,
            'slug' => $tag->slug
        ]);
    }

}
