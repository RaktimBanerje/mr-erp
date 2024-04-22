<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Models\LeadSourceCaller;
use App\Models\LeadCaller;
use App\Models\LeadStatus;
use App\Models\LeadSource;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $statuses = LeadStatus::all();
        $sources = LeadSourceCaller::select("lead_source_id")->distinct("lead_source_id")->where("user_id", auth()->user()->id)->get();
        $records = [];

        foreach($sources as $source) {
            $source->source = LeadSource::find($source->lead_source_id);
            $source->contacts = Contact::where("lead_source_id", $source->lead_source_id)->latest()->get();
            $records[] = $source;
        }

        return view("admin.contact.index", compact('records', 'statuses'));
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
        $source = LeadSource::where("identity", $request->identity)->first();
        $fields = json_decode($source->fields); 
        $keysToCheck = [];

        foreach($fields as $field) {
            $keysToCheck[] = $field->key;
        }

        // Initialize an empty array to store the values
        $data = [];

        // Loop through the keys and check if they exist in the $_POST array
        foreach ($keysToCheck as $key) {
            // Check if the key exists in the request data
            if ($request->has($key)) {
                // If it exists, store its value
                $data[$key] = $request->input($key);
            } else {
                // If it doesn't exist, store null
                $data[$key] = null;
            }
        }

        $contact = new Contact();
        $contact->lead_source_id = $source->id;
        $contact->identity = time();
        $contact->data = json_encode($data);
        $contact->save();

        return response()->json($data, 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        //
    }
}
