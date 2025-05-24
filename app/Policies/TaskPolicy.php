<?php

namespace App\Policies;

use App\Models\Group;
use App\Models\Member;
use App\Models\Task;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class TaskPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Task $task): bool
    {
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user, $groupId = null): bool
    {
        // Tidak ada group_id = boleh
        if (is_null($groupId)) {
            return true;
        }

        // Cek apakah grupnya ada
        $group = Group::with('members')->find($groupId);

        if (!$group) {
            return false;
        }

        // Role yang diizinkan
        $allowedRoles = ['owner', 'admin'];

        // Cari user dalam group
        $member = $group->members()
                        ->where('user_id', $user->id)
                        ->first();

        return $member && in_array($member->role, $allowedRoles);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Task $task): bool
    {
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Task $task): bool
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Task $task): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Task $task): bool
    {
        return false;
    }
}
