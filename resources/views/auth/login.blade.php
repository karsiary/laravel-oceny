@extends('layouts.app')

@section('title', 'Logowanie')

@section('content')
<div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8">
        <div>
            <h2 class="mt-6 text-center text-3xl font-extrabold text-white">
                Zaloguj się do systemu
            </h2>
        </div>
        <form class="mt-8 space-y-6" method="POST" action="{{ route('login') }}">
            @csrf
            <div class="rounded-md shadow-sm -space-y-px">
                <div>
                    <label for="email" class="sr-only">Email</label>
                    <input id="email" name="email" type="email" required class="form-input rounded-t-md" placeholder="Email" value="{{ old('email') }}">
                </div>
                <div>
                    <label for="password" class="sr-only">Hasło</label>
                    <input id="password" name="password" type="password" required class="form-input rounded-b-md" placeholder="Hasło">
                </div>
            </div>

            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <input id="remember" name="remember" type="checkbox" class="h-4 w-4 rounded border-gray-700 bg-gray-800 text-blue-600 focus:ring-blue-500">
                    <label for="remember" class="ml-2 block text-sm text-gray-300">
                        Zapamiętaj mnie
                    </label>
                </div>
            </div>

            <div>
                <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Zaloguj się
                </button>
            </div>

            <div class="text-center">
                <a href="{{ route('register') }}" class="font-medium text-blue-500 hover:text-blue-400">
                    Nie masz konta? Zarejestruj się
                </a>
            </div>
        </form>
    </div>
</div>
@endsection 