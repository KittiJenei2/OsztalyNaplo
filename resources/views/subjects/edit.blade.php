@extends('layout')

@section('content')

@error('name')
    <div class="alert alert-warning">{{ $message }}</div>
@enderror

<form action="{{ route('subjects.update', $subject->id) }}" method="post">
    @csrf
    @method('PATCH')
    <fieldset>
        <label for="name">Tantárgy</label>
        <input type="text" name="name" id="name" value="{{ old('name', $subject->name)}}">
    </fieldset>
    <button typ="submit">Mentés</button>
</form>


@endsection