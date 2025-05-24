<?php

namespace App\Http\Controllers;

use App\Models\GroupInviteLink;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GroupInviteLinkController extends Controller
{
    public function createInviteLink(Request $request)
    {
        $token = Str::random(40);
        $expiresAt = now()->addMinutes(30);

        $invite = GroupInviteLink::create([
            'group_id' => $request->group_id,
            'token' => $token,
            'expires_at' => $expiresAt,
            'link_inv_limit' => $request->link_inv_limit,
            'user_id' => $request->user_id,
        ]);

        $url = url('/invite/use') . '?token=' . $token;

        return response()->json(['invite_url' => $url]);
    }

}
