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
    Schema::create('messages', function (Blueprint $table) {
        $table->id();
        $table->string('title'); 
        $table->longText('content');
        $table->enum('type', [
            'Principal', 
            'Vice Principal',
            'Head Master',
            'Head Mistress',
            'Director',
            'Managing Director',
            'Chairman',
            'Co Chairman',
        ]); 
        $table->string('photo')->nullable(); // added photo column
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};