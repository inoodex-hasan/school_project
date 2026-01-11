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
                <!-- Notice -->
                <li class="dropdown {{ Route::is('admin.notices.*') ? 'active' : '' }}">
                    <a href="javascript:;" class="dropdown-toggle" onclick="toggleDropdown(this)">
                        <span class="micon dw dw-edit2"></span><span class="mtext">Notice</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{ route('admin.notices.create') }}"
                                class="{{ Route::is('admin.notices.create') ? 'active' : '' }}">Create Notice</a>
                        </li>
                        <li><a href="{{ route('admin.notices.index') }}"
                                class="{{ Route::is('admin.notices.index') ? 'active' : '' }}">Manage Notice</a>
                        </li>
                    </ul>
                </li>
                <!-- Slides -->
                <li class="dropdown {{ Route::is('admin.slides.*') ? 'active' : '' }}">
                    <a href="javascript:;" class="dropdown-toggle" onclick="toggleDropdown(this)">
                        <span class="micon dw dw-presentation"></span><span class="mtext">Slides</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{ route('admin.slides.create') }}"
                                class="{{ Route::is('admin.slides.create') ? 'active' : '' }}">Add Slides</a></li>
                        <li><a href="{{ route('admin.slides.index') }}"
                                class="{{ Route::is('admin.slides.index') ? 'active' : '' }}">Manage Slides</a></li>
                    </ul>
                </li>
                <!-- About -->
                <li class="dropdown {{ Route::is('admin.about.*') ? 'active' : '' }}">
                    <a href="javascript:;" class="dropdown-toggle" onclick="toggleDropdown(this)">
                        <span class="micon dw dw-information"></span><span class="mtext">About</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{ route('admin.about.create') }}"
                                class="{{ Route::is('admin.about.create') ? 'active' : '' }}">Create About</a></li>
                        <li><a href="{{ route('admin.about.index') }}"
                                class="{{ Route::is('admin.about.index') ? 'active' : '' }}">Manage About</a></li>
                    </ul>
                </li>
                <!-- Class & Section -->
                <li
                    class="dropdown {{ Route::is('admin.schoolclass.*') || Route::is('admin.section.*') ? 'active' : '' }}">
                    <a href="javascript:;" class="dropdown-toggle" onclick="toggleDropdown(this)">
                        <span class="micon dw dw-file"></span><span class="mtext">Class & Section</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{ route('admin.schoolclass.create') }}"
                                class="{{ Route::is('admin.schoolclass.create') ? 'active' : '' }}">Create Class</a>
                        </li>
                        <li><a href="{{ route('admin.schoolclass.index') }}"
                                class="{{ Route::is('admin.schoolclass.index') ? 'active' : '' }}">Manage Class</a>
                        </li>
                        <li><a href="{{ route('admin.section.create') }}"
                                class="{{ Route::is('admin.section.create') ? 'active' : '' }}">Create Section</a>
                        </li>
                        <li><a href="{{ route('admin.section.index') }}"
                                class="{{ Route::is('admin.section.index') ? 'active' : '' }}">Manage Section</a>
                        </li>
                    </ul>
                </li>
                <!-- Exam Type -->
                <li class="dropdown {{ Route::is('admin.exam_type.*') ? 'active' : '' }}">
                    <a href="javascript:;" class="dropdown-toggle" onclick="toggleDropdown(this)">
                        <span class="micon dw dw-notebook"></span><span class="mtext">Exam Type</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{ route('admin.exam_type.create') }}"
                                class="{{ Route::is('admin.exam_type.create') ? 'active' : '' }}">Create Exam
                                Type</a></li>
                        <li><a href="{{ route('admin.exam_type.index') }}"
                                class="{{ Route::is('admin.exam_type.index') ? 'active' : '' }}">Manage Exam
                                Type</a></li>
                    </ul>
                </li>
                <!-- Subject -->
                <li class="dropdown {{ Route::is('admin.subject.*') ? 'active' : '' }}">
                    <a href="javascript:;" class="dropdown-toggle" onclick="toggleDropdown(this)">
                        <span class="micon dw dw-book"></span><span class="mtext">Subject</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{ route('admin.subject.create') }}"
                                class="{{ Route::is('admin.subject.create') ? 'active' : '' }}">Create Subject</a>
                        </li>
                        <li><a href="{{ route('admin.subject.index') }}"
                                class="{{ Route::is('admin.subject.index') ? 'active' : '' }}">Manage Subject</a>
                        </li>
                    </ul>
                </li>
                <!-- Gallery -->
                <li class="dropdown {{ Route::is('admin.gallery.*') ? 'active' : '' }}">
                    <a href="javascript:;" class="dropdown-toggle" onclick="toggleDropdown(this)">
                        <span class="micon dw dw-gallery"></span><span class="mtext">Gallery</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{ route('admin.gallery.photos') }}"
                                class="{{ Route::is('admin.gallery.photos') ? 'active' : '' }}">Add Photo</a></li>
                        <li><a href="{{ route('admin.gallery.videos') }}"
                                class="{{ Route::is('admin.gallery.videos') ? 'active' : '' }}">Add Video</a></li>
                        <li><a href="{{ route('admin.gallery.index') }}"
                                class="{{ Route::is('admin.gallery.index') ? 'active' : '' }}">Manage Gallery</a>
                        </li>
                    </ul>
                </li>
                <!-- Message -->
                <li class="dropdown {{ Route::is('admin.messages.*') ? 'active' : '' }}">
                    <a href="javascript:;" class="dropdown-toggle" onclick="toggleDropdown(this)">
                        <span class="micon dw dw-message"></span><span class="mtext">Message</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{ route('admin.messages.create') }}"
                                class="{{ Route::is('admin.messages.create') ? 'active' : '' }}">Create Message</a>
                        </li>
                        <li><a href="{{ route('admin.messages.index') }}"
                                class="{{ Route::is('admin.messages.index') ? 'active' : '' }}">Manage Messages</a>
                        </li>
                    </ul>
                </li>
                <!-- Teacher's List -->
                <li class="dropdown {{ Route::is('admin.teachers.*') ? 'active' : '' }}">
                    <a href="javascript:;" class="dropdown-toggle" onclick="toggleDropdown(this)">
                        <span class="micon dw dw-user1"></span><span class="mtext">Teacher's List</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{ route('admin.teachers.create') }}"
                                class="{{ Route::is('admin.teachers.create') ? 'active' : '' }}">Add Teacher</a>
                        </li>
                        <li><a href="{{ route('admin.teachers.index') }}"
                                class="{{ Route::is('admin.teachers.index') ? 'active' : '' }}">Manage Teacher</a>
                        </li>
                    </ul>
                </li>
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
                                class="{{ Route::is('admin.students.index') ? 'active' : '' }}">Manage Admission</a>
                        </li>
                    </ul>
                </li>
                <!-- Student's List -->
                <li class="dropdown {{ Route::is('admin.students.*') ? 'active' : '' }}">
                    <a href="javascript:;" class="dropdown-toggle" onclick="toggleDropdown(this)">
                        <span class="micon dw dw-group"></span><span class="mtext">Student's List</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{ route('admin.students.create') }}"
                                class="{{ Route::is('admin.students.create') ? 'active' : '' }}">Add Student</a>
                        </li>
                        <li><a href="{{ route('admin.students.index') }}"
                                class="{{ Route::is('admin.students.index') ? 'active' : '' }}">Manage Student</a>
                        </li>
                    </ul>
                </li>
                <!-- Events -->
                <li class="dropdown {{ Route::is('admin.events.*') ? 'active' : '' }}">
                    <a href="javascript:;" class="dropdown-toggle" onclick="toggleDropdown(this)">
                        <span class="micon dw dw-calendar1"></span><span class="mtext">Events</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{ route('admin.events.create') }}"
                                class="{{ Route::is('admin.events.create') ? 'active' : '' }}">Create Event</a></li>
                        <li><a href="{{ route('admin.events.index') }}"
                                class="{{ Route::is('admin.events.index') ? 'active' : '' }}">Manage Events</a></li>
                    </ul>
                </li>
                <!-- Accounts -->
                <li class="dropdown {{ Route::is('admin.accounts.*') ? 'active' : '' }}">
                    <a href="javascript:;" class="dropdown-toggle" onclick="toggleDropdown(this)">
                        <span class="micon dw dw-money"></span><span class="mtext">Accounts</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{ route('admin.accounts.create') }}"
                                class="{{ Route::is('admin.accounts.create') ? 'active' : '' }}">Create Accounts</a>
                        </li>
                        <li><a href="{{ route('admin.accounts.index') }}"
                                class="{{ Route::is('admin.accounts.index') ? 'active' : '' }}">Manage Accounts</a>
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
                                class="{{ Route::is('admin.account_types.create') ? 'active' : '' }}">Create Account
                                Types</a></li>
                        <li><a href="{{ route('admin.account_types.index') }}"
                                class="{{ Route::is('admin.account_types.index') ? 'active' : '' }}">Manage Account
                                Types</a></li>
                    </ul>
                </li>
                <!-- Class Routine -->
                <li class="dropdown {{ Route::is('admin.class_routine.*') ? 'active' : '' }}">
                    <a href="javascript:;" class="dropdown-toggle" onclick="toggleDropdown(this)">
                        <span class="micon dw dw-browser2"></span><span class="mtext">Class Routine</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{ route('admin.class_routine.create') }}"
                                class="{{ Route::is('admin.class_routine.create') ? 'active' : '' }}">Create
                                Routine</a></li>
                        <li><a href="{{ route('admin.class_routine.index') }}"
                                class="{{ Route::is('admin.class_routine.index') ? 'active' : '' }}">Manage
                                Routine</a></li>
                        <li><a href="{{ route('admin.class_routine.upload') }}"
                                class="{{ Route::is('admin.class_routine.upload') ? 'active' : '' }}">Upload
                                Routine</a></li>
                    </ul>
                </li>
                <!-- Exam Routine -->
                <li class="dropdown {{ Route::is('admin.exam_routine.*') ? 'active' : '' }}">
                    <a href="javascript:;" class="dropdown-toggle" onclick="toggleDropdown(this)">
                        <span class="micon dw dw-calendar2"></span><span class="mtext">Exam Routine</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{ route('admin.exam_routine.create') }}"
                                class="{{ Route::is('admin.exam_routine.create') ? 'active' : '' }}">Add Routine</a>
                        </li>
                        <li><a href="{{ route('admin.exam_routine.index') }}"
                                class="{{ Route::is('admin.exam_routine.index') ? 'active' : '' }}">Manage
                                Routine</a></li>
                    </ul>
                </li>
                <!-- Result -->
                <li class="dropdown {{ Route::is('admin.result.*') ? 'active' : '' }}">
                    <a href="javascript:;" class="dropdown-toggle" onclick="toggleDropdown(this)">
                        <span class="micon dw dw-copy"></span><span class="mtext">Results</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{ route('admin.result.create') }}"
                                class="{{ Route::is('admin.result.create') ? 'active' : '' }}">Add Result</a></li>
                        <li><a href="{{ route('admin.result.index') }}"
                                class="{{ Route::is('admin.result.index') ? 'active' : '' }}">Manage Result</a></li>
                    </ul>
                </li>
                <!-- Contact -->
                <li class="dropdown {{ Route::is('admin.contact.*') ? 'active' : '' }}">
                    <a href="javascript:;" class="dropdown-toggle" onclick="toggleDropdown(this)">
                        <span class="micon dw dw-file"></span><span class="mtext">Contact</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{ route('admin.contact.create') }}"
                                class="{{ Route::is('admin.contact.create') ? 'active' : '' }}">Add Contact</a></li>
                        <li><a href="{{ route('admin.contact.index') }}"
                                class="{{ Route::is('admin.contact.index') ? 'active' : '' }}">Manage Contact</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
