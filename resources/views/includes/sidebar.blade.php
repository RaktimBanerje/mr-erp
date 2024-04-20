 <!--begin::Sidebar-->
 <div id="kt_app_sidebar" class="app-sidebar  flex-column " data-kt-drawer="true"
 data-kt-drawer-name="app-sidebar" data-kt-drawer-activate="{default: true, lg: false}"
 data-kt-drawer-overlay="true" data-kt-drawer-width="250px" data-kt-drawer-direction="start"
 data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle">

 <!--begin::Wrapper-->
 <div class="app-sidebar-wrapper">
     <div id="kt_app_sidebar_wrapper" class="hover-scroll-y my-5 my-lg-2 mx-4" data-kt-scroll="true"
         data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto"
         data-kt-scroll-dependencies="#kt_app_header"
         data-kt-scroll-wrappers="#kt_app_sidebar_wrapper" data-kt-scroll-offset="5px">

         <!--begin::Sidebar menu-->
         <div id="#kt_app_sidebar_menu" data-kt-menu="true" data-kt-menu-expand="false"
             class="app-sidebar-menu-primary menu menu-column menu-rounded menu-sub-indention menu-state-bullet-primary px-3 mb-5">

            <!--begin:Menu item-->
            <div data-kt-menu-trigger="click" class="menu-item here show menu-accordion">
                <!--begin:Menu link--><span class="menu-link"><span class="menu-icon"><i
                            class="ki-outline ki-home-2 fs-2"></i></span><span
                        class="menu-title">Admission</span><span class="menu-arrow"></span></span>
                <!--end:Menu link-->
                <!--begin:Menu sub-->
                <div class="menu-sub menu-sub-accordion">
                    <!--begin:Menu item-->
                    <div class="menu-item">
                        <!--begin:Menu link--><a class="menu-link"
                            href="{{ route('admission.create') }}"><span
                                class="menu-bullet"><span
                                    class="bullet bullet-dot"></span></span><span
                                class="menu-title">New Admission</span></a>
                        <!--end:Menu link-->
                    </div>
                    <!--end:Menu item-->
                    <!--begin:Menu item-->
                    <div class="menu-item">
                        <!--begin:Menu link--><a class="menu-link"
                            href="{{ route('admission.index') }}"><span
                                class="menu-bullet"><span
                                    class="bullet bullet-dot"></span></span><span
                                class="menu-title">Admission List</span></a>
                        <!--end:Menu link-->
                    </div>
                    <!--end:Menu item-->
                    <!--begin:Menu item-->
                    <div class="menu-item">
                        <!--begin:Menu link--><a class="menu-link"
                            href=""><span
                                class="menu-bullet"><span
                                    class="bullet bullet-dot"></span></span><span
                                class="menu-title">Student Search</span></a>
                        <!--end:Menu link-->
                    </div>
                    <!--end:Menu item-->
                </div>
                <!--end:Menu sub-->
            </div>
            <!--end:Menu item-->

            <!--begin:Menu item-->
            <div data-kt-menu-trigger="click" class="menu-item here menu-accordion">
                <!--begin:Menu link--><span class="menu-link"><span class="menu-icon"><i
                            class="ki-outline ki-home-2 fs-2"></i></span><span
                        class="menu-title">Payment</span><span class="menu-arrow"></span></span>
                <!--end:Menu link-->
                <!--begin:Menu sub-->
                <div class="menu-sub menu-sub-accordion">
                    <!--begin:Menu item-->
                    <div class="menu-item">
                        <!--begin:Menu link--><a class="menu-link"
                            href="{{route('payment.create')}}"><span
                                class="menu-bullet"><span
                                    class="bullet bullet-dot"></span></span><span
                                class="menu-title">New Payment</span></a>
                        <!--end:Menu link-->
                    </div>
                    <!--end:Menu item-->
                    <!--begin:Menu item-->
                    <div class="menu-item">
                        <!--begin:Menu link--><a class="menu-link"
                            href="{{route('payment.index')}}"><span
                                class="menu-bullet"><span
                                    class="bullet bullet-dot"></span></span><span
                                class="menu-title">Payment List</span></a>
                        <!--end:Menu link-->
                    </div>
                    <!--end:Menu item-->
                    <!--begin:Menu item-->
                    <div class="menu-item">
                        <!--begin:Menu link--><a class="menu-link"
                            href=""><span
                                class="menu-bullet"><span
                                    class="bullet bullet-dot"></span></span><span
                                class="menu-title">Payment Search</span></a>
                        <!--end:Menu link-->
                    </div>
                    <!--end:Menu item-->
                    <!--begin:Menu item-->
                     <div class="menu-item">
                        <!--begin:Menu link-->
                        <a class="menu-link"
                            href="{{route('payment.index')}}?payment_mode=CASH"><span
                                class="menu-bullet"><span
                                    class="bullet bullet-dot"></span></span><span
                                class="menu-title">Cash Payment</span></a>
                        <!--end:Menu link-->
                    </div>
                    <!--end:Menu item-->

                    <!--begin:Menu item-->
                    <div class="menu-item">
                        <!--begin:Menu link-->
                        <a class="menu-link"
                            href="{{route('payment.index')}}?payment_mode=CHEQUE"><span
                                class="menu-bullet"><span
                                    class="bullet bullet-dot"></span></span><span
                                class="menu-title">Cheque Payment</span></a>
                        <!--end:Menu link-->
                    </div>
                    <!--end:Menu item-->

                    <!--begin:Menu item-->
                    <div class="menu-item">
                        <!--begin:Menu link-->
                        <a class="menu-link"
                            href="{{route('payment.index')}}?payment_mode=DIRECT"><span
                                class="menu-bullet"><span
                                    class="bullet bullet-dot"></span></span><span
                                class="menu-title">Direct Payment</span></a>
                        <!--end:Menu link-->
                    </div>
                    <!--end:Menu item-->
                </div>
                <!--end:Menu sub-->
            </div>
            <!--end:Menu item-->
             
            <!--begin:Menu item-->
            <div data-kt-menu-trigger="click" class="menu-item here menu-accordion">
                <!--begin:Menu link--><span class="menu-link"><span class="menu-icon"><i
                            class="ki-outline ki-home-2 fs-2"></i></span><span
                        class="menu-title">Report</span><span class="menu-arrow"></span></span>
                <!--end:Menu link-->
                <!--begin:Menu sub-->
                <div class="menu-sub menu-sub-accordion">
                    <!--begin:Menu item-->
                    <div class="menu-item">
                        <!--begin:Menu link-->
                        <a class="menu-link"
                            href="#"><span
                                class="menu-bullet"><span
                                    class="bullet bullet-dot"></span></span><span
                                class="menu-title">Daily Collection Report</span></a>
                        <!--end:Menu link-->
                    </div>
                    <!--end:Menu item-->
                    <!--begin:Menu item-->
                    <div class="menu-item">
                        <!--begin:Menu link-->
                        <a class="menu-link"
                            href="#"><span
                                class="menu-bullet"><span
                                    class="bullet bullet-dot"></span></span><span
                                class="menu-title">College Wise Earnings</span></a>
                        <!--end:Menu link-->
                    </div>
                    <!--end:Menu item-->
                    <!--begin:Menu item-->
                    <div class="menu-item">
                        <!--begin:Menu link-->
                        <a class="menu-link"
                            href="#"><span
                                class="menu-bullet"><span
                                    class="bullet bullet-dot"></span></span><span
                                class="menu-title">Payment Search</span></a>
                        <!--end:Menu link-->
                    </div>
                    <!--end:Menu item-->
                </div>
                <!--end:Menu sub-->
            </div>
            <!--end:Menu item-->
             
         </div>
         <!--end::Sidebar menu-->
     </div>
 </div>
 <!--end::Wrapper-->
</div>
<!--end::Sidebar-->