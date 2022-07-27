@extends('layouts.app')

@section('content')
    <div class="mx-4">
        <div
            class="bg-gray-50 border border-gray-200 p-10 rounded max-w-lg mx-auto mt-24"
        >
            <header class="text-center">
                <h2 class="text-2xl font-bold uppercase mb-1">
                    Create a Movie
                </h2>
            </header>

            <form action="{{ route('movie.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-6">
                    <label for="title" class="inline-block text-lg mb-2"
                        >Movie Title</label
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
                    <label for="year" class="inline-block text-lg mb-2"
                        >Year</label
                    >
                    <input
                        type="text"
                        class="border border-gray-200 rounded p-2 w-full"
                        name="year"
                        value="{{ old('year') }}"
                    />

                    @error('year')
                        <div class="text-red-500 mt-1 text-xs">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="runtime" class="inline-block text-lg mb-2"
                        >Runtime</label
                    >
                    <input
                        type="text"
                        class="border border-gray-200 rounded p-2 w-full"
                        name="runtime"
                        value="{{ old('runtime') }}"
                    />

                    @error('runtime')
                        <div class="text-red-500 mt-1 text-xs">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="director" class="inline-block text-lg mb-2"
                        >Director</label
                    >
                    <input
                        type="text"
                        class="border border-gray-200 rounded p-2 w-full"
                        name="director"
                        value="{{ old('director') }}"
                    />

                    @error('director')
                        <div class="text-red-500 mt-1 text-xs">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="actors" class="inline-block text-lg mb-2"
                        >Actors</label
                    >
                    <input
                        type="text"
                        class="border border-gray-200 rounded p-2 w-full"
                        name="actors"
                        value="{{ old('actors') }}"
                    />

                    @error('actors')
                        <div class="text-red-500 mt-1 text-xs">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-6">
                    <label
                        for="plot"
                        class="inline-block text-lg mb-2"
                    >
                        Plot
                    </label>
                    <textarea
                        class="border border-gray-200 rounded p-2 w-full"
                        name="plot"
                        rows="10"
                        
                    >{{ old('plot') }}</textarea>

                    @error('plot')
                        <div class="text-red-500 mt-1 text-xs">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="posterUrl" class="inline-block text-lg mb-2">
                        Poster
                    </label>
                    <input
                        type="file"
                        class="border border-gray-200 rounded p-2 w-full"
                        name="posterUrl"
                    />

                    @error('posterUrl')
                        <div class="text-red-500 mt-1 text-xs">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-6">
                    <h3 class="mb-4 font-semibold text-gray-900 dark:text-white">Genre</h3>
                    <ul class="items-center w-full text-sm font-medium text-gray-900 bg-white rounded-lg border border-gray-200 sm:flex dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                        <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                            @foreach ($genres->unique('title') as $genre)
                            <div class="flex items-center pl-3">
                                <input id="{{ $genre->title }}" type="checkbox" name="genre[]" value={{ $genre->title }} class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                <label for="{{ $genre->title }}" class="py-3 ml-2 w-full text-sm font-medium text-gray-900 dark:text-gray-300">{{ $genre->title }}</label>
                            </div>
                            @endforeach
                        </li>
                    </ul>
                </div>

                <div class="mb-6">
                    <button
                        class="bg-laravel text-white rounded py-2 px-4 hover:bg-black"
                    >
                        Create Movie
                    </button>

                    <a href="{{ route('home') }}" class="text-black ml-4"> Back </a>
                </div>
            </form>
        </div>
    </div>
@endsection