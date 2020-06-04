<?php

namespace App\Http\Controllers;

use App\Author;
use App\Http\Requests\AuthorStoreRequest;
use App\Http\Requests\AuthorUpdateRequest;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $authors = Author::all();

        return view('author.index', compact('authors'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('author.create');
    }

    /**
     * @param \App\Http\Requests\AuthorStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(AuthorStoreRequest $request)
    {
        $author = Author::create($request->all());

        $request->session()->flash('author.id', $author->id);

        return redirect()->route('author.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Author $author
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Author $author)
    {
        return view('author.show', compact('author'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Author $author
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Author $author)
    {
        return view('author.edit', compact('author'));
    }

    /**
     * @param \App\Http\Requests\AuthorUpdateRequest $request
     * @param \App\Author $author
     * @return \Illuminate\Http\Response
     */
    public function update(AuthorUpdateRequest $request, Author $author)
    {
        $author->update([]);

        $request->session()->flash('author.id', $author->id);

        return redirect()->route('author.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Author $author
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Author $author)
    {
        $author->delete();

        return redirect()->route('author.index');
    }
}
