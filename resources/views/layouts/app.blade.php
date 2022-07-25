<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="icon" href="images/favicon.ico" />
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
            integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
        />
        <script src="https://cdn.tailwindcss.com"></script>
        <script src="//unpkg.com/alpinejs" defer></script>
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        colors: {
                            laravel: "#ef3b2d",
                        },
                    },
                },
            };
            
        </script>
        <title>SinaFilm | Find Best Movies</title>
    </head>
    <body class="mb-48">
        <nav class="flex justify-between items-center mb-4">
            <a href={{ route('home') }}
                ><img class="w-24" src="{{ asset('images/home.png') }}" alt="" class="logo"
            /></a>
            <ul class="flex space-x-6 mr-6 text-lg">
                
                
                
                @auth

                @if(auth()->user()->userHasRole('admin'))
                        <li>
                            <a href="{{ route('admin') }}" class="hover:text-laravel">
                                Admin</a>
                        </li>
        
                        <li>
                            <a href="{{ route('genre.create') }}" class="hover:text-laravel">
                                Create Genres</a>
                        </li>
                @endif
                    
                <li>
                    <span  class="font-bold uppercase">
                        {{ auth()->user()->name }}
                    </span>
                </li>

                <li>
                    <a href="{{ route('movie.manage',auth()->user()) }}" class="hover:text-laravel"
                        ><i class="fa-solid fa-gear"></i>
                        Manage My movies</a
                    >
                </li>

                <li>
                    <form class="inline" action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit">
                            <i class="fa-solid fa-door-closed"></i>Logout
                        </button>
                    </form>
                </li>
                @endauth

                

                
                

                    @guest

                    <li>
                        <a href="{{ route('register') }}" class="hover:text-laravel"
                            ><i class="fa-solid fa-user-plus"></i> Register</a
                        >
                    </li>
                    
                    <li>
                        <a href="{{ route('login') }}" class="hover:text-laravel"
                            ><i class="fa-solid fa-arrow-right-to-bracket"></i>
                            Login</a
                        >
                    </li>

                    @endguest
                    
                
                
            </ul>
        </nav>

        <main>
            @yield('content')
        </main>

        <footer
            class="fixed bottom-0 left-0 w-full flex items-center justify-start font-bold bg-laravel text-white h-24 mt-24 opacity-90 md:justify-center"
        >
            <p class="ml-2">Copyright &copy; 2022, All Rights reserved</p>

            <a
                href="{{ route('movie.create') }}"
                class="absolute top-1/3 right-10 bg-black text-white py-2 px-5"
                >Post Movie</a
            >
        </footer>

        <x-flash-message/>
    </body>
</html>