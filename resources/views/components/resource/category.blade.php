<section
    {{ $attributes->class([ 'category', 'flex-column', 'flex-center' ]) }}
>
    <a
        class="a--text category__name margin-bottom-7px"
        href="{{ route('categories.show', $id) }}"
    >
        {{ $name }}
    </a>
    <span class="category__books-count">{{ $booksCount ? $booksCount : "No" }} books</span>
</section>

