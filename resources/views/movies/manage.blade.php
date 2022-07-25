@extends('layouts.app')

@section('content')

    <div class="mx-4">
        <div class="bg-gray-50 border border-gray-200 p-10 rounded">
            <header>
                <h1
                    class="text-3xl text-center font-bold my-6 uppercase"
                >
                    Manage My Movies
                </h1>
            </header>

            <table class="w-full table-auto rounded-sm">
                <tbody>

                    @if(count($movies))
                        @foreach ($movies as $movie)
                            <x-my-movies :movie="$movie" />
                        @endforeach
                    @else
                        <p>No movies found!</p>
                    @endif

                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-8 ml-4 mr-4">{{ $movies->links() }}</div>
    
@endsection