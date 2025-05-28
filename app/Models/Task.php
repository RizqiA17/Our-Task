<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    /** @use HasFactory<\Database\Factories\TaskFactory> */
    use HasFactory;

    protected $fillable = [
        'slug',
        'type',
        'name',
        'description',
        'task_description_file',
        'group_id',
        'assigned_by',
        'tgl_dibuat',
        'tgl_deadline',
    ];

    public function group(){
        return $this->belongsTo(Group::class);
    }

    public function assignments(){
        return $this->hasMany(TaskAssignments::class);
    }
    
    public function subtasks(){
        return $this->hasMany(Subtask::class);
    }

    public function assignedBy(){
        return $this->belongsTo(User::class);
    }
}
