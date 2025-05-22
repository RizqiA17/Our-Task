<?php

namespace App\Http\Controllers;

use App\GenerateSlug;
use App\Models\Group;
use App\Models\Member;
use App\DeleteUploadedFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
        $request = request();

        $validate = Validator::make($request->all(), [
            'group_name' => 'required',
            'group_description' => 'required',
            'group_image' => 'optional|file|mimes:jpg,jpeg,png|max:2048',
            'group_banner' => 'optional|file|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($validate->fails()) {
            return response()->json($validate->errors(), 422);
        }
        if ($request->hasFile('group_image')) {
            $file = $request->file('group_image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/group_image'), $filename);
            $request['group_image'] = 'uploads/group_image/' . $filename;
        } else {
            $request['group_image'] = null;
        }

        if ($request->hasFile('group_banner')) {
            $file = $request->file('group_banner');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/group_banner'), $filename);
            $request['group_banner'] = 'uploads/group_banner/' . $filename;
        } else {
            $request['group_banner'] = null;
        }

        return $this->createGroup($request);
    }

    public function createGroup($request)
    {
        $group = null;
        $member = null;
        try {
            $group = Group::create([
                'slug' => GenerateSlug::generateSlug(Group::class, $request->group_name),
                'group_name' => $request->group_name,
                'group_description' => $request->group_description,
                'group_image' => $request->group_image,
                'group_banner' => $request->group_banner,
            ]);

            $member = Member::create([
                'user_id' => auth()->user()->id,
                'group_id' => $group->id,
                'role' => 'owner',
            ]);

        } catch (\Exception $e) {
            if ($group != null)
                $group->delete();
            if ($member != null)
                $member->delete();
            DeleteUploadedFile::deleteUploadedFile($request->group_image);
            DeleteUploadedFile::deleteUploadedFile($request->group_banner);

            return response()->json([
                'error' => 'Failed to create group',
                'message' => $e->getMessage()
            ], 500);
        }

        return response()->json(['message' => 'Group created successfully'], 201);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
