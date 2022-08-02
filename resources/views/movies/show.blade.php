@extends('layouts.app')

@section('content')
    <a href="{{ route('home') }}" class="inline-block text-black ml-4 mb-4"
        ><i class="fa-solid fa-arrow-left"></i> Back
    </a>
    <div class="mx-4">
        <div class="bg-gray-50 border border-gray-200 p-10 rounded">
            <div
                class="flex flex-col items-center justify-center text-center"
            >
                <img
                    class="w-48 mr-6 mb-6"
                    src={{$movie->posterUrl ?: asset('images/no-image.png')}}
                    alt=""
                />

                <h3 class="text-2xl font-bold mb-2">{{ $movie->title }}</h3>
                <div class="text-xl  ">
                    Year: <i class="fa-solid fa-calendar-days"> </i>{{ $movie->year }}
                </div>
                <div class="text-lg my-2 ">
                    Runtime: <i class="fa-solid fa-clock"></i> {{ $movie->runtime }}
                </div>
                <div class="text-lg my-2 ">
                    Director: {{ $movie->director }}
                </div>
                <div class="text-lg my-2 ">
                    Actors: {{ $movie->actors }}
                </div>
                <div class="border border-gray-200 w-full mb-6"></div>
                <div>
                    <h3 class="text-3xl font-bold mb-4">
                        Movie Description
                    </h3>
                    <div class="text-lg space-y-6">
                        {{ $movie->plot }}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection