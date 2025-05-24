<?php

namespace App\Http\Controllers;

use App\Models\GroupInviteLink;
use App\Models\Member;
use App\Models\PendingMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreMemberRequest;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\UpdateMemberRequest;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'group_id' => 'required|exists:groups,id',
        ]);

        if ($validate->fails()) {
            return response()->json(['error' => $validate->errors()], 422);
        }

        $requested = Member::where('user_id', auth()->id())->where('group_id', $request->group_id)->exists() || PendingMember::where('user_id', auth()->id())->where('group_id', $request->group_id)->exists();

        if ($requested)
            return response()->json(['error' => 'You are already request or a member of this group'], 422);

        $group = \App\Models\Group::find($request->group_id);

        if ($group) {

            if ($group->join_permission === 'invite_only') {
                return response()->json(['error' => 'Group is invite only'], 403);
            }

            if ($group->group_type === 'private' && $group->group_key !== $request->group_key) {
                return response()->json([
                    'error' => ['group_key' => ['Invalid group key.']],
                ], 422);
            }

            try {
                DB::beginTransaction();

                $response = ['message' => 'Successfully joined group'];
                $responseCode = 201;

                if ($group->join_permission === 'approval') {

                    PendingMember::create([
                        'user_id' => auth()->id(),
                        'group_id' => $request->group_id,
                    ]);

                    $response['message'] = 'Request to join group has been sent for approval';
                    $responseCode = 202;

                } else {

                    Member::create([
                        'user_id' => auth()->id(),
                        'group_id' => $request->group_id,
                        'role' => 'member',
                    ]);

                }

                DB::commit();

                return response()->json($response, $responseCode);
            } catch (\Exception $e) {
                DB::rollBack();

                return response()->json([
                    'error' => 'Cannot join group',
                    'message' => $e->getMessage(),
                ], 500);
            }
        }
        return response()->json(['error' => 'Group not found'], 404);
    }

    /**
     * Use a group invite link to join a group
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function useInviteLink(Request $request)
    {
        $token = $request->token;

        $invite = GroupInviteLink::where('token', $token)->first();

        if (!$invite) {
            return response()->json(['error' => 'Invalid invite link'], 404);
        }

        if ($invite->used) {
            return response()->json(['error' => 'This invite link has already been used'], 403);
        }

        if (now()->greaterThan($invite->expires_at)) {
            return response()->json(['error' => 'This invite link has expired'], 403);
        }

        if ($invite->user_id !== auth()->id()) {
            return response()->json(['error' => 'You are cannot use this invite link'], 403);
        }

        if ($invite->link_inv_limit <= 0) {
            return response()->json(['error' => 'link invitation has reach the limit'], 429);
        }

        Member::create([
            'user_id' => auth()->id(),
            'group_id' => $invite->group_id,
            'role' => 'member'
        ]);

        if ($invite->link_inv_limit === null)
            $invite->update(['used' => true]);
        else if ($invite->link_inv_limit > 0)
            $invite->update(['link_inv_limit' => $invite->link_inv_limit - 1]);

        return response()->json(['message' => 'You have successfully joined the group.']);
    }


    /**
     * Display the specified resource.
     */
    public function show(Member $member)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Member $member)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMemberRequest $request, Member $member)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Member $member)
    {
        //
    }
}
