<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }} - @yield('title')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-black">
    <div class="relative min-h-screen">
        <!-- Gradient background -->
        <div class="absolute inset-0 bg-black">
            <div class="absolute inset-0 bg-gradient-to-b from-slate-900 to-black"></div>
            <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_top_120%_120%,rgba(75,59,138,1)_15%,rgba(75,59,138,0.3)_30%,rgba(75,59,138,0.1)_45%,transparent_70%)]"></div>
        </div>

        <!-- Nagłówek -->
        <header class="app-header">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
                <div class="flex items-center justify-between">
                    <a href="{{ route('dashboard') }}" class="text-3xl font-light tracking-wide text-white hover:text-gray-200 transition-colors duration-200">
                        System <span class="font-light">Ocen</span>
                    </a>
                    @auth
                        <div class="flex items-center space-x-4">
                            <div class="flex items-center bg-gray-800/80 rounded-full px-4 py-2 hover:bg-gray-700/80 transition-colors duration-200">
                                <div class="flex items-center justify-center w-8 h-8 rounded-full bg-blue-500/20 text-blue-400">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm font-medium text-white">{{ auth()->user()->name }} {{ auth()->user()->surname }}</p>
                                    <p class="text-xs text-gray-400">{{ auth()->user()->role->name }}</p>
                                </div>
                            </div>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="btn btn-secondary text-sm">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                                    </svg>
                                    Wyloguj
                                </button>
                            </form>
                        </div>
                    @endauth
                </div>
            </div>
        </header>

        <!-- Powiadomienia -->
        <div class="fixed bottom-4 right-4 z-50">
            @if(session('success'))
                <div id="success-toast" class="max-w-md transition-all duration-300 transform translate-y-0 opacity-100">
                    <div class="bg-green-500 text-white p-4 rounded-lg shadow-lg">
                        {{ session('success') }}
                    </div>
                </div>
                <script>
                    setTimeout(() => {
                        const toast = document.getElementById('success-toast');
                        if (toast) {
                            toast.style.transform = 'translateY(100%)';
                            toast.style.opacity = '0';
                            setTimeout(() => {
                                toast.remove();
                            }, 300);
                        }
                    }, 5000);
                </script>
            @endif
        </div>

        <!-- Główna treść -->
        <main class="relative z-10">
            @yield('content')
        </main>
    </div>
</body>
</html> 