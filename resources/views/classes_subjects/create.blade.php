@extends('layout')

@section('content')

<h1>Tantárgy hozzárendelése osztályhoz</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('classes_subjects.store') }}" method="post">
    @csrf
    <fieldset>
        <label for="sclass_id">Osztály kiválasztása</label>
        <select name="sclass_id" id="sclass_id">
            @foreach ($schoolclasses as $sclass)
            <option value="{{ $sclass->id }}">{{ $sclass->name }}</option>
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
