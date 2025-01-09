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
            @foreach($subjects as $subject)
                <div class="bg-[rgb(30,41,59,0.5)] rounded-lg p-4">
                    <div class="flex items-center justify-between mb-2">
                        <h4 class="text-lg font-medium text-white">{{ $subject->name }}</h4>
                    </div>
                    <div class="flex flex-wrap gap-2">
                        @forelse($subject->grades as $grade)
                            <div class="relative group">
                                <a href="{{ route('student.grades.history', $grade) }}" 
                                   class="block w-10 h-10 bg-gray-700 hover:bg-gray-600 rounded-lg transition-colors duration-200">
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