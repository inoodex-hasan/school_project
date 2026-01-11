<header>
    <div class="header__area">
        <!-- header top start  -->
        <div class="header__top header__border">
            <div class="container">
                <a href="{{ url('/') }}" class="logo">
                    <img src="{{ asset('assets/img/logo/logo.png') }}" alt="Logo" />
                </a>
            </div>
        </div>
        <!-- header top end  -->

        <div class="header__bottom" id="header-sticky">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-10 d-none d-lg-block">
                        <div class="main-menu">
                            <nav id="mobile-menu">
                                <ul>
                                    <li>
                                        <a href="{{ url('/') }}" class="main-li">
                                            <i class="fa-solid fa-house"></i> প্রচ্ছদ
                                        </a>
                                    </li>
                                    <li class="has-dropdown">
                                        <a href="#">পরিচিতি</a>
                                        <ul class="submenu">
                                            <li><a href="{{ route('about.history') }}">এক নজরে পরিচিতি</a></li>
                                        </ul>
                                    </li>

                                    <li class="has-dropdown">
                                        <a href="{{ route('teachers') }}">শিক্ষক ও শিক্ষিকা</a>
                                    </li>

                                    @php
                                    use App\Models\ExamRoutine;
                                    $examRoutinePdfs = ExamRoutine::latest()->get();
                                    @endphp

                                    <li class="has-submenu">
                                        <a href="javascript:void(0)">পরীক্ষার রুটিন ▾</a>
                                        @if($examRoutinePdfs->count())
                                        <ul class="submenu">
                                            @foreach($examRoutinePdfs as $pdf)
                                            @if(\Illuminate\Support\Facades\Storage::disk('public')->exists($pdf->file))
                                            <li>
                                                <a href="{{ asset('storage/' . $pdf->file) }}" target="_blank">
                                                    {{ $pdf->title ?? 'Routine ' . $loop->iteration }}
                                                </a>
                                            </li>
                                            @endif
                                            @endforeach
                                        </ul>
                                        @else
                                        <ul class="submenu">
                                            <li><a href="#">No Exam Routine Found</a></li>
                                        </ul>
                                        @endif
                                    </li>

                                    </li>
                                    @php
                                    use App\Models\ClassRoutine;

                                    $classRoutinePdfs = ClassRoutine::latest()->get();
                                    @endphp

                                    <li class="has-submenu">
                                        <a href="javascript:void(0)">ক্লাস রুটিন ▾</a>
                                        @if($classRoutinePdfs->count())
                                        <ul class="submenu">
                                            @foreach($classRoutinePdfs as $pdf)
                                            @if(\Illuminate\Support\Facades\Storage::disk('public')->exists($pdf->file))
                                            <li>
                                                <a href="{{ asset('storage/' . $pdf->file) }}" target="_blank">
                                                    {{ $pdf->title ?? 'Routine '.$loop->iteration }}
                                                </a>
                                            </li>
                                            @endif
                                            @endforeach
                                        </ul>
                                        @else
                                        <ul class="submenu">
                                            <li><a href="#">No Class Routine Found</a></li>
                                        </ul>
                                        @endif
                                    </li>

                                    <li class="has-dropdown">
                                        <a href="#">ফলাফল</a>
                                    </li>



                                    <!-- <li class="has-dropdown">
                                        <a href="#">ভর্তি আবেদন</a>
                                        <ul class="submenu">
                                            <li><a href="#">অনলাইন ভর্তি আবেদন</a></li>
                                            <li><a href="#">ভর্তি পরীক্ষার ফর্ম</a></li>
                                            <li><a href="#">ভর্তি পরীক্ষার প্রবেশপত্র</a></li>
                                        </ul>
                                    </li> -->
                                    <li class="has-dropdown">
                                        <a href="{{ route('contact') }}">যোগাযোগ</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>

                    <div class="col-lg-2">
                        <div class="header__action d-none d-lg-block">
                            <ul>
                                <li><a href="{{ route('notices.index') }}">নোটিশ</a></li>
                                <li>
                                    <a href="{{ url('/login') }}">লগিন <i class="fa-solid fa-user"></i></a>
                                </li>
                            </ul>
                        </div>
                        <div class="header__bottom-right d-flex justify-content-end align-items-center pl-30">
                            <div class="header__hamburger ml-50 d-xl-none">
                                <button type="button" class="tp-menu-toggle">
                                    <i class="fa-solid fa-bars"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>