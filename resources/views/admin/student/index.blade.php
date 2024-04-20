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
                            Admission Database
                        </h1>
                        <!--end::Title-->
                    </div>
                    <!--end::Page title-->
                    <!--begin::Actions-->
                    <div class="d-flex align-items-center gap-2 gap-lg-3">
                        <a href="{{route('admission.create')}}" class="btn btn-flex btn-primary h-40px fs-7 fw-bold">
                            New Admission
                        </a>
                    </div>
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
                                    <th class="text-nowrap">Name</th>
                                    <th class="text-nowrap">College</th>
                                    <th class="text-nowrap">Course</th>
                                    <th class="text-nowrap">Academy Session</th>
                                    <th class="text-nowrap">Email</th>
                                    <th class="text-nowrap">Phone</th>    
                                    <th class="text-nowrap">Admission Date</th>    
                                    <th class="text-nowrap">Action</th>    
                                </tr>    
                            </thead>    
                            <tbody>
                                @foreach($students as $student)
                                    <tr>
                                        <td class="text-nowrap">{{$loop->iteration}}</td>
                                        <td class="text-nowrap">{{$student->name}}</td>
                                        <td class="text-nowrap">{{$student->college->name}}</td>
                                        <td class="text-nowrap">{{$student->course->name}}</td>
                                        <td class="text-nowrap">{{$student->academy_session->name}}</td>
                                        <td class="text-nowrap">{{$student->email}}</td>
                                        <td class="text-nowrap">{{$student->phone}}</td>
                                        <td class="text-nowrap">
                                            {{date('d-m-Y', strtotime($student->created_at))}}
                                        </td>
                                        <td class="text-nowrap">
                                            <div class="btn btn-group p-0">
                                                <a class="btn btn-sm btn-primary mx-1" href="#">Edit</a>
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
 