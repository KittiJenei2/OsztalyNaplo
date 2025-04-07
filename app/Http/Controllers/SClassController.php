<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
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
        $sclass = SClassModel::find($id);
        return view('schoolclasses.show', compact('sclass'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $sclass = SClassModel::find($id);
        return view('schoolclasses.edit', compact('sclass'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|min:4|max:50',
            'year' => 'required|min:3|max:5',
        ]);

        $sclass = SClassModel::find($id);
        $sclass->name = $request->name;
        $sclass->year = $request->year;
        $sclass->save();

        return redirect()->route('subjects.index')->with('success', 'Osztály sikeresen módosítva.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $sclass = SClassModel::find($id);
        $sclass->delete();

        return redirect()->route('schoolclasses.index')->with('success', 'Osztály sikeresen törölve.');
    }

    public function getByYear($year)
    {
        $classes = \App\Models\SClassModel::where('year', $year)->get();
        return response()->json($classes);
    }

}
