@extends('layouts.app')

@section('title', 'Categories')

@section('content')
    <section>
        <x-h1 class="width-full flex-center margin-bottom-40px">Categories</x-h1>

        @if($categories->count() === 0)
            <x-h3 class="width-full flex-center">No categories</x-h3>
        @else
            <section class="grid_3x3_1fr grid-center">
                @foreach($categories as $category)
                    <x-resource.category
                        class="margin-10px height-180px"
                        :id="$category->id"
                        :name="$category->name"
                        :booksCount="$category->books->count()"
                    />
                @endforeach
            </section>
        @endif
    </section>
@endsection

