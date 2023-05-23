<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}" />
    <link rel="icon" href="{{asset('assets/logo.png')}}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
          integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
          crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="{{asset("/assets/js/scripts.js")}}"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.css"  rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>

    <title>G-Photos</title>
</head>

<body>


<nav class="bg-white border-gray-200 border-b">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="/" class="flex items-center">
            <img src="{{asset('assets/logo.png')}}" class="h-8 mr-3" alt="G-Photos logo" />
            <span class="self-center text-2xl font-semibold whitespace-nowrap">G-Photos</span>
        </a>
        <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200" aria-controls="navbar-default" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
        </button>
        <div class="hidden w-full md:block md:w-auto" id="navbar-default">
            <ul style="align-items: center" class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white">

                @auth
                    <li>
                        <div class="relative">

                            <img class="w-10 h-10 rounded" src="{{auth()->user()->user_photo? asset('storage/' . auth()->user()->user_photo) : asset('assets/user.png')}}" alt="">
                            <span class="absolute bottom-0 left-8 transform translate-y-1/4 w-3.5 h-3.5 bg-green-400 border-2 border-white dark:border-gray-800 rounded-full"></span>
                        </div>
            </li>
            <li>
                <a href="/user" class="menu_item hover:text-laravel"><i class="fa-solid fa-gear"></i> Manage profile</a>
            </li>
            <li>
                <form class="inline" method="POST" action="/logout">
                    @csrf
                    <button type="submit" class="menu_item">
                        <i class="fa-solid fa-door-closed"></i> Logout
                    </button>
                </form>
            </li>
        @else
            <li>
                <a href="/register" class="menu_item hover:text-laravel"><i class="fa-solid fa-user-plus"></i> Register</a>
            </li>
            <li>
                <a href="/login" class="menu_item hover:text-laravel"><i class="fa-solid fa-arrow-right-to-bracket"></i> Login</a>
            </li>
        @endauth
            </ul>
        </div>
    </div>
</nav>


<main class="main-display">
    {{$slot}}
</main>
<footer class="fixed bottom-0 left-0 z-20 w-full p-4 bg-white border-t border-gray-200 shadow md:flex md:items-center md:justify-between md:p-6">
    <span class="text-sm text-gray-500 sm:text-center">© 2023 <a href="https://github.com/byko-dev" class="hover:underline">byko-dev</a>. All Rights Reserved.
    </span>
    <ul class="flex flex-wrap items-center mt-3 text-sm font-medium text-gray-500 sm:mt-0">
        <li>
            <a href="https://www.linkedin.com/in/byko-dev/" target="_blank" class="mr-4 hover:underline md:mr-6">Linkedin</a>
        </li>
        <li>
            <a href="https://github.com/byko-dev" target="_blank" class="mr-4 hover:underline md:mr-6">Github</a>
        </li>
        <li>
            <a href="https://openai.com/blog/openai-api" target="_blank" class="mr-4 hover:underline md:mr-6">OpenAI API</a>
        </li>
        <li>
            <a href="#" target="_blank" class="hover:underline">Twitter</a>
        </li>
    </ul>
</footer>
<x-flash-message />
</body>

</html>
