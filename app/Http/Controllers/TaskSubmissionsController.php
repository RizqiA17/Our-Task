<?php

namespace App\Http\Controllers;

use App\Models\TaskSubmissions;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StoreTaskSubmissionsRequest;
use App\Http\Requests\UpdateTaskSubmissionsRequest;

class TaskSubmissionsController extends Controller
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
    public function store(StoreTaskSubmissionsRequest $request)
    {
        $validated = Validator::make($request->all(), [
            'task_id' => 'required|exists:tasks,id',
            'user_id' => 'required|exists:users,id',
            'submission_file' => 'sometimes|file|mimes:pdf,doc,docx|max:2048',
        ]);

        if ($validated->fails())
            return response()->json($validated->errors(), 422);

        if ($request->hasFile('submission_file')) {
            $file = $request->file('submission_file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/task_submissions'), $filename);
            $request['submission_file'] = 'uploads/task_submissions/' . $filename;
        } else {
            $request['submission_file'] = null;
        }

        $taskSubmission = TaskSubmissions::create([
            'task_id' => $request->task_id,
            'user_id' => $request->user_id,
            'submission_file' => $request->submission_file,
        ]);
        
        if ($taskSubmission)
            return response()->json(['message' => 'Task submission created successfully'], 201);
        else
            return response()->json(['error' => 'Something went wrong'], 500);
    }

    /**
     * Display the specified resource.
     */
    public function show(TaskSubmissions $taskSubmissions)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TaskSubmissions $taskSubmissions)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTaskSubmissionsRequest $request, TaskSubmissions $taskSubmissions)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TaskSubmissions $taskSubmissions)
    {
        //
    }
}
