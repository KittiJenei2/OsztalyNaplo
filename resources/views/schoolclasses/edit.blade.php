@extends('layout')

@section('content')

@error('name')
    <div class="alert alert-warning">{{ $message }}</div>
@enderror

<form action="{{ route('schoolclasses.update') }}" method="post">
    @csrf
    @method('PATCH')
    <fieldset>
        <label for="name">Osztály</label>
        <input type="text" name="name" id="name" value="{{ old('name', $sclass->name)}}">
        <br>
        <label for="year">Év</label>
        <input type="text" name="year" id="year" value="{{ old('year', $sclass->year)}}">
    </fieldset>
    <button typ="submit">Mentés</button>
</form>

@endsection