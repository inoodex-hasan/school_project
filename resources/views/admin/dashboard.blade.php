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
                        <div class="dropdown">
                            <a class="dropdown-toggle no-arrow" href="#" role="button" data-toggle="dropdown">
                                <i class="ion-arrow-down-c"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-2 col-form-label">From</label>
                                    <div class="col-sm-12 col-md-10">
                                        <input class="form-control form-control-sm form-control-line" type="text" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-2 col-form-label">To</label>
                                    <div class="col-sm-12 col-md-10">
                                        <input class="form-control form-control-sm form-control-line" type="text" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-2 col-form-label">Subject</label>
                                    <div class="col-sm-12 col-md-10">
                                        <input class="form-control form-control-sm form-control-line" type="text" />
                                    </div>
                                </div>
                                <div class="text-right">
                                    <button class="btn btn-primary">Search</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>


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

    <div class="left-side-bar">
        <div class="brand-logo">
            <a href="{{ route('admin.dashboard') }}">
                <img src="/assets_admin/src/images/logo.png" alt="" class="dark-logo" />
                <img src="/assets_admin/src/images/logo.png" alt="" class="light-logo" />
            </a>
            <div class="close-sidebar" data-toggle="left-sidebar-close">
                <i class="ion-close-round"></i>
            </div>
        </div>
        <div class="menu-block customscroll">
            <div class="sidebar-menu">
                <ul id="accordion-menu">
                    <!-- <li>
                <span class="micon dw dw-house-1"></span
                ><span class="mtext">Home</span>
                 <a href="{{ route('admin.dashboard') }}" class="dropdown-toggle no-arrow"></a>
            </li> -->
                    <!-- Notice -->
                    <li class="dropdown">
                        <a href="javascript:;" class="dropdown-toggle">
                            <span class="micon dw dw-edit2"></span><span class="mtext">Notice</span>
                        </a>
                        <ul class="submenu">
                            <li><a href="{{ route('admin.notices.create') }}">Create Notice</a></li>
                            <li><a href="{{ route('admin.notices.index') }}">Manage Notice</a></li>
                        </ul>
                        <!-- End Notice -->
                        <!-- Slides -->
                    <li class="dropdown">
                        <a href="javascript:;" class="dropdown-toggle">
                            <span class="micon dw dw-presentation"></span>
                            <span class="mtext">Slides</span>
                        </a>
                        <ul class="submenu">
                            <li><a href="{{ route('admin.slides.create') }}">Add Slides</a></li>
                            <li><a href="{{ route('admin.slides.index') }}">Manage Slides</a></li>
                        </ul>
                    </li>
                    <!-- End Slides -->
                    <!-- About -->
                    <li class="dropdown">
                        <a href="javascript:;" class="dropdown-toggle">
                            <span class="micon dw dw-information"></span><span class="mtext">About</span>
                        </a>
                        <ul class="submenu">
                            <li><a href="{{ route('admin.about.create') }}">Create About</a></li>
                            <li><a href="{{ route('admin.about.index') }}">Manage About</a></li>
                        </ul>
                    </li>
                    <!-- End About -->
                    <!-- Class & Section -->
                    <li class="dropdown">
                        <a href="javascript:;" class="dropdown-toggle">
                            <span class="micon dw dw-file"></span><span class="mtext">Class & Section</span>
                        </a>
                        <ul class="submenu">
                            <li><a href="{{ route('admin.schoolclass.create') }}">Create Class</a></li>
                            <li><a href="{{ route('admin.schoolclass.index') }}">Manage Class</a></li>
                            <li><a href="{{ route('admin.section.create') }}">Create Section</a></li>
                            <li><a href="{{ route('admin.section.index') }}">Manage Section</a></li>
                        </ul>
                    </li>
                    <!-- End Class & Section -->
                    <!-- Exam Type -->
                    <li class="dropdown">
                        <a href="javascript:;" class="dropdown-toggle">
                            <span class="micon dw dw-notebook"></span><span class="mtext">Exam Type</span>
                        </a>
                        <ul class="submenu">
                            <li><a href="{{ route('admin.exam_type.create') }}">Create Exam Type</a></li>
                            <li><a href="{{ route('admin.exam_type.index') }}">Manage Exam Type</a></li>
                        </ul>
                    </li>
                    <!-- End Exam Type -->
                    <!-- Subject -->
                    <li class="dropdown">
                        <a href="javascript:;" class="dropdown-toggle">
                            <span class="micon dw dw-book"></span><span class="mtext">Subject</span>
                        </a>
                        <ul class="submenu">
                            <li><a href="{{ route('admin.subject.create') }}">Create Subject</a></li>
                            <li><a href="{{ route('admin.subject.index') }}">Manage Subject</a></li>
                        </ul>
                    </li>
                    <!-- End Subject -->
                    <!-- Gallery -->
                    <li class="dropdown">
                        <a href="javascript:;" class="dropdown-toggle">
                            <span class="micon dw dw-gallery"></span><span class="mtext"> Gallery </span>
                        </a>
                        <ul class="submenu">
                            <li><a class="dropdown-item" href="{{ route('admin.gallery.photos') }}">Add Photo</a>
                            </li>
                            <li><a class="dropdown-item" href="{{ route('admin.gallery.videos') }}">Add Video</a>
                            </li>
                            <li><a class="dropdown-item" href="{{ route('admin.gallery.index') }}">Manage Gallery</a>
                            </li>
                        </ul>
                    </li>
                    <!-- End Gallery -->
                    <!-- Message -->
                    <li class="dropdown">
                        <a href="javascript:;" class="dropdown-toggle">
                            <span class="micon dw dw-message"></span><span class="mtext">Message</span>
                        </a>
                        <ul class="submenu">
                            <li><a class="dropdown-item" href="{{ route('admin.messages.create') }}">Create
                                    Message</a>
                            </li>
                            <li><a class="dropdown-item" href="{{ route('admin.messages.index') }}">Manage
                                    Messages</a>
                            </li>
                        </ul>
                    </li>
                    <!-- End Message -->
                    <!-- Teacher's List -->
                    <li class="dropdown">
                        <a href="javascript:;" class="dropdown-toggle">
                            <span class="micon dw dw-user1"></span><span class="mtext">Teacher's List</span>
                        </a>
                        <ul class="submenu">
                            <li><a class="dropdown-item" href="{{ route('admin.teachers.create') }}">Add Teacher</a>
                            </li>
                            <li><a class="dropdown-item" href="{{ route('admin.teachers.index') }}">Manage
                                    Teacher</a>
                            </li>
                        </ul>
                    </li>
                    <!-- End Teacher's List -->
                    <!-- Student's List -->
                    <li class="dropdown">
                        <a href="javascript:;" class="dropdown-toggle">
                            <span class="micon dw dw-group"></span><span class="mtext">Student's List</span>
                        </a>
                        <ul class="submenu">
                            <li><a class="dropdown-item" href="{{ route('admin.students.create') }}">Add Student</a>
                            </li>
                            <li><a class="dropdown-item" href="{{ route('admin.students.index') }}">Manage
                                    Student</a>
                            </li>
                        </ul>
                    </li>
                    <!-- End Student's List -->
                    <!-- New admission Student's List -->
                    <li class="dropdown {{ Route::is('admin.students.*') ? 'active' : '' }}">
                        <a href="javascript:;" class="dropdown-toggle" onclick="toggleDropdown(this)">
                            <span class="micon  dw dw-school"></span><span class="mtext">New Admission</span>
                        </a>
                        <ul class="submenu">
                            <li><a href="{{ route('admin.admission.create') }}"
                                    class="{{ Route::is('admin.students.create') ? 'active' : '' }}">New Admission</a>
                            </li>
                            <li><a href="{{ route('admin.admission.index') }}"
                                    class="{{ Route::is('admin.students.index') ? 'active' : '' }}">Manage
                                    Admission</a>
                            </li>
                        </ul>
                    </li>
                    <!-- Accounts -->
                    <li class="dropdown {{ Route::is('admin.accounts.*') ? 'active' : '' }}">
                        <a href="javascript:;" class="dropdown-toggle" onclick="toggleDropdown(this)">
                            <span class="micon dw dw-money"></span><span class="mtext">Accounts</span>
                        </a>
                        <ul class="submenu">
                            <li><a href="{{ route('admin.accounts.create') }}"
                                    class="{{ Route::is('admin.accounts.create') ? 'active' : '' }}">Create
                                    Accounts</a>
                            </li>
                            <li><a href="{{ route('admin.accounts.index') }}"
                                    class="{{ Route::is('admin.accounts.index') ? 'active' : '' }}">Manage
                                    Accounts</a>
                            </li>
                        </ul>
                    </li>
                    <!-- Account Types -->
                    <li class="dropdown {{ Route::is('admin.account_types.*') ? 'active' : '' }}">
                        <a href="javascript:;" class="dropdown-toggle" onclick="toggleDropdown(this)">
                            <span class="micon dw dw-money"></span><span class="mtext">Account Types</span>
                        </a>
                        <ul class="submenu">
                            <li><a href="{{ route('admin.account_types.create') }}"
                                    class="{{ Route::is('admin.account_types.create') ? 'active' : '' }}">Create
                                    Account
                                    Types</a></li>
                            <li><a href="{{ route('admin.account_types.index') }}"
                                    class="{{ Route::is('admin.account_types.index') ? 'active' : '' }}">Manage
                                    Account
                                    Types</a></li>
                        </ul>
                    </li>
                    <!-- Events -->
                    <li class="dropdown">
                        <a href="javascript:;" class="dropdown-toggle">
                            <span class="micon dw dw-calendar1"></span><span class="mtext">Events</span>
                        </a>
                        <ul class="submenu">
                            <li><a class="dropdown-item" href="{{ route('admin.events.create') }}">Create Event</a>
                            </li>
                            <li><a class="dropdown-item" href="{{ route('admin.events.index') }}">Manage Events</a>
                            </li>
                        </ul>
                    </li>
                    <!-- End Events -->
                    <!-- Class Routine -->
                    <li class="dropdown">
                        <a href="javascript:;" class="dropdown-toggle">
                            <span class="micon dw dw-browser2"></span><span class="mtext">Class Routine</span>
                        </a>
                        <ul class="submenu">
                            <li><a class="dropdown-item" href="{{ route('admin.class_routine.create') }}">Create
                                    Routine</a></li>
                            <li><a class="dropdown-item" href="{{ route('admin.class_routine.index') }}">Manage
                                    Routine</a></li>
                            <li><a class="dropdown-item" href="{{ route('admin.class_routine.upload') }}">Upload
                                    Routine</a></li>
                        </ul>
                    </li>
                    <!-- End Routine -->
                    <!-- Exam Routine -->
                    <li class="dropdown">
                        <a href="javascript:;" class="dropdown-toggle">
                            <span class="micon dw dw-calendar2"></span><span class="mtext">Exam Routine</span>
                        </a>
                        <ul class="submenu">
                            <li><a href="{{ route('admin.exam_routine.create') }}">Add Routine</a></li>
                            <li><a href="{{ route('admin.exam_routine.index') }}">Manage Routine</a></li>
                        </ul>
                    </li>
                    <!-- End Exam Routine -->
                    <!-- Result -->
                    <li class="dropdown">
                        <a href="javascript:;" class="dropdown-toggle">
                            <span class="micon dw dw-copy"></span><span class="mtext">Results</span>
                        </a>
                        <ul class="submenu">
                            <li><a href="{{ route('admin.result.create') }}">Add Result</a></li>
                            <li><a href="{{ route('admin.result.index') }}">Manage Result</a></li>
                        </ul>
                    </li>
                    <!-- End Result -->
                    <!-- Contact -->
                    <li class="dropdown">
                        <a href="javascript:;" class="dropdown-toggle">
                            <span class="micon dw dw-file"></span><span class="mtext">Contact</span>
                        </a>
                        <ul class="submenu">
                            <li><a href="{{ route('admin.contact.create') }}">Add Contact</a></li>
                            <li><a href="{{ route('admin.contact.index') }}">Manage Contact</a></li>
                        </ul>
                    </li>
                    <!-- End Contact -->
                </ul>
            </div>
        </div>
    </div>
    <div class="mobile-menu-overlay"></div>
    <!-- Main Content -->
    <div class="main-container">
        <div class="xs-pd-20-10 pd-ltr-20">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>Dashboard</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Dashboard
                                </li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-md-6 col-sm-12 text-right">
                        <div class="dropdown">
                            <a id="dateDropdown" class="btn btn-primary dropdown-toggle" href="#"
                                role="button" data-toggle="dropdown">
                                <!-- Dynamic date goes here -->
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="#">Export List</a>
                                <a class="dropdown-item" href="#">Policies</a>
                                <a class="dropdown-item" href="#">View Assets</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row clearfix progress-box">
                <div class="col-lg-3 col-md-6 col-sm-12 mb-30">
                    <div class="card-box pd-30 height-100-p">
                        <div class="progress-box text-center">
                            <input type="text" class="knob dial1" value="80" data-width="120"
                                data-height="120" data-linecap="round" data-thickness="0.12" data-bgColor="#fff"
                                data-fgColor="#1b00ff" data-angleOffset="180" readonly />
                            <h5 class="text-blue padding-top-10 h5">My Earnings</h5>
                            <span class="d-block">80% Average <i class="fa fa-line-chart text-blue"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 mb-30">
                    <div class="card-box pd-30 height-100-p">
                        <div class="progress-box text-center">
                            <input type="text" class="knob dial2" value="70" data-width="120"
                                data-height="120" data-linecap="round" data-thickness="0.12" data-bgColor="#fff"
                                data-fgColor="#00e091" data-angleOffset="180" readonly />
                            <h5 class="text-light-green padding-top-10 h5">
                                Business Captured
                            </h5>
                            <span class="d-block">75% Average <i class="fa text-light-green fa-line-chart"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 mb-30">
                    <div class="card-box pd-30 height-100-p">
                        <div class="progress-box text-center">
                            <input type="text" class="knob dial3" value="90" data-width="120"
                                data-height="120" data-linecap="round" data-thickness="0.12" data-bgColor="#fff"
                                data-fgColor="#f56767" data-angleOffset="180" readonly />
                            <h5 class="text-light-orange padding-top-10 h5">
                                Projects Speed
                            </h5>
                            <span class="d-block">90% Average <i
                                    class="fa text-light-orange fa-line-chart"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 mb-30">
                    <div class="card-box pd-30 height-100-p">
                        <div class="progress-box text-center">
                            <input type="text" class="knob dial4" value="65" data-width="120"
                                data-height="120" data-linecap="round" data-thickness="0.12" data-bgColor="#fff"
                                data-fgColor="#a683eb" data-angleOffset="180" readonly />
                            <h5 class="text-light-purple padding-top-10 h5">
                                Panding Orders
                            </h5>
                            <span class="d-block">65% Average <i
                                    class="fa text-light-purple fa-line-chart"></i></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-12 mb-30">
                    <div class="card-box pd-30 pt-10 height-100-p">
                        <h2 class="mb-30 h4">Browser Visit</h2>
                        <div class="browser-visits">
                            <ul>
                                <li class="d-flex flex-wrap align-items-center">
                                    <div class="icon">
                                        <img src="/assets_admin/vendors/images/chrome.png" alt="" />
                                    </div>
                                    <div class="browser-name">Google Chrome</div>
                                    <div class="visit">
                                        <span class="badge badge-pill badge-primary">50%</span>
                                    </div>
                                </li>
                                <li class="d-flex flex-wrap align-items-center">
                                    <div class="icon">
                                        <img src="/assets_admin/vendors/images/firefox.png" alt="" />
                                    </div>
                                    <div class="browser-name">Mozilla Firefox</div>
                                    <div class="visit">
                                        <span class="badge badge-pill badge-secondary">40%</span>
                                    </div>
                                </li>
                                <li class="d-flex flex-wrap align-items-center">
                                    <div class="icon">
                                        <img src="/assets_admin/vendors/images/safari.png" alt="" />
                                    </div>
                                    <div class="browser-name">Safari</div>
                                    <div class="visit">
                                        <span class="badge badge-pill badge-success">40%</span>
                                    </div>
                                </li>
                                <li class="d-flex flex-wrap align-items-center">
                                    <div class="icon">
                                        <img src="/assets_admin/vendors/images/edge.png" alt="" />
                                    </div>
                                    <div class="browser-name">Microsoft Edge</div>
                                    <div class="visit">
                                        <span class="badge badge-pill badge-warning">20%</span>
                                    </div>
                                </li>
                                <li class="d-flex flex-wrap align-items-center">
                                    <div class="icon">
                                        <img src="/assets_admin/vendors/images/opera.png" alt="" />
                                    </div>
                                    <div class="browser-name">Opera Mini</div>
                                    <div class="visit">
                                        <span class="badge badge-pill badge-info">20%</span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-6 col-sm-12 mb-30">
                    <div class="card-box pd-30 pt-10 height-100-p">
                        <h2 class="mb-30 h4">World Map</h2>
                        <div id="browservisit" style="width: 100% !important; height: 380px"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-7 col-md-12 col-sm-12 mb-30">
                    <div class="card-box pd-30 height-100-p">
                        <h4 class="mb-30 h4">Compliance Trend</h4>
                        <div id="compliance-trend" class="compliance-trend"></div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-12 col-sm-12 mb-30">
                    <div class="card-box pd-30 height-100-p">
                        <h4 class="mb-30 h4">Records</h4>
                        <div id="chart" class="chart"></div>
                    </div>
                </div>
            </div>
            <div class="footer-wrap pd-20 mb-20 card-box">
                School Management System By
                <a href="https://inoodex.com/" target="_blank">Inoodex</a>
            </div>
        </div>
    </div>
    <!-- js -->
    <script src="/assets_admin/vendors/scripts/core.js"></script>
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
                }, 3000); // disappear after 3 sec
            });
        </script>
    @endif

    @stack('scripts')
</body>

</html>
