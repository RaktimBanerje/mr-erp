@extends('layouts.app')

@section('content')
    <div class="d-flex flex-column flex-column-fluid">

        <!--begin::Toolbar-->
        <div id="kt_app_toolbar" class="app-toolbar  pt-6 pb-2 ">

            <!--begin::Toolbar container-->
            <div id="kt_app_toolbar_container"
                class="app-container  container-fluid d-flex align-items-stretch ">
                <!--begin::Toolbar wrapper-->
                <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100">


                    <!--begin::Page title-->
                    <div class="page-title d-flex flex-column justify-content-center gap-1 me-3">
                        <!--begin::Title-->
                        <h1 class="page-heading d-flex flex-column justify-content-center text-gray-900 fw-bold fs-3 m-0">
                            New Counselling
                        </h1>
                    </div>
                    <!--end::Page title-->
                </div>
                <!--end::Toolbar wrapper-->
            </div>
            <!--end::Toolbar container-->
        </div>
        <!--end::Toolbar-->

        <!--begin::Content-->
        <div id="kt_app_content" class="app-content  flex-column-fluid ">

            <!--begin::Content container-->
            <div id="kt_app_content_container" class="app-container  container-fluid ">
                
                <form action="{{route('counselling.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!--begin::Row-->
                    <div class="row gy-5 gx-xl-10 mb-5">
                        <div class="col-md-3">
                            <div class="form-group mb-4">
                                <label class="form-label">Student Image</label>
                                <img class="img-fluid" src="{{Storage::url($student->image)}}" />
                            </div>
                        </div>

                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group mb-4">
                                        <label class="form-label">College</label>
                                        <select class="form-select" name="college_id" disabled readonly required>
                                            <option value="">Select</option>
                                            @foreach($colleges as $college)
                                                <option value="{{$college->id}}" <?php if($student->college_id == $college->id) {echo "selected";} ?>>{{$college->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-4">
                                        <label class="form-label">Course</label>
                                        <select class="form-select" name="course_id" disabled readonly required>
                                            <option value="">Select</option>
                                            @foreach($courses as $course)
                                                <option value="{{$course->id}}" <?php if($student->course == $course->id) {echo "selected";} ?>>{{$course->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-4">
                                        <label class="form-label">Academy Session</label>
                                        <select class="form-select" name="academy_session_id" disabled readonly required>
                                            <option value="">Select</option>
                                            @foreach($academy_sessions as $session)
                                                <option value="{{$session->id}}" <?php if($student->academy_session_id == $session->id) {echo "selected";} ?>>{{$session->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group mb-4">
                                        <label class="form-label">Unique Identity</label>
                                        <input type="text" class="form-control" name="identity" value="{{$student->identity}}" disabled readonly required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-4">
                                        <label class="form-label">Student Name</label>
                                        <input type="text" class="form-control" name="name" value="{{$student->name}}" disabled readonly required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-4">
                                        <label class="form-label">DOB</label>
                                        <input type="date" class="form-control" name="dob" value="{{$student->dob}}" disabled readonly required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-4">
                                        <label class="form-label">Phone No.</label>
                                        <input type="text" class="form-control" name="phone" value="{{$student->phone}}" disabled readonly required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-4">
                                        <label class="form-label">Additional Phone No.</label>
                                        <input type="text" class="form-control" name="additional_phone_no" value="{{$student->additional_phone_no}}" disabled readonly required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end::Row-->

                    <!--begin::Row-->
                    <div class="row gy-5 gx-xl-10 my-5">
                        <div class="col-md-4">
                            <div class="form-group mb-4">
                                <label class="form-label">Proposed Fees</label>
                                <input type="text" class="form-control" name="proposed_fees" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group mb-4">
                                <label class="form-label">Asking Fees</label>
                                <input type="text" class="form-control" name="asking_fees" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group mb-4">
                                <label class="form-label">Docs</label>
                                <input type="file" class="form-control" name="docs" required>
                            </div>
                        </div>
                    </div>
                    <!--end::Row-->
                    
                    <input type="text" class="d-none" name="student_id" value="{{$student->id}}" required>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
                
            </div>
            <!--end::Content container-->

        </div>
        <!--end::Content-->

    </div>
@stop