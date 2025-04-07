@extends('layout')

@section('content')
    <div class="student-show-container">
        <h1 class="student-name">{{ $student->name }}</h1>
        <h2 class="student-class">Osztály: {{ $student->schoolclasses->name }}</h2>
        
        <div class="student-info">
            <p><strong>Nem:</strong> {{ $student->gender }}</p>
            <p><strong>Átlag:</strong> {{ number_format($averageMark, 2) }}</p> 
        </div>

        <p><strong>Jegyek:</strong></p>
        @if($student->marks->isEmpty())
            <p>Nincsenek jegyek rögzítve a tanuló számára.</p>
        @else
            <ul class="marks-list">
                @foreach($student->marks as $mark)
                    <li>
                        <strong>{{ $mark->subjects->name }}:</strong> {{ $mark->mark }} <!-- Tantárgy és jegy -->
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
@endsection
