<?php

namespace App\Http\Controllers;

use App\Models\CashTransfer;
use App\Models\ChequeTransfer;
use App\Models\College;
use App\Models\Course;
use App\Models\AcademySession;
use App\Models\DirectTransfer;
use App\Models\Payment;
use App\Models\Student;
use App\Models\StudentFees;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->has("payment_mode")) {
            $records = Payment::where('payment_mode', $request->payment_mode)->latest()->get();
        }
        else {
            $records = Payment::latest()->get();
        }
        $payments = [];

        foreach($records as $record) {
            $record->student = Student::find($record->student_id);
            $payments[] = $record; 
        }

        return view("admin.payment.index", compact("payments"));
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
        // Create payment record
        $payment = new Payment();
        $payment->payment_mode = $request->input('payment_mode');
        $payment->remarks = $request->input('remarks'); 
        $payment->docs = $request->hasFile('docs') ? $request->file('docs')->store('payment_receipts', 'public') : null;
        $payment->student_id = $request->input('student_id');
        $payment->created_by = auth()->user()->id;
        $payment->save(); 

        // Depending on the payment mode, save additional data
        switch ($payment->payment_mode) {
            case 'CASH':
                $cashTransfer = new CashTransfer();
                $cashTransfer->payment_id = $payment->id;
                $cashTransfer->amount = $request->input('cash_amount');
                $payment->payment_amount = $request->input('cash_amount');
                $cashTransfer->save();
                break;
            case 'CHEQUE':
                $chequeTransfer = new ChequeTransfer();
                $chequeTransfer->payment_id = $payment->id;
                $chequeTransfer->cheque_no = $request->input('cheque_no');
                $chequeTransfer->amount = $request->input('cheque_amount');
                $payment->payment_amount = $request->input('cheque_amount');
                $chequeTransfer->date = $request->input('cheque_date');
                $chequeTransfer->drawee_bank = $request->input('drawee_bank');
                $chequeTransfer->save();
                break;
            case 'DIRECT':
                $directTransfer = new DirectTransfer();
                $directTransfer->payment_id = $payment->id;
                $directTransfer->utr_no = $request->input('utr_no');
                $directTransfer->amount = $request->input('direct_transfer_amount');
                $payment->payment_amount = $request->input('direct_transfer_amount');
                $directTransfer->date = $request->input('direct_transfer_date');
                $directTransfer->medium = $request->input('direct_transfer_medium');
                $directTransfer->save();
                break;
            default:
                // Handle unsupported payment modes or add more cases if needed
                break;
        }

        $payment->save();

        // Redirect or return response as needed
        return redirect()->route('payment.index')->with('success', 'Payment recorded successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Payment $payment)
    {

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
        return view('admin.payment.create', compact('colleges', 'courses', 'academy_sessions', 'students'));
    }

    public function fees_detail(Request $request) {
        $colleges = College::latest()->get();
        $courses = Course::latest()->get();
        $academy_sessions = AcademySession::latest()->get();
        $student = Student::find($request->student_id);
        $student_fees = StudentFees::where("student_id", $request->student_id)->get();

        return view("admin.payment.fees_detail", compact('colleges', 'courses', 'academy_sessions', 'student', 'student_fees'));
    }

    public function new_collection(Request $request) {
        $student = Student::find($request->student_id);
        return view("admin.payment.new_collection", compact('student'));
    }
}
