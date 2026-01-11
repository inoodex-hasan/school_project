<!DOCTYPE html>
<html>

<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8" />
    <title>School Management System</title>

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
                        <!-- <div class="dropdown">
                <a
                  class="dropdown-toggle no-arrow"
                  href="#"
                  role="button"
                  data-toggle="dropdown"
                >
                  <i class="ion-arrow-down-c"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                  <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label"
                      >From</label
                    >
                    <div class="col-sm-12 col-md-10">
                      <input
                        class="form-control form-control-sm form-control-line"
                        type="text"
                      />
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">To</label>
                    <div class="col-sm-12 col-md-10">
                      <input
                        class="form-control form-control-sm form-control-line"
                        type="text"
                      />
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label"
                      >Subject</label
                    >
                    <div class="col-sm-12 col-md-10">
                      <input
                        class="form-control form-control-sm form-control-line"
                        type="text"
                      />
                    </div>
                  </div>
                  <div class="text-right">
                    <button class="btn btn-primary">Search</button>
                  </div>
                </div>
              </div> -->
                    </div>
                </form>
            </div>
        </div>
        <div class="header-right">

            <div class="user-info-dropdown">
                <div class="dropdown">
                    <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                        <span class="user-icon">
                            <img src="/assets_admin/vendors/images/photo1.jpg" alt="" />
                        </span>
                        <span class="user-name">Inoodex</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                        <a class="dropdown-item" href="profile.html"><i class="dw dw-user1"></i> Profile</a>
                        <a class="dropdown-item" href="profile.html"><i class="dw dw-settings2"></i> Setting</a>
                        <a class="dropdown-item" href="faq.html"><i class="dw dw-help"></i> Help</a>
                        <a href="{{ route('logout') }}" class="dropdown-item">
                            <i class="dw dw-logout"></i> Log Out
                        </a>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Sidebar -->
    @include('admin.sidebar')
    <div class="mobile-menu-overlay"></div>
    <!-- Main Content -->
    <div class="main-container">
        @yield('content')
    </div>

    <!-- js -->
    <script src="/assets_admin/vendors/scripts/core.js"></script>
    <script src="{{ asset('assets/modules/summernote/summernote-lite.js') }}"></script>
    <script src="/assets_admin/vendors/scripts/script.min.js"></script>
    <script src="/assets_admin/vendors/scripts/process.js"></script>
    <script src="/assets_admin/vendors/scripts/layout-settings.js"></script>
    <script src="/assets_admin/src/plugins/jQuery-Knob-master/jquery.knob.min.js"></script>
    <script src="/assets_admin/src/plugins/highcharts-6.0.7/code/highcharts.js"></script>
    <script src="/assets_admin/src/plugins/highcharts-6.0.7/code/highcharts-more.js"></script>
    <script src="/assets_admin/src/plugins/jvectormap/jquery-jvectormap-2.0.3.min.js"></script>
    <script src="/assets_admin/src/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="/assets_admin/vendors/scripts/dashboard2.js"></script>

    <script>
        function toggleDropdown(element) {
            // Get the parent dropdown and submenu
            const dropdown = element.parentElement;
            const submenu = dropdown.querySelector('.submenu');

            // Check if the dropdown is already active
            const isActive = dropdown.classList.contains('active');

            // Close all other dropdowns
            document.querySelectorAll('.dropdown').forEach((otherDropdown) => {
                if (otherDropdown !== dropdown) {
                    otherDropdown.classList.remove('active');
                    const otherSubmenu = otherDropdown.querySelector('.submenu');
                    if (otherSubmenu) {
                        otherSubmenu.style.display = 'none';
                    }
                }
            });

            // Toggle the current dropdown
            if (!isActive) {
                dropdown.classList.add('active');
                submenu.style.display = 'block';
            } else {
                dropdown.classList.remove('active');
                submenu.style.display = 'none';
            }
        }

        // Initialize the active dropdown based on the current route
        document.addEventListener('DOMContentLoaded', () => {
            const activeDropdown = document.querySelector('.dropdown.active');
            if (activeDropdown) {
                const submenu = activeDropdown.querySelector('.submenu');
                if (submenu) {
                    submenu.style.display = 'block';
                }
            }
        });

        // Close dropdowns when clicking outside, except for the route-based active one
        document.addEventListener('click', (event) => {
            const isClickInsideDropdown = event.target.closest('.dropdown');
            if (!isClickInsideDropdown) {
                document.querySelectorAll('.dropdown').forEach((dropdown) => {
                    // Only close dropdowns that were manually opened (not route-based)
                    if (!dropdown.classList.contains('active')) {
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
            document.addEventListener("DOMContentLoaded", function() {
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
