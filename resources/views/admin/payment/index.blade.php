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
                            Payment Records
                        </h1>
                        <!--end::Title-->
                    </div>
                    <!--end::Page title-->
                    <!--begin::Actions-->
                    <div class="d-flex align-items-center gap-2 gap-lg-3">
                        <a href="{{route('payment.create')}}" class="btn btn-flex btn-primary h-40px fs-7 fw-bold">
                            New Payment
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
                    <div class="table-responsive">
                        <table class="table table-bordered border-1 border-black" style="border-right: 1px solid black;">
                            <thead>
                                <tr>
                                    <th class="text-nowrap">#</th>
                                    <th class="text-nowrap">Name</th>
                                    <th class="text-nowrap">Payment Amount</th>
                                    <th class="text-nowrap">Payment Mode</th>
                                    <th class="text-nowrap">Payment Docs</th>
                                    <th class="text-nowrap">Action</th>    
                                </tr>    
                            </thead>    
                            <tbody>
                                @foreach($payments as $payment)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$payment->student->name}}</td>
                                    <td>{{number_format($payment->payment_amount, 2)}} INR</td>
                                    <td>{{$payment->payment_mode}}</td>
                                    <td>
                                        <a target="_blank" href="{{Storage::url($payment->docs)}}"><strong>View</strong></a>
                                    </td>
                                    <td>
                                        <div class="btn btn-group p-0">
                                            <button class="btn btn-sm btn-primary">See Details</button>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>    
                    </div>                                    
                </div>
                <!--end::Row-->
                
            </div>
            <!--end::Content container-->

        </div>
        <!--end::Content-->

    </div>
@stop
 