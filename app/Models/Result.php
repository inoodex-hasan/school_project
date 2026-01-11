<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
       protected $fillable = ['student_id', 'exam_type_id', 'exam_year', 'grade'];

public function student()
{
    return $this->belongsTo(Student::class);
}

public function class()
{
    return $this->belongsTo(SchoolClass::class, 'class_id');
}

public function section()
{
    return $this->belongsTo(Section::class, 'section_id');
}

 public function examType()
    {
        return $this->belongsTo(ExamType::class, 'exam_type_id');
    }

}