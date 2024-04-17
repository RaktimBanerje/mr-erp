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

    <style>
        /* 
        .nav-pills-button {
            border: 1px solid grey !important; 
            background-color: antiquewhite !important; 
            color: black !important;
        } */

        .nav-link.tab-button {
            border: 1px solid grey !important;
            font-weight: bold; 
            background-color: whitesmoke !important; 
            color: black !important; 
            height: 100% !important;
            transition: 0.5s !important;
        }

        .nav-link.tab-button:hover {
            color: dodgerblue !important; 
            background-color: aliceblue !important;
            transition: 0.5s !important;
        }

        .nav-link.tab-button.active {
            border: 1px solid dodgerblue !important;
            color: white !important; 
            background-color: dodgerblue !important;
        }
        
        textarea, input, select {
            border: 0.5px solid #d8eafa !important;
            color: black !important;
            border-radius: 4px !important;
        }


        textarea, input[type=text], input[type=email], input[type=number], input[type=date], select {
            background-color: #d8eafa !important;
        }

        textarea, input[type=text]:focus, input[type=email]:focus, input[type=number]:focus, input[type=date]:focus, select:focus {
            border: 1px solid dodgerblue !important;
            background-color: #d8eafa !important;
        }

        textarea, input:disabled, select:disabled {
            opacity: 0.6 !important;
            background-color: whitesmoke !important;
        }

        .input-disabled {
            pointer-events: none !important;
            opacity: 0.6 !important;
            background-color: whitesmoke !important;
            border: 1px solid grey !important;;
        }
    </style>

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
                    @yield('content')

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
