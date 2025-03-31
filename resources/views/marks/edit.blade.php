@extends('layout')

@section('content')

@error('name')
    <div class="alert alert-warning">{{ $message }}</div>
@enderror

<form action="{{ route('marks.update', $mark->id) }}" method="post">
    @csrf
    @method('PATCH')

    <fieldset>
        <label for="mark">Osztályzat</label>
        <input type="text" name="mark" id="mark" value="{{ old('mark', $mark->mark)}}">
    </fieldset>
    <fieldset>
        <label for="student_id">Tanuló</label>
        <select id="student_id" name="student_id" required>
            @foreach($students as $student)
                <option value="{{ $student->id }}" {{ $mark->student_id == $student->id ? 'selected' : '' }}>
                    {{ $student->name }}
                </option>
            @endforeach
        </select>
    </fieldset>
    <fieldset>
        <label for="subject_id">Tantárgy</label>
        <select id="subject_id" name="subject_id" required>
            @foreach($subjects as $subject)
                <option value="{{ $subject->id }}" {{ $mark->subject_id == $subject->id ? 'selected' : '' }}>
                    {{ $subject->name }}
                </option>
            @endforeach
        </select>
    </fieldset>
<button typ="submit">Mentés</button>
</form>

@endsection

