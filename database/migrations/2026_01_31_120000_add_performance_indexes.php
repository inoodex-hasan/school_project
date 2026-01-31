<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    /**
     * Run the migrations.
     * Adds performance indexes for frequently queried columns.
     */
    public function up(): void
    {
        // Students table indexes
        $this->safeCreateIndex('students', 'idx_students_class_id', 'class_id');
        $this->safeCreateIndex('students', 'idx_students_section_id', 'section_id');
        $this->safeCreateIndex('students', 'idx_students_roll', 'roll');
        $this->safeCreateIndex('students', 'idx_students_class_section', ['class_id', 'section_id']);

        // Results table indexes
        $this->safeCreateIndex('results', 'idx_results_student_id', 'student_id');
        $this->safeCreateIndex('results', 'idx_results_exam_type_id', 'exam_type_id');
        $this->safeCreateIndex('results', 'idx_results_exam_year', 'exam_year');
        $this->safeCreateIndex('results', 'idx_results_grade', 'grade');
        $this->safeCreateIndex('results', 'idx_results_composite', ['student_id', 'exam_type_id', 'exam_year']);

        // Class routines table indexes
        $this->safeCreateIndex('class_routines', 'idx_class_routines_class_id', 'class_id');
        $this->safeCreateIndex('class_routines', 'idx_class_routines_section_id', 'section_id');
        $this->safeCreateIndex('class_routines', 'idx_class_routines_day', 'day');
        $this->safeCreateIndex('class_routines', 'idx_class_routines_composite', ['class_id', 'section_id', 'day']);

        // Exam routines table indexes
        $this->safeCreateIndex('exam_routines', 'idx_exam_routines_class_id', 'class_id');
        $this->safeCreateIndex('exam_routines', 'idx_exam_routines_exam_type_id', 'exam_type_id');
        $this->safeCreateIndex('exam_routines', 'idx_exam_routines_date', 'date');

        // Sections table indexes
        $this->safeCreateIndex('sections', 'idx_sections_class_id', 'class_id');

        // Teachers table indexes
        $this->safeCreateIndex('teachers', 'idx_teachers_designation', 'designation');
        $this->safeCreateIndex('teachers', 'idx_teachers_department', 'department');

        // Notices table indexes
        $this->safeCreateIndex('notices', 'idx_notices_publish_date', 'publish_date');
        $this->safeCreateIndex('notices', 'idx_notices_is_active', 'is_active');

        // Events table indexes
        $this->safeCreateIndex('events', 'idx_events_start_date', 'start_date');
        $this->safeCreateIndex('events', 'idx_events_end_date', 'end_date');

        // Admissions table indexes
        $this->safeCreateIndex('admissions', 'idx_admissions_year', 'year');
        $this->safeCreateIndex('admissions', 'idx_admissions_student_id', 'student_id');

        // Accounts table indexes
        $this->safeCreateIndex('accounts', 'idx_accounts_student_id', 'student_id');
        $this->safeCreateIndex('accounts', 'idx_accounts_type_id', 'account_type_id');
        $this->safeCreateIndex('accounts', 'idx_accounts_date', 'date');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Drop indexes if they exist
        $indexes = [
            'students' => ['idx_students_class_id', 'idx_students_section_id', 'idx_students_roll', 'idx_students_class_section'],
            'results' => ['idx_results_student_id', 'idx_results_exam_type_id', 'idx_results_exam_year', 'idx_results_grade', 'idx_results_composite'],
            'class_routines' => ['idx_class_routines_class_id', 'idx_class_routines_section_id', 'idx_class_routines_day', 'idx_class_routines_composite'],
            'exam_routines' => ['idx_exam_routines_class_id', 'idx_exam_routines_exam_type_id', 'idx_exam_routines_date'],
            'sections' => ['idx_sections_class_id'],
            'teachers' => ['idx_teachers_designation', 'idx_teachers_department'],
            'notices' => ['idx_notices_publish_date', 'idx_notices_is_active'],
            'events' => ['idx_events_start_date', 'idx_events_end_date'],
            'admissions' => ['idx_admissions_year', 'idx_admissions_student_id'],
            'accounts' => ['idx_accounts_student_id', 'idx_accounts_type_id', 'idx_accounts_date'],
        ];

        foreach ($indexes as $table => $indexesToDrop) {
            foreach ($indexesToDrop as $indexName) {
                $this->safeDropIndex($table, $indexName);
            }
        }
    }

    /**
     * Safely create an index if it doesn't exist.
     */
    private function safeCreateIndex(string $table, string $indexName, string|array $columns): void
    {
        // Check if index already exists
        $indexExists = DB::select("SELECT COUNT(*) as count FROM information_schema.statistics 
            WHERE table_schema = DATABASE() 
            AND table_name = ? 
            AND index_name = ?", [$table, $indexName]);

        if ($indexExists[0]->count > 0) {
            return; // Index already exists
        }

        // Check if columns exist in the table
        $columnsToCheck = is_array($columns) ? $columns : [$columns];
        foreach ($columnsToCheck as $column) {
            $columnExists = DB::select("SELECT COUNT(*) as count FROM information_schema.columns 
                WHERE table_schema = DATABASE() 
                AND table_name = ? 
                AND column_name = ?", [$table, $column]);

            if ($columnExists[0]->count === 0) {
                return; // Column doesn't exist, skip this index
            }
        }

        // Create the index
        $columnsStr = is_array($columns)
            ? implode('`, `', $columns)
            : $columns;

        DB::statement("CREATE INDEX `{$indexName}` ON `{$table}` (`{$columnsStr}`)");
    }

    /**
     * Safely drop an index if it exists.
     */
    private function safeDropIndex(string $table, string $indexName): void
    {
        try {
            DB::statement("DROP INDEX `{$indexName}` ON `{$table}`");
        } catch (\Exception $e) {
            // Index might not exist, ignore the error
        }
    }
};
