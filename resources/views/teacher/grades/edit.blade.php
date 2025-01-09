@extends('layouts.app')

@section('title', 'Edytuj Ocenę')

@section('content')
    <div class="bg-gray-800 shadow rounded-lg p-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-xl font-semibold">Edytuj Ocenę</h2>
            <a href="{{ route('teacher.dashboard') }}" class="text-gray-300 hover:text-white">
                Powrót
            </a>
        </div>

        <form action="{{ route('teacher.grades.update', $grade) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label for="grade" class="block text-sm font-medium text-gray-300">Ocena</label>
                <select name="grade" id="grade" class="mt-1 block w-full rounded-md border-gray-700 bg-gray-700 text-white">
                    @foreach(range(1, 6) as $value)
                        <option value="{{ $value }}" {{ old('grade', $grade->grade) == $value ? 'selected' : '' }}>
                            {{ $value }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="comment" class="block text-sm font-medium text-gray-300">Komentarz</label>
                <textarea name="comment" id="comment" rows="3" 
                    class="mt-1 block w-full rounded-md border-gray-700 bg-gray-700 text-white">{{ old('comment', $grade->comment) }}</textarea>
            </div>

            <div>
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
                    Zapisz Zmiany
                </button>
            </div>
        </form>
    </div>
@endsection 