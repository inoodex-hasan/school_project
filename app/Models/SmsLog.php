<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SmsLog extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'phone',
        'message',
        'status',
        'notification_type',
        'sent_at',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
        'sent_at' => 'datetime',
    ];
}
