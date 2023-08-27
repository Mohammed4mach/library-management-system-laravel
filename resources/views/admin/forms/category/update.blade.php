@extends('layouts.admin')

@section('title', 'Edit Category')

@section('content')
    <x-h1 class="width-full flex-center margin-bottom-40px">Edit Category</x-h1>

    <form class="flex-center flex-column" method="POST" action="{{ route('categories.update', $id) }}">
        @csrf
        @method('PUT')

        <div class="flex-column">
            <x-label class="margin-bottom-7px">Category Name</x-label>
            <x-input.text placeholder="Name" name="name" value="{{ $name }}" />
        </div>

        <x-button.create class="margin-top-40px">Update</x-button.create>
    </form>
@endsection

