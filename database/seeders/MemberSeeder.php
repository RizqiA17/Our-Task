<?php

namespace Database\Seeders;

use App\Models\Group;
use App\Models\Member;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $groups = Group::all();

        $groups->each(function ($group) {
            Member::factory()->count(3)->create([
                'group_id' => $group->id,
            ]);
        });
    }
}
