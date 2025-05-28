<?php

namespace App\Http\Controllers;

use App\Models\TaskAssignments;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StoreTaskAssignmentsRequest;
use App\Http\Requests\UpdateTaskAssignmentsRequest;

class TaskAssignmentsController extends Controller
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
    public function store(StoreTaskAssignmentsRequest $request)
    {
        $validated = Validator::make($request->all(), [
            'task_id' => 'required|exists:tasks,id',
            'assigned_to' => 'required|array',
            'assigned_to.*'=>'exists:users,id',
        ]);

        if ($validated->fails()) {
            return response()->json($validated->errors(), 422);
        }

        foreach ($request->assigned_to as $userId) {
            $taskAssignment = TaskAssignments::create([
                'task_id' => $request->task_id,
                'assigned_to' => $userId,
                'role' => 'member',
                'progress' => 0,
                'leader_id' => auth()->id(),
            ]);
        }

        if ($taskAssignment) {
            return response()->json(['message' => 'Task assignment created successfully'], 201);
        } else {
            return response()->json(['error' => 'Something went wrong'], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(TaskAssignments $taskAssignments)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TaskAssignments $taskAssignments)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTaskAssignmentsRequest $request, TaskAssignments $taskAssignments)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TaskAssignments $taskAssignments)
    {
        //
    }
}
