<?php

namespace Tests\Feature\Http\Controllers;

use App\Author;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\AuthorController
 */
class AuthorControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $authors = factory(Author::class, 3)->create();

        $response = $this->get(route('author.index'));

        $response->assertOk();
        $response->assertViewIs('author.index');
        $response->assertViewHas('authors');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('author.create'));

        $response->assertOk();
        $response->assertViewIs('author.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\AuthorController::class,
            'store',
            \App\Http\Requests\AuthorStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $author = $this->faker->word;

        $response = $this->post(route('author.store'), [
            'author' => $author,
        ]);

        $authors = Author::query()
            ->where('author', $author)
            ->get();
        $this->assertCount(1, $authors);
        $author = $authors->first();

        $response->assertRedirect(route('author.index'));
        $response->assertSessionHas('author.id', $author->id);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $author = factory(Author::class)->create();

        $response = $this->get(route('author.show', $author));

        $response->assertOk();
        $response->assertViewIs('author.show');
        $response->assertViewHas('author');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $author = factory(Author::class)->create();

        $response = $this->get(route('author.edit', $author));

        $response->assertOk();
        $response->assertViewIs('author.edit');
        $response->assertViewHas('author');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\AuthorController::class,
            'update',
            \App\Http\Requests\AuthorUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $author = factory(Author::class)->create();
        $author = $this->faker->word;

        $response = $this->put(route('author.update', $author), [
            'author' => $author,
        ]);

        $response->assertRedirect(route('author.index'));
        $response->assertSessionHas('author.id', $author->id);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $author = factory(Author::class)->create();

        $response = $this->delete(route('author.destroy', $author));

        $response->assertRedirect(route('author.index'));

        $this->assertDeleted($author);
    }
}
