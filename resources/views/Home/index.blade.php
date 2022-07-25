@extends('layouts.app')

@section('content')
    @include('partials._hero')
    @include('partials._search')

    <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">
        @if(count($movies))
            @foreach ($movies as $movie)
                <x-movie-card :movie="$movie" />
            @endforeach

            
        @else
            <p>No moives found!</p>
        @endif

    </div>

    <div class="mt-8 ml-4 mr-4">{{ $movies->links() }}</div>
    
@endsection