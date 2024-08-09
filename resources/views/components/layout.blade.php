<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', config('app.name'))</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <link rel="icon" href="{{ asset('images/preview.png') }}" type="image/png">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <script>
        function updateTitle(newTitle) {
            document.title = newTitle;
        }
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('mobile-menu-button').addEventListener('click', function() {
                var mobileMenu = document.getElementById('mobile-menu');
                mobileMenu.classList.toggle('hidden');
            });
        });
    </script>
    <style>
        .bg-primary { background-color: #405D72; }
        .bg-secondary { background-color: #758694; }
        .bg-accent { background-color: #F7E7DC; }
        .bg-light { background-color: #FFF8F3; }
        .text-primary { color: #405D72; }
        .text-secondary { color: #758694; }
        .text-accent { color: #F7E7DC; }
        .text-light { color: #FFF8F3; }
    </style>
</head>
<body class="flex flex-col min-h-screen bg-light">
    <nav class="bg-primary shadow-md">
        <div class="custom-container mx-auto px-4 lg:px-8 py-2 flex justify-between items-center">
            <a href="/" class="text-xl font-bold text-light hover:text-accent transition duration-300 flex items-center">
                <span class="sr-only">Larajobz</span>
                <img src="{{ asset('images/preview.png') }}" alt="Larajobz Logo" class="w-8 h-8 inline-block mr-2">
                <span class="inline-block">Larajobz</span>
            </a>
            <div class="flex items-center space-x-4 lg:hidden">
                <button id="mobile-menu-button" class="text-light focus:outline-none">
                    <i class="fa fa-bars"></i>
                </button>
            </div>
            <div class="hidden lg:flex lg:items-center lg:space-x-4">
                @auth
                <div class="flex items-center space-x-4">
                    <span class="font-bold uppercase text-light">
                        Welcome, <span class="text-accent">{{ auth()->user()->name }}</span>
                    </span>
                    <a href="{{ url('/listings/manage') }}" class="text-light hover:text-accent transition duration-300 flex items-center">
                        <i class="fa fa-cog mr-1"></i>
                        Manage Listings
                    </a>
                    <details class="text-light">
                        <summary>Options</summary>
                        <form class="inline" method="POST" action="/logout">
                            @csrf
                            <button type="submit" class="text-light hover:text-red-500 transition duration-300 flex items-center">
                                <i class="fa fa-door-closed mr-1"></i>
                                Logout
                            </button>
                        </form>
                    </details>
                </div>
                @else
                <div class="flex items-center space-x-4">
                    <a href="{{ url('/register') }}" class="text-light hover:text-accent transition duration-300 flex items-center" onclick="updateTitle('Sign Up | Larajobz')">
                        <i class="fa fa-user-plus mr-1"></i>
                        Register
                    </a>
                    <a href="{{ url('/login') }}" class="text-light hover:text-accent transition duration-300 flex items-center">
                        <i class="fa fa-sign-in-alt mr-1"></i>
                        Login
                    </a>
                </div>
                @endauth
            </div>
        </div>
        <div id="mobile-menu" class="hidden lg:hidden bg-primary">
            <ul class="px-2 py-1">
                @auth
                <li>
                    <span class="block text-light font-bold mb-2">
                        Welcome, <span class="text-accent">{{ auth()->user()->name }}</span>
                    </span>
                </li>
                <li>
                    <a href="{{ url('/listings/manage') }}" class="block text-light hover:text-accent transition duration-300 py-2">
                        <i class="fa fa-cog mr-2"></i>
                        Manage Listings
                    </a>
                </li>
                <li>
                    <form class="inline" method="POST" action="/logout">
                        @csrf
                        <button type="submit" class="block text-light hover:text-red-500 transition duration-300 py-2">
                            <i class="fa fa-door-closed mr-2"></i>
                            Logout
                        </button>
                    </form>
                </li>
                @else
                <li>
                    <a href="{{ url('/register') }}" class="block text-light hover:text-accent transition duration-300 py-2" onclick="updateTitle('Sign Up | Larajobz')">
                        <i class="fa fa-user-plus mr-2"></i>
                        Register
                    </a>
                </li>
                <li>
                    <a href="{{ url('/login') }}" class="block text-light hover:text-accent transition duration-300 py-2">
                        <i class="fa fa-sign-in-alt mr-2"></i>
                        Login
                    </a>
                </li>
                @endauth
            </ul>
        </div>
    </nav>
    <main class="flex-1 justify-between">
        {{ $slot }}
    </main>
    <footer class="bg-primary text-light py-8 fixed bottom-0 w-full" style="opacity: 0.9;">
        <div class="custom-container mx-auto flex ml-6">
            <a href="/listings/create" class="absolute bg-secondary text-light px-4 py-2 rounded-lg hover:bg-accent transition duration-300 flex items-center">
                <i class="fas fa-plus-circle mr-1"></i>
                Post a Job
            </a>
        </div>
        <div class="text-sm mt-2 text-center">&copy; 2024 OutCreate. All rights reserved.</div>
    </footer>
    <x-flash-message />
</body>
</html>
