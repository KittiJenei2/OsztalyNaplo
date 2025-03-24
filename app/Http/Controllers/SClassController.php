<?php

namespace App\Http\Controllers;

//use App\Http\Controllers\Controller;
use App\Models\SClassModel;
use Illuminate\Http\Request;

class SClassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $schoolclasses = SClassModel::all();
        return view('schoolclasses.index', compact('schoolclasses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('schoolclasses.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:2|max:5',
            'year' => 'required|min:3|max:5',
        ]);

        $sclass = new SClassModel();
        $sclass->name = $request->input('name');
        $sclass->year = $request->input('year');
        $sclass->save();

        return redirect()->route('schoolclasses.index')->with("success", "Osztály sikeresen létrehozva.");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
