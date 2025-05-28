<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\GenerateSlug;
use App\DeleteUploadedFile;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
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
        //         'name' => 'required',
        //         'description' => 'required',
        //         'task_description_file' => 'sometimes|file|mimes:pdf,doc,docx|max:2048',
        //         'group_id' => 'sometimes|exists:groups,id',
        //         'task_type' => 'required|in:solo,team',
        //         'dont_assigned_to_me' => [
        //             'sometimes',
        //             'boolean',
        //             function ($attribute, $value, $fail) use ($request) {
        //                 if (empty($request->group_id) && !$value)
        //                     $fail('Something is wrong, cannot assign task to yourself');
        //             }
        //         ],
        //         'assigned_by' => 'required|exists:users,id',
        //         'assigned_to' => 'required_if:task_type,team|exists:users,id',
        //         'tgl_deadline' => 'required|date|after:tgl_dibuat',
        //     ]);

        //     if ($validate->fails())
        //         return response()->json($validate->errors(), 422);

        //     if ($request->hasFile('task_description_file')) {
        //         $file = $request->file('task_description_file');
        //         $filename = time() . '_' . $file->getClientOriginalName();
        //         $file->move(public_path('uploads/task_description_file'), $filename);
        //         $request['task_description_file'] = 'uploads/task_description_file/' . $filename;
        //     } else {
        //         $request['task_description_file'] = null;
        //     }

        //     return $this->createTask($request);
        // }

        // public function createTask($request)
        // {
        //     try {
        //         $task = Task::create([
        //             'slug' => GenerateSlug::generateSlug(Task::class, $request->name),
        //             'name' => $request->name,
        //             'description' => $request->description,
        //             'task_description_file' => $request->task_description_file,
        //             'group_id' => $request->group_id,
        //             'assigned_by' => $request->assigned_by,
        //             'deadline' => $request->deadline,
        //         ]);

        //         $request['task_id'] = $task->id;
        //         return $this->assignTask($request);

        //     } catch (\Exception $e) {
        //         DeleteUploadedFile::deleteUploadedFile($request->task_description_file);
        //         return response()->json(['error' => 'Something went wrong', 'message' => $e->getMessage()], 500);
        //     }
        // }

        // public function assignTask($request)
        // {
        //     $data = [
        //         'task_id' => $request->task_id,
        //         'user_id' => $request->assigned_by,
        //         'role' => 'leader',
        //         'progress' => 0,
        //     ];

        //     try {
        //         if ($request->dont_assigned_to_me || $request->dont_assigned_to_me != true)
        //             $response = TaskAssignmentsController::assignTask($data);

        //         if ($request->group_id == null)
        //             return $response;

        //         $data['role'] = 'member';

        //         if ($request->assigned_to == null)
        //             $members = Group::find($request->group_id)->members()->get();
        //         else
        //             $members = json_decode($request->assigned_to);

        //         foreach ($members as $member) {
        //             $data['user_id'] = $member->user_id;
        //             TaskAssignmentsController::assignTask($data);
        //         }

        //         return response()->json(['message' => 'Task created successfully'], 201);

        //     } catch (\Exception $e) {
        //         DeleteUploadedFile::deleteUploadedFile($request->task_description_file);
        //         return response()->json(['error' => 'Something went wrong', 'message' => $e->getMessage()], 500);
        //     }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaskRequest $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'task_description_file' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
            'group_id' => 'nullable|exists:groups,id',
            'task_type' => 'required_with:group_id|in:solo,team',
            'dont_assigned_to_me' => [
                'sometimes',
                'boolean',
                function ($attribute, $value, $fail) use ($request) {
                    if (empty($request->group_id) && !$value) {
                        $fail('Cannot assign task except yourself without a group');
                    }
                }
            ],
            'assigned_to' => [
                'sometimes',
                'array',
                function ($attribute, $value, $fail) use ($request) {
                    if ($request->group_id == null) {
                        $fail('Assigned to is for group only.');
                    }
                }
            ],
            'assigned_to.*' => 'exists:users,id',
            'deadline' => 'required|date|after:now',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        try {
            $me = auth()->user();
            $request['assigned_by'] = $me->id;

            // Handle file upload
            $taskDescriptionPath = null;
            if ($request->hasFile('task_description_file')) {
                $file = $request->file('task_description_file');
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('uploads/task_description_file'), $filename);
                $taskDescriptionPath = 'uploads/task_description_file/' . $filename;
            }

            DB::beginTransaction();

            // Create task
            $task = Task::create([
                'slug' => GenerateSlug::generateSlug(Task::class, $request->name),
                'type' => $request->task_type,
                'name' => $request->name,
                'description' => $request->description,
                'task_description_file' => $taskDescriptionPath,
                'group_id' => $request->group_id,
                'assigned_by' => $request->assigned_by,
                'deadline' => $request->tgl_deadline,
            ]);

            // Assign task leader
            if (!$request->dont_assigned_to_me) {
                $task->assignments()->create([
                    'user_id' => $request->assigned_by,
                    'role' => 'leader',
                    'progress' => 0,
                ]);
            }

            if ($request->assigned_to && is_array($request->assigned_to)) {
                foreach ($request->assigned_to as $userId) {
                    if ($userId !== $request->assigned_by || $task->group()->members()->where('user_id', $userId)->exists()) {
                        $task->assignments()->create([
                            'user_id' => $userId,
                            'role' => 'leader',
                            'progress' => 0,
                        ]);
                    }
                }
            } else if ($request->group_id && $request->task_type === 'solo') {
                $members = $task->group()->members()->all();
                foreach ($members as $member) {
                    if ($member->user_id !== $request->assigned_by) {
                        $task->assignments()->create([
                            'user_id' => $member->user_id,
                            'role' => 'leader',
                            'progress' => 0,
                        ]);
                    }
                }
            }


            DB::commit();
            return response()->json(['message' => 'Task created successfully'], 201);

        } catch (\Exception $e) {
            DB::rollBack();

            // Clean up uploaded file if task creation fails
            if ($taskDescriptionPath) {
                DeleteUploadedFile::deleteUploadedFile($taskDescriptionPath);
            }

            return response()->json([
                'error' => 'Task creation failed',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTaskRequest $request, Task $task)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        //
    }
}
