<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->enum('type', ['solo', 'team']);
            $table->string('name')->nullable();
            $table->text('description')->nullable();
            $table->string('task_description_file')->nullable();
            $table->foreignId('group_id')->nullable()->constrained('groups');
            $table->foreignId('assigned_by')->nullable()->constrained('users');
            $table->dateTime('deadline')->useCurrent();
            $table->timestamps();
        });        
        
        Schema::create('task_assignments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('task_id')->constrained('tasks')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->enum('role', ['leader', 'member'])->default('member');
            $table->tinyInteger('progress', )->default(0);
            $table->timestamps();
        
            $table->unique(['task_id', 'user_id']);
        });
        
        Schema::create('subtasks', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->foreignId('task_id')->constrained('tasks')->onDelete('cascade');
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('description_file')->nullable();
            $table->dateTime('create')->useCurrent();
            $table->dateTime('deadline')->useCurrent();
            $table->string('progress', 20)->default('unfinished');
            $table->timestamps();
        });
        
        
        Schema::create('subtask_assignments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('subtask_id')->constrained('subtasks')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });
        
        Schema::create('task_submissions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('task_id')->nullable()->constrained('tasks')->onDelete('cascade');
            $table->foreignId('subtask_id')->nullable()->constrained('subtasks')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('task_answer_file');
            $table->string('name')->nullable();
            $table->dateTime('submitted_at')->useCurrent();
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('task');
        Schema::dropIfExists('task_assignments');
        Schema::dropIfExists('subtasks');
        Schema::dropIfExists('subtask_assignments');
        Schema::dropIfExists('task_submissions');
    }
};
