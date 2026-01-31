<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class SchoolClass extends Model
{
    use SoftDeletes;

    protected $table = 'classes';
    protected $fillable = ['name'];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    /**
     * Get all sections for this class.
     */
    public function sections(): HasMany
    {
        return $this->hasMany(Section::class, 'class_id');
    }

    /**
     * Get all students for this class.
     */
    public function students(): HasMany
    {
        return $this->hasMany(Student::class, 'class_id');
    }

    /**
     * Get all subjects for this class.
     */
    public function subjects(): HasMany
    {
        return $this->hasMany(Subject::class, 'class_id');
    }
}
