<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('groups', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('group_name');
            $table->string('group_description');
            $table->string('group_image')->nullable();
            $table->string('group_banner')->nullable();
            $table->string('group_key')->unique()->nullable();
            $table->enum('group_type', ['public', 'private'])->default('public');
            $table->enum('join_permission', ['everyone', 'approval', 'invite_only'])->default('approval');
            $table->enum('create_task_permission', ['everyone', 'approval', 'admin'])->default('everyone');
            $table->timestamps();
        });

        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('cascade')->unique();
            $table->foreignId('group_id')->nullable()->constrained('groups')->onDelete('cascade');
            $table->enum('role', ['owner', 'admin', 'member'])->default('member');
            $table->timestamps();
        });

        Schema::create('pending_members', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('cascade')->unique();
            $table->foreignId('group_id')->nullable()->constrained('groups')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('invite_links', function (Blueprint $table) {
            $table->id();
            $table->foreignId('group_id')->constrained()->onDelete('cascade');
            $table->string('token')->unique();
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('set null');
            $table->integer('link_inv_limit')->nullable();
            $table->timestamp('expires_at');
            $table->boolean('used')->default(false);
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('group');
        Schema::dropIfExists('members');
        Schema::dropIfExists('pending_members');
        Schema::dropIfExists('invite_links');
    }
};
