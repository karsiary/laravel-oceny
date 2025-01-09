<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }} - @yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-black">
    <div class="relative min-h-screen">
        <!-- Gradient background -->
        <div class="absolute inset-0 bg-black">
            <div class="absolute inset-0 bg-gradient-to-b from-slate-900 to-black"></div>
            <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_top_120%_120%,rgba(75,59,138,1)_15%,rgba(75,59,138,0.3)_30%,rgba(75,59,138,0.1)_45%,transparent_70%)]"></div>
        </div>

        <nav class="relative border-b" style="background-color: rgb(11 14 16 / 50%); border-color: rgb(26 29 33);">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex items-center justify-between h-16">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <a href="{{ route('dashboard') }}" class="text-xl font-bold text-white">
                                {{ config('app.name') }}
                            </a>
                        </div>
                    </div>
                    @auth
                        <div class="flex items-center">
                            <div class="flex items-center space-x-4">
                                <span class="text-gray-300">{{ auth()->user()->name }} {{ auth()->user()->surname }}</span>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="btn btn-secondary">Wyloguj</button>
                                </form>
                            </div>
                        </div>
                    @endauth
                </div>
            </div>
        </nav>

        <main class="relative">
            @if(session('success'))
                <div id="success-toast" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4 transition-opacity duration-300">
                    <div class="bg-green-500 text-white p-4 rounded-lg">
                        {{ session('success') }}
                    </div>
                </div>
                <script>
                    setTimeout(() => {
                        const toast = document.getElementById('success-toast');
                        if (toast) {
                            toast.style.opacity = '0';
                            setTimeout(() => {
                                toast.remove();
                            }, 300);
                        }
                    }, 5000);
                </script>
            @endif

            @if($errors->any())
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4">
                    <div class="bg-red-500 text-white p-4 rounded-lg">
                        <ul class="list-disc list-inside">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif

            @yield('content')
        </main>
    </div>
</body>
</html> 