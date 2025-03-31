<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\SubjectModel;
use App\Models\CSubjectModel;
use App\Models\SClassModel;
use Illuminate\Http\Request;

class CSubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classes_subjects = CSubjectModel::all();
        return view('classes_subjects.index' , compact('classes_subjects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $schoolclasses = SClassModel::all();
        $subjects = SubjectModel::all();
        return view('classes_subjects.create', compact('schoolclasses', 'subjects'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'subject_id' => 'required|exists:subjects,id',
            'sclass_id' => 'required|exists:schoolclasses,id',
        ]);

        $classes_subjects = new CSubjectModel();
        $classes_subjects->subject_id = $request->input('subject_id');
        $classes_subjects->sclass_id = $request->input('sclass_id');
        $classes_subjects->save();

        return redirect()->route('classes_subjects.index')->with("success", "Tantárgy sikeresen hozzárendelve az osztályhoz.");
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
