@props(['movie'])

<div class="bg-gray-50 border border-gray-200 rounded p-6">
    <div class="flex">
        <img
            class=" w-48 mr-6 md:block"
            src={{$movie->posterUrl ? asset('storage/' . $movie->posterUrl) : asset('images/no-image.png')}}
            alt=""
        />
        <div>
            <h3 class="text-2xl">
                <i class="fa-solid fa-film"></i><a href={{ route('movie.show',$movie) }}> {{ $movie->title }}</a>
            </h3>
            <div class="text-xl font-bold mb-4">Year: <i class="fa-solid fa-calendar-days"></i>{{ $movie->year }}</div>
            <div class="text-xl font-bold mb-4">Runtime: <i class="fa-solid fa-clock"></i>{{ $movie->runtime }}</div>
            <div class="text-xl font-bold mb-4">Director: {{ $movie->director }}</div>
            <div class="text-xl font-bold mb-4">Actors: {{ $movie->actors }}</div>
            <div class="text-xl font-bold mb-4">Summary: {{ $movie->plot }}</div>

        </div>
    </div>
</div>