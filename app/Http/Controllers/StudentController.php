<?php

namespace App\Http\Controllers;

use App\Models\College;
use App\Models\Course;
use App\Models\AcademySession;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $colleges = College::latest()->get();
        $courses = Course::latest()->get();
        $academy_sessions = AcademySession::latest()->get();
        $records = Student::latest()->get();
        $students = [];

        foreach($records as $record) {
            $record->college = College::find($record->college_id);
            $record->course = Course::find($record->course_id);
            $record->academy_session = AcademySession::find($record->academy_session_id);
            $students[] = $record;
        }

        return view('admin.student.index', compact('colleges', 'courses', 'academy_sessions', 'students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $colleges = College::latest()->get();
        $courses = Course::latest()->get();
        $academy_sessions = AcademySession::latest()->get();

        return view('admin.student.create', compact('colleges', 'courses', 'academy_sessions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $student = new Student();

        $student->image = $request->hasFile('image') ? $request->file('image')->store('students', 'public') : null;
        $student->college_id = $request->input('college_id');
        $student->course_id = $request->input('course_id');
        $student->academy_session_id = $request->input('academy_session_id');
        $student->name = $request->input('name');
        $student->dob = $request->input('dob');
        $student->phone = $request->input('phone');
        $student->aadhar = $request->input('aadhar');
        $student->email = $request->input('email');
        $student->additional_phone_no = $request->input('additional_phone_no');
        $student->created_by = auth()->user()->id;
        $student->save();

        return redirect()->route("admission.index")->with("New record created successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        //
    }
}
