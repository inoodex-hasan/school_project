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
        Schema::create('admissions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('student_id')->constrained('students')->onDelete('cascade');
            $table->text('father_image')->nullable();
            $table->text('mother_image')->nullable();
            $table->string('email')->nullable();
            $table->year('year');
            $table->enum('religion', ['Islam', 'Hindu', 'Christian', 'Buddhist', 'other'])->nullable();
            $table->string('nationality')->default('Bangladesh');
            $table->string('phone');
            $table->text('birth_certificate_no');
            $table->string('address');
            // $table->date('date_of_birth');
            $table->string('gender');
            $table->string('blood_group')->nullable();
            $table->string('dob');
            $table->string('fathers_name')->nullable();
            $table->string('mothers_name')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admissions');
    }
};
