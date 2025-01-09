@extends('layouts.app')

@section('title', 'Dodaj Użytkownika')

@section('content')
    <div class="bg-gray-800 shadow rounded-lg p-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-xl font-semibold">Dodaj Użytkownika</h2>
            <a href="{{ route('admin.dashboard') }}" class="text-gray-300 hover:text-white">
                Powrót
            </a>
        </div>

        <form action="{{ route('admin.users.store') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label for="name" class="block text-sm font-medium text-gray-300">Imię</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" 
                    class="mt-1 block w-full rounded-md border-gray-700 bg-gray-700 text-white">
            </div>

            <div>
                <label for="surname" class="block text-sm font-medium text-gray-300">Nazwisko</label>
                <input type="text" name="surname" id="surname" value="{{ old('surname') }}"
                    class="mt-1 block w-full rounded-md border-gray-700 bg-gray-700 text-white">
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-gray-300">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}"
                    class="mt-1 block w-full rounded-md border-gray-700 bg-gray-700 text-white">
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-300">Hasło</label>
                <input type="password" name="password" id="password"
                    class="mt-1 block w-full rounded-md border-gray-700 bg-gray-700 text-white">
            </div>

            <div>
                <label for="role_id" class="block text-sm font-medium text-gray-300">Rola</label>
                <select name="role_id" id="role_id" class="mt-1 block w-full rounded-md border-gray-700 bg-gray-700 text-white">
                    @foreach($roles as $role)
                        <option value="{{ $role->id }}" {{ old('role_id') == $role->id ? 'selected' : '' }}>
                            {{ $role->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
                    Dodaj Użytkownika
                </button>
            </div>
        </form>
    </div>
@endsection 