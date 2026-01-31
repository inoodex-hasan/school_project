<!DOCTYPE html>
<html>

<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8" />
    <title>School Management System</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Site favicon -->
    <link rel="icon" type="image/png" sizes="16x16" href="/assets_admin/vendors/images/favicon-16x16.png" />

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet" />
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="/assets_admin/vendors/styles/core.css" />
    <link rel="stylesheet" type="text/css" href="/assets_admin/vendors/styles/icon-font.min.css" />
    <link rel="stylesheet" type="text/css" href="/assets_admin/src/plugins/jvectormap/jquery-jvectormap-2.0.3.css" />
    <link rel="stylesheet" type="text/css" href="/assets_admin/vendors/styles/style.css" />
    <link rel="stylesheet" href="{{ asset('assets/modules/summernote/summernote-lite.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    @stack('styles')

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag("js", new Date());

        gtag("config", "UA-119386393-1");
    </script>
</head>

<body>


    <div class="header">
        <div class="header-left">
            <div class="menu-icon dw dw-menu"></div>
            <div class="search-toggle-icon dw dw-search2" data-toggle="header_search"></div>
            <div class="header-search">
                <form>
                    <div class="form-group mb-0">
                        <i class="dw dw-search2 search-icon"></i>
                        <input type="text" class="form-control search-input" placeholder="Search Here" />
                    </div>
                </form>
            </div>
        </div>
        <div class="header-right">
            <!-- <div class="dashboard-setting user-notification">
                <div class="dropdown">
                    <a class="dropdown-toggle no-arrow" href="javascript:;" data-toggle="right-sidebar">
                        <i class="dw dw-settings2"></i>
                    </a>
                </div>
            </div> -->
            <!-- <div class="user-notification">
                <div class="dropdown">
                    <a class="dropdown-toggle no-arrow" href="#" role="button" data-toggle="dropdown">
                        <i class="dw dw-notification"></i>
                        <span class="badge notification-active"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <div class="notification-list mx-h-350 customscroll">
                            <ul>
                                <li>
                                    <a href="#">
                                        <img src="/assets_admin/vendors/images/photo1.jpg" alt="" />
                                        <h3>{{ Auth::user()->name }}</h3>

                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div> -->
            <div class="user-info-dropdown">
                <div class="dropdown">
                    <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                        <span class="user-icon"><img src="/assets_admin/vendors/images/photo1.jpg" alt="" /></span>
                        <span class="user-name">{{ Auth::user()->name }}</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                        <a class="dropdown-item" href="{{ route('admin.dashboard') }}"><i class="dw dw-user1"></i>
                            Profile</a>
                        {{-- <a class="dropdown-item" href="profile.html"><i class="dw dw-settings2"></i> Setting</a>
                        --}}
                        <a href="{{ route('logout.get') }}" class="dropdown-item">
                            <i class="dw dw-logout"></i> Log Out
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="right-sidebar">
        <div class="sidebar-title">
            <h3 class="weight-600 font-16 text-blue">
                Layout Settings
                <span class="btn-block font-weight-400 font-12">User Interface Settings</span>
            </h3>
            <div class="close-sidebar" data-toggle="right-sidebar-close">
                <i class="icon-copy ion-close-round"></i>
            </div>
        </div>
        <div class="right-sidebar-body customscroll">
            <div class="right-sidebar-body-content">
                <h4 class="weight-600 font-16 pb-10">Header Background</h4>
                <div class="sidebar-btn-group pb-30 mb-10">
                    <a href="javascript:void(0)" class="btn btn-outline-primary header-white active">White</a>
                    <a href="javascript:void(0)" class="btn btn-outline-primary header-dark">Dark</a>
                </div>
                <h4 class="weight-600 font-16 pb-10">Sidebar Background</h4>
                <div class="sidebar-btn-group pb-30 mb-10">
                    <a href="javascript:void(0)" class="btn btn-outline-primary sidebar-light ">Light</a>
                    <a href="javascript:void(0)" class="btn btn-outline-primary sidebar-dark active">Dark</a>
                </div>
            </div>
        </div>
    </div>

    @include('admin.sidebar')

    <div class="mobile-menu-overlay"></div>

    <div class="main-container">
        <div class="pd-ltr-20">
            @yield('content')
        </div>
    </div>

    <!-- js -->
    <script src="/assets_admin/vendors/scripts/core.js"></script>
    <script src="/assets_admin/vendors/scripts/script.min.js"></script>
    <script src="/assets_admin/vendors/scripts/process.js"></script>
    <script src="/assets_admin/vendors/scripts/layout-settings.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-lite.js"></script>
    <script src="/assets_admin/src/plugins/jvectormap/jquery-jvectormap-2.0.3.min.js"></script>
    <script src="/assets_admin/src/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="/assets_admin/vendors/scripts/jvectormap-settings.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function () {
            // Initialize Summernote for textareas with class 'summernote'
            $('.summernote').summernote({
                placeholder: 'Write something...',
                tabsize: 2,
                height: 300,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'italic', 'underline', 'clear']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['insert', ['link']]
                ]
            });
        });
    </script>

    <script>
        function toggleDropdown(element) {
            // Get the parent dropdown and submenu
            const dropdown = element.parentElement;
            const submenu = dropdown.querySelector('.submenu');

            // Check if the dropdown is already active
            const isActive = dropdown.classList.contains('active');

            // Check if this dropdown is active due to current route
            const isRouteActive = dropdown.dataset.routeActive === 'true';

            // If this dropdown is route-active, don't close it
            if (isRouteActive && isActive) {
                return; // Keep it open
            }

            // Close all other dropdowns
            document.querySelectorAll('.dropdown').forEach((otherDropdown) => {
                if (otherDropdown !== dropdown) {
                    otherDropdown.classList.remove('active');
                    otherDropdown.dataset.openedByClick = 'false';
                    const otherSubmenu = otherDropdown.querySelector('.submenu');
                    if (otherSubmenu) {
                        otherSubmenu.style.display = 'none';
                    }
                }
            });

            // Toggle the current dropdown
            if (!isActive) {
                dropdown.classList.add('active');
                dropdown.dataset.openedByClick = 'true';
                submenu.style.display = 'block';
            } else {
                dropdown.classList.remove('active');
                dropdown.dataset.openedByClick = 'false';
                submenu.style.display = 'none';
            }
        }

        // Initialize the active dropdown based on the current route
        document.addEventListener('DOMContentLoaded', () => {
            document.querySelectorAll('.dropdown.active').forEach((activeDropdown) => {
                // Mark as route-active so it won't close on toggle click
                activeDropdown.dataset.routeActive = 'true';
                const submenu = activeDropdown.querySelector('.submenu');
                if (submenu) {
                    submenu.style.display = 'block';
                }
            });
        });

        // Close dropdowns when clicking outside, except for the route-based active one
        document.addEventListener('click', (event) => {
            const isClickInsideDropdown = event.target.closest('.dropdown');
            if (!isClickInsideDropdown) {
                document.querySelectorAll('.dropdown').forEach((dropdown) => {
                    // Only close dropdowns that were manually opened (not route-based)
                    const wasOpenedByClick = dropdown.dataset.openedByClick === 'true';
                    if (wasOpenedByClick) {
                        dropdown.classList.remove('active');
                        dropdown.dataset.openedByClick = 'false';
                        const submenu = dropdown.querySelector('.submenu');
                        if (submenu) {
                            submenu.style.display = 'none';
                        }
                    }
                });
            }
        });
    </script>

    <script>
        // Format current month + year
        const options = {
            month: 'long',
            year: 'numeric'
        };
        const today = new Date().toLocaleDateString('en-US', options);

        // Set dynamic date inside dropdown button
        document.getElementById("dateDropdown").innerText = today;
    </script>

    @if (session('success') || session('error'))
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                let toast = document.createElement('div');
                toast.innerText = "{{ session('success') ?? session('error') }}";
                toast.style.position = 'fixed';
                toast.style.bottom = '20px';
                toast.style.right = '20px';
                toast.style.background =
                    "{{ session('success') ? '#28a745' : '#dc3545' }}"; // green if success, red if error
                toast.style.color = '#fff';
                toast.style.padding = '12px 20px';
                toast.style.borderRadius = '8px';
                toast.style.boxShadow = '0 2px 6px rgba(0,0,0,0.2)';
                toast.style.zIndex = '9999';
                toast.style.fontFamily = 'Arial, sans-serif';
                toast.style.fontSize = '14px';
                document.body.appendChild(toast);

                setTimeout(() => {
                    toast.remove();
                }, 3000);
            });
        </script>
    @endif

    @stack('scripts')
</body>

</html>