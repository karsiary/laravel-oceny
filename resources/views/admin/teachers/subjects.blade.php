@extends('layouts.app')

@section('title', 'Przypisz Przedmioty')

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-semibold text-white">Przypisz Przedmioty - {{ $teacher->name }} {{ $teacher->surname }}</h2>
            <a href="{{ route('admin.dashboard') }}" class="text-gray-300 hover:text-white transition-colors duration-200">
                Powrót
            </a>
        </div>

        <div class="bg-[rgb(30,41,59,0.5)] rounded-lg p-6">
            <form action="{{ route('admin.teachers.subjects.update', $teacher) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    @foreach($subjects as $subject)
                        <div class="flex items-center space-x-3 p-4 bg-gray-700/50 rounded-lg">
                            <input type="checkbox" 
                                   name="subjects[]" 
                                   value="{{ $subject->id }}"
                                   id="subject_{{ $subject->id }}"
                                   {{ $teacher->subjects->contains($subject->id) ? 'checked' : '' }}
                                   class="w-4 h-4 text-blue-600 rounded focus:ring-blue-500 bg-gray-700 border-gray-600">
                            <label for="subject_{{ $subject->id }}" class="text-white">
                                {{ $subject->name }}
                            </label>
                        </div>
                    @endforeach
                </div>

                <div class="mt-6">
                    <button type="submit" 
                        class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition-colors duration-200">
                        Zapisz Zmiany
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection 