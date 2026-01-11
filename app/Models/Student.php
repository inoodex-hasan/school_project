<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['name', 'class_id', 'section_id', 'roll', 'photo'];

    public function schoolClass()
    {
        return $this->belongsTo(SchoolClass::class, 'class_id');
    }

    public function class()
    {
        return $this->belongsTo(SchoolClass::class, 'class_id');
    }

    public function section()
    {
        return $this->belongsTo(Section::class, 'section_id');
    }
    
    public function admission()
    {
        return $this->hasOne(Admission::class);
    }

    public function accounts()
    {
        return $this->hasMany(Account::class);
    }

}
