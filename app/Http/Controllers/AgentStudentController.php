<?php

namespace App\Http\Controllers;

use App\Models\AgentStudent;
use App\Models\College;
use App\Models\Course;
use App\Models\AcademySession;
use App\Models\Counselling;
use Illuminate\Http\Request;

class AgentStudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $colleges = College::latest()->get();
        $courses = Course::latest()->get();
        $academy_sessions = AcademySession::latest()->get();
        $students = [];
        
        if(auth()->user()->role == "agent") {
            $agent_students = AgentStudent::where("created_by", auth()->user()->id)->latest()->get();

            foreach ($agent_students as $student) {
                $student->college = College::find($student->college_id);
                $student->course = Course::find($student->course_id);
                $student->academy_session = AcademySession::find($student->academy_session_id);
                $student->last_counselling =  Counselling::where('agent_student_id', $student->id)->latest()->first();
                $students[] = $student;
            }
        }
        else {
            $unique_identities = AgentStudent::select('identity')->distinct()->latest()->get();

            foreach($unique_identities as $unique_identity) {
                $ids = AgentStudent::select("id")->where('identity', $unique_identity->identity)->get();
                $id_records = [];
                foreach($ids as $id) {
                    $id_records[] = $id["id"];
                }

                $student = AgentStudent::where('identity', $unique_identity->identity)->first();
                $student->college = College::find($student->college_id);
                $student->course = Course::find($student->course_id);
                $student->academy_session = AcademySession::find($student->academy_session_id);
                $student->last_counselling =  Counselling::whereIn('agent_student_id', $id_records)->latest()->first();
                $students[] = $student;
            }
        }

        return view('admin.agent.index', compact('colleges', 'courses', 'academy_sessions', 'students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $colleges = College::latest()->get();
        $courses = Course::latest()->get();
        $academy_sessions = AcademySession::latest()->get();

        return view('admin.agent.create', compact('colleges', 'courses', 'academy_sessions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $student = new AgentStudent;
        $counselling = new Counselling;

            
        $student->image = $request->hasFile('image') ? $request->file('image')->store('agent_students', 'public') : null;
        $student->college_id = $request->input('college_id');
        $student->course_id = $request->input('course_id');
        $student->academy_session_id = $request->input('academy_session_id');
        $student->identity = strtoupper($request->input('identity'));
        $student->name = $request->input('name');
        $student->dob = $request->input('dob');
        $student->phone = $request->input('phone');
        $student->additional_phone_no = $request->input('additional_phone_no');
        $student->created_by = auth()->user()->id;
        $student->save();

        $counselling->agent_student_id = $student->id;
        $counselling->proposed_fees = $request->input('proposed_fees');
        $counselling->asking_fees = $request->input('asking_fees');
        $counselling->docs = $request->hasFile('docs') ? $request->file('docs')->store('counselling_docs', 'public') : null;
        $counselling->created_by = auth()->user()->id;
        $counselling->save();   

        return redirect()->route('agentstudent.index')->with('success', 'New record added successfully!');
            
    }

    /**
     * Display the specified resource.
     */
    public function show(AgentStudent $agentStudent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AgentStudent $agentStudent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AgentStudent $agentStudent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AgentStudent $agentStudent)
    {
        //
    }
}
