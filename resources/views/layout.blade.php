<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Osztálynapló</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/jquery-3.7.1.js') }}"></script>
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('fontawesome/css/all.css') }}" >

    <link rel="shortcut icon" href="{{ asset('favicon.png') }}" type="image/x-icon">
</head>

<body>
    <header>
            <nav>
                <ul>
                    <li><a href="{{ route('students.index') }}">Tanulók</a></li>
                    <li><a href="{{ route('marks.index') }}">Osztályzatok</a></li>
                    <li><a href="{{ route('subjects.index') }}">Tantárgyak</a></li>
                    <li><a href="{{ route('classes_subjects.index') }}">Tantárgyak osztályonként</a></li>
                    <li><a href="{{ route('schoolclasses.index') }}">Osztályok</a></li>
		            @if(auth()->check())
                        <li>
                            <form class="logout" action="{{ route('logout') }}" method="post">
                                @csrf
                                <button type="submit">Logout {{ auth()->user()->name }}</button>
                            </form>
                        </li>
                    @else
                        <li><a href="{{ route('login') }}">Login</a></li>
                    @endif

                </ul>
            </nav>
         </header>
    <main>
	<!-- ide fogja behúzni a view-kat -->
        @yield('content')
    </main>

    <footer>
        <p>&copy; 2025 </p>
    </footer>

</body>

</html>
