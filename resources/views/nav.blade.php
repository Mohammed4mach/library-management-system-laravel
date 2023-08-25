@php
    $url = Request::url();

    $homeActive     = $url === route('home');
    $profileActive  = $url === route('profile');
    $categoryActive = $url === route('categories');
    $authorActive   = $url === route('authors');
    $adminActive    = str_contains($url, "admin");
@endphp

<nav class="nav">
    <a href="/" class="nav__left" draggable="false">
        <x-logo />
    </a>

    @if (Route::has('login'))
        @auth
            <div class="nav__right nav__elem--floor">
                <a class="nav__a {{ $homeActive ? 'nav__a--active' : ''}}" href="{{ route('home') }}">
                    Home
                </a>
                <a class="nav__a {{ $profileActive ? 'nav__a--active' : ''}}" href="{{ route('profile') }}">
                    Profile
                </a>
                <a class="nav__a {{ $categoryActive ? 'nav__a--active' : ''}}" href="{{ route('categories') }}">
                    Categories
                </a>
                <a class="nav__a {{ $authorActive ? 'nav__a--active' : ''}}" href="{{ route('authors') }}">
                    Authors
                </a>
                @admin
                    <a class="nav__a {{ $adminActive ? 'nav__a--active' : ''}}" href="{{ route('users.index') }}">
                        Dashboard
                    </a>
                @endadmin
            </div>
        @else
            <div class="nav__right nav__elem--ceil">
                <a class="nav__a--small" href="{{ route('login') }}">Log in</a>

                @if (Route::has('register'))
                    <a class="nav__a--small" href="{{ route('register') }}">Register</a>
                @endif
            </div>
        @endauth
    @endif
</nav>

