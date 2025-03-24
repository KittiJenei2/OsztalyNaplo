<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::post('/students', [StudentController::class, 'store'])->name('students.store');
    Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');
    Route::get('/students/{student}/edit', [StudentController::class, 'edit'])->name('students.edit');
    Route::delete('/students/{student}', [StudentController::class, 'destroy'])->name('students.destroy');

    Route::post('/marks', [MarkController::class, 'store'])->name('marks.store');
    Route::get('/marks/create', [MarkController::class, 'create'])->name('marks.create');
    Route::get('/marks/{mark}/edit', [MarkController::class, 'edit'])->name('marks.edit');
    Route::delete('/marks/{mark}', [MarkController::class, 'destroy'])->name('marks.destroy');

    Route::post('/classes_subjects', [CSubjectController::class, 'store'])->name('classes_subjects.store');
    Route::get('/classes_subjects/create', [CSubjectController::class, 'create'])->name('classes_subjects.create');
    Route::get('/classes_subjects/{csubject}/edit', [CSubjectController::class, 'edit'])->name('classes_subjects.edit');
    Route::delete('/classes_subjects/{csubject}', [CSubjectController::class, 'destroy'])->name('classes_subjects.destroy');

    Route::post('/subjects', [SubjectController::class, 'store'])->name('subjects.store');
    Route::get('/subjects/create', [SubjectController::class, 'create'])->name('subjects.create');
    Route::get('/subjects/{subject}/edit', [SubjectController::class, 'edit'])->name('subjects.edit');
    Route::delete('/subjects/{subject}', [SubjectController::class, 'destroy'])->name('subjects.destroy');

    Route::post('/schoolclasses', [SClassController::class, 'store'])->name('schoolclasses.store');
    Route::get('/schoolclasses/create', [SClassController::class, 'create'])->name('schoolclasses.create');
    Route::get('/schoolclasses/{sclass}/edit', [SClassController::class, 'edit'])->name('schoolclasses.edit');
    Route::delete('/schoolclasses/{sclass}', [SClassController::class, 'destroy'])->name('schoolclasses.destroy');


});

require __DIR__.'/auth.php';
Route::get('/students', [StudentController::class, 'index'])->name('students.index');
Route::get('/students/{id}', [StudentController::class, 'show'])->name('students.show');

Route::get('/marks', [MarkController::class, 'index'])->name('marks.index');
Route::get('/marks/{id}', [MarkController::class, 'show'])->name('marks.show');

Route::get('/classes_subjects', [CSubjectController::class, 'index'])->name('classes_subjects.index');
Route::get('/classes_subjects/{id}', [CSubjectController::class, 'show'])->name('classes_subjects.show');

Route::get('/subjects', [SubjectController::class, 'index'])->name('subjects.index');
Route::get('/subjects/{id}', [SubjectController::class, 'show'])->name('subjects.show');

Route::get('/schoolclasses', [SClassController::class, 'index'])->name('schoolclasses.index');
Route::get('/schoolclasses/{id}', [SClassController::class, 'show'])->name('schoolclasses.show');





