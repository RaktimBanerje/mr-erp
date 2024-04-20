@extends('layouts.app')

@section('content')
    <div class="d-flex flex-column flex-column-fluid mb-5">

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
                            Student Search
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
                <form action="" method="POST">
                    <div class="row gy-5 gx-xl-10 mb-5">
                        <div class="col-md-3">
                            <div class="form-group mb-4">
                                <label class="form-label">Unique Identity</label>
                                <input type="text" class="form-control" name="identity">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group mb-4">
                                <label class="form-label">College</label>
                                <select class="form-select" name="college_id" required>
                                    <option value="">Select</option>
                                    @foreach($colleges as $college)
                                        <option value="{{$college->id}}">{{$college->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group mb-4">
                                <label class="form-label">Course</label>
                                <select class="form-select" name="course_id" required>
                                    <option value="">Select</option>
                                    @foreach($courses as $course)
                                        <option value="{{$course->id}}">{{$course->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group mb-4">
                                <label class="form-label">Academy Session</label>
                                <select class="form-select" name="academy_session_id" required>
                                    <option value="">Select</option>
                                    @foreach($academy_sessions as $session)
                                        <option value="{{$session->id}}">{{$session->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div>
                            <button type="reset" class="btn btn-warning mx-1">Reset</button>
                            <button type="submit" class="btn btn-success mx-1">Search</button>
                        </div>
                    </div>
                </form>
                <!--end::Row-->
                
            </div>
            <!--end::Content container-->

        </div>
        <!--end::Content-->

    </div>

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
                            Counsellings Records
                        </h1>
                        <!--end::Title-->
                    </div>
                    <!--end::Page title-->
                    <!--begin::Actions-->
                    @if(auth()->user()->role == 'agent')
                    <div class="d-flex align-items-center gap-2 gap-lg-3">
                        <a href="{{route('agentstudent.create')}}" class="btn btn-flex btn-primary h-40px fs-7 fw-bold">
                            New Counselling
                        </a>
                    </div>
                    @endif
                    <!--end::Actions-->
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
                    @if(count($students) > 0)
                    <div class="table-responsive">
                        <table class="table table-bordered border-1 border-black" style="border-right: 1px solid black;">
                            <thead>
                                <tr>
                                    <th class="text-nowrap">#</th>
                                    <th class="text-nowrap">Unique Identity</th>
                                    <th class="text-nowrap">Name</th>
                                    <th class="text-nowrap">College</th>
                                    <th class="text-nowrap">Course</th>
                                    <th class="text-nowrap">Phone</th>
                                    <th class="text-nowrap">Last Counselling Date</th>    
                                    <th class="text-nowrap">Action</th>    
                                </tr>    
                            </thead>    
                            <tbody>
                                @foreach($students as $student)
                                    <tr>
                                        <td class="text-nowrap">{{$loop->iteration}}</td>
                                        <td class="text-nowrap">{{$student->identity}}</td>
                                        <td class="text-nowrap">{{$student->name}}</td>
                                        <td class="text-nowrap">{{$student->college->name}}</td>
                                        <td class="text-nowrap">{{$student->course->name}}</td>
                                        <td class="text-nowrap">{{$student->phone}}</td>
                                        <td class="text-nowrap">
                                            @isset($student->last_counselling)
                                            {{date('d-m-Y', strtotime($student->last_counselling->created_at))}}
                                            @endisset
                                        </td>
                                        <td class="text-nowrap">
                                            <div class="btn btn-group p-0">
                                                <a class="btn btn-sm btn-primary mx-1" href="{{route('counselling.index')}}?student_id={{$student->id}}">View</a>
                                                @if(auth()->user()->role == 'agent')
                                                <a class="btn btn-sm btn-primary mx-1" href="{{route('counselling.create')}}?student_id={{$student->id}}">Add New</a>
                                                @endif
                                            </div>
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
 