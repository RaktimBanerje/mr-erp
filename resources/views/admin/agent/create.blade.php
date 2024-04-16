<!DOCTYPE html>
<html lang="en">

<head>
    <title>Metronic - The World's #1 Selling Bootstrap Admin Template by KeenThemes</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />

    <link href="../assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
    <link href="../assets/plugins/custom/vis-timeline/vis-timeline.bundle.css" rel="stylesheet" type="text/css" />

    <link href="../assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/style.bundle.css" rel="stylesheet" type="text/css" />

</head>
<!--end::Head-->

<!--begin::Body-->

<body id="kt_app_body" data-kt-app-header-fixed="true" data-kt-app-header-fixed-mobile="true"
    data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-hoverable="true"
    data-kt-app-sidebar-push-toolbar="true" data-kt-app-sidebar-push-footer="true" data-kt-app-toolbar-enabled="true"
    data-kt-app-aside-enabled="true" data-kt-app-aside-fixed="true" data-kt-app-aside-push-toolbar="true"
    data-kt-app-aside-push-footer="true" class="app-default">
    <!--begin::Theme mode setup on page load-->
    <script>
        var defaultThemeMode = "light";
        var themeMode;

        if (document.documentElement) {
            if (document.documentElement.hasAttribute("data-bs-theme-mode")) {
                themeMode = document.documentElement.getAttribute("data-bs-theme-mode");
            } else {
                if (localStorage.getItem("data-bs-theme") !== null) {
                    themeMode = localStorage.getItem("data-bs-theme");
                } else {
                    themeMode = defaultThemeMode;
                }
            }

            if (themeMode === "system") {
                themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
            }

            document.documentElement.setAttribute("data-bs-theme", themeMode);
        }
    </script>

    <!--begin::App-->
    <div class="d-flex flex-column flex-root app-root" id="kt_app_root">
        <!--begin::Page-->
        <div class="app-page  flex-column flex-column-fluid " id="kt_app_page">


           @include('includes.header') 
            <!--begin::Wrapper-->
            <div class="app-wrapper  flex-column flex-row-fluid " id="kt_app_wrapper">

                @include('includes.sidebar')

                <!--begin::Main-->
                <div class="app-main flex-column flex-row-fluid " id="kt_app_main">
                    <!--begin::Content wrapper-->
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
                                        <h1
                                            class="page-heading d-flex flex-column justify-content-center text-gray-900 fw-bold fs-3 m-0">
                                            New Counselling
                                        </h1>
                                        <!--end::Title-->

                                        {{-- <!--begin::Breadcrumb-->
                                        <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0">
                                            <!--begin::Item-->
                                            <li class="breadcrumb-item text-muted">
                                                <a href="https://preview.keenthemes.com/metronic8/demo39/index.html"
                                                    class="text-muted text-hover-primary">
                                                    Home </a>
                                            </li>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <li class="breadcrumb-item">
                                                <span class="bullet bg-gray-500 w-5px h-2px"></span>
                                            </li>
                                            <!--end::Item-->

                                            <!--begin::Item-->
                                            <li class="breadcrumb-item text-muted">
                                                Dashboards </li>
                                            <!--end::Item-->

                                        </ul>
                                        <!--end::Breadcrumb--> --}}
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
                                
                                <form action="{{route('agentstudent.store')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <!--begin::Row-->
                                    <div class="row gy-5 gx-xl-10 mb-5">
                                        <div class="col-md-3">
                                            <div class="form-group mb-4">
                                                <label class="form-label">Student Image</label>
                                                <input type="file" class="form-control" name="image" required>
                                            </div>
                                        </div>

                                        <div class="col-md-9">
                                            <div class="row">
                                                <div class="col-md-4">
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
                                                <div class="col-md-4">
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
                                                <div class="col-md-4">
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

                                                <div class="col-md-4">
                                                    <div class="form-group mb-4">
                                                        <label class="form-label">Unique Identity</label>
                                                        <input type="text" class="form-control" name="identity" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group mb-4">
                                                        <label class="form-label">Student Name</label>
                                                        <input type="text" class="form-control" name="name" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group mb-4">
                                                        <label class="form-label">DOB</label>
                                                        <input type="date" class="form-control" name="dob" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group mb-4">
                                                        <label class="form-label">Phone No.</label>
                                                        <input type="text" class="form-control" name="phone" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group mb-4">
                                                        <label class="form-label">Additional Phone No.</label>
                                                        <input type="text" class="form-control" name="additional_phone_no" required>
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

                                    <button type="submit" class="btn btn-primary">Save</button>
                                </form>
                                
                            </div>
                            <!--end::Content container-->

                        </div>
                        <!--end::Content-->

                    </div>
                    <!--end::Content wrapper-->

                    @include('includes.footer')
                    
                </div>
                <!--end:::Main-->

                @include('includes.aside')

            </div>
            <!--end::Wrapper-->

        </div>
        <!--end::Page-->
    </div>
    <!--end::App-->

    <!--begin::Global Javascript Bundle(mandatory for all pages)-->
    <script src="../assets/plugins/global/plugins.bundle.js"></script>
    <script src="../assets/js/scripts.bundle.js"></script>
    <!--end::Global Javascript Bundle-->

    <!--begin::Vendors Javascript(used for this page only)-->
    <script src="../assets/plugins/custom/datatables/datatables.bundle.js"></script>
    <script src="../assets/plugins/custom/vis-timeline/vis-timeline.bundle.js"></script>

    <script src="../assets/js/widgets.bundle.js"></script>
    <script src="../assets/js/custom/widgets.js"></script>
    <script src="../assets/js/custom/apps/chat/chat.js"></script>
    <script src="../assets/js/custom/utilities/modals/upgrade-plan.js"></script>
    <script src="../assets/js/custom/utilities/modals/create-campaign.js"></script>
    <script src="../assets/js/custom/utilities/modals/new-address.js"></script>
    <script src="../assets/js/custom/utilities/modals/users-search.js"></script>
</body>
</html>
