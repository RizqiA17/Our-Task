<?php

namespace App\Http\Controllers;

use App\Models\PendingMember;
use App\Http\Requests\StorePendingMemberRequest;
use App\Http\Requests\UpdatePendingMemberRequest;

class PendingMemberController extends Controller
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
    public function store(StorePendingMemberRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(PendingMember $pendingMember)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PendingMember $pendingMember)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePendingMemberRequest $request, PendingMember $pendingMember)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PendingMember $pendingMember)
    {
        //
    }
}
