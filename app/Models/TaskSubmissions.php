<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskSubmissions extends Model
{
    /** @use HasFactory<\Database\Factories\TaskSubmissionsFactory> */
    use HasFactory;

    protected $fillable = [
        'task_id',
        'subtask_id',
        'user_id',
        'task_answer_file',
        'name',
        'submitted_at'
    ];

    public function task()
    {
        return $this->belongsTo(Task::class);
    }

    public function subtask()
    {
        return $this->belongsTo(Subtask::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
