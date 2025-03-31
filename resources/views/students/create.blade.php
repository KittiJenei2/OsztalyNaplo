@extends('layout')

@section('content')

<h1>Új tanuló hozzáadása</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('students.store') }}" method="post">
    @csrf
    <fieldset>
        <label for="name">Tanuló neve</label>
        <input type="text" name="name" id="name">
    </fieldset>
    <fieldset>
        <label for="gender">Tanuló neme</label>
        <input type="text" name="gender" id="gender">
    </fieldset>
    <fieldset>
        <label for="sclass_id">Tanuló osztálya</label>
        <select name="sclass_id" id="sclass_id">
            @foreach ($schoolclasses as $sclass)
            <option value="{{ $sclass->id }}">{{ $sclass->name }}</option>
            @endforeach
        </select>
    </fieldset>
    <button typ="submit">Mentés</button>
</form>

@endsection
