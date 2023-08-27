@extends('layouts.admin')

@section('title', 'Add Author')

@section('content')
    <x-h1 class="width-full flex-center margin-bottom-40px">Add New User</x-h1>

    <form autocomplete="off" class="flex-center flex-column" method="POST" action="{{ route('users.store') }}">
        @csrf

        <div class="flex-column">
            <x-label class="margin-bottom-7px" required>Name</x-label>
            <x-input.text placeholder="Fullname" name="name" value="{{ old('name') }}" />

            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="flex-column margin-top-20px">
            <x-label class="margin-bottom-7px" required>Email</x-label>
            <x-input.email placeholder="Email" name="email" value="{{ old('email') }}"/>

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="flex-column margin-top-20px">
            <x-label class="margin-bottom-7px" required>Password</x-label>
            <x-input.password placeholder="Password" name="password" />

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="flex-column margin-top-20px">
            <x-label class="margin-bottom-7px">Role</x-label>
            <x-input.select name="role_id" required>
                <option selected disabled hidden>Choose role</option>
                @foreach($roles as $title => $id)
                    <option value="{{ $id }}">{{ $title }}</option>
                @endforeach
            </x-input.select>

            @error('role_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <x-button.create class="margin-top-40px">Add</x-button.create>
    </form>
@endsection

