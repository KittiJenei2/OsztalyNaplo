@extends('layout')

@section('content')

<h1>Tantárgyak
    <a href="{{ route('subjects.create') }}" title="Új osztály">📚</a>
    <a href="{{ route('subjects.index', ['sort_by' => 'name', 'sort_dir' => 'asc']) }}" title="ABC">A-Z</a>
    <a href="{{ route('subjects.index', ['sort_by' => 'name', 'sort_dir' => 'desc']) }}" title="CBA">Z-A</a>
</h1>

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<ul>
    @foreach($subjects as $subject)
    <li class="actions">
        {{ $subject->name }}
        <a href="{{ route('subjects.show', $subject->id) }}" class="button">Megjelenítés</a> 
        <a href="{{ route('subjects.edit', $subject->id) }}" class="button">Módosítás</a>
        <form action="{{ route('subjects.destroy', $subject->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="danger" onclick="return confirm('Biztosan? ')">Törlés</button>
        </form>
    </li>
    @endforeach
</ul>

@endsection