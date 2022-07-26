@extends('layouts.app')

@section('content')
    <div class="mx-4">
        <div
            class="bg-gray-50 border border-gray-200 p-10 rounded max-w-lg mx-auto mt-24"
        >
            <header class="text-center">
                <h2 class="text-2xl font-bold uppercase mb-1">
                    Register
                </h2>
                <p class="mb-4">Create an account to Sina Film</p>
            </header>

            <form action="{{ route('register') }}" method="POST" >
                @csrf
                <div class="mb-6">
                    <label for="name" class="inline-block text-lg mb-2">
                        Name
                    </label>
                    <input
                        type="text"
                        class="border border-gray-200 rounded p-2 w-full"
                        name="name"
                        value="{{ old('name') }}"
                    />

                    @error('name')
                        <div class="text-red-500 mt-1 text-xs">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="email" class="inline-block text-lg mb-2"
                        >Email</label
                    >
                    <input
                        type="email"
                        class="border border-gray-200 rounded p-2 w-full"
                        name="email"
                        value="{{ old('email') }}"
                    />
                    
                    @error('email')
                        <div class="text-red-500 mt-1 text-xs">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-6">
                    <label
                        for="password"
                        class="inline-block text-lg mb-2"
                    >
                        Password
                    </label>
                    <input
                        type="password"
                        class="border border-gray-200 rounded p-2 w-full"
                        name="password"
                    />

                    @error('password')
                        <div class="text-red-500 mt-1 text-xs">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-6">
                    <label
                        for="password_confirmation"
                        class="inline-block text-lg mb-2"
                    >
                        Confirm Password
                    </label>
                    <input
                        type="password"
                        class="border border-gray-200 rounded p-2 w-full"
                        name="password_confirmation"
                    />

                    @error('password_confirmation')
                        <div class="text-red-500 mt-1 text-xs">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-6">
                    
                    <div class=" flex items-center pl-4 rounded border border-gray-200 dark:border-gray-700">
                    
                        <input checked id="IsAdmin" type="checkbox" name="IsAdmin" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="IsAdmin" class="py-4 ml-2 w-full text-sm font-medium text-gray-900 dark:text-gray-300">Admin</label>
                    </div>

                    @error('password_confirmation')
                        <div class="text-red-500 mt-1 text-xs">{{ $message }}</div>
                    @enderror
                </div>

                

                <div class="mb-6">
                    <button
                        type="submit"
                        class="bg-laravel text-white rounded py-2 px-4 hover:bg-black"
                    >
                        Sign Up
                    </button>
                </div>

                <div class="mt-8">
                    <p>
                        Already have an account?
                        <a href="{{ route('login') }}" class="text-laravel"
                            >Login</a
                        >
                    </p>
                </div>
            </form>
        </div>
    </div>
@endsection