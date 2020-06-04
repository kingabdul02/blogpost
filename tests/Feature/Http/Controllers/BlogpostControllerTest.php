<?php

namespace Tests\Feature\Http\Controllers;

use App\Blogpost;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\BlogpostController
 */
class BlogpostControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $blogposts = factory(Blogpost::class, 3)->create();

        $response = $this->get(route('blogpost.index'));

        $response->assertOk();
        $response->assertViewIs('blogpost.index');
        $response->assertViewHas('blogposts');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('blogpost.create'));

        $response->assertOk();
        $response->assertViewIs('blogpost.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\BlogpostController::class,
            'store',
            \App\Http\Requests\BlogpostStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $blogpost = $this->faker->word;

        $response = $this->post(route('blogpost.store'), [
            'blogpost' => $blogpost,
        ]);

        $blogposts = Blogpost::query()
            ->where('blogpost', $blogpost)
            ->get();
        $this->assertCount(1, $blogposts);
        $blogpost = $blogposts->first();

        $response->assertRedirect(route('blogpost.index'));
        $response->assertSessionHas('blogpost.id', $blogpost->id);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $blogpost = factory(Blogpost::class)->create();

        $response = $this->get(route('blogpost.show', $blogpost));

        $response->assertOk();
        $response->assertViewIs('blogpost.show');
        $response->assertViewHas('blogpost');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $blogpost = factory(Blogpost::class)->create();

        $response = $this->get(route('blogpost.edit', $blogpost));

        $response->assertOk();
        $response->assertViewIs('blogpost.edit');
        $response->assertViewHas('blogpost');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\BlogpostController::class,
            'update',
            \App\Http\Requests\BlogpostUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $blogpost = factory(Blogpost::class)->create();
        $blogpost = $this->faker->word;

        $response = $this->put(route('blogpost.update', $blogpost), [
            'blogpost' => $blogpost,
        ]);

        $response->assertRedirect(route('blogpost.index'));
        $response->assertSessionHas('blogpost.id', $blogpost->id);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $blogpost = factory(Blogpost::class)->create();

        $response = $this->delete(route('blogpost.destroy', $blogpost));

        $response->assertRedirect(route('blogpost.index'));

        $this->assertDeleted($blogpost);
    }
}
