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
    public function index(Request $request)
    {
        $query = Group::select(['slug', 'group_name', 'group_description', 'group_image',])->with([
            'members' => function ($q) {
                $q->select(['user_id', 'group_id', 'role', 'created_at']);
            }
        ]);

        if ($request->has('mine') && $request->mine === 'true') {
            $query->whereHas('members', function ($q) {
                $q->where('user_id', auth()->id())->where('role', 'owner')->orWhere('role', 'admin');
            });
        } else {
            $query->whereHas('members', function ($q) {
                $q->where('user_id', auth()->id());
            });
        }

        if ($request->has('type')) {
            $type = $request->type;

            if ($type === 'public') {
                $query->where('group_type', 'public');
            } else if ($type === 'private') {
                $query->where('group_type', 'private');
            }
        }

        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('group_name', 'like', '%' . $search . '%')
                    ->orWhere('group_description', 'like', '%' . $search . '%');
            });
        }

        if ($request->has('sort')) {
            $sort = $request->sort;

            if ($sort === 'name_asc') {
                $query->orderBy('group_name', 'asc')->orderBy('id', 'asc');
            } else if ($sort === 'name_desc') {
                $query->orderBy('group_name', 'desc')->orderBy('id', 'asc');
            } else if ($sort === 'join_at_asc' || $sort === 'join_at_desc') {
                $query->leftJoin('members', function ($join) {
                    $join->on('groups.id', '=', 'members.group_id')
                        ->where('members.user_id', '=', auth()->id());
                })
                    ->orderBy('members.created_at', $sort === 'join_at_asc' ? 'asc' : 'desc')
                    ->orderBy('groups.id', 'asc')
                    ->select('groups.slug', 'groups.group_name', 'groups.group_description', 'groups.group_image');
            } else {
                $query->orderBy('group_name', 'asc')->orderBy('id', 'asc');
            }
        } else {
            $query->orderBy('group_name', 'asc')->orderBy('id', 'asc');
        }

        $data = $query->cursorPaginate(10);

        $data = [
            'items' => $data->items(),
            'pagination' => [
                'path' => $data->path(),
                'per_page' => $data->perPage(),
                'next_cursor' => $data->nextCursor(),
                'next_page_url' => $data->nextPageUrl(),
                'prev_cursor' => $data->previousCursor(),
                'prev_page_url' => $data->previousPageUrl(),
                'has_next' => $data->nextCursor() !== null,
                'has_previous' => $data->previousCursor() !== null,
            ],
        ];

        $filters = [
            'group_type' => $request->has('filter') ? $request->filter : null,
            'search' => $request->has('search') ? $request->search : null,
            'sort' => $request->has('sort') ? $request->sort : null,
            'mine' => $request->has('mine') ? $request->mine : null,
        ];

        return response()->json([
            'message' => 'Groups retrieved successfully',
            'data' => $data['items'] != [] ? $data : 'Groups not found',
            'filters' => $filters,
        ], 200);
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
        $validator = Validator::make($request->all(), [
            'group_name' => 'required|string|max:255',
            'group_description' => 'required|string',
            'group_image' => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
            'group_banner' => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
            'group_type' => 'nullable|in:public,private',
            'join_permission' => [
                'nullable',
                'in:everyone,approval,invite_only',
                function ($attribute, $value, $fail) {
                    if ($value === 'invite_only' && request()->group_type !== 'private') {
                        $fail('Invite only groups must be private.');
                    }
                }
            ],
            'create_task_permission' => 'nullable|in:everyone,approval,admin',
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
        $data = [
            'slug' => $group->slug,
            'name' => $group->group_name,
            'description' => $group->group_description,
            'image' => $group->group_image,
            'banner' => $group->group_banner,
            'type' => $group->group_type,
        ];

        return response()->json([
            'message' => 'Group retrieved successfully',
            'data' => $data,
        ], 200);
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
        $validated = Validator::make($request->all(), [
            'group_name' => 'required|string|max:255',
            'group_description' => 'required|string',
            'group_image' => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
            'group_banner' => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
            'group_type' => 'nullable|in:public,private',
            'join_permission' => [
                'nullable',
                'in:everyone,approval,invite_only',
                function ($attribute, $value, $fail) {
                    if ($value === 'invite_only' && request()->group_type !== 'private') {
                        $fail('Invite only groups must be private.');
                    }
                }
            ],
            'create_task_permission' => 'nullable|in:everyone,need permission,admin',
        ]);

        if ($validated->fails()) {
            return response()->json($validated->errors(), 422);
        }

        $groupImagePath = $group->group_image;
        $groupBannerPath = $group->group_banner;

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

            // Update group
            $group->update([
                'slug' => $request->name == $group->group_name ? $group->slug : GenerateSlug::generateSlug(Group::class, $request->group_name),
                'group_name' => $request->group_name ?? $group->group_name,
                'group_description' => $request->group_description ?? $group->group_description,
                'group_image' => $groupImagePath,
                'group_banner' => $groupBannerPath,
                'group_type' => $request->group_type ?? $group->group_type,
                'join_permission' => $request->join_permission ?? $group->join_permission,
                'create_task_permission' => $request->create_task_permission ?? $group->create_task_permission,
            ]);

            DB::commit();

            return response()->json(['message' => 'Group updated successfully', 'group' => $group], 200);

        } catch (\Exception $e) {
            DB::rollBack();

            // Cleanup uploaded files if something fails
            if ($groupImagePath && !str_contains($groupImagePath, 'default'))
                DeleteUploadedFile::deleteUploadedFile($groupImagePath);
            if ($groupBannerPath && !str_contains($groupBannerPath, 'default'))
                DeleteUploadedFile::deleteUploadedFile($groupBannerPath);

            return response()->json([
                'error' => 'Group update failed',
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Group $group)
    {
        //
    }
}
