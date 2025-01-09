@extends('layouts.app')

@section('title', 'Panel główny')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <!-- Powitanie -->
        <div class="card">
            <h2 class="text-2xl font-semibold text-white">Witaj, {{ auth()->user()->name }} {{ auth()->user()->surname }}!</h2>
            <p class="mt-2 text-gray-300">Zarządzaj systemem i śledź postępy z jednego miejsca.</p>
        </div>
        
        <!-- Główne akcje -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            @if(auth()->user()->hasRole('admin'))
                <!-- Panel administratora -->
                <div class="container-gray h-full">
                    <div class="flex flex-col h-full">
                        <a href="{{ route('admin.dashboard') }}" class="block self-start">
                            <div class="material-icon-container bg-blue-500/20 text-blue-400">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"></path>
                                </svg>
                            </div>
                        </a>
                        <div class="flex-1">
                            <h3 class="text-xl font-medium text-white mb-3">Panel Administratora</h3>
                            <p class="text-gray-300">Zarządzaj użytkownikami, rolami i uprawnieniami w systemie. Masz pełną kontrolę nad funkcjonowaniem aplikacji.</p>
                        </div>
                        <div class="mt-6">
                            <a href="{{ route('admin.dashboard') }}" class="btn btn-primary w-full justify-center group">
                                <span>Przejdź do panelu administratora</span>
                                <svg class="w-5 h-5 ml-2 transform transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            @endif

            @if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('teacher'))
                <!-- Panel nauczyciela -->
                <div class="container-gray h-full">
                    <div class="flex flex-col h-full">
                        <a href="{{ route('teacher.dashboard') }}" class="block self-start">
                            <div class="material-icon-container bg-green-500/20 text-green-400">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                </svg>
                            </div>
                        </a>
                        <div class="flex-1">
                            <h3 class="text-xl font-medium text-white mb-3">Panel Nauczyciela</h3>
                            <p class="text-gray-300">Zarządzaj ocenami i postępami uczniów. Monitoruj wyniki i postępy w nauce.</p>
                        </div>
                        <div class="mt-6">
                            <a href="{{ route('teacher.dashboard') }}" class="btn btn-primary w-full justify-center group">
                                <span>Przejdź do panelu nauczyciela</span>
                                <svg class="w-5 h-5 ml-2 transform transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            @endif

            @if(auth()->user()->hasRole('student'))
                <!-- Panel ucznia -->
                <div class="container-gray h-full">
                    <div class="flex flex-col h-full">
                        <a href="{{ route('student.dashboard') }}" class="block self-start">
                            <div class="material-icon-container bg-purple-500/20 text-purple-400">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                                </svg>
                            </div>
                        </a>
                        <div class="flex-1">
                            <h3 class="text-xl font-medium text-white mb-3">Twoje Oceny</h3>
                            <p class="text-gray-300">Przeglądaj swoje oceny z poszczególnych przedmiotów.</p>
                        </div>
                        <div class="mt-6">
                            <a href="{{ route('student.dashboard') }}" class="btn btn-primary w-full justify-center group">
                                <span>Zobacz oceny</span>
                                <svg class="w-5 h-5 ml-2 transform transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            @endif
        </div>

        <!-- Szybkie informacje -->
        <div class="card">
            <div class="flex items-center mb-6">
                <div class="material-icon-container bg-blue-500/20 text-blue-400 mb-0">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <div class="ml-4">
                    <h3 class="text-xl font-medium text-white">Informacje o koncie</h3>
                    <p class="text-gray-400 text-sm">Podstawowe informacje o Twoim koncie</p>
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="container-gray">
                    <div class="flex items-center text-blue-400 mb-2">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                        <h4 class="font-medium">Twoja rola</h4>
                    </div>
                    <p class="text-gray-300">{{ auth()->user()->role->name }}</p>
                </div>
                <div class="container-gray">
                    <div class="flex items-center text-blue-400 mb-2">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                        <h4 class="font-medium">Email</h4>
                    </div>
                    <p class="text-gray-300">{{ auth()->user()->email }}</p>
                </div>
                <div class="container-gray">
                    <div class="flex items-center text-blue-400 mb-2">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        <h4 class="font-medium">Data dołączenia</h4>
                    </div>
                    <p class="text-gray-300">{{ auth()->user()->created_at->format('d.m.Y') }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 