<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\SClassModel;
use App\Models\StudentModel;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sort_by = request()->query('sort_by', 'name');
        $sort_dir = request()->query('sort_dir', 'asc');
        $students = StudentModel::orderBy($sort_by, $sort_dir)->get();
        return view('students.index' , compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $schoolclasses = SClassModel::all();
        return view('students.create', compact('schoolclasses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:100',
            'gender' => 'required|min:2|max:10',
            'sclass_id' => 'required|exists:schoolclasses,id',
        ]);

        //StudentModel::create($request->all());

        $student = new StudentModel();
        $student->name = $request->input('name');
        $student->gender = $request->input('gender');
        $student->sclass_id = $request->input('sclass_id');
        $student->save();

        return redirect()->route('students.index')->with("success", "Tanuló sikeresen létrehozva.");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $student = StudentModel::find($id);
        $student = StudentModel::with('marks.subjects')->find($id);
        $averageMark = $student->marks()->avg('mark');

        return view('students.show', compact('student', 'averageMark'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $student = StudentModel::find($id);

        $schoolclasses = SClassModel::all();

        return view('students.edit', compact('student', 'schoolclasses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $student = StudentModel::find($id);

        $student->sclass_id = $request->input('sclass_id');
        $student->name = $request->input('name');
        $student->gender = $request->input('gender');
        $student->save();

        return redirect()->route('students.index')->with("success", "Tanuló sikeresen módosítva.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student = StudentModel::find($id);

        if ($student) {
            $student->delete();
            return redirect()->route('students.index')->with('success', 'Tanuló sikeresen törölve.');
        }
        return redirect()->route('students.index')->with('error', 'Hiba történt a törlés során.');
    }

    public function getByClass($id)
    {
        $students = StudentModel::where('sclass_id', $id)
            ->orderByRaw('LOWER(name) ASC')
            ->get();
    
        return response()->json($students);
    }    
}
