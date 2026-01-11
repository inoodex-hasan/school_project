<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExamRoutine extends Model
{
    protected $table = 'exam_routines';
    protected $fillable = ['title', 'file'];
}
