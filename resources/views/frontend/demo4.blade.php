<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="x-ua-compatible" content="ie=edge" />
  <title>School Management System</title>
  <meta name="description" content="" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <!-- Place favicon.ico in the root directory -->
  <link rel="shortcut icon" type="image/x-icon" href="{{ asset('frontend_assets/demo4/assets/img/favicon.png') }}" />

  <!-- CSS here -->
  <link rel="stylesheet" href="{{ asset('frontend_assets/demo4/assets/css/bootstrap.css') }}" />
  <link rel="stylesheet" href="{{ asset('frontend_assets/demo4/assets/css/meanmenu.css') }}" />
  <link rel="stylesheet" href="{{ asset('frontend_assets/demo4/assets/css/animate.css') }}" />
  <link rel="stylesheet" href="{{ asset('frontend_assets/demo4/assets/css/swiper-bundle.css') }}" />
  <link rel="stylesheet" href="{{ asset('frontend_assets/demo4/assets/css/slick.css') }}" />
  <link rel="stylesheet" href="{{ asset('frontend_assets/demo4/assets/css/backtotop.css') }}" />
  <link rel="stylesheet" href="{{ asset('frontend_assets/demo4/assets/css/magnific-popup.css') }}" />
  <link rel="stylesheet" href="{{ asset('frontend_assets/demo4/assets/css/nice-select.css') }}" />
  <link rel="stylesheet" href="{{ asset('frontend_assets/demo4/assets/css/font-awesome-pro.css') }}" />
  <link rel="stylesheet" href="{{ asset('frontend_assets/demo4/assets/css/spacing.css') }}" />
  <link rel="stylesheet" href="{{ asset('frontend_assets/demo4/assets/css/style.css') }}" />
</head>

<body>
  <!-- header area start -->
  <header>
    <div class="header__area">
      <!-- header top start  -->
      <div class="header__top header__border">
        <div class="container">
          <div class="logo">
            <img src="{{ asset('frontend_assets/demo4/assets/img/logo/logo.png') }}" alt="" />
          </div>
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
                      <a href="#" class="main-li"><i class="fa-solid fa-house"></i>প্রচ্ছদ</a>
                    </li>
                    <li class="has-dropdown">
                      <a href="#">পরিচিতি</a>
                      <ul class="submenu">
                        <li><a href="#">এক নজরে পরিচিতি</a></li>
                      </ul>
                    </li>
                    <li class="has-dropdown">
                      <a href="#">জনবল</a>
                      <ul class="submenu">
                        <li><a href="#">ম্যানেজিং কমিটি সদস্যবৃন্দ</a></li>
                        <li><a href="#">শিক্ষক ও শিক্ষিকা</a></li>
                        <li><a href="#">কর্মকর্তা</a></li>
                      </ul>
                    </li>
                    <li class="has-dropdown">
                      <a href="#">শিক্ষার্থী</a>
                      <ul class="submenu">
                        <li><a href="#">অধ্যায়নরত শিক্ষার্থীর তালিকা</a></li>
                        <li><a href="#">ডিজিটাল হাজিরার তথ্য</a></li>
                        <li><a href="#">আইডি কার্ড ডাউনলোড</a></li>
                      </ul>
                    </li>
                    <li>
                      <a href="#">পরীক্ষার ফলাফল</a>
                    </li>
                    <li>
                      <a href="#">ক্লাস রুটিন</a>
                    </li>
                    <li class="has-dropdown">
                      <a href="#">ভর্তি আবেদন</a>
                      <ul class="submenu">
                        <li><a href="#">অনলাইন ভর্তি আবেদন</a></li>
                        <li><a href="#">ভর্তি পরীক্ষার ফর্ম</a></li>
                        <li><a href="#">ভর্তি পরীক্ষার প্রবেশপত্র</a></li>
                      </ul>
                    </li>
                    <li class="has-dropdown">
                      <a href="#">অন্যান্য</a>
                      <ul class="submenu">
                        <li><a href="#">যোগাযোগ</a></li>
                        <li><a href="#">মুজিব কর্নার</a></li>
                      </ul>
                    </li>
                  </ul>
                </nav>
              </div>
            </div>
            <div class="col-lg-2">
              <div class="header__action d-none d-lg-block">
                <ul>
                  <li><a href="#">নোটিশ</a></li>
                  <li>
                    <a href="{{ route('login') }}">লগিন <i class="fa-solid fa-user"></i></a>
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

  <!-- header area end -->
  <div class="tp-sidebar-menu">
    <button class="sidebar-close">
      <i class="fa-solid fa-xmark"></i>
    </button>
    <div class="mobile-menu"></div>
  </div>
  <div class="body-overlay"></div>

  <main>
    <!-- hero area start  -->
    <section class="hero__area">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mb-4">
            <div class="slider__wrapper">
              <div class="slider__container">
                <div class="slide_item">
                  <img src="{{ asset('frontend_assets/demo4/assets/img/slider/1.jpeg') }}" alt="" />
                </div>
                <div class="slide_item">
                  <img src="{{ asset('frontend_assets/demo4/assets/img/slider/2.jpeg') }}" alt="" />
                </div>
              </div>
              <div class="slide__img">
                <img src="{{ asset('frontend_assets/demo4/assets/img/shape/1.png') }}" alt="" />
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="slider__person">
              <div class="person__item mb-4">
                <div class="person__img">
                  <img src="{{ asset('frontend_assets/demo4/assets/img/person/chairman.jpg') }}" alt="" />
                </div>
                <div class="person__content">
                  <h4>চেয়ারম্যান</h4>
                  <h6>আব্দুল্লাহ জাহাঙ্গীর</h6>
                  <a href="#">তার সম্পর্কে পড়ুন..</a>
                </div>
              </div>
              <div class="person__item mb-4">
                <div class="person__img">
                  <img src="{{ asset('frontend_assets/demo4/assets/img/person/principle.jpg') }}" alt="" />
                </div>
                <div class="person__content">
                  <h4>প্রধান শিক্ষক</h4>
                  <h6>জয়নাল আহমেদ</h6>
                  <a href="#">তার সম্পর্কে পড়ুন..</a>
                </div>
              </div>
            </div>
            <div class="class__info">
              <div class="class__card">
                <div class="class__img">
                  <img src="{{ asset('frontend_assets/demo4/assets/img/shape/icon1.png') }}" alt="" />
                </div>
                <div class="class__text">
                  <p>ক্লাস রুটিন</p>
                </div>
              </div>
              <div class="class__card">
                <div class="class__img">
                  <img src="{{ asset('frontend_assets/demo4/assets/img/shape/icon1.png') }}" alt="" />
                </div>
                <div class="class__text">
                  <p>ক্লাস রুটিন</p>
                </div>
              </div>
            </div>
            <div class="school__info">
              <ul>
                <li>
                  <i class="fa-solid fa-calendar-plus"></i>স্থাপিত সন - ১৯৭১
                  খ্রিঃ
                </li>
                <li>
                  <i class="fa-solid fa-bookmark"></i>EIIN নাম্বার - 168867
                </li>
                <li><i class="fa-solid fa-tty"></i>টেলিফোন - ০৫২১900909</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- hero area end  -->
    <!-- calculation area start  -->
    <section class="calculator__area">
      <div class="container">
        <div class="row">
          <div class="col-lg-3">
            <a href="#" class="calculator__item">
              <div class="item_box">
                <div class="cal__img">
                  <img src="{{ asset('frontend_assets/demo4/assets/img/function/ssc.png') }}" alt="" />
                </div>
                <div class="cal__content">
                  <p>SSC GPA Calculator</p>
                </div>
              </div>
            </a>
          </div>
          <div class="col-lg-3">
            <a href="#" class="calculator__item">
              <div class="item_box">
                <div class="cal__img">
                  <img src="{{ asset('frontend_assets/demo4/assets/img/function/jsc.png') }}" alt="" />
                </div>
                <div class="cal__content">
                  <p>JSC GPA Calculator</p>
                </div>
              </div>
            </a>
          </div>
          <div class="col-lg-3">
            <a href="#" class="calculator__item">
              <div class="item_box">
                <div class="cal__img">
                  <img src="{{ asset('frontend_assets/demo4/assets/img/function/hsc.png') }}" alt="" />
                </div>
                <div class="cal__content">
                  <p>HSC GPA Calculator</p>
                </div>
              </div>
            </a>
          </div>
          <div class="col-lg-3">
            <a href="#" class="calculator__item">
              <div class="item_box">
                <div class="cal__img">
                  <img src="{{ asset('frontend_assets/demo4/assets/img/function/DGC.png') }}" alt="" />
                </div>
                <div class="cal__content">
                  <p>Degree CGPA Calculator</p>
                </div>
              </div>
            </a>
          </div>
        </div>
      </div>
    </section>
    <!-- calculation area end -->
    <!-- notice area start  -->
    <section class="notice__area">
      <div class="container">
        <div class="notice__wrap">
          <div class="notice__card">
            <div class="notice__header">
              <h3>সর্বশেষ নোটিশ</h3>
            </div>
            <div class="notice__content">
              <div class="notice_row">
                <div class="notice_date">2023-09-24</div>
                <div class="notice_text">
                  <a href="#">বৃহত্তর ছাত্র-ছাত্রীদের সহযোগিতা ও সহযোগিনী প্রশংসা
                    সম্পর্কিত</a>
                </div>
              </div>
              <div class="notice_row">
                <div class="notice_date">2023-09-24</div>
                <div class="notice_text">
                  <a href="#">শ্রদ্ধাশ্রদ্ধ ছাত্র-ছাত্রীদের জন্য নোটিশ</a>
                </div>
              </div>
              <div class="notice_row">
                <div class="notice_date">2023-09-24</div>
                <div class="notice_text">
                  <a href="#">ছাত্রীদের দ্বিতীয় সেমেস্টার পরীক্ষা</a>
                </div>
              </div>
              <div class="notice_row">
                <div class="notice_date">2023-09-24</div>
                <div class="notice_text">
                  <a href="#">বৃহত্তর ছাত্র-ছাত্রীদের সহযোগিতা ও সহযোগিনী প্রশংসা
                    সম্পর্কিত</a>
                </div>
              </div>
              <div class="notice_btn">
                <a href="#">সকল নোটিশ...</a>
              </div>
            </div>
          </div>

          <div class="teacher__message">
            <div class="message__card">
              <div class="message__header">
                <h3>শিক্ষক বানী</h3>
              </div>
              <div class="teacher__content">
                <div class="teacher__img">
                  <img src="{{ asset('frontend_assets/demo4/assets/img/person/madamm.jpg') }}" alt="" />
                </div>
                <div class="teacher__info">
                  <ul>
                    <li><i class="fa-solid fa-user"></i>Asma Begum</li>
                    <li><i class="fa-solid fa-pen-nib"></i>শিক্ষক</li>
                    <li>
                      <i class="fa-solid fa-calendar-days"></i>Tuesday,
                      September 26, 2023 | বানী
                    </li>
                  </ul>
                </div>
              </div>
              <div class="teacher__quote">
                <p>
                  চুল তার কবেকার অন্ধকার বিদিশার নিশা, মুখ তার শ্রাবস্তীর
                  কারুকার্য; অতিদূর সমুদ্রের’পর হাল ভেঙে যে নাবিক হারায়েছে
                  দিশা
                </p>
                <a href="#">পড়ুন..</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- notice area end -->

    <!-- history area start  -->
    <section class="history__area">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-6">
            <div class="history__content">
              <h2>
                <img src="{{ asset('frontend_assets/demo4/assets/img/school/question.png') }}" alt="" />
                বিদ্যালয়ের স্থাপনার সাল ও ইতিহাস কী
                <span class="q-mark">?</span>
              </h2>
              <p>
                আমাদের বিদ্যালয় সাল ১৯৬৫ সালে প্রতিষ্ঠিত হয়। এটি একটি
                ঐতিহাসিক স্থান, এখানে বেশীরভাগে গুরুত্বপূর্ণ সাক্ষরতা এবং
                সাংস্কৃতিক গতি ঘটে এবং শিক্ষার্থীদের শিক্ষা এবং আদর্শ উন্নত
                করার মাধ্যমে বিদ্যালয়টি এখন একটি প্রতিষ্ঠান হিসেবে পরিচিত। এই
                বিদ্যালয়ের ইতিহাস অত্যন্ত গর্বস্ফূর্তি সাথে দেশের শিক্ষা
                প্রতিষ্ঠানের মধ্যে একটি গুরুত্বপূর্ণ স্থান রয়েছে।
              </p>
              <a href="#">আরো পড়ুন..</a>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="history__img">
              <img src="{{ asset('frontend_assets/demo4/assets/img/school/school.jpg') }}" alt="" />
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- history area end  -->

    <!-- link area start  -->
    <section class="links__area">
      <div class="container">
        <div class="row">
          <div class="col-lg-3">
            <div class="links__card">
              <div class="link__header">
                <h3>আমাদের সম্পর্কে</h3>
              </div>
              <div class="link__content">
                <ul>
                  <li>
                    <i class="fa-solid fa-angle-right"></i><a href="#">প্রতিষ্ঠান ইতিহাস</a>
                  </li>
                  <li>
                    <i class="fa-solid fa-angle-right"></i><a href="#">স্তর ভিত্তিক শিক্ষার্থী</a>
                  </li>
                  <li>
                    <i class="fa-solid fa-angle-right"></i><a href="#">শিক্ষার্থীর তথ্য</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="links__card">
              <div class="link__header">
                <h3>প্রশাসন</h3>
              </div>
              <div class="link__content">
                <ul>
                  <li>
                    <i class="fa-solid fa-angle-right"></i><a href="#">অধ্যক্ষ</a>
                  </li>
                  <li>
                    <i class="fa-solid fa-angle-right"></i><a href="#">শিক্ষকবৃন্দ</a>
                  </li>
                  <li>
                    <i class="fa-solid fa-angle-right"></i><a href="#">স্টাফবৃন্দ</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="links__card">
              <div class="link__header">
                <h3>প্রতিষ্ঠান সম্বলিত তথ্য</h3>
              </div>
              <div class="link__content">
                <ul>
                  <li>
                    <i class="fa-solid fa-angle-right"></i><a href="#">আসন সংখ্যা</a>
                  </li>
                  <li>
                    <i class="fa-solid fa-angle-right"></i><a href="#">ভৌত অবকাঠামো</a>
                  </li>
                  <li>
                    <i class="fa-solid fa-angle-right"></i><a href="#">সুবিধা সমূহ</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="links__card">
              <div class="link__header">
                <h3>একাডেমিক তথ্য</h3>
              </div>
              <div class="link__content">
                <ul>
                  <li>
                    <i class="fa-solid fa-angle-right"></i><a href="#"> ক্লাস রুটিন</a>
                  </li>
                  <li>
                    <i class="fa-solid fa-angle-right"></i><a href="#">একাডেমিক সিলেবাস</a>
                  </li>
                  <li>
                    <i class="fa-solid fa-angle-right"></i><a href="#">একাডেমিক ক্যালেন্ডার</a>
                  </li>
                  <li>
                    <i class="fa-solid fa-angle-right"></i><a href="#">পরীক্ষার ফলাফল</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- link area end -->
    <!-- counter area start  -->
    <section class="counter__area">
      <div class="container">
        <div class="counter__box">
          <div class="row">
            <div class="col-lg-4">
              <div class="counter__card">
                <span class="icon purple"><i class="fa-solid fa-user-graduate"></i></span>
                <h4>4+</h4>
                <p>শিক্ষার্থী</p>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="counter__card">
                <span class="icon green"><i class="fa-solid fa-user-pen"></i></span>
                <h4>4+</h4>
                <p>শিক্ষক ও শিক্ষিকা</p>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="counter__card">
                <span class="icon orange">
                  <i class="fa-solid fa-users"></i></span>
                <h4>4+</h4>
                <p>কর্মকত্রী</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- counter area end -->
    <!-- faculty area  Start -->
    <section class="our__faculty">
      <div class="container">
        <div class="faculty__nav filter-button-group">
          <button class="active" data-filter=".math">গণিত</button>
          <button data-filter=".english">ইংরেজী</button>
          <button data-filter=".history">ইতিহাস</button>
          <button data-filter=".biology">জীববিজ্ঞান</button>
          <button data-filter=".physics">পদার্থ বিজ্ঞান</button>
        </div>
        <div class="row faculty-filter">
          <div class="col-12 col-lg-4 element-item math">
            <div class="subject__card">
              <div class="author">
                <div class="author__head">
                  <div class="author__info">
                    <div class="auth__img">
                      <img src="{{ asset('frontend_assets/demo4/assets/img/teacher/1.jpeg') }}" alt="" />
                    </div>
                    <div class="auth__content">
                      <p><i class="fa-solid fa-user"></i> Asma Begum</p>
                      <p><i class="fa-solid fa-pen-nib"></i>শিক্ষক</p>
                    </div>
                  </div>
                </div>
                <div class="subject">
                  <h4 class="text-purple">গণিত</h4>
                </div>
                <div class="meta">
                  <ul>
                    <li>
                      <i class="fa-solid fa-calendar-days"></i>১০ জানুয়ারি
                      ২০২৩
                    </li>
                    <li><i class="fa-solid fa-eye"></i>181</li>
                    <li><i class="fa-solid fa-folder-open"></i>গণিত</li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12 col-lg-4 element-item english math">
            <div class="subject__card">
              <div class="author">
                <div class="author__head">
                  <div class="author__info">
                    <div class="auth__img">
                      <img src="{{ asset('frontend_assets/demo4/assets/img/teacher/1.jpeg') }}" alt="" />
                    </div>
                    <div class="auth__content">
                      <p><i class="fa-solid fa-user"></i> Asma Begum</p>
                      <p><i class="fa-solid fa-pen-nib"></i>শিক্ষক</p>
                    </div>
                  </div>
                </div>
                <div class="subject">
                  <h4 class="text-purple">গণিত</h4>
                </div>
                <div class="meta">
                  <ul>
                    <li>
                      <i class="fa-solid fa-calendar-days"></i>১০ জানুয়ারি
                      ২০২৩
                    </li>
                    <li><i class="fa-solid fa-eye"></i>181</li>
                    <li><i class="fa-solid fa-folder-open"></i>গণিত</li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- faculty area End -->

    <!-- teacher area start  -->
    <div class="teachers__area">
      <div class="container">
        <div class="teacher__header">
          <h3>আমদের শিক্ষকবৃন্দ</h3>
        </div>
        <div class="bg-white">
          <div class="row">
            <div class="col-lg-3">
              <div class="teacher__card">
                <div class="card__details">
                  <div class="teacher__info">
                    <div class="teacher__img">
                      <img src="{{ asset('frontend_assets/demo4/assets/img/teacher/1.jpeg') }}" alt="" />
                    </div>
                    <img src="{{ asset('frontend_assets/demo4/assets/img/teacher/shape.png') }}" alt="" />
                  </div>
                  <div class="profile__content">
                    <h3>Asma Begum</h3>
                    <p>শিক্ষক</p>
                    <div class="profile__contact">
                      <span><i class="fa-solid fa-envelope"></i></span>
                      <span><i class="fa-solid fa-phone"></i></span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3">
              <div class="teacher__card">
                <div class="card__details">
                  <div class="teacher__info">
                    <div class="teacher__img">
                      <img src="{{ asset('frontend_assets/demo4/assets/img/teacher/2.jpeg') }}" alt="" />
                    </div>
                    <img src="{{ asset('frontend_assets/demo4/assets/img/teacher/shape.png') }}" alt="" />
                  </div>
                  <div class="profile__content">
                    <h3>রাবেয়া বেগম</h3>
                    <p>শিক্ষক</p>
                    <div class="profile__contact">
                      <span><i class="fa-solid fa-envelope"></i></span>
                      <span><i class="fa-solid fa-phone"></i></span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3">
              <div class="teacher__card">
                <div class="card__details">
                  <div class="teacher__info">
                    <div class="teacher__img">
                      <img src="{{ asset('frontend_assets/demo4/assets/img/teacher/2.jpeg') }}" alt="" />
                    </div>
                    <img src="{{ asset('frontend_assets/demo4/assets/img/teacher/shape.png') }}" alt="" />
                  </div>
                  <div class="profile__content">
                    <h3>রাবেয়া বেগম</h3>
                    <p>শিক্ষক</p>
                    <div class="profile__contact">
                      <span><i class="fa-solid fa-envelope"></i></span>
                      <span><i class="fa-solid fa-phone"></i></span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3">
              <div class="teacher__card">
                <div class="card__details">
                  <div class="teacher__info">
                    <div class="teacher__img">
                      <img src="{{ asset('frontend_assets/demo4/assets/img/teacher/2.jpeg') }}" alt="" />
                    </div>
                    <img src="{{ asset('frontend_assets/demo4/assets/img/teacher/shape.png') }}" alt="" />
                  </div>
                  <div class="profile__content">
                    <h3>রাবেয়া বেগম</h3>
                    <p>শিক্ষক</p>
                    <div class="profile__contact">
                      <span><i class="fa-solid fa-envelope"></i></span>
                      <span><i class="fa-solid fa-phone"></i></span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- teacher area start  -->
    <!-- best student area start  -->
    <section class="students__area">
      <div class="container">
        <div class="section__heading">
          <h2>আমাদের সেরা শিক্ষার্থী</h2>
        </div>
        <div class="student__wrapper">
          <div class="student__card">
            <div class="student__img">
              <img src="{{ asset('frontend_assets/demo4/assets/img/school/1.jpg') }}" alt="" />
            </div>
            <div class="student__info">
              <h4>আবু বকর সিদ্দিক</h4>
              <div class="student__meta">
                <span class="gpa">জিপিএ 4.98 </span>
                <span class="session">সেশন ২০-২১</span>
              </div>
            </div>
          </div>
          <div class="student__card">
            <div class="student__img">
              <img src="{{ asset('frontend_assets/demo4/assets/img/school/2.jpg') }}" alt="" />
            </div>
            <div class="student__info">
              <h4>সাদিকা ইসলাম</h4>
              <div class="student__meta">
                <span class="gpa">জিপিএ 4.98 </span>
                <span class="session">সেশন ২০-২১</span>
              </div>
            </div>
          </div>
          <div class="student__card">
            <div class="student__img">
              <img src="{{ asset('frontend_assets/demo4/assets/img/school/3.jpg') }}" alt="" />
            </div>
            <div class="student__info">
              <h4>আবুল কাশেম</h4>
              <div class="student__meta">
                <span class="gpa">জিপিএ 4.98 </span>
                <span class="session">সেশন ২০-২১</span>
              </div>
            </div>
          </div>
          <div class="student__card">
            <div class="student__img">
              <img src="{{ asset('frontend_assets/demo4/assets/img/school/4.jpg') }}" alt="" />
            </div>
            <div class="student__info">
              <h4>হিরো আলম</h4>
              <div class="student__meta">
                <span class="gpa">জিপিএ 4.98 </span>
                <span class="session">সেশন ২০-২১</span>
              </div>
            </div>
          </div>
          <div class="student__card">
            <div class="student__img">
              <img src="{{ asset('frontend_assets/demo4/assets/img/school/1.jpg') }}" alt="" />
            </div>
            <div class="student__info">
              <h4>আবু বকর সিদ্দিক</h4>
              <div class="student__meta">
                <span class="gpa">জিপিএ 4.98 </span>
                <span class="session">সেশন ২০-২১</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- best student area end -->
    <!-- location area start  -->
    <section class="location__area">
      <div class="container">
        <div class="section__heading">
          <h2>আমাদের ঠিকানা</h2>
          <p>
            <i class="fa-solid fa-location-dot"></i>রাংগামাঠি, রংপুর
            (<span>3130</span>)
          </p>
        </div>
        <div class="map">
          <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4576.581490349667!2d90.35098927608736!3d23.82359888596083!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c1006cb54f2d%3A0x970526e9c2b197c6!2sInoodex!5e1!3m2!1sen!2sbd!4v1754299206542!5m2!1sen!2sbd"
            style="border: 0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
      </div>
    </section>
    <!-- location area end -->
    <div class="container">
      <div class="divider"></div>
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <div class="section__heading">
            <h2>শিক্ষাই জাতির মেরুদন্ড, এসো শিক্ষার জন্য!</h2>
            <p>
              শিক্ষা আমাদের জাতির উন্নতির মাধ্যম, জ্ঞানের আলোকে পথ প্রদর্শন
              করে। সবাইকে শিক্ষার দিকে প্রতিবদ্ধ হতে এবং শিক্ষার মূল্যায়ন
              করতে আমরা আমাদের সমর্থন প্রদান করি। আসুন সবাই একসাথে শিক্ষার
              সাথে জুড়ে আগাই জাতির উন্নতির পথে।
            </p>
          </div>
        </div>
      </div>
    </div>
  </main>

  <!-- footer area start -->
  <footer class="footer__area">
    <div class="footer__img">
      <div class="container">
        <img src="{{ asset('frontend_assets/demo4/assets/img/shape/footer.png') }}" alt="" />
      </div>
    </div>
    <div class="footer__main">
      <div class="container">
        <div class="row">
          <div class="col-lg-3">
            <div class="footer__widget">
              <div class="footer__title">
                <h4>যোগাযোগ</h4>
              </div>
              <ul>
                <li>
                  <i class="fa-solid fa-envelope"></i>onlineworkerbdd@gmail.com
                </li>
                <li><i class="fa-solid fa-phone"></i>০৫২১900909</li>
                <li>
                  <i class="fa-solid fa-location-dot"></i>রাংগামাঠি, রংপুর
                  (3130)
                </li>
              </ul>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="footer__widget">
              <div class="footer__title">
                <h4>কুইক লিঙ্কস</h4>
              </div>
              <ul>
                <li>মুজিব কর্নার</li>
                <li>নোটিসবোর্ড</li>
                <li>পরীক্ষার ফলাফল</li>
                <li>অনলাইন ভর্তি আবেদন</li>
              </ul>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="footer__widget">
              <div class="footer__title">
                <h4>প্রতিষ্ঠান</h4>
              </div>
              <ul>
                <li>আমাদের সেবা</li>
                <li>গোপনীয়তা নীতি</li>
                <li>শর্তাবলী</li>
                <li>সাইটম্যাপ</li>
              </ul>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="footer__widget">
              <div class="footer__title">
                <h4>ইতিহাস</h4>
              </div>
              <ul>
                <li>প্রতিষ্ঠানের ইতিহাস</li>
                <li>একাডেমিক ক্যালেন্ডার</li>
                <li>যোগাযোগ</li>
                <li>ছুটির দিন</li>
                <li>কৃতি শিক্ষার্থী</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="footer__bottom">
      <div class="container">
        <p>
          Copyright © Inoodex All rights reserved |
          <a href="https://inoodex.com">Developed By Inoodex</a>
        </p>
      </div>
    </div>
  </footer>

  <!-- footer area end -->

  <!-- JS here -->
  <script src="{{ asset('frontend_assets/demo4/assets/js/vendor/jquery.js') }}"></script>
  <script src="{{ asset('frontend_assets/demo4/assets/js/vendor/waypoints.js') }}"></script>
  <script src="{{ asset('frontend_assets/demo4/assets/js/bootstrap-bundle.js') }}"></script>
  <script src="{{ asset('frontend_assets/demo4/assets/js/meanmenu.js') }}"></script>
  <script src="{{ asset('frontend_assets/demo4/assets/js/swiper-bundle.js') }}"></script>
  <script src="{{ asset('frontend_assets/demo4/assets/js/slick.js') }}"></script>
  <script src="{{ asset('frontend_assets/demo4/assets/js/magnific-popup.js') }}"></script>
  <script src="{{ asset('frontend_assets/demo4/assets/js/backtotop.js') }}"></script>
  <script src="{{ asset('frontend_assets/demo4/assets/js/nice-select.js') }}"></script>
  <script src="{{ asset('frontend_assets/demo4/assets/js/counterup.js') }}"></script>
  <script src="{{ asset('frontend_assets/demo4/assets/js/wow.js') }}"></script>
  <script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.js"></script>
  <!-- <script src="assets/js/isotope.min.js"></script> -->
  <script src="{{ asset('frontend_assets/demo4/assets/js/imagesloaded-pkgd.js') }}"></script>
  <script src="{{ asset('frontend_assets/demo4/assets/js/main.js') }}"></script>
</body>

</html>