<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="x-ua-compatible" content="ie=edge" />
  <title>ইনোডেক্স স্কুল</title>
  <meta name="description" content="" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <!-- Place favicon.ico in the root directory -->
  <link rel="shortcut icon" type="image/x-icon" href="{{ asset('frontend_assets/img/favicon.png') }}" />

  <!-- CSS here -->
  <link rel="stylesheet" href="{{ asset('frontend_assets/css/bootstrap.css') }}" />
  <link rel="stylesheet" href="{{ asset('frontend_assets/css/meanmenu.css') }}" />
  <link rel="stylesheet" href="{{ asset('frontend_assets/css/animate.css') }}" />
  <link rel="stylesheet" href="{{ asset('frontend_assets/css/swiper-bundle.css') }}" />
  <link rel="stylesheet" href="{{ asset('frontend_assets/css/slick.css') }}" />
  <link rel="stylesheet" href="{{ asset('frontend_assets/css/backtotop.css') }}" />
  <link rel="stylesheet" href="{{ asset('frontend_assets/css/simpleLightbox.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('frontend_assets/css/nice-select.css') }}" />
  <link rel="stylesheet" href="{{ asset('frontend_assets/css/font-awesome-pro.css') }}" />
  <link rel="stylesheet" href="{{ asset('frontend_assets/css/spacing.css') }}" />
  <link rel="stylesheet" href="{{ asset('frontend_assets/css/style.css') }}" />
  <!-- Custom CSS for Gallery -->
  <style>
    .gallery__item img {
      width: 100%;
      height: auto;
      object-fit: cover;
      cursor: pointer;
    }

    .section__title h2 {
      text-align: center;
      margin-bottom: 20px;
    }
  </style>
</head>

<body>
  <!-- back to top start -->
  <div class="progress-wrap">
    <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
      <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
    </svg>
  </div>
  <!-- back to top end -->
  <!-- top banner start  -->
  <section class="top__banner">
    <div class="container">
      <div class="top__banner-box">
        <img src="{{ asset('frontend_assets/img/banner/1.png') }}" alt="" />
      </div>
    </div>
  </section>
  <!-- top banner end -->

  <!-- header area start -->
  <header>
    <div class="header__area" id="header-sticky">
      <div class="header__bottom">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-12 col-lg-10 d-none d-lg-block">
              <div class="main-menu">
                <nav id="mobile-menu">
                  <ul>
                    <li class="has-dropdown">
                      <a href="#">ডেমো</a>
                      <ul class="submenu">
                        <li><a href="/">ডেমো ১</a></li>
                        <li><a href="{{ route('demo2') }}" target="-blank">ডেমো ২</a></li>
                        <li><a href="{{ route('demo3') }}" target="-blank">ডেমো ৩</a></li>
                        <li><a href="{{ route('demo4') }}" target="-blank">ডেমো ৪</a></li>
                      </ul>
                    </li>
                    <li class="has-dropdown">
                      <a href="#">প্রশাসন</a>
                      <ul class="submenu">
                        <li><a href="#">পরিচালনা পর্ষদ</a></li>
                        <li><a href="#">একাডেমিক কাঠামো</a></li>
                        <li><a href="#">প্রশাসনিক কাঠামো</a></li>
                        <li><a href="#">শিক্ষকবৃন্দের তালিকা</a></li>
                        <li><a href="#">কর্মচারীবৃন্দের তালিকা</a></li>
                      </ul>
                    </li>
                    <li class="has-dropdown">
                      <a href="#">একাডেমিক</a>
                      <ul class="submenu">
                        <li><a href="#"> একাডেমিক ক্যালেন্ডার</a></li>
                        <li><a href="#">পাঠ্যবইয়ের তালিকা ও সিলেবাস</a></li>
                        <li><a href="#">ক্লাস রুটিন</a></li>
                        <li><a href="#">পরীক্ষার সময়সূচি</a></li>
                      </ul>
                    </li>
                    <li class="has-dropdown">
                      <a href="#">সহপাঠ্যক্রম</a>
                      <ul class="submenu">
                        <li><a href="#">বিএনসিসি</a></li>
                        <li><a href="#">স্কাউটস</a></li>
                        <li><a href="#">রেডক্রস ও রেডক্রিসেন্ট</a></li>
                        <li><a href="#">ক্লাব সমূহ</a></li>
                      </ul>
                    </li>
                    <li class="has-dropdown">
                      <a href="#">বিজ্ঞপ্তি </a>
                      <ul class="submenu">
                        <li><a href="#">শ্রেষ্ঠ শিক্ষক কর্মচারী-২০২৪</a></li>
                        <li><a href="#">শিক্ষার্থীদের আচরণবিধি</a></li>
                        <li><a href="#">অভিভাবকের জন্য নির্দেশিকা</a></li>
                        <li><a href="#">পোশাকরীতি</a></li>
                      </ul>
                    </li>
                    <li>
                      <a href="#">বিজ্ঞপ্তি </a>
                    </li>
                    <li class="has-dropdown">
                      <a href="#">বিবিধ </a>
                      <ul class="submenu">
                        <li><a href="#">শ্রেষ্ঠ শিক্ষক কর্মচারী-২০২৪</a></li>
                        <li><a href="#">শিক্ষার্থীদের আচরণবিধি</a></li>
                        <li><a href="#">অভিভাবকের জন্য নির্দেশিকা</a></li>
                        <li><a href="#">পোশাকরীতি</a></li>
                      </ul>
                    </li>
                    <li class="has-dropdown">
                      <a href="#">ভর্তি ও নিয়োগ</a>
                      <ul class="submenu">
                        <li><a href="#">অনলাইন এডমিশন</a></li>
                        <li><a href="#">চাকরির আবেদন</a></li>
                      </ul>
                    </li>
                    <li class="has-dropdown">
                      <a href="#">পোর্টাল </a>
                      <ul class="submenu">
                        <li><a href="#">স্টুডেন্ট পোর্টাল</a></li>
                        <li><a href="#">শিক্ষক পোর্টাল</a></li>
                        <li><a href="#">এডমিন লগিন</a></li>
                      </ul>
                    </li>
                    <li>
                      <a href="{{ route('login') }}">Login</a>
                    </li>
                  </ul>
                </nav>
              </div>
            </div>
            <div class="col-lg-2 d-block d-lg-none">
              <div class="header__bottom__right d-flex justify-content-end align-items-center pl-30">
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
      <i class="fa-solid fa-xmark-large"></i>
    </button>
    <div class="mobile-menu"></div>
  </div>
  <div class="body-overlay"></div>

  <main>
    <!-- banner slider start  -->
    <section class="banner__slider">
      <div class="container slider__padding">
        <div class="slider__inner">
          <div class="slider__item">
            <img src="{{ asset('frontend_assets/img/slider/1.jpeg') }}" alt="" />
          </div>
          <div class="slider__item">
            <img src="{{ asset('frontend_assets/img/slider/2.jpeg') }}" alt="" />
          </div>
        </div>
      </div>
    </section>
    <!-- banner slider end -->

    <!-- main content start  -->
    <div class="main__content">
      <div class="container">
        <div class="row">
          <div class="col-lg-9">
            <div class="institute__history">
              <div class="card card__shadow mb-4">
                <div class="card-header">
                  <h3>বিদ্যালয় পরিচিতি</h3>
                </div>
                <div class="card-body">
                  <div class="card-image">
                    <img src="{{ asset('frontend_assets/img/school/1.jpeg') }}" alt="" />
                  </div>
                  <div class="card-content">
                    <p>
                      ১/১ ১৯৯৯ এলাকার শিক্ষা অনুরাগী ব্যক্তিরা মেয়েদের
                      লেখাপড়ার জন্য জন্য একটি বালিকা উচ্চ বিদ্যালয়ের
                      প্রয়োজনীয়তা উপলব্ধি করলেন। সেই উপলব্ধি থেকে এলাকার
                      শিক্ষা অনুরাগী ব্যক্তি এস. এম জয়নাল আবেদীনের পরিবারের
                      সাথে আলোচনা করেন এবং বিদ্যালয়ে প্রয়োজনীয় জমি দান করার
                      জন্য অনুরোধ করেন তাদের পরিবার থেকে ৭৫.৯৮ শতাংস জমি দান
                      করা হয় বিদ্যালয়ের নামে। এস এম জয়নাল আবেদীনের বড় ভাই
                      জনাব অধ্যাপক নজিবর রহমান এর নামে বিদ্যালয়টি নামকরণ করার
                      সিদ্ধান্ত গ্রহণ করেন শিক্ষা অনুরাগী ব্যক্তিরা।
                    </p>
                    <div class="card-btn text-end">
                      <button class="btn btn-primary">Read More</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- bani section  -->
            <div class="row">
              <div class="col-lg-6">
                <div class="teacher__card">
                  <div class="card card-shadow">
                    <div class="card-header">
                      <h4>সভাপতির বানী</h4>
                    </div>
                    <div class="card-content p-3">
                      <p class="w-img">
                        <img class="" src="{{ asset('frontend_assets/img/school/1.jpeg') }}" alt="" />
                        আজকের শিশু কিশোর তরুণেরাই ভবিষ্যতে দেশ ও জাতির
                        কর্ণধার। এদের গভীরে লুকিয়ে রয়েছে অশেষ সম্ভাবনা ও বিপুল
                        সৃজনী প্রতিভা। কোমলমতি শিক্ষার্থীর অভ্যন্তরে
                        স্ফুটনোম্মুখ মেধার সুষ্ঠু বিকাশ ও তার বহুমুখী
                        সম্ভাবনার দ্বার উন্মোচনের জন্য যথোপযুক্ত মাধ্যম
                        প্রয়োজন। প্রতিষ্ঠানের বার্ষিকী এই অভাব অনেকাংশে পূরণ
                        করে। শিক্ষার্থীর জন্য আত্মবিকাশের এমন একটি চমৎকার
                        সুযোগ প্রতিষ্ঠান কর্তৃপক্ষ দিতে পারছে বলে আমি গর্ববোধ
                        করছি। একটি বার্ষিকী হল একটি প্রতিষ্ঠানের সামগ্রিক
                        কর্মকান্ডের দর্পণ। তাই এই বার্ষিকীর পাতায় প্রতিষ্ঠানের
                        জন্মলগ্ন থেকে উত্তরণের দীর্ঘ ইতিহাসের ।
                      </p>
                      <div class="card-btn text-end">
                        <button class="btn btn-primary">Read More</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="teacher__card">
                  <div class="card card-shadow">
                    <div class="card-header">
                      <h4>প্রধান শিক্ষকের বানী</h4>
                    </div>
                    <div class="card-content p-3">
                      <p class="w-img">
                        <img class="" src="{{ asset('frontend_assets/img/school/1.jpeg') }}" alt="" />
                        আজকের শিশু কিশোর তরুণেরাই ভবিষ্যতে দেশ ও জাতির
                        কর্ণধার। এদের গভীরে লুকিয়ে রয়েছে অশেষ সম্ভাবনা ও বিপুল
                        সৃজনী প্রতিভা। কোমলমতি শিক্ষার্থীর অভ্যন্তরে
                        স্ফুটনোম্মুখ মেধার সুষ্ঠু বিকাশ ও তার বহুমুখী
                        সম্ভাবনার দ্বার উন্মোচনের জন্য যথোপযুক্ত মাধ্যম
                        প্রয়োজন। প্রতিষ্ঠানের বার্ষিকী এই অভাব অনেকাংশে পূরণ
                        করে। শিক্ষার্থীর জন্য আত্মবিকাশের এমন একটি চমৎকার
                        সুযোগ প্রতিষ্ঠান কর্তৃপক্ষ দিতে পারছে বলে আমি গর্ববোধ
                        করছি। একটি বার্ষিকী হল একটি প্রতিষ্ঠানের সামগ্রিক
                        কর্মকান্ডের দর্পণ। তাই এই বার্ষিকীর পাতায় প্রতিষ্ঠানের
                        জন্মলগ্ন থেকে উত্তরণের দীর্ঘ ইতিহাসের ।
                      </p>
                      <div class="card-btn text-end">
                        <button class="btn btn-primary">Read More</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="content__sidebar">
              <div class="notice">
                <div class="card card-shadow">
                  <div class="card-header">
                    <h4><i class="fa-solid fa-list-ul"></i> নোটিশ</h4>
                  </div>
                  <div class="card-body">
                    <ul>
                      <li>
                        <a href="#"><i class="fa-regular fa-angle-right"></i> 2026
                          সালের পরীক্ষার ফলাফল। আমার সোনার বাংলা আমি তোমায়
                          ভালোবাসি</a>
                      </li>
                      <li>
                        <a href="#"><i class="fa-regular fa-angle-right"></i> 2026
                          সালের পরীক্ষার ফলাফল।</a>
                      </li>
                      <li>
                        <a href="#"><i class="fa-regular fa-angle-right"></i> 2026
                          সালের পরীক্ষার ফলাফল।</a>
                      </li>
                      <li>
                        <a href="#"><i class="fa-regular fa-angle-right"></i> 2026
                          সালের পরীক্ষার ফলাফল।</a>
                      </li>
                      <li>
                        <a href="#"><i class="fa-regular fa-angle-right"></i> 2026
                          সালের পরীক্ষার ফলাফল।</a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="notice">
                <div class="card card-shadow">
                  <div class="card-header">
                    <h4>
                      <i class="fa-solid fa-list-ul"></i> বিভিন্ন জেলার
                      ওয়েবসাইট
                    </h4>
                  </div>
                  <div class="card-body">
                    <ul>
                      <li>
                        <a href="#"><i class="fa-regular fa-angle-right"></i> শিক্ষক
                          বাতায়ন</a>
                      </li>
                      <li>
                        <a href="#"><i class="fa-regular fa-angle-right"></i> মিরপুর
                          জেলা প্রসাশন</a>
                      </li>
                      <li>
                        <a href="#"><i class="fa-regular fa-angle-right"></i> মিরপুর
                          ইনফরমেশন
                        </a>
                      </li>
                      <li>
                        <a href="#"><i class="fa-regular fa-angle-right"></i> বাংলা
                          অভিধান</a>
                      </li>
                      <li>
                        <a href="#"><i class="fa-regular fa-angle-right"></i> কম্পিউটার
                          কাউন্সিল</a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- main content end -->

    <!-- gallery section start -->
    <section class="gallery">
      <div class="container">
        <div class="gallery__box">
          <div class="section__title">
            <h2>ফটো গ্যালারী</h2>
          </div>
          <div class="gallery__images">
            <div class="row gx-4 gy-4">
              <div class="col-lg-3">
                <a href="{{ asset('frontend_assets/img/gallery/1.jpg') }}" class="gallery__item popup-image">
                  <img src="{{ asset('frontend_assets/img/gallery/1.jpg') }}" alt="Gallery Image 1" />
                </a>
              </div>
              <div class="col-lg-3">
                <a href="{{ asset('frontend_assets/img/gallery/2.jpg') }}" class="gallery__item popup-image">
                  <img src="{{ asset('frontend_assets/img/gallery/2.jpg') }}" alt="Gallery Image 2" />
                </a>
              </div>
              <div class="col-lg-3">
                <a href="{{ asset('frontend_assets/img/gallery/3.png') }}" class="gallery__item popup-image">
                  <img src="{{ asset('frontend_assets/img/gallery/3.png') }}" alt="Gallery Image 3" />
                </a>
              </div>
              <div class="col-lg-3">
                <a href="{{ asset('frontend_assets/img/gallery/4.jpg') }}" class="gallery__item popup-image">
                  <img src="{{ asset('frontend_assets/img/gallery/4.jpg') }}" alt="Gallery Image 4" />
                </a>
              </div>
              <div class="col-lg-3">
                <a href="{{ asset('frontend_assets/img/gallery/5.jpg') }}" class="gallery__item popup-image">
                  <img src="{{ asset('frontend_assets/img/gallery/5.jpg') }}" alt="Gallery Image 5" />
                </a>
              </div>
              <div class="col-lg-3">
                <a href="{{ asset('frontend_assets/img/gallery/1.jpg') }}" class="gallery__item popup-image">
                  <img src="{{ asset('frontend_assets/img/gallery/1.jpg') }}" alt="Gallery Image 1" />
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- gallery section end -->

    <!-- gallery section end -->
  </main>

  <!-- footer area start -->

  <footer class="footer__area">
    <div class="container">
      <div class="row">
        <div class="col-lg-4">
          <div class="footer__widget">
            <div class="widget__title">
              <h4>যোগাযোগের ঠিকানা</h4>
            </div>
            <div class="widget__content">
              <ul>
                <li>
                  <a href="#"><i class="fa-regular fa-location-dot"></i> Sonagazi Main
                    Road, Feni</a>
                </li>
                <li>
                  <a href="#"><i class="fa-regular fa-phone"></i> 01752958621
                  </a>
                </li>
                <li>
                  <a href="#"><i class="fa-regular fa-envelope"></i>
                    sonagazifm@gmail.com
                  </a>
                </li>
                <li>
                  <a href="#"><i class="fa-regular fa-arrow-up-right-from-square"></i>
                    www.inoodex.com
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="footer__widget">
            <div class="widget__title">
              <h4>প্রয়োজনীয় লিংক</h4>
            </div>
            <div class="widget__content">
              <ul>
                <li>
                  <a href="#"><i class="fa-regular fa-angle-right"></i> পরীক্ষার
                    ফলাফল</a>
                </li>
                <li>
                  <a href="#"><i class="fa-regular fa-angle-right"></i> ব্লগ
                  </a>
                </li>
                <li>
                  <a href="#"><i class="fa-regular fa-angle-right"></i> ডাউনলোড</a>
                </li>
                <li>
                  <a href="#"><i class="fa-regular fa-angle-right"></i> পরীক্ষার
                    রুটিন</a>
                </li>
                <li>
                  <a href="#"><i class="fa-regular fa-angle-right"></i> ভর্তি</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="footer__widget">
            <div class="widget__title">
              <h4>একাডেমিক</h4>
            </div>
            <div class="widget__content">
              <ul>
                <li>
                  <a href="#"><i class="fa-regular fa-angle-right"></i> প্রতিষ্ঠানের
                    ইতিহাস</a>
                </li>
                <li>
                  <a href="#"><i class="fa-regular fa-angle-right"></i> যোগাযোগ
                  </a>
                </li>
                <li>
                  <a href="#"><i class="fa-regular fa-angle-right"></i> ছুটির দিন</a>
                </li>
                <li>
                  <a href="#"><i class="fa-regular fa-angle-right"></i> নোটিস</a>
                </li>
                <li>
                  <a href="#"><i class="fa-regular fa-angle-right"></i> ফটো গ্যালারি</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!-- footer area end -->

  <!-- JS here -->
  <script src="{{ asset('frontend_assets/js/vendor/jquery.js') }}"></script>
  <script src="{{ asset('frontend_assets/js/vendor/waypoints.js') }}"></script>
  <script src="{{ asset('frontend_assets/js/bootstrap-bundle.js') }}"></script>
  <script src="{{ asset('frontend_assets/js/meanmenu.js') }}"></script>
  <script src="{{ asset('frontend_assets/js/swiper-bundle.js') }}"></script>
  <script src="{{ asset('frontend_assets/js/slick.js') }}"></script>
  <script src="{{ asset('frontend_assets/js/parallax.js') }}"></script>
  <script src="{{ asset('frontend_assets/js/backtotop.js') }}"></script>
  <script src="{{ asset('frontend_assets/js/nice-select.js') }}"></script>
  <script src="{{ asset('frontend_assets/js/counterup.js') }}"></script>
  <script src="{{ asset('frontend_assets/js/wow.js') }}"></script>
  <script src="{{ asset('frontend_assets/js/isotope-pkgd.js') }}"></script>
  <script src="{{ asset('frontend_assets/js/imagesloaded-pkgd.js') }}"></script>
  <script src="{{ asset('frontend_assets/js/ajax-form.js') }}"></script>
  <script src="{{ asset('frontend_assets/js/magnific-popup.min.js') }}"></script>
  <script src="{{ asset('frontend_assets/js/main.js') }}"></script>
</body>

</html>