@extends('layouts.app')

@section('content')
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
                        <h1 class="page-heading d-flex flex-column justify-content-center text-gray-900 fw-bold fs-3 m-0">
                            Fees Details - {{ $student->name }}
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
                <div class="row">
                    @if(count($student_fees) > 0)
                    @foreach ($student_fees as $fees)
                        <div class="col-md-6">
                            <div class="border border-hover-primary p-7 rounded mb-7">
                                <!--begin::Info-->
                                <div class="d-flex flex-stack pb-3">
                                    <!--begin::Info-->
                                    <div class="d-flex">
                                        <!--begin::Avatar-->
                                        <div class="symbol symbol-circle symbol-45px">
                                            <img src="{{Storage::url($student->image)}}" alt="">
                                        </div>
                                        <!--end::Avatar-->

                                        <!--begin::Details-->
                                        <div class="ms-5">
                                            <!--begin::Name-->
                                            <div class="d-flex align-items-center">
                                                <a href="/metronic8/demo39/pages/user-profile/overview.html"
                                                    class="text-gray-900 fw-bold text-hover-primary fs-5 me-4">{{$student->name}}</a>


                                                <!--begin::Label-->
                                                {{-- <span
                                                    class="badge badge-light-success d-flex align-items-center fs-8 fw-semibold">
                                                    <i class="ki-outline ki-star fs-8 text-success me-1"></i>
                                                    {{$fees->payment_for}}
                                                </span> --}}
                                                <!--end::Label-->
                                            </div>
                                            <!--end::Name-->

                                            <!--begin::Desc-->
                                            <span class="text-muted fw-semibold mb-3">{{$fees->payment_for}}</span>
                                            <!--end::Desc-->
                                        </div>
                                        <!--end::Details-->
                                    </div>
                                    <!--end::Info-->

                                    <!--begin::Stats-->
                                    <div clas="d-flex">
                                        <!--begin::Price-->
                                        <div class="text-end pb-3">
                                            <span class="text-gray-900 fw-bold fs-5">{{number_format($fees->payment_amount, 2)}} INR</span>
                                        </div>
                                        <!--end::Price-->
                                    </div>
                                    <!--end::Stats-->
                                </div>
                                <!--end::Info-->

                                <!--begin::Wrapper-->
                                <div class="p-0">
                                    <!--begin::Section-->
                                    <div class="d-flex flex-column">
                                        <!--begin::Text-->
                                        <p class="text-gray-700 fw-semibold fs-6 mb-4">Payment For: {{$fees->payment_for}} | Total Amount: {{number_format($fees->payment_amount, 2)}} INR | Due Amount: {{number_format($fees->payment_amount, 2)}}</p>
                                        <!--end::Text-->

                                        <!--begin::Tags-->
                                        <div class="d-flex text-gray-700 fw-semibold fs-7">
                                            <!--begin::Tag-->
                                            <span class="border border-2 rounded me-3 p-1 px-2">Art Director</span>
                                            <!--end::Tag-->
                                            <!--begin::Tag-->
                                            <span class="border border-2 rounded me-3 p-1 px-2">UX</span>
                                            <!--end::Tag-->
                                            <!--begin::Tag-->
                                            <span class="border border-2 rounded me-3 p-1 px-2">Laravel</span>
                                            <!--end::Tag-->
                                        </div>
                                        <!--end::Tags-->
                                    </div>
                                    <!--end::Section-->

                                    <!--begin::Footer-->
                                    <div class="d-flex flex-column">
                                        <!--begin::Separator-->
                                        <div class="separator separator-dashed border-muted my-5"></div>
                                        <!--end::Separator-->

                                        <!--begin::Action-->
                                        <div class="d-flex flex-stack">
                                            <!--begin::Progress-->
                                            <div class="d-flex flex-column w-100">
                                                <div class="d-flex align-items-center mb-2">
                                                    <span class="text-gray-700 fs-6 fw-semibold me-2">
                                                        90%
                                                    </span>

                                                    <span class="text-muted fs-8">Job Success</span>
                                                </div>

                                                <div class="progress h-10px w-100">
                                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 90%"
                                                        aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <!--end::Progress-->
                                        </div>
                                        <!--end::Action-->
                                    </div>
                                    <!--end::Footer-->
                                </div>
                                <!--end::Wrapper-->
                            </div>
                        </div>
                    @endforeach
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
