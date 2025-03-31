@extends ('layout')

@section('content')

<h1>{{ $student->name }}</h1>
<h2>Osztály: {{ $student->schoolclasses->name }}</h2>

<p>{{ $student->gender }}</p>

@endsection
