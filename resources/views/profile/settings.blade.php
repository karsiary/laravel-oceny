@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-3xl mx-auto">
        <!-- Nagłówek -->
        <div class="mb-8">
            <h1 class="text-3xl font-light text-white">Ustawienia profilu</h1>
            <p class="mt-2 text-gray-400">Zarządzaj swoimi danymi i ustawieniami konta</p>
        </div>

        <!-- Zawartość -->
        <div class="space-y-6">
            <!-- Formularz edycji danych -->
            <form action="{{ route('profile.update') }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Dane osobowe -->
                <div class="bg-slate-800/50 backdrop-blur-sm rounded-xl p-6 shadow-lg border border-slate-700/50">
                    <h2 class="text-xl font-light text-white mb-6">Dane osobowe</h2>
                    
                    <div class="grid md:grid-cols-2 gap-6">
                        <!-- Imię -->
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-300 mb-2">Imię</label>
                            <input type="text" name="name" id="name" 
                                   value="{{ auth()->user()->name }}"
                                   class="w-full bg-slate-900/50 border border-slate-700 rounded-lg px-4 py-2.5 text-white placeholder-gray-400 focus:border-purple-500 focus:ring-purple-500 transition-colors">
                        </div>

                        <!-- Nazwisko -->
                        <div>
                            <label for="surname" class="block text-sm font-medium text-gray-300 mb-2">Nazwisko</label>
                            <input type="text" name="surname" id="surname" 
                                   value="{{ auth()->user()->surname }}"
                                   class="w-full bg-slate-900/50 border border-slate-700 rounded-lg px-4 py-2.5 text-white placeholder-gray-400 focus:border-purple-500 focus:ring-purple-500 transition-colors">
                        </div>
                    </div>

                    <div class="mt-6 flex justify-end">
                        <button type="submit" 
                                class="px-6 py-2.5 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 focus:ring-offset-slate-800 transition-colors">
                            Zapisz zmiany
                        </button>
                    </div>
                </div>
            </form>

            <!-- Rola -->
            <div class="bg-slate-800/50 backdrop-blur-sm rounded-xl p-6 shadow-lg border border-slate-700/50">
                <div class="flex items-center space-x-4">
                    <div class="flex-shrink-0">
                        <div class="w-12 h-12 rounded-full bg-blue-500/20 flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                        </div>
                    </div>
                    <div class="flex-1">
                        <h2 class="text-xl font-light text-white">Rola w systemie</h2>
                        <div class="mt-2">
                            <span class="inline-flex items-center px-4 py-2 bg-blue-500/10 text-blue-400 rounded-lg border border-blue-500/20 text-lg font-medium">
                                {{ auth()->user()->role->name }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Zmiana hasła -->
            <div class="bg-slate-800/50 backdrop-blur-sm rounded-xl p-6 shadow-lg border border-slate-700/50">
                <h2 class="text-xl font-light text-white mb-6">Bezpieczeństwo</h2>
                
                <form action="{{ route('password.update') }}" method="POST" class="space-y-4">
                    @csrf
                    @method('PUT')

                    <div class="space-y-6">
                        <div>
                            <label for="current_password" class="block text-sm font-medium text-gray-300 mb-2">Aktualne hasło</label>
                            <input type="password" name="current_password" id="current_password" 
                                   class="w-full bg-slate-900/50 border border-slate-700 rounded-lg px-4 py-2.5 text-white placeholder-gray-400 focus:border-purple-500 focus:ring-purple-500 transition-colors">
                        </div>

                        <div>
                            <label for="password" class="block text-sm font-medium text-gray-300 mb-2">Nowe hasło</label>
                            <input type="password" name="password" id="password" 
                                   class="w-full bg-slate-900/50 border border-slate-700 rounded-lg px-4 py-2.5 text-white placeholder-gray-400 focus:border-purple-500 focus:ring-purple-500 transition-colors">
                        </div>

                        <div>
                            <label for="password_confirmation" class="block text-sm font-medium text-gray-300 mb-2">Potwierdź nowe hasło</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" 
                                   class="w-full bg-slate-900/50 border border-slate-700 rounded-lg px-4 py-2.5 text-white placeholder-gray-400 focus:border-purple-500 focus:ring-purple-500 transition-colors">
                        </div>
                    </div>

                    <div class="flex justify-end mt-32">
                        <button type="submit" 
                                class="px-6 py-2.5 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 focus:ring-offset-slate-800 transition-colors">
                            Zmień hasło
                        </button>
                    </div>
                </form>
            </div>

            <!-- Usuwanie konta -->
            <div class="bg-slate-800/50 backdrop-blur-sm rounded-xl p-6 shadow-lg border border-slate-700/50">
                <h2 class="text-xl font-light text-white mb-4">Usuwanie konta</h2>
                <p class="text-sm text-gray-400 mb-6">
                    Po usunięciu konta, wszystkie jego zasoby i dane zostaną trwale usunięte. Przed usunięciem konta pobierz wszystkie dane, które chcesz zachować.
                </p>
                <div class="flex justify-end">
                    <form action="{{ route('profile.destroy') }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                                class="px-6 py-2.5 bg-red-600 text-white rounded-lg hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 focus:ring-offset-slate-800 transition-colors"
                                onclick="return confirm('Czy na pewno chcesz usunąć swoje konto? Ta operacja jest nieodwracalna.')">
                            Usuń konto
                        </button>
                    </form>
                </div>
            </div>

            @if ($errors->any())
                <div class="bg-red-500/10 border border-red-500/50 rounded-lg p-4">
                    <ul class="list-disc list-inside text-sm text-red-400">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection 