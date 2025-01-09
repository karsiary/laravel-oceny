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
                                       class="inline-flex items-center justify-center bg-indigo-600 hover:bg-indigo-700 text-white px-3 py-1 rounded-md text-sm transition-colors duration-200">
                                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-12.15 12.15a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32L19.513 8.2z" />
                                        </svg>
                                    </a>
                                    <form action="{{ route('admin.users.destroy', $user) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="inline-flex items-center justify-center bg-rose-600 hover:bg-rose-700 text-white px-3 py-1 rounded-md text-sm transition-colors duration-200"
                                                onclick="return confirm('Czy na pewno chcesz usunąć tego użytkownika?')">
                                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                                <path fill-rule="evenodd" d="M16.5 4.478v.227a48.816 48.816 0 013.878.512.75.75 0 11-.256 1.478l-.209-.035-1.005 13.07a3 3 0 01-2.991 2.77H8.084a3 3 0 01-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 01-.256-1.478A48.567 48.567 0 017.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 013.369 0c1.603.051 2.815 1.387 2.815 2.951zm-6.136-1.452a51.196 51.196 0 013.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 00-6 0v-.113c0-.794.609-1.428 1.364-1.452zm-.355 5.945a.75.75 0 10-1.5.058l.347 9a.75.75 0 101.499-.058l-.346-9zm5.48.058a.75.75 0 10-1.498-.058l-.347 9a.75.75 0 001.5.058l.345-9z" clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </form>
                                    @if($user->role_id === 2)
                                        <a href="{{ route('admin.teachers.subjects', $user) }}" 
                                           class="inline-flex items-center justify-center bg-emerald-600 hover:bg-emerald-700 text-white px-3 py-1 rounded-md text-sm transition-colors duration-200"
                                           title="Przypisz przedmioty">
                                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                                <path d="M4 4.5A2.5 2.5 0 016.5 2H20v20H6.5A2.5 2.5 0 014 19.5v-15zM6.5 4A.5.5 0 006 4.5v15a.5.5 0 001 0V4.5A.5.5 0 006.5 4z"/>
                                            </svg>
                                        </a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection 