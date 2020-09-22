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
            ->seePageIs(route('tags.show', [$tag->id, $tag->slug]));
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
            ->visit(route('tags.show', [$tag->id, $tag->slug]))
            ->see($tag->title)
            ->see($tag->slug)
            ->see($tag->created_at);
    }

}
