@props(['movie'])

<div class="bg-gray-50 border border-gray-200 rounded p-6">
    <div class="flex">
        <img
            class=" w-48 mr-6 md:block"
            src={{$movie->posterUrl ?: asset('images/no-image.png')}}
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
            <div class="text-xl font-bold mb-4">Genre:
                {{implode(',',$movie->genres->map(function($genre){
                    return $genre->title;

                })->toArray()
                
                
                )}}
            </div>
            <div><a href="{{ route('movie.edit',$movie->id) }}" class="text-blue-400 px-6 py-2 rounded-xl">
                    <i
                        class="fa-solid fa-pen-to-square"
                    ></i> Edit</a
            ></div>
            
            <div><form action="{{ route('movie.delete',$movie) }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="text-red-600">

                    <i
                        class="fa-solid fa-trash-can"
                    ></i> Delete
                </button>
            </form></div>


        </div>
    </div>
</div>