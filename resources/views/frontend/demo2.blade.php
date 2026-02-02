<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="x-ua-compatible" content="ie=edge" />
  <title>Title - Your title gores here</title>
  <meta name="description" content="" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <!-- Place favicon.ico in the root directory -->
  <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png" />

  <!-- CSS here -->
  <link rel="stylesheet" href="{{ asset('frontend_assets/demo2/assets/css/bootstrap.css') }}" />
  <link rel="stylesheet" href="{{ asset('frontend_assets/demo2/assets/css/meanmenu.css') }}" />
  <link rel="stylesheet" href="{{ asset('frontend_assets/demo2/assets/css/animate.css') }}" />
  <link rel="stylesheet" href="{{ asset('frontend_assets/demo2/assets/css/swiper-bundle.css') }}" />
  <link rel="stylesheet" href="{{ asset('frontend_assets/demo2/assets/css/slick.css') }}" />
  <!-- <link rel="stylesheet" href="assets/css/backtotop.css" /> -->
  <link rel="stylesheet" href="{{ asset('frontend_assets/demo2/assets/css/magnific-popup.css')}}" />
  <link rel="stylesheet" href="{{ asset('frontend_assets/demo2/assets/css/nice-select.css')}}" />
  <link rel="stylesheet" href="{{ asset('frontend_assets/demo2/assets/css/font-awesome-pro.css')}}" />
  <link rel="stylesheet" href="{{ asset('frontend_assets/demo2/assets/css/spacing.css')}}" />
  <link rel="stylesheet" href="{{ asset('frontend_assets/demo2/assets/css/style.css')}}" />
</head>

<body>
  <!-- back to top start -->
  <!-- <div class="progress-wrap">
      <svg
        class="progress-circle svg-content"
        width="100%"
        height="100%"
        viewBox="-1 -1 102 102"
      >
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
      </svg>
    </div> -->
  <!-- back to top end -->

  <main>
    <div class="container p-0">
      <!-- top text area start  -->
      <div class="top__text">
        <p>ফাকল পুলিশ লাইন্স স্কুল এন্ড কলেজ</p>
      </div>
      <!-- top text area end -->
      <!-- slider area start  -->
      <section class="slider__area">
        <div class="slide__wrap slider-active">
          <div class="slide__item">
            <img src="{{ asset('frontend_assets/demo2/assets/img/banner/2.jpg') }}" alt="" />
          </div>
          <div class="slide__item">
            <img src="{{ asset('frontend_assets/demo2/assets/img/banner/3.jpeg') }}" alt="" />
          </div>
          <div class="slide__item">
            <img src="{{ asset('frontend_assets/demo2/assets/img/banner/4.jpeg') }}" alt="" />
          </div>
        </div>
        <div class="slide__content">
          <div class="slide__logo">
            <img src="{{ asset('frontend_assets/demo2/assets/img/banner/logo.png') }}" alt="" />
          </div>
          <div class="slider__text">
            <h3>ফাকল পুলিশ লাইন্স স্কুল এন্ড কলেজ</h3>
          </div>
        </div>
      </section>
      <!-- slider area end  -->

      <!-- header area start  -->
      <header>
        <div class="header__area">
          <div class="header__bottom" id="header-sticky">
            <div class="container">
              <div class="row align-items-center">
                <div class="col-lg-12 d-none d-lg-block px-0">
                  <div class="main-menu">
                    <nav id="mobile-menu">
                      <ul>
                        <li>
                          <a class="orange" href="#">প্রতিষ্ঠানের ইতিহাস</a>
                        </li>
                        <li>
                          <a class="red" href="#">শিক্ষক</a>
                        </li>
                        <li>
                          <a class="purple" href="#">অনলাইন এডমিশন</a>
                        </li>
                        <li>
                          <a class="green" href="#">ফটো গ্যালারী</a>
                        </li>
                        <li>
                          <a class="blue" href="#">ভিডিও</a>
                        </li>
                        <li>
                          <a class="violet" href="#">নোটিশ</a>
                        </li>
                        <li>
                          <a class="dark-green" href="#">একাডেমিক তথ্য</a>
                        </li>
                        <li>
                          <a class="chocolate" href="#">যোগাযোগ</a>
                        </li>
                        <li>
                          <a class="chocolate" href="{{ route('login') }}">লগইন</a>
                          <ul class="submenu">
                            <li><a href="#">শিক্ষক লগিন</a></li>
                            <li><a href="#">স্টাফ লগইন</a></li>
                          </ul>
                        </li>
                      </ul>
                    </nav>
                  </div>
                </div>
                <div class="col-md-12 col-6 d-block d-lg-none">
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
      <!-- mobile menu start  -->
      <div class="tp-sidebar-menu">
        <button class="sidebar-close">
          <i class="fa-solid fa-xmark-large"><i class="fa-regular fa-xmark"></i></i>
        </button>
        <div class="mobile-menu"></div>
      </div>
      <div class="body-overlay"></div>
      <!-- mobile menu end -->

      <!-- main content start  -->
      <section class="main__content">
        <div class="row">
          <div class="col-lg-9">
            <!-- banner image  -->
            <div class="banner__img">
              <img src="{{ asset('frontend_assets/demo2/assets/img/banner/1.png') }}" alt="" />
            </div>
            <!-- text scrolling  -->
            <section class="b-section">
              <div class="b-section-marquee-box">
                <p class="marquee-text">
                  জরুরী ঘোষণা : আমাদের ওয়েব সাইটের সার্বিক উন্নয়ন এর কাজ চলছে।
                  কাজ চলাকালীন অবস্থায় , আপনাদের সাময়িকভাবে কিছুটা অসুবিধা হতে
                  পারে এর জন্য আমরা আন্তরিকভাবে দুক্ষিত । আমাদের ওয়েবসাইট
                  উন্নয়নের কাজটি আগামিকাল শেষ হবে। আমাদের সাথে থাকার
                </p>
              </div>
            </section>
            <!-- notice board  -->
            <div class="notice">
              <h3>নোটিশ</h3>
              <ul>
                <li>
                  <a href="#">Regarding caution against being deceived by fraudsters
                    regarding scholar..</a>
                </li>
                <li>
                  <a href="#">Regarding caution against being deceived by fraudsters
                    regarding scholar..</a>
                </li>
                <li>
                  <a href="#">Regarding caution against being deceived by fraudsters
                    regarding scholar..</a>
                </li>
                <li>
                  <a href="#">Regarding caution against being deceived by fraudsters
                    regarding scholar..</a>
                </li>
                <li>
                  <a href="#">Regarding caution against being deceived by fraudsters
                    regarding scholar..</a>
                </li>
                <li>
                  <a href="#">Regarding caution against being deceived by fraudsters
                    regarding scholar..</a>
                </li>
                <li>
                  <a href="#">Regarding caution against being deceived by fraudsters
                    regarding scholar..</a>
                </li>
              </ul>
            </div>

            <!-- all eductaion card  -->
            <div class="education__card">
              <div class="row">
                <div class="col-md-6">
                  <div class="card__box">
                    <h4>শিক্ষার্থী ও অভিভাবগদের কর্ণার</h4>
                    <div class="card__content">
                      <div class="card__icon">
                        <img src="{{ asset('frontend_assets/demo2/assets/img/card/1.png') }}" alt="" />
                      </div>
                      <div class="card__text">
                        <ul>
                          <li>
                            <a href="#">শিক্ষার্থী ও অভিভাবগদের কর্ণার</a>
                          </li>
                          <li><a href="#">শিক্ষার্থী লগইন</a></li>
                          <li><a href="#">অভিভাবগ লগইন</a></li>
                          <li><a href="#">অনলাইন রেজাল্ট</a></li>
                          <li><a href="#">অনলাইন এডমিশন</a></li>
                          <li><a href="#">এডমিট কার্ড</a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="card__box">
                    <h4>শিক্ষক ও স্টাফদের কর্ণার</h4>
                    <div class="card__content">
                      <div class="card__icon">
                        <img src="{{ asset('frontend_assets/demo2/assets/img/card/2.png') }}" alt="" />
                      </div>
                      <div class="card__text">
                        <ul>
                          <li><a href="#">শিক্ষক ও স্টাফদের কর্ণার</a></li>
                          <li><a href="#">শিক্ষক লগইন</a></li>
                          <li><a href="#">স্টাফ লগইন</a></li>
                          <li><a href="#">শিক্ষক মণ্ডলীদের তালিকা</a></li>
                          <li><a href="#">স্টাফদের তালিকা</a></li>
                          <li><a href="#">লাইব্রেরিয়ান লগইন</a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="card__box">
                    <h4>সকল ডাউনলোড</h4>
                    <div class="card__content">
                      <div class="card__icon">
                        <img src="{{ asset('frontend_assets/demo2/assets/img/card/3.png') }}" alt="" />
                      </div>
                      <div class="card__text">
                        <ul>
                          <li><a href="#">এডমিট কার্ড ডাউনলোড</a></li>
                          <li><a href="#">মার্কশিট ডাউনলোড</a></li>
                          <li><a href="#">সার্টিফিকেট ডাউনলোড</a></li>
                          <li><a href="#">পরীক্ষার রুটিন</a></li>
                          <li><a href="#">ভর্তি ফরম ডাউনলোড</a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="card__box">
                    <h4>একাডেমিক তথ্য</h4>
                    <div class="card__content">
                      <div class="card__icon">
                        <img src="{{ asset('frontend_assets/demo2/assets/img/card/4.png') }}" alt="" />
                      </div>
                      <div class="card__text">
                        <ul>
                          <li><a href="#">প্রতিষ্ঠানের ইতিহাস</a></li>
                          <li><a href="#">পরীক্ষার ফলাফল</a></li>
                          <li><a href="#">নোটিশ</a></li>
                          <li><a href="#">এডমিট কার্ড</a></li>
                          <li><a href="#">ফোটো গ্যালারী</a></li>
                          <li><a href="#">ভিডিও গ্যালারী</a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="card__box">
                    <h4>আইন ও বিধি</h4>
                    <div class="card__content">
                      <div class="card__icon">
                        <img src="{{ asset('frontend_assets/demo2/assets/img/card/5.png') }}" alt="" />
                      </div>
                      <div class="card__text">
                        <ul>
                          <li>
                            <a href="#">শিক্ষার্থী ও অভিভাবগদের কর্ণার</a>
                          </li>
                          <li><a href="#"> বিভাগীয় আইন </a></li>
                          <li><a href="#">বিধিমালা</a></li>
                          <li><a href="#">নীতিমালা</a></li>
                          <li><a href="#">প্রজ্ঞাপন ও পরিপত্র</a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="card__box">
                    <h4>কর্মসম্পাদন ব্যবস্থাপনা</h4>
                    <div class="card__content">
                      <div class="card__icon">
                        <img src="{{ asset('frontend_assets/demo2/assets/img/card/6.png') }}" alt="" />
                      </div>
                      <div class="card__text">
                        <ul>
                          <li>
                            <a href="#">শিক্ষার্থী ও অভিভাবগদের কর্ণার</a>
                          </li>
                          <li><a href="#">প্রজ্ঞাপন/পরিপত্র/নীতিমালা</a></li>
                          <li><a href="#">চুক্তিসমূহ</a></li>
                          <li><a href="#">চুক্তির কাঠামো</a></li>
                          <li><a href="#">এপিএমএস</a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- video gallery -->
            <div class="video_gallery">
              <div class="video_gallary_title">
                <h3>ভিডিও গ্যালারী</h3>
              </div>
              <div class="video_content">
                <div class="row g-xl-2">
                  <div class="col-md-4 mb-4">
                    <div class="video">
                      <iframe width="560" height="315"
                        src="https://www.youtube.com/embed/9sFU2YiDdHw?si=C6uy4gneqWWnJ8Ea" title="YouTube video player"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    </div>
                  </div>
                  <div class="col-md-4 mb-4">
                    <div class="video">
                      <iframe width="560" height="315"
                        src="https://www.youtube.com/embed/9sFU2YiDdHw?si=C6uy4gneqWWnJ8Ea" title="YouTube video player"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    </div>
                  </div>
                  <div class="col-md-4 mb-4">
                    <div class="video">
                      <iframe width="560" height="315"
                        src="https://www.youtube.com/embed/9sFU2YiDdHw?si=C6uy4gneqWWnJ8Ea" title="YouTube video player"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="sidebar_wrap">
              <div class="sidebar_card">
                <div class="card_title">
                  <h4>মাননীয় প্রধানমন্ত্রী</h4>
                </div>
                <div class="card_img">
                  <img src="{{ asset('frontend_assets/demo2/assets/img/sidebar/younus.jpeg') }}" alt="" />
                </div>
                <div class="sidebar_content">
                  <p>ড. মোঃ ইউনুস</p>
                  <p>প্রধানমন্ত্রী</p>
                  <p>গনপ্রজাতন্ত্রী বাংলাদেশ সরকার</p>
                </div>
              </div>
              <div class="sidebar_card">
                <div class="card_title">
                  <h4>সভাপতির বানী</h4>
                </div>
                <div class="card_img">
                  <img src="{{ asset('frontend_assets/demo2/assets/img/sidebar/rasid.jpeg') }}" alt="" />
                </div>
                <div class="sidebar_content">
                  <p>মোঃ আব্দুর রশিদ</p>
                  <p>সভাপতী</p>
                  <p>ফাকল পুলিশ লাইন্স স্কুল এন্ড কলেজ</p>
                </div>
              </div>

              <div class="sidebar_card">
                <div class="card_title">
                  <h4>প্রিন্সিপালের বানী</h4>
                </div>
                <div class="card_img">
                  <img src="{{ asset('frontend_assets/demo2/assets/img/sidebar/principal.jpeg') }}" alt="" />
                </div>
                <div class="sidebar_content">
                  <p>মোঃ আবু সাঈদ</p>
                  <p>প্রিন্সিপাল</p>
                  <p>ফাকল পুলিশ লাইন্স স্কুল এন্ড কলেজ</p>
                </div>
              </div>
              <div class="sidebar_card">
                <div class="card_title">
                  <h4>গুরুত্বপুর্ন লিংক</h4>
                </div>
                <div class="sidebar_content links">
                  <ul>
                    <li><a href="#">শিক্ষা মন্ত্রনালয়</a></li>
                    <li>
                      <a href="#">মাধ্যমিক ও উচ্চমাধ্যমিক শিক্ষা বোর্ড, ঢাকা</a>
                    </li>
                    <li><a href="#">মাধ্যমিক ও উচ্চশিক্ষা অধিদপ্তর</a></li>
                    <li><a href="#">জাতীয় বিশ্ববিদ্যালয়</a></li>
                    <li><a href="#">মাধ্যমিক ও উচ্চ শিক্ষা বিভাগ</a></li>
                    <li><a href="#">বাংলাদেশ কারিগরি শিক্ষা বোর্ড</a></li>
                    <li>
                      <a href="#">প্রধানমন্ত্রীর শিক্ষা সহায়তা ট্রাস্ট</a>
                    </li>
                    <li><a href="#">প্রধানমন্ত্রীর কার্যালয়</a></li>
                    <li><a href="#">মন্ত্রীপরিষদ বিভাগ</a></li>
                  </ul>
                </div>
              </div>
              <div class="sidebar_card">
                <div class="card_title">
                  <h4>জরুরী হটলাইন</h4>
                </div>
                <div class="card_img2">
                  <img src="{{ asset('frontend_assets/demo2/assets/img/sidebar/hotline1.jpg') }}" alt="" />
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- main content end -->
    </div>
  </main>

  <!-- footer area start -->
  <div class="footer__img">
    <img src="{{ asset('frontend_assets/demo2/assets/img/banner/footer.png') }}" alt="" />
  </div>
  <footer class="footer__area">
    <div class="row">
      <div class="col-sm-6">
        <div class="footer__widget">
          <h4>ফাকল পুলিশ লাইন্স স্কুল অ্যান্ড কলেজ</h4>
          <ul>
            <li>
              ঠিকানাঃ হাউজঃ মুন্সি বাড়ি, নয়ার হাট স্কুল সংলগ্ন, বড়বাড়ি,
              লালমনির হাট
            </li>
            <li>মোবাইলঃ ০১৮৪৯৮৩২১৭৮</li>
            <li>ইমেইলঃ info@creativedesign.com.bd</li>
          </ul>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="footer__widget text-start text-sm-end">
          <h5>কারিগরি সহযোগিতায়</h5>
          <h4>ইনডেক্স</h4>
          <ul>
            <li>ঘরোয়ার মোর, মিরপুর পল্লবি, ঢাকা। মোবাইল : ০১৫৩১৩৮৫৯৮৮</li>

            <li>ওয়েব সাইট ডিজাইন ডেভফিক্সার টেকনোলজিস</li>
          </ul>
        </div>
      </div>
    </div>
  </footer>
  <!-- footer area end -->

  <!-- JS here -->
  <script src="{{ asset('frontend_assets/demo2/assets/js/vendor/jquery.js') }}"></script>
  <script src="{{ asset('frontend_assets/demo2/assets/js/vendor/waypoints.js') }}"></script>
  <script src="{{ asset('frontend_assets/demo2/assets/js/bootstrap-bundle.js') }}"></script>
  <script src="{{ asset('frontend_assets/demo2/assets/js/meanmenu.js') }}"></script>
  <script src="{{ asset('frontend_assets/demo2/assets/js/swiper-bundle.js') }}"></script>
  <script src="{{ asset('frontend_assets/demo2/assets/js/slick.js') }}"></script>
  <script src="{{ asset('frontend_assets/demo2/assets/js/magnific-popup.js') }}"></script>
  <script src="{{ asset('frontend_assets/demo2/assets/js/parallax.js') }}"></script>
  <!-- <script src="assets/js/backtotop.js"></script> -->
  <script src="{{ asset('frontend_assets/demo2/assets/js/nice-select.js') }}"></script>
  <script src="{{ asset('frontend_assets/demo2/assets/js/counterup.js') }}"></script>
  <script src="{{ asset('frontend_assets/demo2/assets/js/wow.js') }}"></script>
  <script src="{{ asset('frontend_assets/demo2/assets/js/isotope-pkgd.js') }}"></script>
  <script src="{{ asset('frontend_assets/demo2/assets/js/imagesloaded-pkgd.js') }}"></script>
  <script src="{{ asset('frontend_assets/demo2/assets/js/main.js') }}"></script>
</body>

</html>