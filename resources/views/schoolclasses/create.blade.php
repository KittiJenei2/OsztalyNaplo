@extends('layout')

@section('content')

<h1>Új osztály hozzáadása</h1>

@error('name')
    <div class="alert alert-warning">{{ $message }}</div>
@enderror

<form action="{{ route('schoolclasses.store') }}" method="post">
    @csrf
    <fieldset>
        <label for="name">Osztály</label>
        <input type="text" name="name" id="name">
    </fieldset>
    <fieldset>
        <label for="year">Év</label>
        <input type="text" name="year" id="year">
    </fieldset>
    <button typ="submit">Mentés</button>
</form>

@endsection
