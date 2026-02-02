<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="x-ua-compatible" content="ie=edge" />
  <title>School Management System</title>
  <meta name="description" content="" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <!-- Place favicon.ico in the root directory -->
  <link rel="shortcut icon" type="image/x-icon" href="{{ asset('frontend_assets/demo3/assets/img/favicon.png') }}" />

  <!-- CSS here -->
  <link rel="stylesheet" href="{{ asset('frontend_assets/demo3/assets/css/bootstrap.css') }}" />
  <link rel="stylesheet" href="{{ asset('frontend_assets/demo3/assets/css/meanmenu.css') }}" />
  <link rel="stylesheet" href="{{ asset('frontend_assets/demo3/assets/css/animate.css') }}" />
  <link rel="stylesheet" href="{{ asset('frontend_assets/demo3/assets/css/swiper-bundle.css') }}" />
  <link rel="stylesheet" href="{{ asset('frontend_assets/demo3/assets/css/slick.css') }}" />
  <link rel="stylesheet" href="{{ asset('frontend_assets/demo3/assets/css/backtotop.css') }}" />
  <link rel="stylesheet" href="{{ asset('frontend_assets/demo3/assets/css/magnific-popup.css') }}" />
  <link rel="stylesheet" href="{{ asset('frontend_assets/demo3/assets/css/nice-select.css') }}" />
  <link rel="stylesheet" href="{{ asset('frontend_assets/demo3/assets/css/ui-icon.css') }}" />
  <link rel="stylesheet" href="{{ asset('frontend_assets/demo3/assets/css/font-awesome-pro.css') }}" />
  <link rel="stylesheet" href="{{ asset('frontend_assets/demo3/assets/css/spacing.css') }}" />
  <link rel="stylesheet" href="{{ asset('frontend_assets/demo3/assets/css/style.css') }}" />
</head>

<body>
  <!-- header area start -->
  <header>
    <div class="header__area">
      <!-- header top start  -->
      <div class="header__top header__border d-none d-md-block">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-lg-6">
              <div class="header__info">
                <ul class="d-flex">
                  <li>
                    <a href="mailto:info@educal.com"><i class="fa-regular fa-envelope"></i>
                      hello@inoodex.com</a>
                  </li>
                  <li>
                    <a href="https://goo.gl/maps/qzqY2PAcQwUz1BYN9" target="_blank"><i
                        class="fa-regular fa-location-dot"></i>E1, Ghoroar
                      More, Mirpur Pallabi, Dhaka</a>
                  </li>
                </ul>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="header__top-right d-flex justify-content-end align-items-center">
                <div class="header__social">
                  <ul>
                    <li>
                      <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                    </li>
                    <li>
                      <a href="#"><i class="fa-brands fa-twitter"></i></a>
                    </li>
                    <li>
                      <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
                    </li>
                    <li>
                      <a href="#"><i class="fa-brands fa-pinterest-p"></i></a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- header top end  -->
      <div class="header__main">
        <div class="container">
          <div class="header__head d-flex align-content-center">
            <a href="index.html" class="logo">
              <img src="{{ asset('frontend_assets/demo3/assets/img/logo/logo.png') }}" alt="" />
            </a>
            <div class="header__title">
              <h2>ADAMJEE CANTONMENT PUBLIC SCHOOL</h2>
              <p>Dhaka Cantonment, Dhaka-1206, Bangladesh</p>
              <p>
                Established : 1960 | School Code(Board) : 1250 | EIIN : 107843
              </p>
            </div>
          </div>
        </div>
      </div>
      <!-- navigation area start  -->
      <div class="header__bottom" id="header-sticky">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-lg-12 d-none d-lg-block">
              <div class="main-menu">
                <nav id="mobile-menu">
                  <ul>
                    <li>
                      <a href="#">Home</a>
                    </li>
                    <li class="has-dropdown">
                      <a href="#">About</a>
                      <ul class="submenu">
                        <li><a href="#">At a glance</a></li>
                        <li><a href="#">History</a></li>
                        <li><a href="#">Why Study at ACPS</a></li>
                        <li><a href="#">Infustructure</a></li>
                        <li><a href="#">Achivement</a></li>
                        <li><a href="#">News And Events</a></li>
                      </ul>
                    </li>
                    <li class="has-dropdown">
                      <a href="#" class="has-dropdown">Administration</a>
                      <ul class="submenu">
                        <li><a href="#">Hoverning of Chairman</a></li>
                        <li><a href="#">Message of Principal</a></li>
                        <li><a href="#">Ex-Chairmans</a></li>
                        <li><a href="#">Ex-Principals</a></li>
                        <li><a href="#">Teacher Information</a></li>
                        <li><a href="#">Staff Information</a></li>
                      </ul>
                    </li>
                    <li class="has-dropdown">
                      <a href="#" class="has-dropdown">Academic</a>
                      <ul class="submenu">
                        <li><a href="#">Academic Calendar</a></li>
                        <li><a href="#">Class Routine</a></li>
                        <li><a href="#">Syllabus And Booklist</a></li>
                        <li><a href="#">Suggestion</a></li>
                        <li><a href="#">Exam Routine</a></li>
                        <li><a href="#">Notice</a></li>
                        <li><a href="#">Other</a></li>
                      </ul>
                    </li>
                    <li class="has-dropdown">
                      <a href="#" class="has-dropdown">Admission</a>
                      <ul class="submenu">
                        <li><a href="#">Adminssion Circular </a></li>
                        <li><a href="#">Prospectus </a></li>
                        <li><a href="#">Admission Form </a></li>
                        <li><a href="#">Admission Form </a></li>
                        <li><a href="#">Admission Result </a></li>
                        <li><a href="#">Waiting List </a></li>
                        <li><a href="#">Course/Program </a></li>
                        <li><a href="#">Download Admid Card </a></li>
                      </ul>
                    </li>
                    <li class="has-dropdown">
                      <a href="#" class="has-dropdown">Co-Curriculam</a>
                      <ul class="submenu">
                        <li><a href="#">Sports </a></li>
                        <li><a href="#">Tour </a></li>
                        <li><a href="#">Scout </a></li>
                        <li><a href="#">BNCC </a></li>
                      </ul>
                    </li>
                    <li class="has-dropdown">
                      <a href="#" class="has-dropdown">Club & Society</a>
                      <ul class="submenu">
                        <li><a href="#">ICT Club </a></li>
                        <li><a href="#">Science Club</a></li>
                        <li><a href="#">Debate Club </a></li>
                        <li><a href="#">Photography Club</a></li>
                        <li><a href="#">Languabge Club</a></li>
                        <li><a href="#">Quiz Club</a></li>
                      </ul>
                    </li>
                    <li>
                      <a href="#">Gallery</a>
                    </li>
                    <li>
                      <a href="#">Contact</a>
                    </li>
                    <li>
                      <a href="{{ route('login') }}">Login</a>
                    </li>
                  </ul>
                </nav>
              </div>
            </div>
            <div class="col-lg-2 d-block d-lg-none">
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
      <!-- navigation area end  -->
    </div>
  </header>
  <!-- header area end -->
  <div class="tp-sidebar-menu">
    <button class="sidebar-close">
      <i class="fa-regular fa-xmark"></i>Close
    </button>
    <div class="mobile-menu"></div>
  </div>
  <div class="body-overlay"></div>

  <main>
    <!-- hero area start  -->
    <section class="hero__area">
      <div class="hero__banner">
        <video autoplay muted loop style>
          <source src="{{ asset('frontend_assets/demo3/assets/img/school-drone.mp4') }}" type="video/mp4" />
        </video>
        <div class="hero__content">
          <h2>Welcome to Ideal School & College, Motijheel, Dhaka</h2>
          <p>Where Excellence in Education Meets Character Development</p>
          <div class="hero_btn">
            <a class="theme_btn" href="#">Apply for Admission</a>
            <a class="theme_btn" href="#">Discover Our Story</a>
          </div>
        </div>

        <h2></h2>
      </div>
    </section>
    <!-- text scrolling  -->
    <section class="b-section">
      <div class="container">
        <div class="text_wrapper d-flex align-content-center gx-4">
          <div class="scroll_btn">Notice</div>
          <div class="b-section-marquee-box">
            <p class="marquee-text">
              জরুরী ঘোষণা : আমাদের ওয়েব সাইটের সার্বিক উন্নয়ন এর কাজ চলছে। কাজ
              চলাকালীন অবস্থায় , আপনাদের সাময়িকভাবে কিছুটা অসুবিধা হতে পারে এর
              জন্য আমরা আন্তরিকভাবে দুক্ষিত । আমাদের ওয়েবসাইট উন্নয়নের কাজটি
              আগামিকাল শেষ হবে। আমাদের সাথে থাকার
            </p>
          </div>
        </div>
      </div>
    </section>
    <!-- hero area end -->
    <section class="content__area">
      <div class="container">
        <div class="row">
          <div class="col-lg-8">
            <div class="school__card wow animate__animated animate__fadeInUp" data-wow-delay="0.5s">
              <div class="school__img">
                <img src="{{ asset('frontend_assets/demo3/assets/img/person/school.jpeg') }}" alt="" />
              </div>
              <div class="school__text">
                <h3>Our History</h3>
                <p>
                  The magnificently designed educational institution named
                  Rajuk Uttara Model College stands proudly on the
                  Dhaka-Mymensingh Road close to Azampur Bus Stand. It is
                  situated at Sector-6 of Uttara Model Town about one km. from
                  the Hazrat Shahajalal International Airport offering an eye
                  catching view to the passersby. With an accommodation of
                  about 8000 students in two shifts, the college is spread
                  over almost four acres of land with a spacious playground in
                  front of the main Academic Building. The absence of a truly
                  standard educational institution in the area had led to the
                  idea of establishing a college of very high standard in the
                  line of reputed Public Schools & Colleges/Cadet Colleges in
                  Bangladesh. The construction of the main academic building.
                </p>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="notice__card">
              <div class="notice__header">
                <h4><i class="fa-light fa-list-timeline"></i> Notice</h4>
              </div>
              <div class="notice__content">
                <ul>
                  <li>
                    <i class="fa-sharp fa-thin fa-square-check"></i><a href="#">Dhaka Education Board</a>
                  </li>
                  <li>
                    <i class="fa-sharp fa-thin fa-square-check"></i><a href="#">Dhaka Education Board</a>
                  </li>
                  <li>
                    <i class="fa-sharp fa-thin fa-square-check"></i><a href="#">Dhaka Education Board</a>
                  </li>
                  <li>
                    <i class="fa-sharp fa-thin fa-square-check"></i><a href="#">Dhaka Education Board</a>
                  </li>
                  <li>
                    <i class="fa-sharp fa-thin fa-square-check"></i><a href="#">Dhaka Education Board</a>
                  </li>
                  <li>
                    <i class="fa-sharp fa-thin fa-square-check"></i><a href="#">Dhaka Education Board</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-6">
            <div class="message__card">
              <div class="message__card_img">
                <img src="{{ asset('frontend_assets/demo3/assets/img/person/chairmen.webp') }}" alt="" />
                <div class="message__card_info">
                  <h4>Md Chairman Rahman</h4>
                </div>
              </div>
              <div class="message__card_text">
                <h4>Message from Chairman</h4>
                <p>
                  Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                  Cum est ex harum quas expedita? Consectetur eveniet facere
                  rerum at sed. Labore unde earum aut velit, deleniti numquam
                  tenetur iste eveniet.
                </p>
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="message__card">
              <div class="message__card_img">
                <img src="{{ asset('frontend_assets/demo3/assets/img/person/person2.jpeg') }}" alt="" />
                <div class="message__card_info">
                  <h4>Md Chairman Rahman</h4>
                </div>
              </div>
              <div class="message__card_text">
                <h4>Message from Principal</h4>
                <p>
                  Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                  Cum est ex harum quas expedita? Consectetur eveniet facere
                  rerum at sed. Labore unde earum aut velit, deleniti numquam
                  tenetur iste eveniet.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- gallery area start  -->
    <section class="gallery__area">
      <div class="container">
        <div class="row">
          <div class="col-md-6 mx-auto">
            <div class="section__title text-center">
              <h2>Our Gallery Details</h2>
              <p>
                I feel the presence of the Almighty, who formed us in his own
                image, and the breath.
              </p>
            </div>
          </div>
        </div>
        <div class="gallery__content">
          <div class="row gy-4">
            <div class="col-lg-3">
              <a href="{{ asset('frontend_assets/demo3/assets/img/gallery/1.jpeg') }}" class="gallery_item popup-image">
                <img class="" src="assets/img/gallery/1.jpeg" alt="" />
              </a>
            </div>
            <div class="col-lg-3">
              <a href="{{ asset('frontend_assets/demo3/assets/img/gallery/2.jpeg') }}" class="gallery_item popup-image">
                <img src="assets/img/gallery/2.jpeg" alt="" />
              </a>
            </div>
            <div class="col-lg-3">
              <a href="assets/img/gallery/3.jpeg" class="gallery_item popup-image">
                <img src="{{ asset('frontend_assets/demo3/assets/img/gallery/3.jpeg') }}" alt="" />
              </a>
            </div>
            <div class="col-lg-3">
              <a href="assets/img/gallery/4.jpeg" class="gallery_item popup-image">
                <img src="{{ asset('frontend_assets/demo3/assets/img/gallery/4.jpeg') }}" alt="" />
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- gallery area end -->
    <!-- events area start  -->
    <section class="events__area">
      <div class="container">
        <div class="row">
          <div class="col-md-6 mx-auto">
            <div class="section__title text-center">
              <h2>Recent And Upcoming Events</h2>
              <p>
                I feel the presence of the Almighty, who formed us in his own
                image, and the breath.
              </p>
            </div>
          </div>
        </div>
        <div class="events__content">
          <div class="row">
            <div class="col-lg-4 mb-4">
              <div class="envet__item">
                <div class="event__img">
                  <img src="{{ asset('frontend_assets/demo3/assets/img/events/1.jpeg') }}" alt="" />
                </div>
                <div class="event__text">
                  <p>
                    <i class="fa-regular fa-calendar"></i><a href="#">June 23, 2025</a>
                  </p>
                  <h3>
                    <a href="#">Notre Dame basketball team defeated American
                      International School</a>
                  </h3>
                </div>
              </div>
            </div>
            <div class="col-lg-4 mb-4">
              <div class="envet__item">
                <div class="event__img">
                  <img src="{{ asset('frontend_assets/demo3/assets/img/events/2.jpeg') }}" alt="" />
                </div>
                <div class="event__text">
                  <p>
                    <i class="fa-regular fa-calendar"></i><a href="#">June 23, 2025</a>
                  </p>
                  <h3>
                    <a href="#">Notre Dame basketball team defeated American
                      International School</a>
                  </h3>
                </div>
              </div>
            </div>
            <div class="col-lg-4 mb-4">
              <div class="envet__item">
                <div class="event__img">
                  <img src="{{ asset('frontend_assets/demo3/assets/img/events/3.jpeg') }}" alt="" />
                </div>
                <div class="event__text">
                  <p>
                    <i class="fa-regular fa-calendar"></i><a href="#">June 23, 2025</a>
                  </p>
                  <h3>
                    <a href="#">Notre Dame basketball team defeated American
                      International School</a>
                  </h3>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- events area end -->
    <!-- counter area start  -->
    <section class="counter__area">
      <div class="container">
        <div class="row">
          <div class="col-6 col-lg-3">
            <div class="count__item">
              <span class="text-orange"><i class="fa-regular fa-trophy"></i></span>
              <h2 class="counter">300</h2>
              <p>Success Rate</p>
            </div>
          </div>
          <div class="col-6 col-lg-3">
            <div class="count__item">
              <span class="text-blue"><i class="fa-regular fa-user-graduate"></i></span>
              <h2 class="counter">300</h2>
              <p>Student Graduated</p>
            </div>
          </div>
          <div class="col-6 col-lg-3">
            <div class="count__item">
              <span class="text-red"><i class="fa-regular fa-award"></i></span>
              <h2 class="counter">300</h2>
              <p>National Award</p>
            </div>
          </div>
          <div class="col-6 col-lg-3">
            <div class="count__item">
              <span class="text-green">
                <i class="fa-solid fa-chalkboard-user"></i></span>
              <h2 class="counter">300</h2>
              <p>Faculty Member</p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- counter area end -->
  </main>

  <!-- footer area start  -->
  <footer class="footer__area">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 mb-4">
          <div class="">
            <div class="footer__logo">
              <img src="{{ asset('frontend_assets/demo3/assets/img/logo/logo.png') }}" alt="" />
              <div>
                <h4>ADAMJEE CANTONMENT PUBLIC SCHOOL</h4>
                <p>
                  Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                  Dolorum quia maxime inventore eum perferendis sapiente
                  voluptatem cumque commodi corrupti modi saepe, quaerat at
                  esse accusantium.
                </p>
                <div class="footer__social">
                  <ul>
                    <li>
                      <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                    </li>
                    <li>
                      <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
                    </li>
                    <li>
                      <a href="#"><i class="fa-brands fa-twitter"></i></a>
                    </li>
                    <li>
                      <a href="#"><i class="fa-brands fa-instagram"></i></a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 mb-4">
          <div class="footer__widget">
            <h3>Quick Links</h3>
            <ul>
              <li>
                <i class="fa-regular fa-arrow-right"></i><a href="#">Home</a>
              </li>
              <li>
                <i class="fa-regular fa-arrow-right"></i><a href="#">About</a>
              </li>
              <li>
                <i class="fa-regular fa-arrow-right"></i><a href="#">Admission</a>
              </li>
              <li>
                <i class="fa-regular fa-arrow-right"></i><a href="#">Classroom</a>
              </li>
              <li>
                <i class="fa-regular fa-arrow-right"></i><a href="#">Academic</a>
              </li>
              <li>
                <i class="fa-regular fa-arrow-right"></i><a href="#">Contact</a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-lg-3 mb-4">
          <div class="footer__widget">
            <h3>Quick Links</h3>
            <ul>
              <li>
                <i class="fa-regular fa-arrow-right"></i><a href="#">Home</a>
              </li>
              <li>
                <i class="fa-regular fa-arrow-right"></i><a href="#">About</a>
              </li>
              <li>
                <i class="fa-regular fa-arrow-right"></i><a href="#">Admission</a>
              </li>
              <li>
                <i class="fa-regular fa-arrow-right"></i><a href="#">Classroom</a>
              </li>
              <li>
                <i class="fa-regular fa-arrow-right"></i><a href="#">Academic</a>
              </li>
              <li>
                <i class="fa-regular fa-arrow-right"></i><a href="#">Contact</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!-- footer area end -->

  <!-- JS here -->
  <script src="{{ asset('frontend_assets/demo3/assets/js/vendor/jquery.js') }}"></script>
  <script src="{{ asset('frontend_assets/demo3/assets/js/vendor/waypoints.js') }}"></script>
  <script src="{{ asset('frontend_assets/demo3/assets/js/bootstrap-bundle.js') }}"></script>
  <script src="{{ asset('frontend_assets/demo3/assets/js/meanmenu.js') }}"></script>
  <script src="{{ asset('frontend_assets/demo3/assets/js/swiper-bundle.js') }}"></script>
  <script src="{{ asset('frontend_assets/demo3/assets/js/slick.js') }}"></script>
  <script src="{{ asset('frontend_assets/demo3/assets/js/magnific-popup.js') }}"></script>
  <script src="{{ asset('frontend_assets/demo3/assets/js/parallax.js') }}"></script>
  <script src="{{ asset('frontend_assets/demo3/assets/js/backtotop.js') }}"></script>
  <script src="{{ asset('frontend_assets/demo3/assets/js/nice-select.js') }}"></script>
  <script src="{{ asset('frontend_assets/demo3/assets/js/counterup.js') }}"></script>
  <script src="{{ asset('frontend_assets/demo3/assets/js/wow.js') }}"></script>
  <script src="{{ asset('frontend_assets/demo3/assets/js/isotope-pkgd.js') }}"></script>
  <script src="{{ asset('frontend_assets/demo3/assets/js/imagesloaded-pkgd.js') }}"></script>
  <script src="{{ asset('frontend_assets/demo3/assets/js/main.js') }}"></script>
</body>

</html>