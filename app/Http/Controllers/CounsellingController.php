<?php

namespace App\Http\Controllers;

use App\Models\Counselling;
use App\Models\AgentStudent;
use App\Models\College;
use App\Models\Course;
use App\Models\AcademySession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CounsellingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $colleges = College::latest()->get();
        $courses = Course::latest()->get();
        $academy_sessions = AcademySession::latest()->get();
        
        if(auth()->user()->role == "agent") {
            $student = AgentStudent::find($request->student_id);

            $student->college = College::find($student->college_id);
            $student->course = Course::find($student->course_id);
            $student->academy_session = AcademySession::find($student->academy_session_id);
            $student->counsellings = DB::table("counsellings")->join("users", "counsellings.created_by", "=", "users.id")->select("counsellings.*", "users.name as user_name")->where(["counsellings.agent_student_id" => $student->id, "counsellings.created_by" => auth()->user()->id])->latest()->get();

            return view("admin.counselling.agent_index", compact('student', 'colleges', 'courses', 'academy_sessions'));
        }
        else {
            $student = AgentStudent::select("identity")->where("id", $request->student_id)->first();
            $identity = $student['identity'];

            $records = DB::table("agent_students AS agent_student")
                        ->select(
                            "agent_student.name as student_name",
                            "agent_student.dob as student_dob",
                            "agent_student.image as student_image",
                            "agent_student.phone as student_phone",
                            "agent_student.additional_phone_no as student_additional_phone_no",

                            "counselling.proposed_fees as counselling_proposed_fees",
                            "counselling.asking_fees as counselling_asking_fees",
                            "counselling.docs as counselling_docs",
                            "counselling.created_at as counselling_created_at",

                            "user.name as user_name",
                            "user.email as user_email",
                        )
                        ->join("counsellings AS counselling", "counselling.agent_student_id", "=", "agent_student.id")
                        ->join("users AS user", "counselling.created_by", "=", "user.id")
                        ->get();

            return view("admin.counselling.agent_handler", compact('records'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $colleges = College::latest()->get();
        $courses = Course::latest()->get();
        $academy_sessions = AcademySession::latest()->get();

        $student = AgentStudent::find($request->student_id);
        return view("admin.counselling.create", compact('student', 'colleges', 'courses', 'academy_sessions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $counselling = new Counselling;

        $counselling->agent_student_id = $request->student_id;
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
    public function show(Counselling $counselling)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Counselling $counselling)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Counselling $counselling)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Counselling $counselling)
    {
        //
    }
}
