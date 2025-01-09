@extends('layouts.app')

@section('title', 'Dodaj Użytkownika')

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-semibold text-white">Dodaj Użytkownika</h2>
            <a href="{{ route('admin.dashboard') }}" class="text-gray-300 hover:text-white transition-colors duration-200">
                Powrót
            </a>
        </div>

        <div class="bg-[rgb(30,41,59,0.5)] rounded-lg p-6">
            <form action="{{ route('admin.users.store') }}" method="POST" class="space-y-6">
                @csrf
                <div>
                    <label for="name" class="block text-sm font-medium text-white">Imię</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}" 
                        class="mt-1 block w-full rounded-lg border-gray-600 bg-gray-700 text-white focus:border-blue-500 focus:ring-blue-500">
                </div>

                <div>
                    <label for="surname" class="block text-sm font-medium text-white">Nazwisko</label>
                    <input type="text" name="surname" id="surname" value="{{ old('surname') }}"
                        class="mt-1 block w-full rounded-lg border-gray-600 bg-gray-700 text-white focus:border-blue-500 focus:ring-blue-500">
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-white">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}"
                        class="mt-1 block w-full rounded-lg border-gray-600 bg-gray-700 text-white focus:border-blue-500 focus:ring-blue-500">
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-white">Hasło</label>
                    <input type="password" name="password" id="password"
                        class="mt-1 block w-full rounded-lg border-gray-600 bg-gray-700 text-white focus:border-blue-500 focus:ring-blue-500">
                </div>

                <div>
                    <label for="role_id" class="block text-sm font-medium text-white">Rola</label>
                    <select name="role_id" id="role_id" 
                        class="mt-1 block w-full rounded-lg border-gray-600 bg-gray-700 text-white focus:border-blue-500 focus:ring-blue-500">
                        @foreach($roles as $role)
                            <option value="{{ $role->id }}" {{ old('role_id') == $role->id ? 'selected' : '' }}>
                                {{ $role->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <button type="submit" 
                        class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition-colors duration-200">
                        Dodaj Użytkownika
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection 