<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    /** @use HasFactory<\Database\Factories\GroupFactory> */
    use HasFactory;

    protected $fillable = [
        'slug',
        'group_name',
        'group_description',
        'group_image',
        'group_banner',
        'group_key',
        'group_type',
        'join_permission',
        'create_task_permission',
    ];

    public function members()
    {
        return $this->hasMany(Member::class);
    }
}
