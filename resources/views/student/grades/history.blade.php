@extends('layouts.app')

@section('title', 'Historia Oceny')

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-semibold text-white">Historia Oceny</h2>
            <a href="{{ route('student.dashboard') }}" class="text-gray-300 hover:text-white transition-colors duration-200">
                Powrót
            </a>
        </div>

        <div class="bg-[rgb(30,41,59,0.5)] rounded-lg p-6">
            <!-- Informacje o ocenie -->
            <div class="mb-6 text-gray-300 space-y-1">
                <p>Ocena wystawiona przez: <span class="text-white font-medium">{{ $grade->teacher->name }} {{ $grade->teacher->surname }}</span></p>
                <p>Data wystawienia: <span class="text-white font-medium">{{ $grade->created_at->format('d.m.Y H:i') }}</span></p>
                <p>Przedmiot: <span class="text-white font-medium">{{ $grade->subject->name }}</span></p>
                <p>Aktualna ocena: <span class="text-white font-medium">{{ $grade->grade }}</span></p>
                @if($grade->comment)
                    <p>Komentarz: <span class="text-white font-medium">{{ $grade->comment }}</span></p>
                @endif
            </div>

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
                                <th class="px-4 py-3 text-left text-sm font-medium text-white">Stary komentarz</th>
                                <th class="px-4 py-3 text-left text-sm font-medium text-white">Nowy komentarz</th>
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
                                <td class="px-4 py-3 text-sm text-gray-300">-</td>
                                <td class="px-4 py-3 text-sm text-gray-300">{{ $firstHistory->new_comment ?? '-' }}</td>
                            </tr>
                            <!-- Kolejne zmiany -->
                            @foreach($sortedHistory->slice(1) as $history)
                                <tr class="hover:bg-gray-700/50">
                                    <td class="px-4 py-3 text-sm text-gray-300">{{ $history->created_at->format('d.m.Y H:i') }}</td>
                                    <td class="px-4 py-3 text-sm text-gray-300">{{ $history->editor->name }} {{ $history->editor->surname }}</td>
                                    <td class="px-4 py-3 text-sm text-gray-300">{{ $history->old_grade ?? '-' }}</td>
                                    <td class="px-4 py-3 text-sm text-gray-300">{{ $history->new_grade }}</td>
                                    <td class="px-4 py-3 text-sm text-gray-300">{{ $history->old_comment ?? '-' }}</td>
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