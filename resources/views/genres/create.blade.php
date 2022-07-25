@extends('layouts.app')

@section('content')
    <div class="mx-4">
        <div
            class="bg-gray-50 border border-gray-200 p-10 rounded max-w-lg mx-auto mt-24"
        >
            <header class="text-center">
                <h2 class="text-2xl font-bold uppercase mb-1">
                    Create a Genre
                </h2>
            </header>

            <form action="{{ route('genre.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-6">
                    <label for="title" class="inline-block text-lg mb-2"
                        >Genre Name</label
                    >
                    <input
                        type="text"
                        class="border border-gray-200 rounded p-2 w-full"
                        name="title"
                        value="{{ old('title') }}"
                    />

                    @error('title')
                        <div class="text-red-500 mt-1 text-xs">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-6">
                    <button
                        class="bg-laravel text-white rounded py-2 px-4 hover:bg-black"
                    >
                        Create Genre
                    </button>

                    <a href="{{ route('genre.create') }}" class="text-black ml-4"> Back </a>
                </div>
            </form>
        </div>
    </div>
@endsection