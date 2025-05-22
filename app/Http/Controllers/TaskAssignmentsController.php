<?php

namespace App\Http\Controllers;

use App\Models\TaskAssignments;
use App\Http\Requests\StoreTaskAssignmentsRequest;
use App\Http\Requests\UpdateTaskAssignmentsRequest;

class TaskAssignmentsController extends Controller
{
    public static function assignTask($data)
    {
        $taskAssignment = TaskAssignments::create([
            'task_id' => $data['task_id'],
            'user_id' => $data['user_id'],
            'role' => $data['role'],
            'progress' => $data['progress'],
        ]);

        if ($taskAssignment) {
            return response()->json(['message' => 'Task created successfully'], 201);
        } else {
            return response()->json(['error' => 'Something went wrong'], 500);
        }
    }

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
        //
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
