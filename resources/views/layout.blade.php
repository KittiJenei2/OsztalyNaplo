<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Osztálynapló</title>

    <!-- Scripts 
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/jquery-3.7.1.js') }}"></script>-->

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com" >
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&family=Quicksand&display=swap" rel="stylesheet">

</head>

<body>
    <header>
        <nav>
            <ul>
                <li><a href="{{route('schoolclasses.index')}}">Osztályok</a></li>

                <li><a href="{{route('subjects.index')}}">Tantárgyak</a></li>

                <li><a href="{{route('students.index')}}">Tanulók</a></li>

                <li><a href="{{route('marks.index')}}">Jegyek</a></li>

                <li><a href="{{route('classes_subjects.index')}}">Hozzárendelés</a></li>
            </ul>
        </nav>
    </header>
    <main>
        @yield('content')
    </main>
<footer>
    <p>&copy;2025 osztálynapló</p>
</footer>
</body>

</html>
