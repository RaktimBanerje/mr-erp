@extends('layouts.crm')

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
                            Lead Status
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
                    <div class="col-md-6">
                        @if(count($records) > 0)
                        <div class="table-responsive">
                            <table class="table table-sm table-bordered border-1 border-black" style="border-right: 1px solid black;">
                                <thead>
                                    <tr>
                                        <th class="text-nowrap">#</th>
                                        <th class="text-nowrap">Title</th>
                                        <th class="text-nowrap">Color</th>
                                    </tr>    
                                </thead>    
                                <tbody>
                                    @foreach($records as $record)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$record->title}}</td>
                                        <td>
                                            <span class="d-block" style="background-color: {{$record->color}}; height: 30px;"></span>
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
                </div>
                <!--end::Row-->
                
            </div>
            <!--end::Content container-->

        </div>
        <!--end::Content-->

    </div>
@stop
 