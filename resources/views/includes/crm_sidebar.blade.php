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
                
                <!--begin:Menu item-->
                <div class="menu-item"><!--begin:Menu link--><a class="menu-link"
                         href="{{route('contacts.index')}}"><span class="menu-icon"><i
                                 class="ki-duotone ki-abstract-13 fs-2"><span class="path1"></span><span
                                     class="path2"></span></i></span><span class="menu-title">Dashboard</span></a><!--end:Menu link--></div>
                <!--end:Menu item-->
                
                <!--begin:Menu item-->
                <div class="menu-item"><!--begin:Menu link--><a class="menu-link"
                    href="{{route('leadstatus.index')}}"><span class="menu-icon"><i
                            class="ki-duotone ki-abstract-13 fs-2"><span class="path1"></span><span
                                class="path2"></span></i></span><span class="menu-title">Lead Status</span></a><!--end:Menu link--></div>
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
