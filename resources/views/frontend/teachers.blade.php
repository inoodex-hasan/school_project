@extends('layouts.app2')

@section('content')
<section class="teachers__area" style="padding:40px 0;">
    <div class="container" style="max-width:1200px; margin:auto;">
        <div class="teacher__header" style="text-align:center; margin-bottom:40px;">
            <h3 style="color:orange; font-size:28px;">আমাদের শিক্ষকবৃন্দ</h3>
        </div>
        <div class="bg-white" style="padding:20px; border-radius:10px; box-shadow:0 2px 10px rgba(0,0,0,0.1);">
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
                                <div class="profile__contact-wrapper" style="text-align:center; margin-top:10px;">

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
@endsection