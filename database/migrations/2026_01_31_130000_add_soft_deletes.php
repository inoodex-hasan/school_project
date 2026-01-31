<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     * Adds soft delete support to critical tables.
     */
    public function up(): void
    {
        // Students table
        Schema::table('students', function (Blueprint $table) {
            $table->softDeletes();
        });

        // Teachers table
        Schema::table('teachers', function (Blueprint $table) {
            $table->softDeletes();
        });

        // Classes table
        Schema::table('classes', function (Blueprint $table) {
            $table->softDeletes();
        });

        // Sections table
        Schema::table('sections', function (Blueprint $table) {
            $table->softDeletes();
        });

        // Subjects table
        Schema::table('subjects', function (Blueprint $table) {
            $table->softDeletes();
        });

        // Results table
        Schema::table('results', function (Blueprint $table) {
            $table->softDeletes();
        });

        // Notices table
        Schema::table('notices', function (Blueprint $table) {
            $table->softDeletes();
        });

        // Events table
        Schema::table('events', function (Blueprint $table) {
            $table->softDeletes();
        });

        // Exam types table
        Schema::table('exam_types', function (Blueprint $table) {
            $table->softDeletes();
        });

        // Gallery table
        Schema::table('galleries', function (Blueprint $table) {
            $table->softDeletes();
        });

        // Slides table
        Schema::table('slides', function (Blueprint $table) {
            $table->softDeletes();
        });

        // Accounts table
        Schema::table('accounts', function (Blueprint $table) {
            $table->softDeletes();
        });

        // Account types table
        Schema::table('account_types', function (Blueprint $table) {
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('students', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });

        Schema::table('teachers', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });

        Schema::table('classes', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });

        Schema::table('sections', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });

        Schema::table('subjects', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });

        Schema::table('results', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });

        Schema::table('notices', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });

        Schema::table('events', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });

        Schema::table('exam_types', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });

        Schema::table('galleries', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });

        Schema::table('slides', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });

        Schema::table('accounts', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });

        Schema::table('account_types', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
};
