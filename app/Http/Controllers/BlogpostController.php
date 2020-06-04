<?php

namespace App\Http\Controllers;

use App\Blogpost;
use App\Http\Requests\BlogpostStoreRequest;
use App\Http\Requests\BlogpostUpdateRequest;
use Illuminate\Http\Request;

class BlogpostController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $blogposts = Blogpost::all();

        return view('blogpost.index', compact('blogposts'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('blogpost.create');
    }

    /**
     * @param \App\Http\Requests\BlogpostStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogpostStoreRequest $request)
    {
        $blogpost = Blogpost::create($request->all());

        $request->session()->flash('blogpost.id', $blogpost->id);

        return redirect()->route('blogpost.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Blogpost $blogpost
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Blogpost $blogpost)
    {
        return view('blogpost.show', compact('blogpost'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Blogpost $blogpost
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Blogpost $blogpost)
    {
        return view('blogpost.edit', compact('blogpost'));
    }

    /**
     * @param \App\Http\Requests\BlogpostUpdateRequest $request
     * @param \App\Blogpost $blogpost
     * @return \Illuminate\Http\Response
     */
    public function update(BlogpostUpdateRequest $request, Blogpost $blogpost)
    {
        $blogpost->update([]);

        $request->session()->flash('blogpost.id', $blogpost->id);

        return redirect()->route('blogpost.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Blogpost $blogpost
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Blogpost $blogpost)
    {
        $blogpost->delete();

        return redirect()->route('blogpost.index');
    }
}
