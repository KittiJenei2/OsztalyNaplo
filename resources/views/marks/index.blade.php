@extends('layout')

@section('content')

<h1>Osztályzatok
    <a href="{{ route('marks.create') }}" title="Új jegy">✏️</a>
    <a href="{{ route('marks.index', ['sort_by' => 'student_name', 'sort_dir' => 'asc']) }}" title="ABC">A-Z</a>
    <a href="{{ route('marks.index', ['sort_by' => 'student_name', 'sort_dir' => 'desc']) }}" title="CBA">Z-A</a>
</h1>

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<ul>
    @foreach($marks as $mark)
    <li class="actions">
        {{ $mark->students->name}} - {{$mark->subjects->name}} - {{ $mark->mark }}
        <a href="{{ route('marks.edit', $mark->id) }}" class="button">Módosít</a>
        <form action="{{ route('marks.destroy', $mark->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="danger">Törlés</button>
        </form>
    </li>
        @endforeach
</ul>

@endsection