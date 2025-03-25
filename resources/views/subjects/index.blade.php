@extends('layout')

@section('content')

<h1>Tantárgyak</h1>

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<ul>
    @foreach($subjects as $subject)
    <li>{{ $subject->name }}
    <a href="{{ route('subjects.show', $subject->id) }}" class="button">Megjelenítés</a> 
    <a href="{{ route('subjects.edit', $subject->id) }}" class="button">Módosítás</a>
    <form action="{{ route('subjects.destroy', $subject->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="danger" onclick="return confirm('Biztosan?')">Törlés</button>
    </li>
    @endforeach
</ul>

@endsection