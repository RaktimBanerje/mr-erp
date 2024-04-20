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
                            Counselling History
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
                                            <option value="{{$course->id}}" <?php if($student->course_id == $course->id) {echo "selected";} ?>>{{$course->name}}</option>
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
                    @if(count($student->counsellings) > 0)
                    <div class="table-responsive">
                        <table class="table table-bordered border-1 border-black" style="border-right: 1px solid black;">
                            <thead>
                                <tr>
                                    <th class="text-nowrap">#</th>
                                    @if(auth()->user()->role != 'agent')
                                    <th class="text-nowrap">Counselling By</th>
                                    @endif
                                    <th class="text-nowrap">Proposed Fees</th>
                                    <th class="text-nowrap">Student Asking Fees</th>
                                    <th class="text-nowrap">Counselling Date</th>
                                    <th class="text-nowrap">Docs</th>    
                                </tr>    
                            </thead>    
                            <tbody>
                                @foreach($student->counsellings as $counselling)
                                    <tr>
                                        <td class="text-nowrap">#</td>
                                        @if(auth()->user()->role != 'agent')
                                        <td class="text-nowrap">{{$counselling->user_name}}</td>
                                        @endif
                                        <td class="text-nowrap">{{$counselling->proposed_fees}}</td>
                                        <td class="text-nowrap">{{$counselling->asking_fees}}</td>
                                        <td class="text-nowrap">{{date('d-m-Y', strtotime($counselling->created_at))}}</td>
                                        <td class="text-nowrap">
                                            <a href="{{Storage::url($counselling->docs)}}" target="_blank" class="btn btn-primary btn-sm">View</a>    
                                        </td>    
                                    </tr> 
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @else
                    <div class="text-center">
                        <img class="img-fluid" src="{{url('assets/media/illustrations/empty-box.png')}}" style="height: 300px; width: auto;" />
                        <h2 class="text-muted text-center mt-4">No Data Found</h2>
                    </div>
                    @endif
                </div>
                <!--end::Row-->

            </div>
            <!--end::Content container-->

        </div>
        <!--end::Content-->

    </div>
@stop