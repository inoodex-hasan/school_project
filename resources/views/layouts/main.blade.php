  <main>
      <!-- hero area start  -->
      <section class="hero__area">
          <div class="container">
              <div class="row">
                  <!-- Slider -->
                  <div class="col-lg-8 mb-4">
                      <div class="slider__wrapper">
                          <div class="slider__container">
                              @foreach($slides as $slide)
                              <div class="slide_item">
                                  {{-- Wrap image in link if exists --}}
                                  @if($slide->link)
                                  <a href="{{ $slide->link }}">
                                      <img src="{{ asset('storage/' . $slide->image) }}"
                                          alt="{{ $slide->title ?? 'Slide' }}" class="d-block w-100 slide-img">
                                      class="d-block w-100 slide-img">
                                  </a>
                                  @else
                                  <img src="{{ asset('storage/' . $slide->image) }}"
                                      alt="{{ $slide->title ?? 'Slide' }}" class="d-block w-100 slide-img">
                                  @endif
                                  {{-- Title & Subtitle --}}
                                  @if($slide->title || $slide->subtitle)
                                  <div class="slide_caption">
                                      @if($slide->title)
                                      <h5>{{ $slide->title }}</h5>
                                      @endif
                                      @if($slide->subtitle)
                                      <p>{{ $slide->subtitle }}</p>
                                      @endif
                                  </div>
                                  @endif
                              </div>
                              @endforeach
                          </div>
                      </div>
                  </div>
                  <!-- End Slide -->
                  <!-- Message Section -->
                  <div class="col-lg-4">
                      <div class="slider__person">
                          @foreach($messages as $msg)
                          <div class="person__item mb-4" style="display:flex; gap:15px; align-items:flex-start;">

                              {{-- Image --}}
                              <div
                                  style="width:100px; height:100px; border-radius:50%; overflow:hidden; flex:0 0 auto;">
                                  <img src="{{ asset('storage/' . $msg->photo) }}" alt="{{ $msg->title }}"
                                      style="width:100%; height:100%; object-fit:cover; display:block;">
                              </div>

                              {{-- Content --}}
                              <div style="flex:1;">
                                  <h4 style="color:orange; margin:0 0 5px 0;">
                                      Message from {{ Str::title($msg->type) }}
                                  </h4>

                                  <h3 style="margin:0 0 8px 0;">{{ $msg->title }}</h3>

                                  <p
                                      style="margin:0 0 10px 0; display:-webkit-box; -webkit-line-clamp:2; -webkit-box-orient:vertical; overflow:hidden; text-overflow:ellipsis;">
                                      {{ strip_tags($msg->content) }}
                                  </p>

                                  <a href="{{ route('message.show', $msg->id) }}"
                                      style="color:#007bff; text-decoration:none;">
                                      Read More..
                                  </a>

                              </div>
                          </div>
                          @endforeach
                      </div>
                  </div>

                  <!-- End Message Section -->
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
                                  <img src="assets/img/function/ssc.png" alt="" />
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
                                  <img src="assets/img/function/jsc.png" alt="" />
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
                                  <img src="assets/img/function/hsc.png" alt="" />
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
                                  <img src="assets/img/function/DGC.png" alt="" />
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
                          @forelse($notices as $notice)
                          <div class="notice_row">
                              <div class="notice_date">
                                  {{ optional($notice->created_at)->format('Y-m-d') ?? 'তারিখ নেই' }}
                              </div>
                              <div class="notice_text">
                                  <a href="{{ route('notices.show', $notice->id) }}">
                                      {{ $notice->title }}
                                  </a>
                              </div>
                          </div>
                          @empty
                          <p style="text-align:center; color:#777;">কোনো নোটিশ পাওয়া যায়নি।</p>
                          @endforelse

                          <div class="notice_btn">
                              <a href="{{ route('notices.index') }}">সকল নোটিশ...</a>
                          </div>
                      </div>
                  </div>
                  <!-- End Notice -->
                  <!-- Events -->
                  <div class="notice__card">
                      <div class="notice__header">
                          <h3>সর্বশেষ ইভেন্টস</h3>
                      </div>
                      <div class="notice__content">
                          @forelse($events as $event)
                          <div class="notice_row">
                              <div class="notice_date">
                                  {{ optional($event->created_at)->format('Y-m-d') ?? 'তারিখ নেই' }}
                              </div>
                              <div class="notice_text">
                                  <a href="{{ route('events.show', $event->id) }}">
                                      {{ $event->title }}
                                  </a>
                              </div>
                          </div>
                          @empty
                          <p style="text-align:center; color:#777;">কোনো ইভেন্ট পাওয়া যায়নি।</p>
                          @endforelse

                          <div class="notice_btn">
                              <a href="{{ route('events.index') }}">সকল ইভেন্টস...</a>
                          </div>
                      </div>
                  </div>
                  <!-- End Events -->

                  <!-- history area start  -->

                  <section class="history__area">
                      <div class="container">
                          <div class="row align-items-center">
                              <div class="col-lg-6">
                                  <div class="history__content">
                                      <h2>{{ $about->title ?? 'School History' }}</h2>
                                      <p>{!! \Illuminate\Support\Str::limit(strip_tags($about->content ?? 'No content
                                          available'), 200, '...') !!}</p>

                                  </div>
                              </div>
                              <div class="col-lg-6">
                                  <div class="history__img">
                                      @if($about?->photo)
                                      <img src="{{ asset('storage/' . $about->photo) }}"
                                          alt="{{ $about->title ?? 'School History' }}" class="img-fluid">
                                      @else
                                      <img src="{{ asset('images/default.png') }}" alt="Default School History"
                                          class="img-fluid">
                                      @endif

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
                                                  <i class="fa-solid fa-angle-right"></i><a
                                                      href="history.html">প্রতিষ্ঠান ইতিহাস</a>
                                              </li>
                                              <li>
                                                  <i class="fa-solid fa-angle-right"></i><a href="#">স্তর ভিত্তিক
                                                      শিক্ষার্থী</a>
                                              </li>
                                              <li>
                                                  <i class="fa-solid fa-angle-right"></i><a href="#">শিক্ষার্থীর
                                                      তথ্য</a>
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
                                                  <i class="fa-solid fa-angle-right"></i><a href="#">একাডেমিক
                                                      সিলেবাস</a>
                                              </li>
                                              <li>
                                                  <i class="fa-solid fa-angle-right"></i><a href="#">একাডেমিক
                                                      ক্যালেন্ডার</a>
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
                          <!-- Filter buttons -->
                          <div class="faculty__nav filter-button-group">
                              @foreach($subjects as $index => $subject)
                              <button class="{{ $index == 0 ? 'active' : '' }}"
                                  data-filter=".{{ strtolower($subject->slug ?? str_replace(' ', '-', $subject->name)) }}">
                                  {{ $subject->name }}
                              </button>
                              @endforeach
                          </div>

                          <!-- Teacher cards -->
                          <div class="row faculty-filter">
                              @foreach($teachers as $teacher)
                              <div
                                  class="col-12 col-lg-4 element-item {{ strtolower($teacher->subject->slug ?? str_replace(' ', '-', $teacher->subject->name)) }}">
                                  <div class="subject__card">
                                      <div class="author">
                                          <div class="author__head">
                                              <div class="author__info">
                                                  <div class="auth__img">
                                                      <img src="{{ asset('storage/' . $teacher->photo) }}"
                                                          alt="{{ $teacher->name }}" width="100" height="100" />
                                                  </div>
                                                  <div class="auth__content">
                                                      <p><i class="fa-solid fa-user"></i> {{ $teacher->name }}</p>
                                                      <p><i class="fa-solid fa-pen-nib"></i> শিক্ষক</p>
                                                  </div>
                                              </div>
                                          </div>

                                          <div class="subject">
                                              <h4 class="text-purple">{{ $teacher->subject->name }}</h4>
                                          </div>

                                          <div class="meta">
                                              <ul>
                                                  <li>
                                                      <p>
                                                          <i class="fa-solid fa-calendar-days"></i>
                                                          {{ \Carbon\Carbon::parse($teacher->created_at)->format('d F Y') }}
                                                      </p>
                                                  </li>
                                              </ul>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              @endforeach
                          </div>
                      </div>
                  </section>
                  <!-- faculty area End -->

                  <!-- teacher area start  -->
                  <section class="teachers__area" style="padding:40px 0;">
                      <div class="container" style="max-width:1200px; margin:auto;">
                          <div class="teacher__header" style="text-align:center; margin-bottom:40px;">
                              <h3 style="color:orange; font-size:28px;">আমাদের শিক্ষকবৃন্দ</h3>
                          </div>
                          <div class="bg-white"
                              style="padding:20px; border-radius:10px; box-shadow:0 2px 10px rgba(0,0,0,0.1);">
                              <div class="row" style="display:flex; flex-wrap:wrap; gap:20px;">
                                  @foreach($teachers as $teacher)
                                  <div class="col-lg-3 col-md-6" style="flex:1 1 calc(25% - 20px);">
                                      <div class="teacher__card"
                                          style="background:#fff; border-radius:10px; overflow:hidden; box-shadow:0 4px 15px rgba(0,0,0,0.1); transition:transform 0.3s;">
                                          <div class="card__details">
                                              <div class="teacher__info" style="position:relative; text-align:center;">
                                                  <div class="teacher__img" style="position:relative;">
                                                      <img src="{{ $teacher->photo ? asset('storage/' . $teacher->photo) : asset('assets/img/teacher/default.jpg') }}"
                                                          alt="{{ $teacher->name }}"
                                                          style="width:100%; height:150px; object-fit:cover; border-radius:10px 10px 0 0;">
                                                      <img src="assets/img/teacher/shape.png" alt=""
                                                          style="position:absolute; top:10px; left:10px; width:40px; height:20px;">
                                                  </div>
                                              </div>
                                              <div class="profile__content" style="padding:15px; text-align:center;">
                                                  <h3 style="margin:0 0 5px; font-size:20px; color:#white;">
                                                      {{ $teacher->name }}</h3>
                                                  <p style="margin:0 0 10px; font-size:16px; color:#white;">
                                                      {{ $teacher->designation ?? 'শিক্ষক' }}</p>
                                                  <div class="profile__contact-wrapper"
                                                      style="text-align:center; margin-top:10px;">

                                                      <div class="profile__contact">
                                                          <span><i class="fa-solid fa-envelope"></i></span>
                                                          <span><i class="fa-solid fa-phone"></i></span>
                                                      </div>
                                                  </div>

                                              </div>
                                          </div>
                                      </div>
                                  </div>
                                  @endforeach
                              </div>
                          </div>
                      </div>
                  </section>
                  <!-- teacher area start  -->

                  <!-- best student area start  -->
                  <!-- <section class="students__area">
        <div class="container">
          <div class="section__heading">
            <h2>আমাদের সেরা শিক্ষার্থী</h2>
          </div>
          <div class="student__wrapper">
            <div class="student__card">
              <div class="student__img">
                <img src="assets/img/school/2.jpg" alt="" />
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
                <img src="assets/img/school/3.jpg" alt="" />
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
                <img src="assets/img/school/4.jpg" alt="" />
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
                <img src="assets/img/school/1.jpg" alt="" />
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
      </section> -->
                  <!-- best student area end -->
                  <!-- Gallery -->
                  {{-- Photo Gallery Section --}}
                  <section class="gallery__area" style="padding:40px 0;">
                      <div class="container" style="max-width:1200px; margin:auto;">
                          <div class="section__heading" style="text-align:center; margin-bottom:30px;">
                              <h2>ফটো গ্যালারি</h2>
                          </div>

                          <div class="gallery__wrapper"
                              style="display:grid; grid-template-columns:repeat(auto-fill,minmax(250px,1fr)); gap:15px;">
                              @foreach($galleryPhotos as $item)
                              <div class="gallery__item" style="overflow:hidden; border-radius:8px;">
                                  <img src="{{ asset('storage/' . $item->path) }}"
                                      alt="{{ $item->title ?? 'Gallery Image' }}"
                                      style="width:100%; height:250px; object-fit:cover; display:block;" loading="lazy">
                              </div>
                              @endforeach
                          </div>
                      </div>
                  </section>


                  {{-- Video Gallery Section --}}
                  <section class="gallery__area" style="padding:40px 0;">
                      <div class="container" style="max-width:1200px; margin:auto;">
                          <div class="section__heading" style="text-align:center; margin-bottom:30px;">
                              <h2>ভিডিও গ্যালারি</h2>
                          </div>

                          <div class="gallery__wrapper"
                              style="display:grid; grid-template-columns:repeat(auto-fill,minmax(250px,1fr)); gap:15px;">
                              @foreach($galleryVideos as $item)
                              <div class="gallery__item" style="overflow:hidden; border-radius:8px;">
                                  <video controls style="width:100%; height:250px; object-fit:cover;">
                                      <source src="{{ asset('storage/' . $item->path) }}" type="video/mp4">
                                      আপনার ব্রাউজার ভিডিও ট্যাগ সাপোর্ট করে না।
                                  </video>
                              </div>
                              @endforeach
                          </div>
                      </div>
                  </section>

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
                                  style="border: 0" allowfullscreen="" loading="lazy"
                                  referrerpolicy="no-referrer-when-downgrade"></iframe>
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