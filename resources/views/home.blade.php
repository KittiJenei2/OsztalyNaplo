@extends('layout')

@section('content')
    <div style="padding: 2rem; max-width: 80%; margin: 0 auto;">
        <h2 class="text-center">Kezdőlap</h2>

        <form>
            <div class="form-group">
                <label for="year">Évfolyam:</label>
                <select id="year">
                    <option value="">-- Válassz --</option>
                    @foreach(\App\Models\SClassModel::select('year')->distinct()->get() as $item)
                        <option value="{{ $item->year }}">{{ $item->year }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="class">Osztály:</label>
                <select id="class" disabled>
                    <option value="">-- Előbb évfolyamot válassz --</option>
                </select>
            </div>
        </form>

        <h3>Tanulók:</h3>
        <ul id="student-list" class="list-group">
            <!-- Tanulók itt jelennek meg -->
        </ul>

        <div class="average">
            <h3>Átlag:</h3>
            <div id="average-mark">-- Válassz osztályt --</div>
        </div>
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
