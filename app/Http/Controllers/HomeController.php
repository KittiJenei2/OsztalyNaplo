<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SClassModel;
use App\Models\StudentModel;
use App\Models\MarkModel;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $schoolClasses = \App\Models\SClassModel::all();

        $averageMarks = [];

        foreach ($schoolClasses as $schoolClass) {
            $students = StudentModel::where('sclass_id', $schoolClass->id)->get();

            $marks = MarkModel::whereIn('student_id', $students->pluck('id'))->get();

            if ($marks->count() > 0) {
                $averageMarks[$schoolClass->id] = $marks->avg('mark');
            } else {
                $averageMarks[$schoolClass->id] = null;
            }
        }
        return view('home', compact('schoolClasses', 'averageMarks'));
    }

    public function getClassAverage($classId)
    {
        $students = StudentModel::where('sclass_id', $classId)->get();
        $marks = MarkModel::whereIn('student_id', $students->pluck('id'))->get();

        if ($marks->count() > 0) {
            return response()->json([
                'average' => round($marks->avg('mark'), 2)
            ]);
        } else {
            return response()->json([
                'average' => null
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
