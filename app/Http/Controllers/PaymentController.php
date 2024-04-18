<?php

namespace App\Http\Controllers;

use App\Models\College;
use App\Models\Course;
use App\Models\AcademySession;
use App\Models\Payment;
use App\Models\Student;
use Illuminate\Http\Request;

class PaymentController extends Controller
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
        $colleges = College::latest()->get();
        $courses = Course::latest()->get();
        $academy_sessions = AcademySession::latest()->get();

        return view('admin.payment.create', compact('colleges', 'courses', 'academy_sessions'));
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
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Payment $payment)
    {
        //
    }

    public function search(Request $request)
    {
        $colleges = College::latest()->get();
        $courses = Course::latest()->get();
        $academy_sessions = AcademySession::latest()->get();

        // Get form data
        $name = $request->get('name');
        $email = $request->get('email');
        $dob = $request->get('dob');
        $phone = $request->get('phone');
        $collegeId = $request->get('college_id');
        $courseId = $request->get('course_id');
        $academySessionId = $request->get('academy_session_id');

        // Build your search query here
        $students = Student::query();  // Replace Payment with your actual payment model

        // Filter based on user input
        if ($name) {
            $students->where('name', 'like', "%$name%");
        }

        if ($email) {
            $students->where('email', $email);
        }

        // Apply date filters if DOB is provided
        if ($dob) {
            $students->whereDate('dob', $dob);
        }

        if ($phone) {
            $students->where('phone', 'like', "%$phone%");
        }

        if ($collegeId) {
            $students->where('college_id', $collegeId);
        }

        if ($courseId) {
            $students->where('course_id', $courseId);
        }

        if ($academySessionId) {
            $students->where('academy_session_id', $academySessionId);
        }

        // Fetch students based on your query
        $students = $students->get();

        // Pass search results to a view (replace 'payment.search' with your actual view)
        return view('payment.create', compact('colleges', 'courses', 'academy_sessions', 'students'));
    }
}
