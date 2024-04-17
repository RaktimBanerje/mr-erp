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
                    
                    {{-- <!--begin::Actions-->
                    @if(auth()->user()->role == 'agent handler')
                    <form action="" method="POST">
                        <div class="d-flex align-items-center gap-2 gap-lg-3">
                            @csrf
                            <select class="form-select" name="agent_id">
                                <option value="">Select</option>
                                @foreach($users as $user)
                                    <option value="{{$user->id}}">{{$user->name}}</option>
                                @endforeach
                            </select>

                            <button class="btn btn-sm btn-primary text-nowrap">Save as Winner Agent</button>
                        </div>
                    </form>
                    @endif
                    <!--end::Actions--> --}}
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
                <div class="row gy-5 gx-xl-10 my-5">
                    @foreach($records as $record)
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-2">
                                        <img class="img-fluid" src="{{Storage::url($record->student_image)}}" />
                                    </div>
                                    <div class="col-md-3">
                                        <p><strong>Name:</strong> {{$record->student_name}}</p>
                                        <p><strong>DOB:</strong> {{date("d-m-Y", strtotime($record->student_dob))}}</p>
                                        <p><strong>Phone:</strong> {{$record->student_phone}}</p>
                                        <p><strong>Additional Phone:</strong> {{$record->student_additional_phone_no}}</p>
                                    </div>
                                    <div class="col-md-3">
                                        <p><strong>Proposed Fees:</strong> {{number_format($record->counselling_proposed_fees, 2)}} INR</p>
                                        <p><strong>Asking Fees:</strong> {{number_format($record->counselling_asking_fees, 2)}} INR</p>
                                        <p><strong>Document:</strong> <a target="_blank" href="{{Storage::url($record->counselling_docs)}}">View Here</a></p>
                                        <p><strong>Date:</strong> {{date("d-m-Y", strtotime($record->counselling_created_at))}}</p>
                                    </div>
                                    <div class="col-md-3">
                                        <p><strong>Agent Name:</strong> {{$record->user_name}}</p>
                                        <p><strong>Email:</strong> <a target="_blank" href="mailto:{{$record->user_email}}">{{$record->user_email}}</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <!--end::Row-->

            </div>
            <!--end::Content container-->

        </div>
        <!--end::Content-->

    </div>
@stop