<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('grades', function (Blueprint $table) {
            $table->dropForeign(['student_id']);
            $table->dropForeign(['teacher_id']);
            
            $table->foreign('student_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
                
            $table->foreign('teacher_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('grades', function (Blueprint $table) {
            $table->dropForeign(['student_id']);
            $table->dropForeign(['teacher_id']);
            
            $table->foreign('student_id')
                ->references('id')
                ->on('users');
                
            $table->foreign('teacher_id')
                ->references('id')
                ->on('users');
        });
    }
}; 