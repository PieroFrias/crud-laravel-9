<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Career;

class CareersController extends Controller
{
    public function index()
    {
        $careers = Career::all();

        return view('careers.index', compact('careers'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        Career::create($request->all());

        return redirect()->route('careers.index');
    }

    public function show($id)
    {
        //
    }

    public function edit(Career $career)
    {
        return view('careers.edit', compact('career'));
    }

    public function update(Request $request, Career $career)
    {
        $career->update($request->all());
        
        return redirect()->route('careers.index');
    }

    public function destroy(Career $career)
    {
        $career->delete();

        return redirect()->back();
    }
}
