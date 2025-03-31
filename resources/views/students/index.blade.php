@extends('layout')

@section('content')

<h1>Tanulók
    <a href="{{ route('students.create') }}" title="Új tanuló">🤓</a>
</h1>

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<ul>
    @foreach($students as $student)
    <li class="actions">
        {{ $student->name}} - {{$student->schoolclasses->name}}
        <a href="{{ route('students.show', $student->id) }}" class="button">Megjelenít</a>
        <a href="{{ route('students.edit', $student->id) }}" class="button">Módosít</a>
        <form action="{{ route('students.destroy', $student->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="danger">Törlés</button>
        </form>
    </li>
        @endforeach
</ul>

@endsection