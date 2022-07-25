@extends('layouts.app')

@section('content')
    <div class="mx-4">
        <div
            class="bg-gray-50 border border-gray-200 p-10 rounded max-w-lg mx-auto mt-24"
        >
            <header class="text-center">
                <h2 class="text-2xl font-bold uppercase mb-1">
                    Edit
                </h2>
                <p class="mb-4">Edit the Movie you posted</p>
            </header>

            <form action="{{ route('movie.update',$movie) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="mb-6">
                    <label
                        for="title"
                        class="inline-block text-lg mb-2"
                        >Movie </label
                    >
                    <input
                        type="text"
                        class="border border-gray-200 rounded p-2 w-full"
                        name="title"
                        value="{{ $movie->title}}"
                    />

                    @error('title')
                        <div class="text-red-500 mt-1 text-xs">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-6">
                    <label
                        for="year"
                        class="inline-block text-lg mb-2"
                        >Year </label
                    >
                    <input
                        type="text"
                        class="border border-gray-200 rounded p-2 w-full"
                        name="year"
                        value="{{ $movie->year}}"
                    />

                    @error('year')
                        <div class="text-red-500 mt-1 text-xs">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-6">
                    <label
                        for="runtime"
                        class="inline-block text-lg mb-2"
                        >Runtime </label
                    >
                    <input
                        type="text"
                        class="border border-gray-200 rounded p-2 w-full"
                        name="runtime"
                        value="{{ $movie->runtime}}"
                    />

                    @error('runtime')
                        <div class="text-red-500 mt-1 text-xs">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-6">
                    <label
                        for="director"
                        class="inline-block text-lg mb-2"
                        >Director </label
                    >
                    <input
                        type="text"
                        class="border border-gray-200 rounded p-2 w-full"
                        name="director"
                        value="{{ $movie->director}}"
                    />

                    @error('director')
                        <div class="text-red-500 mt-1 text-xs">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-6">
                    <label
                        for="actors"
                        class="inline-block text-lg mb-2"
                        >Actors </label
                    >
                    <input
                        type="text"
                        class="border border-gray-200 rounded p-2 w-full"
                        name="actors"
                        value="{{ $movie->actors}}"
                    />

                    @error('actors')
                        <div class="text-red-500 mt-1 text-xs">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="posterUrl" class="inline-block text-lg mb-2">
                        Movie picture
                    </label>
                    <div>
                        <img
                            class="w-48 mr-6 mb-6"
                            src={{$movie->posterUrl ? asset('storage/' . $movie->posterUrl) : asset('images/no-image.png')}}
                            alt=""
                        />
                    </div>
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
                    <label
                        for="plot"
                        class="inline-block text-lg mb-2"
                    >
                        Movie Description
                    </label>
                    <textarea
                        class="border border-gray-200 rounded p-2 w-full"
                        name="plot"
                        rows="10"
                        placeholder="Include tasks, requirements, salary, etc"
                    >{{ $movie->plot }}</textarea>

                    @error('plot')
                        <div class="text-red-500 mt-1 text-xs">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-6">
                    <button
                        class="bg-laravel text-white rounded py-2 px-4 hover:bg-black"
                    >
                        Update Movie
                    </button>

                    <a href="{{ route('home') }}" class="text-black ml-4"> Back </a>
                </div>
            </form>
        </div>
    </div>
@endsection