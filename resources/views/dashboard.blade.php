@extends('layouts.app')

@section('title', 'Panel główny')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-white">
                <h2 class="text-2xl font-semibold mb-4">Witaj, {{ auth()->user()->name }} {{ auth()->user()->surname }}!</h2>
                
                @if(auth()->user()->hasRole('admin'))
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="bg-gray-700 rounded-lg p-6">
                            <h3 class="text-xl font-medium mb-4">Zarządzanie użytkownikami</h3>
                            <p class="text-gray-300 mb-4">Dodawaj, edytuj i usuwaj użytkowników systemu.</p>
                            <a href="{{ route('admin.dashboard') }}" class="inline-flex items-center px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded-md">
                                Przejdź do panelu administratora
                            </a>
                        </div>
                    </div>
                @endif

                @if(auth()->user()->hasRole('teacher'))
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="bg-gray-700 rounded-lg p-6">
                            <h3 class="text-xl font-medium mb-4">Zarządzanie ocenami</h3>
                            <p class="text-gray-300 mb-4">Dodawaj i modyfikuj oceny uczniów.</p>
                            <a href="{{ route('teacher.dashboard') }}" class="inline-flex items-center px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded-md">
                                Przejdź do panelu nauczyciela
                            </a>
                        </div>
                    </div>
                @endif

                @if(auth()->user()->hasRole('student'))
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="bg-gray-700 rounded-lg p-6">
                            <h3 class="text-xl font-medium mb-4">Twoje oceny</h3>
                            <p class="text-gray-300 mb-4">Przeglądaj swoje oceny z poszczególnych przedmiotów.</p>
                            <a href="{{ route('student.dashboard') }}" class="inline-flex items-center px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded-md">
                                Zobacz swoje oceny
                            </a>
                        </div>
                    </div>
                @endif

                <div class="mt-8">
                    <h3 class="text-xl font-medium mb-4">Szybkie informacje</h3>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div class="bg-gray-700 rounded-lg p-4">
                            <h4 class="font-medium mb-2">Twoja rola</h4>
                            <p class="text-gray-300">{{ auth()->user()->role->name }}</p>
                        </div>
                        <div class="bg-gray-700 rounded-lg p-4">
                            <h4 class="font-medium mb-2">Email</h4>
                            <p class="text-gray-300">{{ auth()->user()->email }}</p>
                        </div>
                        <div class="bg-gray-700 rounded-lg p-4">
                            <h4 class="font-medium mb-2">Data dołączenia</h4>
                            <p class="text-gray-300">{{ auth()->user()->created_at->format('d.m.Y') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 