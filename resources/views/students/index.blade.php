@extends('layout')

@section('content')

<form method="GET" action="{{ route('students.index') }}" style="margin-bottom: 1rem;">
    <input type="text" name="search" placeholder="Keresés név alapján..." value="{{ request('search') }}">
    <button type="submit">Keresés</button>
</form>


<h1>Tanulók
    <a href="{{ route('students.create') }}" title="Új tanuló">🤓</a>
    <a href="{{ route('students.export') }}" class="button" title="Exportálás CSV-be">📁 Exportálás</a>
    <!--<a href="{{ route('students.index', ['download_pdf' => true]) }}" title="PDF letöltése">PDF letöltése</a>
    <a href="{{ route('students.sendPdfByEmail') }}" title="PDF küldése e-mailben">PDF küldése e-mailben</a>-->
    <a href="{{ route('students.index', ['sort_by' => 'name', 'sort_dir' => 'asc']) }}" title="ABC">A-Z</a>
    <a href="{{ route('students.index', ['sort_by' => 'name', 'sort_dir' => 'desc']) }}" title="CBA">Z-A</a>
</h1>

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

{{-- Keresési eredmény megjelenítése --}}
@if(request('search'))
    <div class="alert alert-info">
        <strong>{{ $students->total() }}</strong> találat található a keresett névre: "<strong>{{ request('search') }}</strong>"
    </div>
@endif

{{-- Ha nincs találat --}}
@if($students->isEmpty())
    <div class="alert alert-warning">
        Nincs találat a keresett névre.
    </div>
@endif

<ul>
    @foreach($students as $student)
    <li class="actions">
        {{ $student->name}} - {{$student->schoolclasses->name}}
        <a href="{{ route('students.show', $student->id) }}" class="button">Mutat</a>
        <a href="{{ route('students.edit', $student->id) }}" class="button">Módosít</a>
        <form action="{{ route('students.destroy', $student->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="danger">Törlés</button>
        </form>
    </li>
        @endforeach
</ul>

<div id="paginator">
    {{ $students->appends(['sort_by' => request('sort_by'), 'sort_dir' => request('sort_dir'), 'search' => request('search')])->links() }}
</div>

@endsection