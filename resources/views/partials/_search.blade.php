<form action="{{ route('home')}}" method="GET">
    <div class="relative border-2 border-gray-100 m-4 rounded-lg">
        <div class="absolute top-4 left-3">
            <i
                class="fa fa-search text-gray-400 z-20 hover:text-gray-500"
            ></i>
        </div>
        <div>
            <input
                type="text"
                name="search"
                value="{{$_GET['search']?? ''}}"
                class="h-14 w-full pl-10 pr-20 rounded-lg z-0 focus:shadow focus:outline-none"
                placeholder="Search Movies title..."
            />
            @error('search')
                <div class="text-red-500 mt-1 text-xs">{{ $message }}</div>
            @enderror
        </div>
        
        <h3 class="mb-4 font-semibold text-gray-900 dark:text-white">Genre</h3>
        <div class="flex">
            @foreach ($genres->unique('title') as $genre)
            @php
                $checked = [];
                if(isset($_GET['genre'])){
                    $checked = $_GET['genre'];
                }
            @endphp
            <div class="flex items-center mr-4">
                <input id="{{ $genre->title }}" type="checkbox" name="genre[]"   value="{{ $genre->title }}" @if(in_array($genre->title,$checked)) checked @endif
                  class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                <label for="{{ $genre->title }}" class="py-3 ml-2 w-full text-sm font-medium text-gray-900 dark:text-gray-300">{{ $genre->title }}</label>
            </div>
            
            @endforeach
        </div>
        <div>
            year from : <div >
                            <input class="border-black-400" type="number" name="minYear" id="minYear" value={{$_GET['minYear']?? ''}}>
                            @error('minYear')
                                <div class="text-red-500 mt-1 text-xs">{{ $message }}</div>
                            @enderror
                        </div> to : 
                        <div>
                            <input type="number" name="maxYear" id="maxYear" value={{$_GET['maxYear']?? ''}} >
                            @error('maxYear')
                                <div class="text-red-500 mt-1 text-xs">{{ $message }}</div>
                            @enderror
                        </div>
            
        </div>
        <div class="absolute top-2 right-2">
            <button
                type="submit"
                class="h-10 w-20 text-white rounded-lg bg-red-500 hover:bg-red-600"
            >
                Search
            </button>
        </div>
    </div>
</form>
