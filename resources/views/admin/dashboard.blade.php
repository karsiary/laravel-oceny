@extends('layouts.app')

@section('title', 'Panel Administratora')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
    <!-- Nagłówek strony -->
    <div class="mb-8">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold text-white">Panel Administratora</h1>
                <p class="mt-1 text-sm text-gray-400">Zarządzaj użytkownikami systemu</p>
            </div>
            <a href="{{ route('admin.users.create') }}" 
               class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-lg transition-colors duration-200">
                <svg class="w-5 h-5 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                    <path fill-rule="evenodd" d="M12 3.75a.75.75 0 01.75.75v6.75h6.75a.75.75 0 010 1.5h-6.75v6.75a.75.75 0 01-1.5 0v-6.75H4.5a.75.75 0 010-1.5h6.75V4.5a.75.75 0 01.75-.75z" clip-rule="evenodd" />
                </svg>
                Dodaj Użytkownika
            </a>
        </div>
    </div>

    <!-- Główna sekcja z tabelą -->
    <div class="bg-[rgb(30,41,59,0.5)] rounded-xl shadow-xl overflow-hidden border border-gray-700">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-700">
                <thead>
                    <tr class="bg-gray-800/50">
                        <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-gray-300 uppercase tracking-wider">Imię</th>
                        <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-gray-300 uppercase tracking-wider">Nazwisko</th>
                        <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-gray-300 uppercase tracking-wider">Email</th>
                        <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-gray-300 uppercase tracking-wider">Rola</th>
                        <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-gray-300 uppercase tracking-wider">Akcje</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-700 bg-transparent">
                    @foreach($users as $user)
                        <tr class="hover:bg-gray-700/30 transition-colors duration-200">
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-200">{{ $user->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-200">{{ $user->surname }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-200">{{ $user->email }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-3 py-1 text-xs font-medium rounded-full 
                                    @if($user->role_id === 1) bg-purple-500/20 text-purple-400
                                    @elseif($user->role_id === 2) bg-blue-500/20 text-blue-400
                                    @else bg-green-500/20 text-green-400 @endif">
                                    {{ $user->role->name }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium space-x-2">
                                <a href="{{ route('admin.users.edit', $user) }}" 
                                   class="inline-flex items-center justify-center p-2 bg-indigo-600/20 hover:bg-indigo-600 text-indigo-400 hover:text-white rounded-lg transition-all duration-200"
                                   title="Edytuj">
                                    <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-12.15 12.15a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32L19.513 8.2z" />
                                    </svg>
                                </a>
                                
                                <form action="{{ route('admin.users.destroy', $user) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="inline-flex items-center justify-center p-2 bg-rose-600/20 hover:bg-rose-600 text-rose-400 hover:text-white rounded-lg transition-all duration-200"
                                            onclick="return confirm('Czy na pewno chcesz usunąć tego użytkownika?')"
                                            title="Usuń">
                                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                            <path fill-rule="evenodd" d="M16.5 4.478v.227a48.816 48.816 0 013.878.512.75.75 0 11-.256 1.478l-.209-.035-1.005 13.07a3 3 0 01-2.991 2.77H8.084a3 3 0 01-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 01-.256-1.478A48.567 48.567 0 017.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 013.369 0c1.603.051 2.815 1.387 2.815 2.951zm-6.136-1.452a51.196 51.196 0 013.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 00-6 0v-.113c0-.794.609-1.428 1.364-1.452z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </form>

                                @if($user->role_id === 2)
                                    <a href="{{ route('admin.teachers.subjects', $user) }}" 
                                       class="inline-flex items-center justify-center p-2 bg-emerald-600/20 hover:bg-emerald-600 text-emerald-400 hover:text-white rounded-lg transition-all duration-200"
                                       title="Przypisz przedmioty">
                                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M11.25 4.533A9.707 9.707 0 006 3a9.735 9.735 0 00-3.25.555.75.75 0 00-.5.707v14.25a.75.75 0 001 .707A8.237 8.237 0 016 18.75c1.995 0 3.823.707 5.25 1.886V4.533zM12.75 20.636A8.214 8.214 0 0118 18.75c.966 0 1.89.166 2.75.47a.75.75 0 001-.708V4.262a.75.75 0 00-.5-.707A9.735 9.735 0 0018 3a9.707 9.707 0 00-5.25 1.533v16.103z" />
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