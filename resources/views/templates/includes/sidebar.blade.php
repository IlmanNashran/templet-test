@php
    $currentUrl = request()->url();
@endphp


<div id="kt_app_sidebar" class="app-sidebar flex-column bg-custom-gradient" data-kt-drawer="true" data-kt-drawer-name="app-sidebar" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="250px" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle">
    <div class="app-sidebar-header d-flex flex-stack d-none d-lg-flex pt-8 pb-2" id="kt_app_sidebar_header">
        <!--begin::Logo-->
        <a href="{{ route('home') }}" class="app-sidebar-logo">
            <h1 style="color:yellow;"><span class="italic-logo">e-</span>Aduan</h1>
        </a>
        <!--end::Logo-->
        <!--begin::Sidebar toggle-->
        <div id="kt_app_sidebar_toggle" class="app-sidebar-toggle btn btn-sm btn-icon bg-light btn-color-gray-700 btn-active-color-primary d-none d-lg-flex rotate" data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body" data-kt-toggle-name="app-sidebar-minimize">
            <i class="ki-outline ki-text-align-right rotate-180 fs-1"></i>
        </div>
        <!--end::Sidebar toggle-->
    </div>
    <!--begin::Navs-->
    <div class="app-sidebar-navs flex-column-fluid py-6" id="kt_app_sidebar_navs">
        <div id="kt_app_sidebar_navs_wrappers" class="app-sidebar-wrapper hover-scroll-y my-2" data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_app_sidebar_header" data-kt-scroll-wrappers="#kt_app_sidebar_navs" data-kt-scroll-offset="10px">
            <!--begin::Sidebar menu-->
            <div id="kt_app_sidebar_menu" data-kt-menu="true" data-kt-menu-expand="false" class="app-sidebar-menu-primary menu menu-column menu-rounded menu-sub-indention menu-state-bullet-primary p-4">
                
                <!--begin::Heading-->
                <div class="menu-item mb-2">
                    <div class="menu-heading text-uppercase fs-7 fw-bold text-white">SISTEM ADUAN KEROSAKAN FGVIC</div>
                    <!--begin::Separator-->
                    <div class="app-sidebar-separator separator"></div>
                    <!--end::Separator-->
                </div>
                <!--end::Heading-->

                <!--begin:Menu item-->
                <div data-kt-menu-trigger="click" class="menu-item here menu-accordion">
                    <!--begin:Menu link-->
                    <span class="menu-link">
                        <span class="menu-title">Dashboard</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <!--end:Menu link-->
                    <!--begin:Menu sub-->
                    <div class="menu-sub menu-sub-accordion">
                        
                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link" href="{{ route('home') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Home</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->

                    </div>
                    <!--end:Menu sub-->
                </div>
                <!--end:Menu item-->

                 <!--begin:Menu item-->
                 <div data-kt-menu-trigger="click" class="menu-item here menu-accordion">
                    <!--begin:Menu link-->
                    <span class="menu-link">
                        <span class="menu-title">Aduan</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <!--end:Menu link-->
                    <!--begin:Menu sub-->
                    <div class="menu-sub menu-sub-accordion">

                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link" href="{{route('complaints.index')}}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Semua Aduan</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->
                        
                        <!--begin:Menu item-->
                        @if(auth()->user()->role === 'technician' || auth()->user()->role === 'manager' || auth()->user()->role === 'supervisor')
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link" href="{{ route('new-complaints.index') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Baharu</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                        @endif
                        <!--end:Menu item-->

                        <!--begin:Menu item-->
                        @if(auth()->user()->role === 'technician' || auth()->user()->role === 'supervisor')
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link" href="{{ route('responded-complaints.index') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Dijawab</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                        @endif
                        <!--end:Menu item-->

                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link"  href="{{ route('to-rate-complaints.index') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Untuk Dinilai</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->

                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <!-- <a class="menu-link" href="#">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Selesai</span>
                            </a> -->
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->

                        <!--begin:Menu item-->
                        @if(auth()->user()->role === 'technician' || auth()->user()->role === 'manager' || auth()->user()->role === 'supervisor')
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link" href="{{ route('kiv-complaints.index') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">KIV</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                        @endif
                        <!--end:Menu item-->

                    </div>
                    <!--end:Menu sub-->
                </div>
                <!--end:Menu item-->

                @if(auth()->user()->role === 'manager' || auth()->user()->role === 'supervisor')
                <!--begin:Menu item-->
                <div data-kt-menu-trigger="click" class="menu-item here menu-accordion">
                    <!--begin:Menu link-->
                    <span class="menu-link">
                        <span class="menu-title">Laporan</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <!--end:Menu link-->
                    <!--begin:Menu sub-->
                    <div class="menu-sub menu-sub-accordion">
                        
                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link" href="{{ route('reports.category') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Aduan mengikut kategori</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->

                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link" href="{{ route('reports.status') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Aduan mengikut PIC</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->

                    </div>
                    <!--end:Menu sub-->
                </div>
                <!--end:Menu item-->
                @endif

                @if(auth()->user()->role === 'manager' || auth()->user()->role === 'supervisor')
                <!--begin:Menu item-->
                <div data-kt-menu-trigger="click" class="menu-item here menu-accordion">
                    <!--begin:Menu link-->
                    <span class="menu-link">
                        <span class="menu-title">Konfigurasi</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <!--end:Menu link-->
                    <!--begin:Menu sub-->
                    <div class="menu-sub menu-sub-accordion">
                        
                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link" href="#">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Pengguna</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->

                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link" href="#">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Kategori</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->

                    </div>
                    <!--end:Menu sub-->
                </div>
                <!--end:Menu item-->
                @endif

            </div>
            <!--end::Sidebar menu-->
        </div>
    </div>
    <!--end::Navs-->
</div>

<script>
    // Get the current URL
    var currentUrl = window.location.href;

    // Get all menu items with accordion
    var menuAccordions = document.querySelectorAll('.menu-accordion');

    // Loop through menu items with accordion
    menuAccordions.forEach(function(accordion) {
        // Get all menu links within the accordion
        var menuLinks = accordion.querySelectorAll('.menu-link');

        // Loop through menu links
        menuLinks.forEach(function(link) {
            if (link.getAttribute('href') === currentUrl) {
                // Add "active" class to the parent menu item
                var parentItem = link.closest('.menu-item');
                parentItem.classList.add('active');

                // Add "show" class to the parent menu item
                accordion.classList.add('show');
            }
        });
    });
</script>


@php
    $currentUrl = request()->url();
@endphp


<style>
    /* Existing styles remain unchanged */

    .bg-custom-gradient {
        background: url('{{ asset("images/fgvic-overlay.jpg") }}') center center no-repeat;
    }

    #kt_app_sidebar .app-sidebar-menu-primary .menu-link {
        color: white; /* Set the text color to white */
    }

    #kt_app_sidebar .app-sidebar-menu-primary .menu-link:hover {
        color: white; /* Set the text color to white on hover */
    }

    #kt_app_sidebar .app-sidebar-menu-primary .menu-item.active {
        background-color: #800000;
        border-radius: 5px; /* Adjust the border-radius value as needed */
        color: white !important;
    }

    #kt_app_sidebar .app-sidebar-menu-primary .menu-item.active .menu-title {
        color: white !important;
    }

    #kt_app_sidebar .app-sidebar-menu-primary .menu-title {
        color: white;
    }

    .app-sidebar-logo {
        padding: 10px; /* Add padding for better appearance */
        text-align: center; /* Center the text */
        display: block; /* Make the logo a block-level element */
        text-decoration: none; /* Remove underline from the link */
    }

    .italic-logo {
        font-weight: bold; /* Adjust font weight as needed */
        font-style: italic;
        color: yellow;
    }
</style>

