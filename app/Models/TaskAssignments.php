<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskAssignments extends Model
{
    /** @use HasFactory<\Database\Factories\TaskAssignmentsFactory> */
    use HasFactory;

    protected $fillable = [
        'task_id',
        'user_id',
        'role',
        'progress'
    ];

    public function task()
    {
        return $this->belongsTo(Task::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
