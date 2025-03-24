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
    <li> {{ $sclass->id }} - {{ $sclass->name }} - {{ $sclass->year }} </li>
    @endforeach
</ul>

@endsection