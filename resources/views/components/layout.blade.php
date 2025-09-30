<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Remindly - @yield('title')</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,100..900&family=Noto+Sans:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body @auth class="body-is-authenticated" @endauth>
    <div class="main-container">
        <header @auth class="header-is-authenticated" @endauth>
            @auth
            <div class="main-logo-container-authenticated desktop">
                <img class="logo-img" src="{{ Vite::asset('resources/images/logo.webp') }}" width="100">
                <h1 class="logo-text">Remindly</h1>
            </div>

                <div class="navbar-container-authenticated">
                    <div class="main-logo-container-authenticated">
                        <img class="logo-img" src="{{ Vite::asset('resources/images/logo.webp') }}" width="100">
                        <h1 class="logo-text">Remindly</h1>
                    </div>
                    <button id="open" class="open-menu"><i class="bi bi-list"></i></button>
                </div>
            @endauth

            @guest
                <button id="open" class="open-menu"><i class="bi bi-list"></i></button>
            @endguest
            <nav id="nav">
                <button id="close" class="close-menu"><i class="bi bi-x-lg"></i></button>
                <img class="logo-img-nav" src="{{ Vite::asset('resources/images/logo.webp') }}">
                <ul>
                    @guest
                        <li><a class="{{ request()->is('/') ? 'active': 'no-active' }}-current-tab nav-link-text" href="/">
                            <h4>Home</h4>
                        </a></li>
                        <li><a class="{{ request()->is('login') ? 'active': 'no-active' }}-current-tab nav-link-text" href="/login">
                            <h4>Log in</h4>
                        </a></li>
                        <li><a class="{{ request()->is('register') ? 'active': 'no-active' }}-current-tab nav-link-text" href="/register">
                            <h4 id="right-line">Sign up</h4>
                        </a></li>
                    @endguest

                    @auth
                        <li><a class="{{ request()->is('tasks') ? 'active': 'no-active' }}-current-tab nav-link-text" href="/tasks">
                            <h4>Tasks <i class="bi bi-card-checklist"></i></i></h4>
                        </a></li>
                        <li><a class="{{ request()->is('profile') ? 'active': 'no-active' }}-current-tab nav-link-text" href="/profile">
                            <h4 id="right-line">Profile <i class="bi bi-person-circle"></i></h4>
                        </a></li>

                        <form class="form-button" action="/logout" method="POST">
                            @csrf
                            <button class="normal-button" type="submit">
                                <h4><i class="bi bi-box-arrow-right"></i></h4>
                            </button>
                        </form>


                    @endauth
                </ul>
            </nav>
        </header>

        @yield('content')

    </div>
</body>
</html>
