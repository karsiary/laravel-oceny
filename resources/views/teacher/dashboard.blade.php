@extends('layouts.app')

@section('title', 'Panel Nauczyciela')

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
        <!-- Sekcja dodawania oceny -->
        <div class="mb-8">
            <h2 class="text-2xl font-semibold text-white mb-6">Dodaj Ocenę</h2>
            <div class="bg-[rgb(30,41,59,0.5)] rounded-lg p-6">
                <form action="{{ route('teacher.grades.store') }}" method="POST" class="space-y-6">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div>
                            <label for="student_id" class="block text-sm font-medium text-gray-200 mb-1">Uczeń</label>
                            <select name="student_id" id="student_id" class="w-full bg-gray-700 border-gray-600 rounded-lg text-white">
                                @foreach($students as $student)
                                    <option value="{{ $student->id }}" {{ request('student_id') == $student->id ? 'selected' : '' }}>
                                        {{ $student->name }} {{ $student->surname }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="subject_id" class="block text-sm font-medium text-gray-200 mb-1">Przedmiot</label>
                            <select name="subject_id" id="subject_id" class="w-full bg-gray-700 border-gray-600 rounded-lg text-white">
                                @foreach($subjects as $subject)
                                    <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="grade" class="block text-sm font-medium text-gray-200 mb-1">Ocena</label>
                            <select name="grade" id="grade" class="w-full bg-gray-700 border-gray-600 rounded-lg text-white">
                                @foreach(range(1, 6) as $grade)
                                    <option value="{{ $grade }}">{{ $grade }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                    <div>
                        <label for="comment" class="block text-sm font-medium text-gray-200 mb-1">Komentarz</label>
                        <textarea name="comment" id="comment" rows="2" 
                            class="w-full bg-gray-700 border-gray-600 rounded-lg text-white resize-none"></textarea>
                    </div>

                    <div class="flex justify-end">
                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition-colors duration-200">
                            Dodaj Ocenę
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Sekcja ocen -->
        <div>
            <h2 class="text-2xl font-semibold text-white mb-6">Oceny</h2>
            <div class="space-y-2">
                @foreach($students as $student)
                    <div class="bg-[rgb(30,41,59,0.5)] rounded-lg">
                        <button class="w-full px-4 py-3 flex items-center justify-between hover:bg-gray-600/50 transition-colors duration-200"
                                onclick="toggleAccordion('student-{{ $student->id }}')">
                            <span class="text-lg font-medium text-white">{{ $student->name }} {{ $student->surname }}</span>
                            <svg class="w-6 h-6 text-gray-300 transform transition-transform duration-200" 
                                 id="arrow-{{ $student->id }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>
                        
                        <div class="hidden" id="student-{{ $student->id }}">
                            <div class="divide-y divide-gray-700">
                                @foreach($subjects as $subject)
                                    <div class="px-4 py-3">
                                        <h4 class="text-base font-medium text-white mb-2">{{ $subject->name }}</h4>
                                        <div class="flex flex-wrap gap-1.5">
                                            @foreach($student->studentGrades->where('subject_id', $subject->id) as $grade)
                                                <div class="relative group">
                                                    <a href="{{ route('teacher.grades.edit', $grade) }}" 
                                                       class="block w-8 h-8 bg-gray-700 hover:bg-gray-600 rounded transition-colors duration-200">
                                                        <span class="absolute inset-0 flex items-center justify-center text-base font-medium text-white">
                                                            {{ $grade->grade }}
                                                        </span>
                                                    </a>
                                                    @if($grade->comment)
                                                        <div class="absolute bottom-full left-1/2 transform -translate-x-1/2 mb-2 hidden group-hover:block w-48 z-50">
                                                            <div class="bg-slate-800 text-white text-sm rounded-lg p-3 shadow-xl relative border border-slate-600/50 backdrop-blur-sm">
                                                                {{ $grade->comment }}
                                                                <div class="absolute bottom-0 left-1/2 transform -translate-x-1/2 translate-y-1/2 rotate-45 w-2.5 h-2.5 bg-slate-800 border-r border-b border-slate-600/50"></div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                </div>
                                            @endforeach
                                            @if($student->studentGrades->where('subject_id', $subject->id)->isEmpty())
                                                <span class="text-sm text-gray-400">Brak ocen</span>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <script>
        function toggleAccordion(id) {
            const content = document.getElementById(id);
            const arrow = document.getElementById('arrow-' + id.split('-')[1]);
            
            content.classList.toggle('hidden');
            
            if (content.classList.contains('hidden')) {
                arrow.classList.remove('rotate-180');
            } else {
                arrow.classList.add('rotate-180');
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            const selectedStudentId = '{{ request('student_id') }}';
            if (selectedStudentId) {
                const studentElement = document.getElementById('student-' + selectedStudentId);
                if (studentElement) {
                    studentElement.classList.remove('hidden');
                    const arrow = document.getElementById('arrow-' + selectedStudentId);
                    if (arrow) {
                        arrow.classList.add('rotate-180');
                    }
                }
            }
        });
    </script>
@endsection 