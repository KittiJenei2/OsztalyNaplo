@extends('layout')

@section('content')

<h1>Osztályok
    <a href="{{ route('schoolclasses.create') }}" title="Új osztály">🏫</a>
    <a href="{{ route('schoolclasses.index', ['sort-by' => 'name', 'sort_dir' => 'asc']) }}" title="ABC">A-Z</a>
    <a href="{{ route('schoolclasses.index', ['sort-by' => 'name', 'sort_dir' => 'desc']) }}" title="CBA">Z-A</a>
</h1>

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<ul>
    @foreach($schoolclasses as $sclass)
    <li class="actions">
    {{ $sclass->name }} - {{ $sclass->year }} 
    <a href="{{ route('schoolclasses.show', $sclass->id) }}" class="button">Megjelenítés</a> 
    <a href="{{ route('schoolclasses.edit', $sclass->id) }}" class="button">Módosítás</a>
    <form action="{{ route('schoolclasses.destroy', $sclass->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="danger">Törlés</button>
    </li>
    @endforeach
</ul>

@endsection