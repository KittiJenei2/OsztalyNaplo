<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubjectModel;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subjects = SubjectModel::all();
        return view('subjects.index', compact('subjects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('subjects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:4|max:50',
        ]);

        $subject = new SubjectModel();
        $subject->name = $request->input('name');
        $subject->save();

        return redirect()->route('subjects.index')->with("success", "Tantárgy sikeresen létrehozva.");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $subject = SubjectModel::find($id);
        return view('subjects.show', compact('subject'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $subject = SubjectModel::find($id);
        return view('subjects.edit', compact('subject'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|min:4|max:50',
        ]);

        $subject = SubjectModel::find($id);
        $subject->name = $request->name;
        $subject->save();

        return redirect()->route('subjects.index')->with('success', 'Tantárgy sikeresen módosítva.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $subject = SubjectModel::find($id);
        $subject->delete();

        return redirect()->route('subjects.index')->with('success', 'Tantárgy sikeresen törölve.');
    }
}
