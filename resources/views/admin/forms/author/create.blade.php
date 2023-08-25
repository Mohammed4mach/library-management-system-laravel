@extends('layouts.admin')

@section('title', 'Add Author')

@section('content')
    <x-h1 class="width-full flex-center margin-bottom-40px">Add New Author</x-h1>

    <form class="flex-center flex-column" method="POST" action="{{ route('authors.store') }}">
        @csrf

        <div class="flex-column">
            <x-label class="margin-bottom-7px">Author Name</x-label>
            <x-input.text placeholder="Name" name="name" />
        </div>

        <x-button.create class="margin-top-40px">Add</x-button.create>
    </form>
@endsection

