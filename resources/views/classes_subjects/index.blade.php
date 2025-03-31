@extends('layout')

@section('content')

<h1>Osztályokhoz rendelt tantárgyak
    <a href="{{ route('classes_subjects.create') }}" title="Új hozzárendelés">🖋️</a>
</h1>

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<ul>
    @foreach($classes_subjects as $csub)
    <li class="actions">
        {{ $csub->schoolclasses->name}} - {{$csub->subjects->name}}
        <a href="{{ route('classes_subjects.show', $csub->id) }}" class="button">Megjelenít</a>
        <a href="{{ route('classes_subjects.edit', $csub->id) }}" class="button">Módosít</a>
        <form action="{{ route('classes_subjects.destroy', $csub->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="danger">Törlés</button>
        </form>
    </li>
        @endforeach
</ul>

@endsection