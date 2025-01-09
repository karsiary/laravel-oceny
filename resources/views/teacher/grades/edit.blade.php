@extends('layouts.app')

@section('title', 'Edytuj Ocenę')

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-semibold text-white">Edytuj Ocenę</h2>
            <a href="{{ route('teacher.dashboard') }}" class="text-gray-300 hover:text-white transition-colors duration-200">
                Powrót
            </a>
        </div>

        <div class="bg-[rgb(30,41,59,0.5)] rounded-lg p-6">
            <form action="{{ route('teacher.grades.update', $grade) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <div>
                    <label for="grade" class="block text-sm font-medium text-white">Ocena</label>
                    <select name="grade" id="grade" 
                        class="mt-1 block w-full rounded-lg border-gray-600 bg-gray-700 text-white focus:border-blue-500 focus:ring-blue-500">
                        @foreach(range(1, 6) as $value)
                            <option value="{{ $value }}" {{ old('grade', $grade->grade) == $value ? 'selected' : '' }}>
                                {{ $value }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="comment" class="block text-sm font-medium text-white">Komentarz</label>
                    <textarea name="comment" id="comment" rows="3" 
                        class="mt-1 block w-full rounded-lg border-gray-600 bg-gray-700 text-white focus:border-blue-500 focus:ring-blue-500 resize-none">{{ old('comment', $grade->comment) }}</textarea>
                </div>

                <div>
                    <button type="submit" 
                        class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition-colors duration-200">
                        Zapisz Zmiany
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection 