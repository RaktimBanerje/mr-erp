 <!--begin::Sidebar-->
 <div id="kt_app_sidebar" class="app-sidebar  flex-column " data-kt-drawer="true" data-kt-drawer-name="app-sidebar"
     data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="250px"
     data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle">

     <!--begin::Wrapper-->
     <div class="app-sidebar-wrapper">
         <div id="kt_app_sidebar_wrapper" class="hover-scroll-y my-5 my-lg-2 mx-4" data-kt-scroll="true"
             data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto"
             data-kt-scroll-dependencies="#kt_app_header" data-kt-scroll-wrappers="#kt_app_sidebar_wrapper"
             data-kt-scroll-offset="5px">

             <!--begin::Sidebar menu-->
             <div id="#kt_app_sidebar_menu" data-kt-menu="true" data-kt-menu-expand="false"
                 class="app-sidebar-menu-primary menu menu-column menu-rounded menu-sub-indention menu-state-bullet-primary px-3 mb-5">
                 <div class="aside-toolbar flex-column-auto" id="kt_aside_toolbar">
                     <!--begin::Aside user-->
                     <!--begin::User-->
                     <div class="aside-user d-flex align-items-sm-center justify-content-center py-5">
                         <!--begin::Symbol-->
                         <div class="symbol symbol-50px">
                             <img src="{{ url('assets/media/avatars/300-2.jpg') }}" alt="">
                         </div>
                         <!--end::Symbol-->

                         <!--begin::Wrapper-->
                         <div class="aside-user-info flex-row-fluid flex-wrap ms-5">
                             <!--begin::Section-->
                             <div class="d-flex">
                                 <!--begin::Info-->
                                 <div class="flex-grow-1 me-2">
                                     <!--begin::Username-->
                                     <a href="#" class="text-dark text-hover-primary fs-6 fw-bold">{{auth()->user()->name}}</a>
                                     <!--end::Username-->

                                     <!--begin::Description-->
                                     <span class="text-gray-600 fw-semibold d-block fs-8 mb-1">{{strtoupper(auth()->user()->role)}}</span>
                                     <!--end::Description-->

                                     <!--begin::Label-->
                                     <div class="d-flex align-items-center text-success fs-9">
                                         <span class="bullet bullet-dot bg-success me-1"></span>online
                                     </div>
                                     <!--end::Label-->
                                 </div>
                                 <!--end::Info-->
                             </div>
                             <!--end::Section-->
                         </div>
                         <!--end::Wrapper-->
                     </div>
                     <!--end::User-->

                     <!--begin::Aside search-->
                     <div class="aside-search py-5">

                         <!--begin::Search-->
                         <div id="kt_header_search" class="header-search d-flex align-items-center w-100"
                             data-kt-search-keypress="true" data-kt-search-min-length="2"
                             data-kt-search-enter="enter" data-kt-search-layout="menu"
                             data-kt-search-responsive="false" data-kt-menu-trigger="auto"
                             data-kt-menu-permanent="true" data-kt-menu-placement="bottom-start"
                             data-kt-search="true">

                             <!--begin::Tablet and mobile search toggle-->
                             <div data-kt-search-element="toggle"
                                 class="search-toggle-mobile d-flex d-lg-none align-items-center">
                                 <div class="d-flex ">
                                     <i class="ki-duotone ki-magnifier fs-1 "><span class="path1"></span><span
                                             class="path2"></span></i>
                                 </div>
                             </div>
                             <!--end::Tablet and mobile search toggle-->
                         </div>
                         <!--end::Search-->
                     </div>
                     <!--end::Aside search-->
                     <!--end::Aside user-->
                 </div>
                 <!--begin:Menu item-->
                 <hr>
                 <div class="menu-item pt-5"><!--begin:Menu content-->
                     <div class="menu-content"><span class="menu-heading fw-bold text-uppercase fs-7">Help</span>
                     </div><!--end:Menu content-->
                 </div>
                 <!--end:Menu item-->

                 <!--begin:Menu item-->
                 <div class="menu-item"><!--begin:Menu link--><a class="menu-link"
                         href="{{route('leadsource.index')}}"><span class="menu-icon"><i
                                 class="ki-duotone ki-abstract-13 fs-2"><span class="path1"></span><span
                                     class="path2"></span></i></span><span class="menu-title">Lead Source</span></a><!--end:Menu link--></div>
                 <!--end:Menu item-->

             </div>
             <!--end::Sidebar menu-->
         </div>
     </div>
     <!--end::Wrapper-->
 </div>
 <!--end::Sidebar-->
