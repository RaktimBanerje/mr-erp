<?php

namespace App\Http\Controllers;

use App\Models\LeadStatus;
use Illuminate\Http\Request;

class LeadStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $records = LeadStatus::all();
        return view("admin.leadstatus.index", compact("records"));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(LeadStatus $leadStatus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LeadStatus $leadStatus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LeadStatus $leadStatus)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LeadStatus $leadStatus)
    {
        //
    }
}
