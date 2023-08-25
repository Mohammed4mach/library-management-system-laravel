<section class="margin-bottom-50px">
    <x-h1 class="margin-bottom-40px width-full flex-center">Borrowed Books</x-h1>

    @empty($books)
        <x-h3 class="width-full flex-center">No borrowed books</x-h3>
    @else
        <x-table.container>
            <x-table class="table--1000px">
                <x-table.tr class="table__tr--head">
                    <x-table.td class="table__td--head">
                        ID
                    </x-table.td>
                    <x-table.td class="table__td--head">
                        Book Title
                    </x-table.td>
                    <x-table.td class="table__td--head">
                        Borrowed at
                    </x-table.td>
                    <x-table.td class="table__td--head">
                        Return Date
                    </x-table.td>
                    <x-table.td class="table__td--head table__td--no_border">

                    </x-table.td>
                </x-table.tr>

                @foreach($books as $book)
                    <x-table.tr>
                        <x-table.td>
                            {{ $book['id'] }}
                        </x-table.td>
                        <x-table.td>
                            <a class="a" href="{{ route('book', $book['book_id']) }}">
                                {{ $book['book_title'] }}
                            </a>
                        </x-table.td>
                        <x-table.td>
                            {{ $book['created_at'] }}
                        </x-table.td>
                        <x-table.td>
                            {{ $book['return_date'] }}
                        </x-table.td>
                        <x-table.td class="return-link table__td--no_border table__td--text_center">
                            <x-button.link
                                class="a--green"
                                route-name="return-book"
                                route-param="{{ $book['book_id'] }}"
                                form-id="return-book-form"
                                method="PATCH"
                            >
                                <i class="fa fa-reply"></i>
                            </x-button.link>
                        </x-table.td>
                    </x-table.tr>
                @endforeach
            </x-table>
        </x-table.container>
    @endempty
</section>

