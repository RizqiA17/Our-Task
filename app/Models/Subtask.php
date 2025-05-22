<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subtask extends Model
{
    /** @use HasFactory<\Database\Factories\SubtaskFactory> */
    use HasFactory;

    protected $fillable = [
        'slug',
        'task_id',
        'name',
        'description',
        'description_file',
        'create',
        'deadline',
        'progress'
    ];

    public function task()
    {
        return $this->belongsTo(Task::class);
    }

    public function assignments()
    {
        return $this->hasMany(SubtaskAssignments::class);
    }

    public function submissions()
    {
        return $this->hasMany(TaskSubmissions::class);
    }
}
