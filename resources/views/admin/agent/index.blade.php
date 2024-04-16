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
                                            Counsellings Records
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
                                    <!--begin::Actions-->
                                    <div class="d-flex align-items-center gap-2 gap-lg-3">
                                        <a href="{{route('agentstudent.create')}}" class="btn btn-flex btn-primary h-40px fs-7 fw-bold">
                                            New Counselling
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
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th class="text-nowrap">#</th>
                                                    <th class="text-nowrap">Name</th>
                                                    <th class="text-nowrap">College</th>
                                                    <th class="text-nowrap">Course</th>
                                                    <th class="text-nowrap">Last Counselling Date</th>    
                                                </tr>    
                                            </thead>    
                                            <tbody>
                                                @foreach($students as $student)
                                                    <tr>
                                                        <td class="text-nowrap">{{$loop->iteration}}</td>
                                                        <td class="text-nowrap">{{$student->name}}</td>
                                                        <td class="text-nowrap">{{$student->college->name}}</td>
                                                        <td class="text-nowrap">{{$student->course->name}}</td>
                                                        <td class="text-nowrap">{{date('d-m-Y', strtotime($student->last_counselling->created_at))}}</td>
                                                        <td class="text-nowrap">
                                                            <div class="btn btn-group">
                                                                <a class="btn btn-sm btn-primary mx-1" href="{{route('counselling.index')}}">View</a>
                                                                <a class="btn btn-sm btn-primary mx-1" href="{{route('counselling.create')}}">Add New</a>
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
