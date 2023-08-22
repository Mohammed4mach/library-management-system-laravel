<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Library Management System</title>

        @vite([ 'resources/sass/app.scss' ])
    </head>
    <body>
        <div>
            @if (Route::has('login'))
                <div>
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            @admin
            <x-table.container>
                <x-table>
                    <x-table.tr class="table__tr--head">
                        <x-table.td class="table__td--head">Tbm</x-table.td>
                        <x-table.td class="table__td--head">Tbm</x-table.td>
                        <x-table.td class="table__td--head">Tbm</x-table.td>
                        <x-table.td class="table__td--head">Tbm</x-table.td>
                        <x-table.td class="table__td--head table__td--no_border"></x-table.td>
                        <x-table.td class="table__td--head table__td--no_border"></x-table.td>
                        <x-table.td class="table__td--head table__td--no_border"></x-table.td>
                    </x-tr>
                    <x-table.tr>
                        <x-table.td>Tbm</x-table.td>
                        <x-table.td>Tbm</x-table.td>
                        <x-table.td>Tbm</x-table.td>
                        <x-table.td>Tbm</x-table.td>
                        <x-table.td class="table__td--no_border">&copy;</x-table.td>
                        <x-table.td class="table__td--no_border">&copy;</x-table.td>
                        <x-table.td class="table__td--no_border">&copy;</x-table.td>
                    </x-tr>
                    <x-table.tr>
                        <x-table.td>Tbm</x-table.td>
                        <x-table.td>Tbm</x-table.td>
                        <x-table.td>Tbm</x-table.td>
                        <x-table.td>Tbm</x-table.td>
                        <x-table.td class="table__td--no_border">&copy;</x-table.td>
                        <x-table.td class="table__td--no_border">&copy;</x-table.td>
                        <x-table.td class="table__td--no_border">&copy;</x-table.td>
                    </x-tr>
                </x-table>
            </x-table.container>
            @endadmin
        </div>
    </body>
</html>
