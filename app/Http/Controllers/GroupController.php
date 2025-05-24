<?php

namespace App\Http\Controllers;

use App\GenerateSlug;
use App\Models\Group;
use App\Models\Member;
use App\DeleteUploadedFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class GroupController extends Controller
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
        //     $request = request();

        //     $validate = Validator::make($request->all(), [
        //         'group_name' => 'required',
        //         'group_description' => 'required',
        //         'group_image' => 'sometimes|file|mimes:jpg,jpeg,png|max:2048',
        //         'group_banner' => 'sometimes|file|mimes:jpg,jpeg,png|max:2048',
        //     ]);

        //     if ($validate->fails()) {
        //         return response()->json($validate->errors(), 422);
        //     }
        //     if ($request->hasFile('group_image')) {
        //         $file = $request->file('group_image');
        //         $filename = time() . '_' . $file->getClientOriginalName();
        //         $file->move(public_path('uploads/group_image'), $filename);
        //         $request['group_image'] = 'uploads/group_image/' . $filename;
        //     } else {
        //         $request['group_image'] = null;
        //     }

        //     if ($request->hasFile('group_banner')) {
        //         $file = $request->file('group_banner');
        //         $filename = time() . '_' . $file->getClientOriginalName();
        //         $file->move(public_path('uploads/group_banner'), $filename);
        //         $request['group_banner'] = 'uploads/group_banner/' . $filename;
        //     } else {
        //         $request['group_banner'] = null;
        //     }

        //     return $this->createGroup($request);
        // }

        // public function createGroup($request)
        // {
        //     $group = null;
        //     $member = null;
        //     try {
        //         $group = Group::create([
        //             'slug' => GenerateSlug::generateSlug(Group::class, $request->group_name),
        //             'group_name' => $request->group_name,
        //             'group_description' => $request->group_description,
        //             'group_image' => $request->group_image,
        //             'group_banner' => $request->group_banner,
        //         ]);

        //         $member = Member::create([
        //             'user_id' => auth()->user()->id,
        //             'group_id' => $group->id,
        //             'role' => 'owner',
        //         ]);

        //     } catch (\Exception $e) {
        //         if ($group != null)
        //             $group->delete();
        //         if ($member != null)
        //             $member->delete();
        //         DeleteUploadedFile::deleteUploadedFile($request->group_image);
        //         DeleteUploadedFile::deleteUploadedFile($request->group_banner);

        //         return response()->json([
        //             'error' => 'Failed to create group',
        //             'message' => $e->getMessage()
        //         ], 500);
        //     }

        //     return response()->json(['message' => 'Group created successfully'], 201);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'group_name' => 'required|string|max:255',
            'group_description' => 'required|string',
            'group_image' => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
            'group_banner' => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
            'group_type' => 'nullable|in:public,private',
            'join_permission' => ['nullable', 'in:everyone,approval,invite_only', function ($attribute, $value, $fail) {
                if ($value === 'invite_only' && request()->group_type !== 'private') {
                    $fail('Invite only groups must be private.');
                }
            }],
            'create_task_permission' => 'nullable|in:everyone,need permission,admin',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $groupImagePath = null;
        $groupBannerPath = null;

        try {
            // Handle group image upload
            if ($request->hasFile('group_image')) {
                $file = $request->file('group_image');
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('uploads/group_image'), $filename);
                $groupImagePath = 'uploads/group_image/' . $filename;
            }

            // Handle group banner upload
            if ($request->hasFile('group_banner')) {
                $file = $request->file('group_banner');
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('uploads/group_banner'), $filename);
                $groupBannerPath = 'uploads/group_banner/' . $filename;
            }

            DB::beginTransaction();

            // Create group
            $group = Group::create([
                'slug' => GenerateSlug::generateSlug(Group::class, $request->group_name),
                'group_name' => $request->group_name,
                'group_description' => $request->group_description,
                'group_image' => $groupImagePath,
                'group_banner' => $groupBannerPath,
                'group_type' => $request->group_type ?? 'public',
                'group_key' => $request->group_type === 'private' && $request->join_permission !== 'invite_only'
                    ? (function () {
                        do {
                            $key = Str::random(10);
                        } while (Group::where('group_key', $key)->exists());
                        return $key;
                    })()
                    : null,
                'join_permission' => $request->join_permission ?? 'approval',
                'create_task_permission' => $request->create_task_permission ?? 'everyone',
            ])->fresh();

            // Add current user as owner
            Member::create([
                'user_id' => auth()->id(),
                'group_id' => $group->id,
                'role' => 'owner',
            ]);

            DB::commit();

            return response()->json(['message' => 'Group created successfully', 'group' => $group], 201);

        } catch (\Exception $e) {
            DB::rollBack();

            // Cleanup uploaded files if something fails
            if ($groupImagePath)
                DeleteUploadedFile::deleteUploadedFile($groupImagePath);
            if ($groupBannerPath)
                DeleteUploadedFile::deleteUploadedFile($groupBannerPath);

            return response()->json([
                'error' => 'Group creation failed',
                'message' => $e->getMessage(),
            ], 500);
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(Group $group)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Group $group)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Group $group)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Group $group)
    {
        //
    }
}
