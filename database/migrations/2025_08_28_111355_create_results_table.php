<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('results', function (Blueprint $table) {
            $table->id();

            // Link result to a student
            $table->foreignId('student_id')
                  ->constrained('students')
                  ->onDelete('cascade');

            // Grade (string, since it's like A+, A, B etc.)
            $table->string('grade', 2);

            // Optional fields if you want later
            // $table->foreignId('class_id')->constrained('school_classes')->onDelete('cascade');
            // $table->foreignId('section_id')->constrained('sections')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('results');
    }
};
