<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Album App')</title>
</head>
<body>

    <!-- Header -->
    <header>
        <h1>Album Application</h1>
        @section('header')
            <nav>
                <ul>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{ route('albums.index') }}">Albums</a></li>
                    <li><a href="{{ route('photos.create') }}">Add Photo</a></li> <!-- New link for photos -->
                    <li><a href="{{ route('profile.index') }}">Profile</a></li>
                    <li><form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit">logout</button>
                    </form></li>
                </ul>
            </nav>
        @show
    </header>

    <!-- Content Section -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer>
        @section('footer')
            <p>&copy; 2024 Album App</p>
        @show
    </footer>

</body>
</html>
