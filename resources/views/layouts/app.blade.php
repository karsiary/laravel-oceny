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
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-3">
                <div class="flex items-center justify-between">
                    <a href="{{ route('dashboard') }}" class="text-3xl font-light tracking-wide text-white hover:text-gray-200 transition-colors duration-200">
                        System <span class="font-light">Ocen</span>
                    </a>
                    @auth
                        <div class="flex items-center space-x-4">
                            <div class="flex items-center space-x-3 pt-1">
                                <div class="w-7 h-7 rounded-full bg-indigo-500/20 flex items-center justify-center">
                                    <span class="text-indigo-300 text-xs font-medium">
                                        {{ substr(auth()->user()->name, 0, 1) }}{{ substr(auth()->user()->surname, 0, 1) }}
                                    </span>
                                </div>
                                <div class="flex flex-col justify-center h-7">
                                    <span class="text-white text-xs font-medium leading-4">{{ auth()->user()->name }} {{ auth()->user()->surname }}</span>
                                    <span class="text-gray-400 text-[11px] leading-3">{{ auth()->user()->role->name }}</span>
                                </div>
                            </div>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-600 hover:bg-gray-700 text-sm font-medium text-white rounded-lg transition-colors duration-200">
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

        <!-- Główna treść -->
        <main class="relative z-10 pt-20">
            @yield('content')
        </main>

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
    </div>
</body>
</html> 