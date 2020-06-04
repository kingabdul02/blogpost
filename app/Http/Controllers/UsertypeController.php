<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsertypeStoreRequest;
use App\Http\Requests\UsertypeUpdateRequest;
use App\Usertype;
use Illuminate\Http\Request;

class UsertypeController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $usertypes = Usertype::all();

        return view('usertype.index', compact('usertypes'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('usertype.create');
    }

    /**
     * @param \App\Http\Requests\UsertypeStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsertypeStoreRequest $request)
    {
        $usertype = Usertype::create($request->all());

        $request->session()->flash('usertype.id', $usertype->id);

        return redirect()->route('usertype.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Usertype $usertype
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Usertype $usertype)
    {
        return view('usertype.show', compact('usertype'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Usertype $usertype
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Usertype $usertype)
    {
        return view('usertype.edit', compact('usertype'));
    }

    /**
     * @param \App\Http\Requests\UsertypeUpdateRequest $request
     * @param \App\Usertype $usertype
     * @return \Illuminate\Http\Response
     */
    public function update(UsertypeUpdateRequest $request, Usertype $usertype)
    {
        $usertype->update([]);

        $request->session()->flash('usertype.id', $usertype->id);

        return redirect()->route('usertype.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Usertype $usertype
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Usertype $usertype)
    {
        $usertype->delete();

        return redirect()->route('usertype.index');
    }
}
