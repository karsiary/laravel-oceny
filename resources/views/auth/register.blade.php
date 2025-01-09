@extends('layouts.app')

@section('title', 'Rejestracja')

@section('content')
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
            <h2 class="text-2xl font-bold text-center mb-6">Rejestracja</h2>

            <form method="POST" action="{{ route('register') }}" class="space-y-6">
                @csrf

                <div>
                    <label for="name" class="block text-sm font-medium text-gray-300">Imię</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}" required autofocus
                        class="mt-1 block w-full rounded-md border-gray-700 bg-gray-700 text-white shadow-sm">
                </div>

                <div>
                    <label for="surname" class="block text-sm font-medium text-gray-300">Nazwisko</label>
                    <input type="text" name="surname" id="surname" value="{{ old('surname') }}" required
                        class="mt-1 block w-full rounded-md border-gray-700 bg-gray-700 text-white shadow-sm">
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-300">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" required
                        class="mt-1 block w-full rounded-md border-gray-700 bg-gray-700 text-white shadow-sm">
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-300">Hasło</label>
                    <input type="password" name="password" id="password" required
                        class="mt-1 block w-full rounded-md border-gray-700 bg-gray-700 text-white shadow-sm">
                </div>

                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-300">Potwierdź hasło</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" required
                        class="mt-1 block w-full rounded-md border-gray-700 bg-gray-700 text-white shadow-sm">
                </div>

                <div>
                    <button type="submit"
                        class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-500 hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Zarejestruj się
                    </button>
                </div>

                <div class="text-center mt-4">
                    <a href="{{ route('login') }}" class="text-sm text-gray-300 hover:text-white">
                        Masz już konto? Zaloguj się
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection 