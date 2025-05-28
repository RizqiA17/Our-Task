<?php

namespace App\Http\Controllers;

use App\GenerateSlug;
use App\Models\Subtask;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StoreSubtaskRequest;
use App\Http\Requests\UpdateSubtaskRequest;

class SubtaskController extends Controller
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
    public function store(StoreSubtaskRequest $request)
    {
        $validated = Validator::make($request->all(), [
            'task_id' => 'required|exists:tasks,id',
            'name' => 'required|string|max:255',
            'description' => 'reqired|string',
            'description_file' => 'sometimes|file|mimes:pdf,doc,docx|max:2048',
            'deadline' => 'required|date|after:now',
            'assigned_to' => 'required|array',
            'assigned_to.*' => 'exists:users,id',
        ]);

        if ($validated->fails())
            return response()->json($validated->errors(), 422);

        if ($request->hasFile('description_file')) {
            $file = $request->file('description_file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/subtask_description'), $filename);
            $request['description_file'] = 'uploads/subtask_description/' . $filename;
        } else {
            $request['description_file'] = null;
        }

        try {

            DB::beginTransaction();
            $subtask = Subtask::create([
                'slug' => GenerateSlug::generateSlug(Subtask::class, $request->name),
                'task_id' => $request->task_id,
                'name' => $request->name,
                'description' => $request->description,
                'description_file' => $request['description_file'],
                'deadline' => $request->deadline,
                'progress' => 'unfinished',
            ]);

            if ($subtask) {
                foreach ($request->assigned_to as $userId) {
                    if($subtask->task()->group()->members()->where('user_id', $userId)->exists()) {  
                        $subtask->assignments()->create(['user_id' => $userId]);
                    }
                }
            }
            
            DB::commit();
            return response()->json(['message' => 'Subtask created successfully'], 201);
            
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => 'Something went wrong', 'message' => $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Subtask $subtask)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subtask $subtask)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSubtaskRequest $request, Subtask $subtask)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subtask $subtask)
    {
        //
    }
}
