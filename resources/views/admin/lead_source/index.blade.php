@extends('layouts.crm')

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
                            Lead Sources
                        </h1>
                        <!--end::Title-->
                    </div>
                    <!--end::Page title-->
                    <!--begin::Actions-->
                    <div class="d-flex align-items-center gap-2 gap-lg-3">
                        <a href="#" class="btn btn-flex btn-primary h-40px fs-7 fw-bold" data-bs-toggle="modal" data-bs-target="#kt_modal_create_app">
                            New Source
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
                    <div class="row gy-5 gx-xl-10 mb-5">
                        @if(count($sources) > 0)
                        @foreach($sources as $source)
                            <div class="col-md-3">
                                <div class="card">
                                    <img class="card-img-top" src="{{Storage::url($source->image)}}" style="height: 64px; width: auto;">
                                    <div class="card-body">
                                        <h4 class="card-title">{{$source->name}}</h4>
                                        <p class="card-text text-muted" style="font-size: 12px;">{{$source->identity}}</p>
                                    </div>
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
                </div>
                <!--end::Row-->

            </div>
            <!--end::Content container-->

        </div>
        <!--end::Content-->

    </div>


    <div class="modal fade" id="kt_modal_create_app" tabindex="-1" aria-hidden="true" style="display: none;">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered mw-900px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header">
                    <!--begin::Modal title-->
                    <h2>Create Lead Source</h2>
                    <!--end::Modal title-->

                    <!--begin::Close-->
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <i class="ki-outline ki-cross fs-1"></i>
                    </div>
                    <!--end::Close-->
                </div>
                <!--end::Modal header-->

                <!--begin::Modal body-->
                <div class="modal-body py-lg-10 px-lg-10">
                    <!--begin::Stepper-->
                    <div class="stepper stepper-pills stepper-column d-flex flex-column flex-xl-row flex-row-fluid"
                        id="kt_modal_create_app_stepper" data-kt-stepper="true">
                        <!--begin::Aside-->
                        <div class="d-flex justify-content-center justify-content-xl-start flex-row-auto w-100 w-xl-300px">
                            <!--begin::Nav-->
                            <div class="stepper-nav ps-lg-10">
                                <!--begin::Step 1-->
                                <div class="stepper-item current" data-kt-stepper-element="nav">
                                    <!--begin::Wrapper-->
                                    <div class="stepper-wrapper">
                                        <!--begin::Icon-->
                                        <div class="stepper-icon w-40px h-40px">
                                            <i class="ki-outline ki-check stepper-check fs-2"></i> <span
                                                class="stepper-number">1</span>
                                        </div>
                                        <!--end::Icon-->

                                        <!--begin::Label-->
                                        <div class="stepper-label">
                                            <h3 class="stepper-title">
                                                Details
                                            </h3>

                                            <div class="stepper-desc">
                                                Name your Source
                                            </div>
                                        </div>
                                        <!--end::Label-->
                                    </div>
                                    <!--end::Wrapper-->

                                    <!--begin::Line-->
                                    <div class="stepper-line h-40px"></div>
                                    <!--end::Line-->
                                </div>
                                <!--end::Step 1-->

                                <!--begin::Step 2-->
                                <div class="stepper-item" data-kt-stepper-element="nav">
                                    <!--begin::Wrapper-->
                                    <div class="stepper-wrapper">
                                        <!--begin::Icon-->
                                        <div class="stepper-icon w-40px h-40px">
                                            <i class="ki-outline ki-check stepper-check fs-2"></i> <span
                                                class="stepper-number">2</span>
                                        </div>
                                        <!--begin::Icon-->

                                        <!--begin::Label-->
                                        <div class="stepper-label">
                                            <h3 class="stepper-title">
                                                Channel
                                            </h3>

                                            <div class="stepper-desc">
                                                Define your source channel
                                            </div>
                                        </div>
                                        <!--begin::Label-->
                                    </div>
                                    <!--end::Wrapper-->

                                    <!--begin::Line-->
                                    <div class="stepper-line h-40px"></div>
                                    <!--end::Line-->
                                </div>
                                <!--end::Step 2-->

                                <!--begin::Step 3-->
                                <div class="stepper-item" data-kt-stepper-element="nav">
                                    <!--begin::Wrapper-->  
                                    <div class="stepper-wrapper">
                                        <!--begin::Icon-->
                                        <div class="stepper-icon w-40px h-40px">
                                            <i class="ki-outline ki-check stepper-check fs-2"></i>                                        <span class="stepper-number">3</span>
                                        </div>
                                        <!--end::Icon-->
    
                                        <!--begin::Label-->
                                        <div class="stepper-label">
                                            <h3 class="stepper-title">
                                                Create Form
                                            </h3>
    
                                            <div class="stepper-desc">
                                                Create your form
                                            </div>
                                        </div>
                                        <!--end::Label-->
                                    </div>
                                    <!--end::Wrapper--> 
                
                                    <!--begin::Line-->
                                    <div class="stepper-line h-40px"></div>
                                    <!--end::Line-->                            
                                </div>
                                <!--end::Step 3-->

                                 <!--begin::Step 4-->
                                 <div class="stepper-item" data-kt-stepper-element="nav">
                                    <!--begin::Wrapper-->  
                                    <div class="stepper-wrapper">
                                        <!--begin::Icon-->
                                        <div class="stepper-icon w-40px h-40px">
                                            <i class="ki-outline ki-check stepper-check fs-2"></i>                                        <span class="stepper-number">3</span>
                                        </div>
                                        <!--end::Icon-->
    
                                        <!--begin::Label-->
                                        <div class="stepper-label">
                                            <h3 class="stepper-title">
                                               Source Key
                                            </h3>
    
                                            <div class="stepper-desc">
                                                Your source key
                                            </div>
                                        </div>
                                        <!--end::Label-->
                                    </div>
                                    <!--end::Wrapper--> 
                
                                    <!--begin::Line-->
                                    <div class="stepper-line h-40px"></div>
                                    <!--end::Line-->                            
                                </div>
                                <!--end::Step 4-->

                                <!--begin::Step 5-->
                                <div class="stepper-item mark-completed" data-kt-stepper-element="nav">
                                    <!--begin::Wrapper-->
                                    <div class="stepper-wrapper">
                                        <!--begin::Icon-->
                                        <div class="stepper-icon w-40px h-40px">
                                            <i class="ki-outline ki-check stepper-check fs-2"></i> <span
                                                class="stepper-number">3</span>
                                        </div>
                                        <!--end::Icon-->

                                        <!--begin::Label-->
                                        <div class="stepper-label">
                                            <h3 class="stepper-title">
                                                Completed
                                            </h3>

                                            <div class="stepper-desc">
                                                All Done
                                            </div>
                                        </div>
                                        <!--end::Label-->
                                    </div>
                                    <!--end::Wrapper-->
                                </div>
                                <!--end::Step 5-->
                            </div>
                            <!--end::Nav-->
                        </div>
                        <!--begin::Aside-->

                        <!--begin::Content-->
                        <div class="flex-row-fluid py-lg-5 px-lg-15">
                            <!--begin::Form-->
                            <form action="{{route('leadsource.store')}}" method="POST" class="form fv-plugins-bootstrap5 fv-plugins-framework" novalidate="novalidate"
                                id="kt_modal_create_app_form" enctype="multipart/form-data">
                            @csrf
                                <!--begin::Step 1-->
                                <div class="current" data-kt-stepper-element="content">
                                    <div class="w-100">
                                        <!--begin::Input group-->
                                        <div class="fv-row mb-10 fv-plugins-icon-container">
                                            <!--begin::Label-->
                                            <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                                                <span class="required">Source Icon</span>


                                                <span class="ms-1" data-bs-toggle="tooltip"
                                                    aria-label="Specify your unique app name"
                                                    data-bs-original-title="Specify your unique app name"
                                                    data-kt-initialized="1">
                                                    <i class="ki-outline ki-information-5 text-gray-500 fs-6"></i></span>
                                            </label>
                                            <!--end::Label-->

                                            <!--begin::Input-->
                                            <input type="file" class="form-control form-control-lg form-control-solid"
                                                name="image" placeholder="" value="">
                                            <!--end::Input-->
                                            <div
                                                class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                            </div>
                                        </div>
                                        <!--end::Input group-->

                                         <!--begin::Input group-->
                                         <div class="fv-row mb-10 fv-plugins-icon-container">
                                            <!--begin::Label-->
                                            <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                                                <span class="required">Source Name</span>


                                                <span class="ms-1" data-bs-toggle="tooltip"
                                                    aria-label="Specify your unique app name"
                                                    data-bs-original-title="Specify your unique app name"
                                                    data-kt-initialized="1">
                                                    <i class="ki-outline ki-information-5 text-gray-500 fs-6"></i></span>
                                            </label>
                                            <!--end::Label-->

                                            <!--begin::Input-->
                                            <input type="text" class="form-control form-control-lg form-control-solid"
                                                name="name" placeholder="" value="">
                                            <!--end::Input-->
                                            <div
                                                class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                            </div>
                                        </div>
                                        <!--end::Input group-->
                                    </div>
                                </div>
                                <!--end::Step 1-->

                                <!--begin::Step 2-->
                                <div data-kt-stepper-element="content">
                                    <div class="w-100">
                                        <!--begin::Input group-->
                                        <div class="fv-row fv-plugins-icon-container">
                                            <!--begin::Label-->
                                            <label class="d-flex align-items-center fs-5 fw-semibold mb-4">
                                                <span class="required">Select Channel</span>


                                                <span class="ms-1" data-bs-toggle="tooltip"
                                                    aria-label="Specify your apps framework"
                                                    data-bs-original-title="Specify your apps framework"
                                                    data-kt-initialized="1">
                                                    <i class="ki-outline ki-information-5 text-gray-500 fs-6"></i></span>
                                            </label>
                                            <!--end::Label-->

                                            <!--begin:Option-->
                                            <label class="d-flex flex-stack cursor-pointer mb-5">
                                                <!--begin:Label-->
                                                <span class="d-flex align-items-center me-2">
                                                    <!--begin:Icon-->
                                                    <span class="symbol symbol-50px me-6">
                                                        <span class="symbol-label bg-light-warning">
                                                            <i class="ki-outline ki-html fs-2x text-warning"></i>
                                                        </span>
                                                    </span>
                                                    <!--end:Icon-->

                                                    <!--begin:Info-->
                                                    <span class="d-flex flex-column">
                                                        <span class="fw-bold fs-6">Webhook</span>

                                                        <span class="fs-7 text-muted">Your Custom Webhook</span>
                                                    </span>
                                                    <!--end:Info-->
                                                </span>
                                                <!--end:Label-->

                                                <!--begin:Input-->
                                                <span class="form-check form-check-custom form-check-solid">
                                                    <input class="form-check-input" type="radio" checked=""
                                                        name="channel" value="1">
                                                </span>
                                                <!--end:Input-->
                                            </label>
                                            <!--end::Option-->
                                            <div
                                                class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                            </div>
                                        </div>
                                        <!--end::Input group-->
                                    </div>
                                </div>
                                <!--end::Step 2-->

                                <!--begin::Step 3-->
                                <div data-kt-stepper-element="content">
                                    <div class="w-100">
                                        <!--begin::Input group-->
                                        <div class="fv-row mb-10 fv-plugins-icon-container">
                                            <!--begin::Label-->
                                            <label class="required fs-5 fw-semibold mb-2">
                                                Create Form
                                            </label>
                                            <!--end::Label-->

                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>Label</th>
                                                            <th>Key</th>
                                                            <th>Input type</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="tbody">
                                                        <tr>
                                                            <td>
                                                                <input type="text" class="form-control" placeholder="Label" name="label[]">
                                                            </td>
                                                            <td>
                                                                <input type="text" class="form-control" placeholder="Key" name="key[]"> 
                                                            </td>
                                                            <td>
                                                                <select class="form-select" name="type[]">
                                                                    <option value="text">Text</option>
                                                                    <option value="number">Number</option>
                                                                </select>
                                                            </td>
                                                            <td>
                                                                <button type="button" class="btn btn-sm btn-danger deleteRowBtn">X</button>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>

                                            <button type="button" class="btn btn-sm btn-primary addBtn">Add New</button>
                                            <div
                                                class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                            </div>
                                        </div>
                                        <!--end::Input group-->
                                    </div>
                                </div>
                                <!--end::Step 3-->

                                <!--begin::Step 4-->
                                <div data-kt-stepper-element="content">
                                    <div class="w-100">
                                        <!--begin::Input group-->
                                        <div class="fv-row mb-10 fv-plugins-icon-container">
                                            <!--begin::Label-->
                                            <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                                                <span class="required">Source Key</span>

                                                <span class="ms-1" data-bs-toggle="tooltip"
                                                    aria-label="Specify your unique app name"
                                                    data-bs-original-title="Specify your unique app name"
                                                    data-kt-initialized="1">
                                                    <i class="ki-outline ki-information-5 text-gray-500 fs-6"></i></span>
                                            </label>
                                            <!--end::Label-->

                                            <!--begin::Input with Generate and Copy Button-->
                                            <div class="input-group">
                                                <input type="text" class="form-control form-control-lg form-control-solid" id="generatedValue"
                                                    name="identity" placeholder="" value="" readonly>
                                                <div class="input-group-append">
                                                    <button class="btn btn-success" type="button" id="generateAndCopyBtn">Copy</button>
                                                </div>
                                            </div>
                                            <!--end::Input with Generate and Copy Button-->
                                            <div
                                                class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                            </div>
                                        </div>
                                        <!--end::Input group-->
                                    </div>
                                </div>
                                <!--end::Step 4-->

                                <!--begin::Step 5-->
                                <div data-kt-stepper-element="content">
                                    <div class="w-100 text-center">
                                        <!--begin::Heading-->
                                        <h1 class="fw-bold text-gray-900 mb-3">Release!</h1>
                                        <!--end::Heading-->

                                        <!--begin::Description-->
                                        <div class="text-muted fw-semibold fs-3">
                                           Your Lead Source is created
                                        </div>
                                        <!--end::Description-->

                                        <!--begin::Illustration-->
                                        <div class="text-center px-4 py-15">
                                            <img src="/metronic8/demo39/assets/media/illustrations/sketchy-1/9.png"
                                                alt="" class="mw-100 mh-300px">
                                        </div>
                                        <!--end::Illustration-->
                                    </div>
                                </div>
                                <!--end::Step 5-->

                                <!--begin::Actions-->
                                <div class="d-flex flex-stack pt-10">
                                    <!--begin::Wrapper-->
                                    <div class="me-2">
                                        <button type="button" class="btn btn-lg btn-light-primary me-3"
                                            data-kt-stepper-action="previous">
                                            <i class="ki-outline ki-arrow-left fs-3 me-1"></i> Back
                                        </button>
                                    </div>
                                    <!--end::Wrapper-->

                                    <!--begin::Wrapper-->
                                    <div>
                                        <button id="btnSubmit" type="submit" class="btn btn-primary d-none">Submit</button>
                                        
                                        <button onclick="$('#btnSubmit').click()" type="button" class="btn btn-lg btn-primary"
                                            data-kt-stepper-action="submit">
                                            <span class="indicator-label">
                                                Submit
                                                <i class="ki-outline ki-arrow-right fs-3 ms-2 me-0"></i> </span>
                                            <span class="indicator-progress">
                                                Please wait... <span
                                                    class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                            </span>
                                        </button>

                                        <button type="button" class="btn btn-lg btn-primary"
                                            data-kt-stepper-action="next">
                                            Continue
                                            <i class="ki-outline ki-arrow-right fs-3 ms-1 me-0"></i> </button>
                                    </div>
                                    <!--end::Wrapper-->
                                </div>
                                <!--end::Actions-->
                            </form>
                            <!--end::Form-->
                        </div>
                        <!--end::Content-->
                    </div>
                    <!--end::Stepper-->
                </div>
                <!--end::Modal body-->
            </div>
            <!--end::Modal content-->
        </div>
        <!--end::Modal dialog-->
    </div>

    <script>
        $(document).ready(function() {
            // Function to delete a row
            $(document).on("click", ".deleteRowBtn", function(){
                $(this).closest("tr").remove();
            });


            $(document).on("click", ".addBtn", function() {
                $("#tbody").append(`
                    <tr>
                        <td>
                            <input type="text" class="form-control" placeholder="Label" name="label[]">
                        </td>
                        <td>
                            <input type="text" class="form-control" placeholder="Key" name="key[]"> 
                        </td>
                        <td>
                            <select class="form-select" name="type[]">
                                <option value="text">Text</option>
                                <option value="number">Number</option>
                            </select>
                        </td>
                        <td>
                            <button type="button" class="btn btn-sm btn-danger deleteRowBtn">X</button>
                        </td>
                    </tr>`)
            })
            
        })

        $(document).ready(function(){
            var generatedString = generateAlphanumericString();
            $("#generatedValue").val(generatedString);
            
            $("#generateAndCopyBtn").click(function(){
                copyToClipboard("#generatedValue");
            });
        });
        

        function generateAlphanumericString() {
            var chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            var length = 26; // Adjust length as needed
            var result = 'LS-'; // Start with LS
            for (var i = length; i > 0; --i) {
                result += chars[Math.floor(Math.random() * chars.length)];
            }
            return result;
        }

        function copyToClipboard(element) {
            var $temp = $("<input>");
            $("body").append($temp);
            $temp.val($(element).val()).select();
            document.execCommand("copy");
            $temp.remove()
            alert("Copied to clipboard!");
        }
    </script>
@stop
