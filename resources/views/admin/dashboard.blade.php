@extends('layouts.app')

@section('title', 'Panel Administratora')

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-semibold text-white">Użytkownicy</h2>
            <a href="{{ route('admin.users.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition-colors duration-200">
                Dodaj Użytkownika
            </a>
        </div>

        <div class="bg-[rgb(30,41,59,0.5)] rounded-lg overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full">
                    <thead>
                        <tr class="border-b border-gray-700">
                            <th class="px-6 py-3 text-left text-sm font-extrabold text-gray-300 uppercase tracking-wider">Imię</th>
                            <th class="px-6 py-3 text-left text-sm font-extrabold text-gray-300 uppercase tracking-wider">Nazwisko</th>
                            <th class="px-6 py-3 text-left text-sm font-extrabold text-gray-300 uppercase tracking-wider">Email</th>
                            <th class="px-6 py-3 text-left text-sm font-extrabold text-gray-300 uppercase tracking-wider">Rola</th>
                            <th class="px-6 py-3 text-left text-sm font-extrabold text-gray-300 uppercase tracking-wider">Akcje</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-700">
                        @foreach($users as $user)
                            <tr class="hover:bg-gray-600/50 transition-colors duration-200">
                                <td class="px-6 py-4 whitespace-nowrap text-white">{{ $user->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-white">{{ $user->surname }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-white">{{ $user->email }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-white">{{ $user->role->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-white space-x-3">
                                    <a href="{{ route('admin.users.edit', $user) }}" 
                                       class="inline-flex items-center justify-center bg-blue-600 hover:bg-blue-700 text-white px-3 py-1 rounded-md text-sm transition-colors duration-200">
                                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
                                        </svg>
                                    </a>
                                    <form action="{{ route('admin.users.destroy', $user) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="inline-flex items-center justify-center bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded-md text-sm transition-colors duration-200"
                                                onclick="return confirm('Czy na pewno chcesz usunąć tego użytkownika?')">
                                            <svg class="w-4 h-4 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                            </svg>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection 