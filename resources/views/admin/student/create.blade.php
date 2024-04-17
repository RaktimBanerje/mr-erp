@extends('layouts.app')

@section('content')
    <form action="{{ route('admission.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="d-flex flex-column flex-column-fluid mb-5">

            <!--begin::Toolbar-->
            <div id="kt_app_toolbar" class="app-toolbar  pt-6 pb-2 ">

                <!--begin::Toolbar container-->
                <div id="kt_app_toolbar_container" class="app-container  container-fluid d-flex align-items-stretch ">
                    <!--begin::Toolbar wrapper-->
                    <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100">


                        <!--begin::Page title-->
                        <div class="page-title d-flex flex-column justify-content-center gap-1 me-3">
                            <!--begin::Title-->
                            <h1
                                class="page-heading d-flex flex-column justify-content-center text-gray-900 fw-bold fs-3 m-0">
                                New Admission
                            </h1>
                            <!--end::Title-->
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
                    <!--begin::Row-->
                    <div class="row gy-5 gx-xl-10 mb-5">
                        <div class="row justify-content-end">
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label class="form-label">Image</label>
                                    <input type="file" name="image" class="form-control" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group mb-3">
                                <label class="form-label">College</label>
                                <select class="form-select" name="college_id" required>
                                    <option value="">Select</option>
                                    @foreach ($colleges as $college)
                                        <option value="{{ $college->id }}">{{ $college->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group mb-3">
                                <label class="form-label">Course</label>
                                <select class="form-select" name="course_id" required>
                                    <option value="">Select</option>
                                    @foreach ($courses as $course)
                                        <option value="{{ $course->id }}">{{ $course->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group mb-3">
                                <label class="form-label">Academy Session</label>
                                <select class="form-select" name="academy_session_id" required>
                                    <option value="">Select</option>
                                    @foreach ($academy_sessions as $session)
                                        <option value="{{ $session->id }}">{{ $session->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group mb-3">
                                <label class="form-label">Student Name</label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group mb-3">
                                <label class="form-label">DOB</label>
                                <input type="date" class="form-control" name="dob" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group mb-3">
                                <label class="form-label">Aadhar Number</label>
                                <input type="text" class="form-control" name="aadhar" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group mb-3">
                                <label class="form-label">Email Address</label>
                                <input type="email" class="form-control" name="email" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group mb-3">
                                <label class="form-label">Phone No.</label>
                                <input type="text" class="form-control" name="phone" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group mb-3">
                                <label class="form-label">Additional Phone No.</label>
                                <input type="text" class="form-control" name="additional_phone_no" required>
                            </div>
                        </div>
                        
                    </div>
                    <!--end::Row-->
                </div>
                <!--end::Content container-->
            </div>
            <!--end::Content-->
        </div>

        <div class="d-flex flex-column flex-column-fluid mb-5">

            <!--begin::Content-->
            <div id="kt_app_content" class="app-content  flex-column-fluid ">

                <!--begin::Content container-->
                <div id="kt_app_content_container" class="app-container  container-fluid ">
                    <ul class="nav nav-pills nav-justified mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link tab-button active" id="pills-tab-1" data-bs-toggle="pill"
                                data-bs-target="#tab-1" type="button" role="tab" aria-controls="pills-home"
                                aria-selected="true">Family Details</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link tab-button" id="pills-tab-2" data-bs-toggle="pill"
                                data-bs-target="#tab-2" type="button" role="tab" aria-controls="pills-fees"
                                aria-selected="false" tabindex="-1">Address</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link tab-button" id="pills-tab-3" data-bs-toggle="pill"
                                data-bs-target="#tab-3" type="button" role="tab" aria-controls="pills-family"
                                aria-selected="false" tabindex="-1">Document</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link tab-button" id="pills-tab-4" data-bs-toggle="pill"
                                data-bs-target="#tab-4" type="button" role="tab" aria-controls="pills-curricular"
                                aria-selected="false" tabindex="-1">Fees Details</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade" id="tab-3" role="tabpanel">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group mb-3">
                                        <label class="form-label">10th Markesheet</label>
                                        <input type="file" class="form-control" name="ten_class_marksheet">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group mb-3">
                                        <label class="form-label">10th Admit Card</label>
                                        <input type="file" class="form-control" name="ten_class_admitcard">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group mb-3">
                                        <label class="form-label">10th Registration</label>
                                        <input type="file" class="form-control" name="ten_class_registration">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group mb-3">
                                        <label class="form-label">10th Certificate</label>
                                        <input type="file" class="form-control" name="ten_class_certificate">
                                    </div>
                                </div>

                                


                                <div class="col-md-3">
                                    <div class="form-group mb-3">
                                        <label class="form-label">12th Markesheet</label>
                                        <input type="file" class="form-control" name="twelve_class_marksheet">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group mb-3">
                                        <label class="form-label">12th Admit Card</label>
                                        <input type="file" class="form-control" name="twelve_class_admitcard">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group mb-3">
                                        <label class="form-label">12th Registration</label>
                                        <input type="file" class="form-control" name="twelve_class_registration">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group mb-3">
                                        <label class="form-label">12th Certificate</label>
                                        <input type="file" class="form-control" name="twelve_class_certificate">
                                    </div>
                                </div>




                                <div class="col-md-3">
                                    <div class="form-group mb-3">
                                        <label class="form-label">Aadhar Card</label>
                                        <input type="file" class="form-control" name="aadhar">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group mb-3">
                                        <label class="form-label">Caste Certificate</label>
                                        <input type="file" class="form-control" name="caste_certificate">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group mb-3">
                                        <label class="form-label">School Leaving Certificate</label>
                                        <input type="file" class="form-control" name="school_leaving_certificate">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group mb-3">
                                        <label class="form-label">WBJEE Rank Card</label>
                                        <input type="file" class="form-control" name="wbjee_rank_card">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end::Content container-->

            </div>
            <!--end::Content-->
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
    </form>
@stop
