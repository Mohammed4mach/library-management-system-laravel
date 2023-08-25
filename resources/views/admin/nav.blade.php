@php
    $url = Request::url();

    $usersActive         = $url === route('users.index');
    $booksActive         = $url === route('books.index');
    $categoriesActive    = $url === route('categories.index');
    $authorsActive       = $url === route('authors.index');
    $rolesActive         = $url === route('roles.index');
    $borrowedBooksActive = $url === route('borrowed-books.index');

    $links = [
        [
            'name' => 'Users',
            'route' => 'users.index',
            'active' => $usersActive
        ],
        [
            'name' => 'Books',
            'route' => 'books.index',
            'active' => $booksActive
        ],
        [
            'name' => 'Categories',
            'route' => 'categories.index',
            'active' => $categoriesActive
        ],
        [
            'name' => 'Authors',
            'route' => 'authors.index',
            'active' => $authorsActive
        ],
        [
            'name' => 'Roles',
            'route' => 'roles.index',
            'active' => $rolesActive
        ],
        [
            'name' => 'Borrowed Books',
            'route' => 'borrowed-books.index',
            'active' => $borrowedBooksActive
        ],
    ];
@endphp

<nav class="nav">
    <a href="/" class="nav__left" draggable="false">
        <x-logo />
    </a>

    <div class="nav__right nav__elem--floor">
        @foreach($links as $link)
            <a class="nav__a {{ $link['active'] ? 'nav__a--active' : '' }}" href="{{ route($link['route']) }}">
                {{ $link['name'] }}
            </a>
        @endforeach
    </div>
</nav>

