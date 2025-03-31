@extends('layout')

@section('content')

@error('name')
    <div class="alert alert-warning">{{ $message }}</div>
@enderror

<form action="{{ route('students.update', $student->id) }}" method="post">
    @csrf
    @method('PATCH')

    <fieldset>
        <label for="name">Tanuló neve</label>
        <input type="text" name="name" id="name" value="{{ old('name', $student->name)}}">
    </fieldset>
    <fieldset>
        <label for="gender">Tanuló neme</label>
        <input type="text" name="gender" id="gender" value="{{ old('gender', $student->gender)}}">
    </fieldset>
    <fieldset>
        <label for="sclass_id">Osztály</label>
        <select id="sclass_id" name="sclass_id" required>
            @foreach($schoolclasses as $sclass)
                <option value="{{ $sclass->id }}" {{ $student->sclass_id == $sclass->id ? 'selected' : '' }}>
                    {{ $sclass->name }}
                </option>
            @endforeach
        </select>
</fieldset>
<button typ="submit">Mentés</button>
</form>

@endsection
