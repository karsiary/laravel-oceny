@extends('layouts.app')

@section('title', 'Panel Ucznia')

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-semibold text-white">Twoje Oceny</h1>
            <div class="text-lg text-gray-300">
                {{ auth()->user()->name }} {{ auth()->user()->surname }}
            </div>
        </div>

        <div class="grid grid-cols-1 gap-4">
            <a href="{{ route('student.dashboard') }}" class="block">
                <div class="container-gray rounded-lg p-6 hover:bg-gray-800/95 transition-all duration-300">
                    <div class="flex items-center space-x-4">
                        <div class="flex-shrink-0">
                            <div class="w-12 h-12 bg-indigo-500 rounded-full flex items-center justify-center">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                                </svg>
                            </div>
                        </div>
                        <div>
                            <h3 class="text-xl font-medium text-white">Twoje Oceny</h3>
                            <p class="text-gray-300 mt-1">Przeglądaj swoje oceny z poszczególnych przedmiotów.</p>
                        </div>
                    </div>
                </div>
            </a>
            @foreach($subjects as $subject)
                <div class="container-gray rounded-lg p-4">
                    <div class="flex items-center justify-between mb-2">
                        <h4 class="text-lg font-medium text-white">{{ $subject->name }}</h4>
                    </div>
                    <div class="flex flex-wrap gap-2">
                        @forelse($subject->grades as $grade)
                            <div class="relative group">
                                <a href="{{ route('student.grades.history', $grade) }}" 
                                   class="block w-10 h-10 bg-gradient-to-br from-gray-700 to-gray-800 hover:from-gray-600 hover:to-gray-700 rounded-lg transition-colors duration-200">
                                    <span class="absolute inset-0 flex items-center justify-center text-lg font-medium text-white">
                                        {{ $grade->grade }}
                                    </span>
                                </a>
                                @if($grade->comment)
                                    <div class="absolute bottom-full left-1/2 transform -translate-x-1/2 mb-2 hidden group-hover:block w-48 z-10">
                                        <div class="bg-gray-900 text-white text-sm rounded-lg p-2 shadow-lg">
                                            {{ $grade->comment }}
                                            <div class="absolute bottom-0 left-1/2 transform -translate-x-1/2 translate-y-1/2 rotate-45 w-2 h-2 bg-gray-900"></div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        @empty
                            <p class="text-gray-400">Brak ocen</p>
                        @endforelse
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection 