<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'status',
    ];
    public function scopePublished($query)
{
    return $query->where('status', 'published')
                 ->where('created_at', '<=', now());
}

}
