<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Osztálynapló</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com" >
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&family=Quicksand&display=swap" rel="stylesheet">

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <header>
        <nav>
            <ul>
                <li><a href="{{ route('home') }}">Kezdőlap</a></li>
                <li><a href="{{route('schoolclasses.index')}}">Osztályok</a></li>
                <li><a href="{{route('subjects.index')}}">Tantárgyak</a></li>
                <li><a href="{{route('students.index')}}">Tanulók</a></li>
                <li><a href="{{route('marks.index')}}">Jegyek</a></li>
                <li><a href="{{route('classes_subjects.index')}}">Hozzárendelés</a></li>

                @auth
                    <li>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit">Kijelentkezés</button>
                        </form>
                    </li>
                @else
                    <li><a href="{{ url('/login') }}">Bejelentkezés</a></li>
                    <li><a href="{{ url('/register') }}">Regisztráció</a></li>
                @endauth
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
