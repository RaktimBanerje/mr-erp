<?php

namespace App\Http\Controllers;

use App\Models\LeadSource;
use Illuminate\Http\Request;

class LeadSourceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sources = LeadSource::latest()->get();
        return view("admin.lead_source.index", compact('sources'));
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
        $source = new LeadSource();

        $source->name = $request->name;
        $source->image = $request->hasFile('image') ? $request->file('image')->store('lead_source', 'public') : null;
        $source->identity = $request->identity;
        $source->key = $request->identity;
        $source->lead_channel_id = $request->channel;

        $label = $request->label;
        $key = $request->key;
        $type = $request->type;
        $data = [];

        for($i = 0; $i < count($label); $i++) {
            $data[] = [
                "label"     => $label[$i],
                "key"       => $key[$i],
                "type"      => $type[$i],
            ];
        }

        $source->fields = json_encode($data);
        $source->save();

        return redirect()->route("leadsource.index")->with("New lead source created");
    }

    /**
     * Display the specified resource.
     */
    public function show(LeadSource $leadSource)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LeadSource $leadSource)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LeadSource $leadSource)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LeadSource $leadSource)
    {
        //
    }
}
