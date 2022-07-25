@props(['movie'])

<tr class="border-gray-300">
    <td
        class="px-4 py-8 border-t border-b border-gray-300 text-lg"
    >
        <a href="{{ route('movie.show',$movie) }}">
            {{ $movie->title }}
        </a>
    </td>
    <td
        class="px-4 py-8 border-t border-b border-gray-300 text-lg"
    >
        <a
            href="{{ route('movie.edit',$movie->id) }}"
            class="text-blue-400 px-6 py-2 rounded-xl"
            ><i
                class="fa-solid fa-pen-to-square"
            ></i>
            Edit</a
        >
    </td>
    <td
        class="px-4 py-8 border-t border-b border-gray-300 text-lg"
    >
        <form action="{{ route('movie.delete',$movie) }}" method="POST">
            @csrf
            @method('DELETE')
            <button class="text-red-600">
                <i
                    class="fa-solid fa-trash-can"
                ></i>
                Delete
            </button>
        </form>
    </td>
</tr>