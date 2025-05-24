<?php

namespace Tests\Unit;

use App\Http\Controllers\MemberController;
use App\Models\Group;
use App\Models\GroupInviteLink;
use App\Models\Member;
use App\Models\PendingMember;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Tests\TestCase;

class GroupInviteTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    protected $user;
    
    protected function setUp(): void
    {
        parent::setUp();
        // Create a user and authenticate
        $this->user = User::factory()->create();
        $this->actingAs($this->user);
    }

    public function test_store_requires_group_id()
    {
        $response = $this->postJson(route('members.store'), []);
        $response->assertStatus(422)
            ->assertJsonValidationErrors('group_id');
    }

    public function test_store_fails_if_already_member_or_pending()
    {
        $group = Group::factory()->create();
        Member::factory()->create([
            'user_id' => $this->user->id,
            'group_id' => $group->id,
        ]);

        $response = $this->postJson(route('members.store'), [
            'group_id' => $group->id,
        ]);
        $response->assertStatus(422)
            ->assertJsonFragment(['error' => 'You are already request or a member of this group']);
    }

    public function test_store_fails_if_group_not_found()
    {
        $response = $this->postJson(route('members.store'), [
            'group_id' => 9999,
        ]);
        $response->assertStatus(404)
            ->assertJsonFragment(['error' => 'Group not found']);
    }

    public function test_store_fails_if_group_is_invite_only()
    {
        $group = Group::factory()->create(['join_permission' => 'invite_only']);
        $response = $this->postJson(route('members.store'), [
            'group_id' => $group->id,
        ]);
        $response->assertStatus(403)
            ->assertJsonFragment(['error' => 'Group is invite only']);
    }

    public function test_store_fails_if_private_group_key_invalid()
    {
        $group = Group::factory()->create([
            'group_type' => 'private',
            'group_key' => 'secret',
        ]);
        $response = $this->postJson(route('members.store'), [
            'group_id' => $group->id,
            'group_key' => 'wrongkey',
        ]);
        $response->assertStatus(422)
            ->assertJsonFragment(['group_key' => ['Invalid group key.']]);
    }

    public function test_store_creates_pending_member_if_approval_required()
    {
        $group = Group::factory()->create(['join_permission' => 'approval']);
        $response = $this->postJson(route('members.store'), [
            'group_id' => $group->id,
        ]);
        $response->assertStatus(202)
            ->assertJsonFragment(['message' => 'Request to join group has been sent for approval']);
        $this->assertDatabaseHas('pending_members', [
            'user_id' => $this->user->id,
            'group_id' => $group->id,
        ]);
    }

    public function test_store_creates_member_if_no_approval_required()
    {
        $group = Group::factory()->create(['join_permission' => 'open']);
        $response = $this->postJson(route('members.store'), [
            'group_id' => $group->id,
        ]);
        $response->assertStatus(201)
            ->assertJsonFragment(['message' => 'Successfully joined group']);
        $this->assertDatabaseHas('members', [
            'user_id' => $this->user->id,
            'group_id' => $group->id,
        ]);
    }

    public function test_use_invite_link_fails_if_invalid_token()
    {
        $response = $this->postJson(route('members.useInviteLink'), [
            'token' => 'invalidtoken',
        ]);
        $response->assertStatus(404)
            ->assertJsonFragment(['error' => 'Invalid invite link']);
    }

    public function test_use_invite_link_fails_if_used()
    {
        $invite = GroupInviteLink::factory()->create([
            'user_id' => $this->user->id,
            'used' => true,
            'expires_at' => now()->addHour(),
        ]);
        $response = $this->postJson(route('members.useInviteLink'), [
            'token' => $invite->token,
        ]);
        $response->assertStatus(403)
            ->assertJsonFragment(['error' => 'This invite link has already been used']);
    }

    public function test_use_invite_link_fails_if_expired()
    {
        $invite = GroupInviteLink::factory()->create([
            'user_id' => $this->user->id,
            'used' => false,
            'expires_at' => now()->subMinute(),
        ]);
        $response = $this->postJson(route('members.useInviteLink'), [
            'token' => $invite->token,
        ]);
        $response->assertStatus(403)
            ->assertJsonFragment(['error' => 'This invite link has expired']);
    }

    public function test_use_invite_link_fails_if_wrong_user()
    {
        $otherUser = User::factory()->create();
        $invite = GroupInviteLink::factory()->create([
            'user_id' => $otherUser->id,
            'used' => false,
            'expires_at' => now()->addHour(),
        ]);
        $response = $this->postJson(route('members.useInviteLink'), [
            'token' => $invite->token,
        ]);
        $response->assertStatus(403)
            ->assertJsonFragment(['error' => 'You are cannot use this invite link']);
    }

    public function test_use_invite_link_fails_if_limit_reached()
    {
        $invite = GroupInviteLink::factory()->create([
            'user_id' => $this->user->id,
            'used' => false,
            'expires_at' => now()->addHour(),
            'link_inv_limit' => 0,
        ]);
        $response = $this->postJson(route('members.useInviteLink'), [
            'token' => $invite->token,
        ]);
        $response->assertStatus(429)
            ->assertJsonFragment(['error' => 'link invitation has reach the limit']);
    }

    public function test_use_invite_link_success_and_decrements_limit()
    {
        $group = Group::factory()->create();
        $invite = GroupInviteLink::factory()->create([
            'user_id' => $this->user->id,
            'group_id' => $group->id,
            'used' => false,
            'expires_at' => now()->addHour(),
            'link_inv_limit' => 2,
        ]);
        $response = $this->postJson(route('members.useInviteLink'), [
            'token' => $invite->token,
        ]);
        $response->assertOk()
            ->assertJsonFragment(['message' => 'You have successfully joined the group.']);
        $this->assertDatabaseHas('members', [
            'user_id' => $this->user->id,
            'group_id' => $group->id,
        ]);
        $invite->refresh();
        $this->assertEquals(1, $invite->link_inv_limit);
    }
}
