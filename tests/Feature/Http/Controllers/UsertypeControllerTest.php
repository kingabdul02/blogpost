<?php

namespace Tests\Feature\Http\Controllers;

use App\Usertype;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\UsertypeController
 */
class UsertypeControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $usertypes = factory(Usertype::class, 3)->create();

        $response = $this->get(route('usertype.index'));

        $response->assertOk();
        $response->assertViewIs('usertype.index');
        $response->assertViewHas('usertypes');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('usertype.create'));

        $response->assertOk();
        $response->assertViewIs('usertype.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\UsertypeController::class,
            'store',
            \App\Http\Requests\UsertypeStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $usertype = $this->faker->word;

        $response = $this->post(route('usertype.store'), [
            'usertype' => $usertype,
        ]);

        $usertypes = Usertype::query()
            ->where('usertype', $usertype)
            ->get();
        $this->assertCount(1, $usertypes);
        $usertype = $usertypes->first();

        $response->assertRedirect(route('usertype.index'));
        $response->assertSessionHas('usertype.id', $usertype->id);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $usertype = factory(Usertype::class)->create();

        $response = $this->get(route('usertype.show', $usertype));

        $response->assertOk();
        $response->assertViewIs('usertype.show');
        $response->assertViewHas('usertype');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $usertype = factory(Usertype::class)->create();

        $response = $this->get(route('usertype.edit', $usertype));

        $response->assertOk();
        $response->assertViewIs('usertype.edit');
        $response->assertViewHas('usertype');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\UsertypeController::class,
            'update',
            \App\Http\Requests\UsertypeUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $usertype = factory(Usertype::class)->create();
        $usertype = $this->faker->word;

        $response = $this->put(route('usertype.update', $usertype), [
            'usertype' => $usertype,
        ]);

        $response->assertRedirect(route('usertype.index'));
        $response->assertSessionHas('usertype.id', $usertype->id);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $usertype = factory(Usertype::class)->create();

        $response = $this->delete(route('usertype.destroy', $usertype));

        $response->assertRedirect(route('usertype.index'));

        $this->assertDeleted($usertype);
    }
}
