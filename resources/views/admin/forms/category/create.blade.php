@extends('layouts.admin')

@section('title', 'Add Category')

@section('content')
    <x-h1 class="width-full flex-center margin-bottom-40px">Add New Category</x-h1>

    <form class="flex-center flex-column" method="POST" action="{{ route('categories.store') }}">
        @csrf

        <div class="flex-column">
            <x-label class="margin-bottom-7px">Category Name</x-label>
            <x-input.text placeholder="Name" name="name" />
        </div>

        <x-button.create class="margin-top-40px">Add</x-button.create>
    </form>
@endsection

