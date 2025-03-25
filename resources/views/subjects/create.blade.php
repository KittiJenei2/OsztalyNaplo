@extends('layout')

@section('content')

<h1>Új tantárgy hozzáadása</h1>

@error('name')
    <div class="alert alert-warning">{{ $message }}</div>
@enderror

<form action="{{ route('subjects.store') }}" method="post">
    @csrf
    <fieldset>
        <label for="name">Tantárgy</label>
        <input type="text" name="name" id="name">
    </fieldset>
    <button typ="submit">Mentés</button>
</form>

@endsection
