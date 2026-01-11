<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $fillable = ['student_id', 'account_type_id', 'amount', 'type','note', 'date'];

    protected $casts = ['date' => 'date'];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
    public function accountType()
    {
        return $this->belongsTo(AccountType::class);
    }
}
