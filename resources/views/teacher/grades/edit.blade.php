@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-semibold text-white">Edycja Oceny</h2>
        <a href="{{ route('teacher.dashboard') }}" class="text-gray-300 hover:text-white transition-colors duration-200">
            Powrót
        </a>
    </div>

    <div class="bg-[rgb(30,41,59,0.5)] rounded-lg p-6">
        <!-- Formularz edycji -->
        <form action="{{ route('teacher.grades.update', $grade->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')
            
            <div>
                <label for="grade" class="block text-sm font-medium text-gray-300">Ocena</label>
                <select id="grade" name="grade" class="mt-1 block w-full rounded-md border-gray-600 bg-gray-700 text-white shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    @foreach(range(1, 6) as $value)
                        <option value="{{ $value }}" {{ $grade->grade == $value ? 'selected' : '' }}>{{ $value }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="comment" class="block text-sm font-medium text-gray-300">Komentarz</label>
                <textarea id="comment" name="comment" rows="3" class="mt-1 block w-full rounded-md border-gray-600 bg-gray-700 text-white shadow-sm focus:border-indigo-500 focus:ring-indigo-500">{{ $grade->comment }}</textarea>
            </div>

            <div class="flex justify-end">
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 focus:ring-offset-gray-800">
                    Zapisz zmiany
                </button>
            </div>
        </form>

        <!-- Historia zmian -->
        <div class="mt-8">
            <h3 class="text-lg font-medium text-white mb-4">Historia zmian</h3>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-700">
                    <thead>
                        <tr>
                            <th class="px-4 py-3 text-left text-sm font-medium text-white">Data</th>
                            <th class="px-4 py-3 text-left text-sm font-medium text-white">Edytujący</th>
                            <th class="px-4 py-3 text-left text-sm font-medium text-white">Stara ocena</th>
                            <th class="px-4 py-3 text-left text-sm font-medium text-white">Nowa ocena</th>
                            <th class="px-4 py-3 text-left text-sm font-medium text-white">Komentarz</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-700">
                        @php
                            // Sortujemy historię od najstarszej do najnowszej
                            $sortedHistory = $grade->history->sortBy('created_at');
                            $firstHistory = $sortedHistory->first();
                        @endphp
                        <!-- Pierwotne wystawienie oceny -->
                        <tr class="hover:bg-gray-700/50">
                            <td class="px-4 py-3 text-sm text-gray-300">{{ $firstHistory->created_at->format('d.m.Y H:i') }}</td>
                            <td class="px-4 py-3 text-sm text-gray-300">{{ $grade->teacher->name }} {{ $grade->teacher->surname }}</td>
                            <td class="px-4 py-3 text-sm text-gray-300">-</td>
                            <td class="px-4 py-3 text-sm text-gray-300">{{ $firstHistory->new_grade }}</td>
                            <td class="px-4 py-3 text-sm text-gray-300">{{ $firstHistory->new_comment ?? '-' }}</td>
                        </tr>
                        <!-- Kolejne zmiany -->
                        @foreach($sortedHistory->slice(1) as $history)
                            <tr class="hover:bg-gray-700/50">
                                <td class="px-4 py-3 text-sm text-gray-300">{{ $history->created_at->format('d.m.Y H:i') }}</td>
                                <td class="px-4 py-3 text-sm text-gray-300">{{ $history->editor->name }} {{ $history->editor->surname }}</td>
                                <td class="px-4 py-3 text-sm text-gray-300">{{ $history->old_grade ?? '-' }}</td>
                                <td class="px-4 py-3 text-sm text-gray-300">{{ $history->new_grade }}</td>
                                <td class="px-4 py-3 text-sm text-gray-300">{{ $history->new_comment ?? '-' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection 