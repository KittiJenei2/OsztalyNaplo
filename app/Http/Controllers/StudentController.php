<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\SClassModel;
use App\Models\StudentModel;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Mail;
use App\Mail\StudentListMail;



class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sort_by = request()->query('sort_by', 'name');
        $sort_dir = request()->query('sort_dir', 'asc');
        $search = request()->query('search');

        $students = StudentModel::query();

        if ($search) {
            $students->where('name', 'LIKE', '%' . strtolower($search) . '%');
        }

        if (request()->has('download_pdf')) {
            $pdf = PDF::loadView('students.pdf', compact('students'));
            return $pdf->download('students-list.pdf');
        }
    
        $students = $students->orderBy($sort_by, $sort_dir)->paginate(5)->withQueryString();
        return view('students.index' , compact('students', 'search'));
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
    
    public function export()
{
    $students = StudentModel::with('schoolclasses')->get();

    $headers = [
        'Content-Type' => 'text/csv; charset=UTF-8',
        'Content-Disposition' => 'attachment; filename="students.csv"',
    ];

    $callback = function () use ($students) {
        $handle = fopen('php://output', 'w');

        // UTF-8 BOM írás biztonságosan
        fwrite($handle, "\xEF\xBB\xBF");

        // Fejléc – pontosvesszővel elválasztva
        fputcsv($handle, ['Név', 'Osztály', 'Nem'], ';');

        // Tartalom – minden adatmező biztosan string
        foreach ($students as $student) {
            fputcsv($handle, [
                (string) $student->name,
                (string) ($student->schoolclasses->name ?? 'N/A'),
                (string) $student->gender,
            ], ';');
        }

        fclose($handle);
    };

    return response()->stream($callback, 200, $headers);
}

public function sendPdfByEmail()
{
    $students = StudentModel::all();
    $pdf = PDF::loadView('students.pdf', compact('students'));

    Mail::to('recipient@example.com')->send(new StudentListMail($pdf->output()));

    return redirect()->route('students.index')->with('success', 'PDF sikeresen elküldve e-mailben.');
}



}
