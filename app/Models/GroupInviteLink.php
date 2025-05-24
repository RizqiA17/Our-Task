<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GroupInviteLink extends Model
{
    protected $fillable = ['group_id', 'token', 'expires_at', 'used'];

    protected $casts = [
        'expires_at' => 'datetime',
        'used' => 'boolean',
    ];

    public function group()
    {
        return $this->belongsTo(Group::class);
    }
}
