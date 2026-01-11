<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
public function up(): void
{
    Schema::create('students', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->foreignId('class_id')->constrained('classes')->onDelete('cascade');
        $table->foreignId('section_id')->constrained('sections')->onDelete('cascade');
        $table->unsignedInteger('roll');
        $table->string('photo')->nullable();

        // Extra details
        $table->date('dob')->nullable();                           // Date of Birth
        $table->enum('gender', ['male', 'female', 'other'])->nullable();
        $table->text('address')->nullable();
        $table->string('father_name')->nullable();
        $table->string('mother_name')->nullable();
        $table->enum('blood_group', [
            'A+','A-','B+','B-','O+','O-','AB+','AB-'
        ])->nullable();

        $table->timestamps();
    });
}



    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
