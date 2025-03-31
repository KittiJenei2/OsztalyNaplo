@extends('layout')

@section('content')

<h1>Új jegy hozzáadása</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('marks.store') }}" method="post">
    @csrf
    <fieldset>
        <label for="mark">Érdemjegy</label>
        <input type="text" name="mark" id="mark">
    </fieldset>
    <fieldset>
        <label for="student_id">Tanuló kiválasztása</label>
        <select name="student_id" id="student_id">
            @foreach ($students as $student)
            <option value="{{ $student->id }}">{{ $student->name }}</option>
            @endforeach
        </select>
    </fieldset>
    <fieldset>
        <label for="subject_id">Tantárgy kiválasztása</label>
        <select name="subject_id" id="subject_id">
            @foreach ($subjects as $subject)
            <option value="{{ $subject->id }}">{{ $subject->name }}</option>
            @endforeach
        </select>
    </fieldset>
    <button typ="submit">Mentés</button>
</form>

@endsection
