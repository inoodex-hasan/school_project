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
       Schema::table('results', function (Blueprint $table) {
            // Add foreign key to exam_types
            $table->foreignId('exam_type_id')
                  ->constrained('exam_types')
                  ->after('student_id');

            // Add exam_year column
            $table->integer('exam_year')->after('exam_type_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
           Schema::table('results', function (Blueprint $table) {
            $table->dropForeign(['exam_type_id']);
            $table->dropColumn(['exam_type_id', 'exam_year']);
        });
    }
};