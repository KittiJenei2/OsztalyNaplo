<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\StudentModel;
use App\Models\MarkModel;
use App\Models\SubjectModel;
use Illuminate\Http\Request;

class MarkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sort_by = request()->query('sort_by', 'id');
        $sort_dir = request()->query('sort_dir', 'asc');

        $marks = MarkModel::with('students')->get();

        if ($sort_by === 'student_name') {
            $marks = $marks->sortBy(function($mark) {
                return $mark->students->name ?? '';
            }, SORT_REGULAR, $sort_dir === 'desc');
        }
        
        return view('marks.index' , compact('marks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $students = StudentModel::all();
        $subjects = SubjectModel::all();
        return view('marks.create', compact('students', 'subjects'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'mark' => 'required|regex:/^[1-5]$/',
            'subject_id' => 'required|exists:subjects,id',
            'student_id' => 'required|exists:students,id',
        ]);

        //StudentModel::create($request->all());

        $marks = new MarkModel();
        $marks->mark = $request->input('mark');
        $marks->subject_id = $request->input('subject_id');
        $marks->student_id = $request->input('student_id');
        $marks->save();

        return redirect()->route('marks.index')->with("success", "Jegy sikeresen hozzáadva.");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $mark = MarkModel::find($id);
        return view('marks.show', compact('mark'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
        $mark = MarkModel::find($id);

        $students = StudentModel::all();
        $subjects = SubjectModel::all();

        return view('marks.edit', compact('mark', 'students', 'subjects'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'mark' => 'required|regex:/^[1-5]$/',
            'subject_id' => 'required|exists:subjects,id',
            'student_id' => 'required|exists:students,id',
        ]);

        $mark = MarkModel::find($id);

        $mark->subject_id = $request->input('subject_id');
        $mark->mark = $request->input('mark');
        $mark->student_id = $request->input('student_id');
        $mark->save();

        return redirect()->route('marks.index')->with("success", "Jegy sikeresen módosítva.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $mark = MarkModel::find($id);

        if ($mark) {
            $mark->delete();
            return redirect()->route('marks.index')->with('success', 'Jegy sikeresen törölve.');
        }
        return redirect()->route('marks.index')->with('error', 'Hiba történt a törlés során.');
    }
}
