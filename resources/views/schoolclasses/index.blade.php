@extends('layout')

@section('content')

<h1>Osztályok</h1>

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<ul>
    @foreach($schoolclasses as $sclass)
    <li>{{ $sclass->name }} - {{ $sclass->year }} 
    <a href="{{ route('schoolclasses.show', $sclass->id) }}" class="button">Megjelenítés</a> 
    <a href="{{ route('schoolclasses.edit', $sclass->id) }}" class="button">Módosítás</a>
    <form action="{{ route('schoolclasses.destroy', $sclass->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Törlés</button>
    </li>
    @endforeach
</ul>

@endsection