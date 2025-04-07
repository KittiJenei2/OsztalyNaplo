@extends('layout')

@section('content')
    <div style="padding: 1rem;">
        <label for="year">Évfolyam:</label>
        <select id="year">
            <option value="">-- Válassz --</option>
            @foreach(\App\Models\SClassModel::select('year')->distinct()->get() as $item)
                <option value="{{ $item->year }}">{{ $item->year }}</option>
            @endforeach
        </select>

        <label for="class">Osztály:</label>
        <select id="class" disabled>
            <option value="">-- Előbb évfolyamot válassz --</option>
        </select>

        <h3>Osztályba járó tanulók:</h3>
        <ul id="student-list"></ul>

        <h3>Az osztály átlaga:</h3>
        <div id="average-mark">-- Válassz osztályt --</div>
    </div>

    <script>
        $('#year').on('change', function () {
            let year = $(this).val();
            $('#class').prop('disabled', true).empty().append('<option value="">Betöltés...</option>');
            $('#student-list').empty();
            $('#average-mark').text('-- Válassz osztályt --');

            if (year !== '') {
                $.get('/schoolclasses/by-year/' + year, function (classes) {
                    $('#class').empty().append('<option value="">-- Válassz osztályt --</option>');
                    classes.forEach(cls => {
                        $('#class').append(`<option value="${cls.id}">${cls.name}</option>`);
                    });
                    $('#class').prop('disabled', false);
                });
            }
        });

        $('#class').on('change', function () {
            let classId = $(this).val();
            $('#student-list').empty();
            $('#average-mark').text('Betöltés...');

            if (classId !== '') {
                // Tanulók lekérdezése
                $.get('/students/by-class/' + classId, function (students) {
                    if (students.length === 0) {
                        $('#student-list').append('<li>Nincsenek diákok.</li>');
                    } else {
                        students.forEach(student => {
                            $('#student-list').append(`<li>${student.name} (${student.gender})</li>`);
                        });
                    }
                });

                // Átlag lekérdezése az adott osztályhoz
                $.get('/class/average/' + classId, function (data) {
                    if (data.average !== null) {
                        $('#average-mark').text(data.average);
                    } else {
                        $('#average-mark').text('Nincs adat');
                    }
                });
            }
        });
    </script>
@endsection
