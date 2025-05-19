<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Otp extends Model
{
    protected $fillable = [
        'user_id',
        'otp',
        'expired_at',
        'is_active',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
