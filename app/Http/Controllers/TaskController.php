<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\GenerateSlug;
use App\Models\Group;
use App\DeleteUploadedFile;
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
        $request = request();

        $validate = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required',
            'task_description_file' => 'optional|file|mimes:pdf,doc,docx|max:2048',
            'group_id' => 'optional|exists:groups,id',
            'assigned_by' => 'required|exists:users,id',
            'assigned_to' => 'optional|exists:users,id',
            'tgl_deadline' => 'required|date|after:tgl_dibuat',
        ]);
        if ($validate->fails()) {
            return response()->json($validate->errors(), 422);
        }

        if ($request->hasFile('task_description_file')) {
            $file = $request->file('task_description_file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/task_description_file'), $filename);
            $request['task_description_file'] = 'uploads/task_description_file/' . $filename;
        } else {
            $request['task_description_file'] = null;
        }

        return $this->createTask($request);
    }

    public function createTask($request)
    {
        try {
            $task = Task::create([
                'slug' => GenerateSlug::generateSlug(Task::class, $request->name),
                'name' => $request->name,
                'description' => $request->description,
                'task_description_file' => $request->task_description_file,
                'group_id' => $request->group_id,
                'assigned_by' => $request->assigned_by,
                'tgl_deadline' => $request->tgl_deadline,
            ]);

            $request['task_id'] = $task->id;
            return $this->AssignTask($request);

        } catch (\Exception $e) {
            DeleteUploadedFile::deleteUploadedFile($request->task_description_file);
            return response()->json(['error' => 'Something went wrong', 'message' => $e->getMessage()], 500);
        }
    }

    public function AssignTask($request)
    {
        $data = [
            'task_id' => $request->task_id,
            'user_id' => $request->assigned_by,
            'role' => 'leader',
            'progress' => 0,
        ];

        try {
            $response = TaskAssignmentsController::assignTask($data);

            if ($request->group_id == null)
                return $response;

            $data['role'] = 'member';

            if ($request->assigned_to == null)
                $members = Group::find($request->group_id)->members()->get();
            else
                $members = json_decode($request->assigned_to);

            foreach ($members as $member) {
                $data['user_id'] = $member->user_id;
                TaskAssignmentsController::assignTask($data);
            }

            return response()->json(['message' => 'Task created successfully'], 201);

        } catch (\Exception $e) {
            DeleteUploadedFile::deleteUploadedFile($request->task_description_file);
            return response()->json(['error' => 'Something went wrong', 'message' => $e->getMessage()], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaskRequest $request)
    {
        //
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
