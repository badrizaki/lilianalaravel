@extends('front.layouts.front')

@section('title', 'Galeri')
@section('galleryActive', 'active')

@section('css')
@endsection

@section('content')
<!-- ***** Welcome Area Start ***** -->
<div class="title-page">
    <div class="header-text">
        <div class="container">
            <div class="row">
                <div class="left-text col-lg-6 col-md-6 col-sm-12 col-xs-12"
                    data-scroll-reveal="enter left move 30px over 0.6s after 0.4s">
                    <div class="banner-title">
                        <h1>Galeri Liliana SPd, MSi</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12"
                    data-scroll-reveal="enter right move 30px over 0.6s after 0.4s">
                    <img src="{{ url('assets/front/images/liliana-spd-msi-profile.png') }}"
                        class="img-fluid d-block ml-auto banner-image-title-page" alt="First Vector Graphic">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ***** Welcome Area End ***** -->

<!-- ***** Gallery Start ***** -->
<section class="gallery section-padding" id="section_4">
    <div class="container">
        <div class="row">
            <h1 style="color: #990000; text-align: center; margin-bottom: 30px; width: 100%;">GALERI</h1>
            <div class="col-lg-4 col-md-6 col-12">
                <div class="gallery-thumb">
                    <div class="gallery-info">
                        <!-- <small class="gallery-tag">Branding</small> -->
                        <h3 class="gallery-title">Zoik agency</h3>
                    </div>
                    <a href="assets/front/images/galeri (1).jpg" class="popup-image">
                        <div style="background-image: url('assets/front/images/galeri (1).jpg');"
                            class="gallery-item-image gallery-image img-fluid">
                            <img src="assets/front/images/galeri (1).jpg" class="img-fluid" alt="">
                        </div>
                        <!-- <img src="assets/images/galeri (1).jpg" class="gallery-image img-fluid" alt="Liliana"> -->
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-12">
                <div class="gallery-thumb">
                    <div class="gallery-info">
                        <!-- <small class="gallery-tag">Photography</small> -->
                        <h3 class="gallery-title">The Watch</h3>
                    </div>
                    <a href="assets/front/images/galeri (2).jpg" class="popup-image">
                        <div style="background-image: url('assets/front/images/galeri (2).jpg');"
                            class="gallery-item-image gallery-image img-fluid">
                            <img src="assets/front/images/galeri (2).jpg" class="img-fluid" alt="">
                        </div>
                        <!-- <img src="assets/images/galeri (2).jpg" class="gallery-image img-fluid" alt=""> -->
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-12">
                <div class="gallery-thumb">
                    <div class="gallery-info">
                        <!-- <small class="gallery-tag">Website</small> -->
                        <h3 class="gallery-title">Polo</h3>
                    </div>
                    <a href="assets/front/images/galeri (3).jpg" class="popup-image">
                        <div style="background-image: url('assets/front/images/galeri (3).jpg');"
                            class="gallery-item-image gallery-image img-fluid">
                            <img src="assets/front/images/galeri (3).jpg" class="img-fluid" alt="">
                        </div>
                        <!-- <img src="assets/front/images/galeri (3).jpg" class="gallery-image img-fluid" alt=""> -->
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-12">
                <div class="gallery-thumb">
                    <div class="gallery-info">
                        <!-- <small class="gallery-tag">Website</small> -->
                        <h3 class="gallery-title">Polo</h3>
                    </div>
                    <a href="assets/front/images/galeri (3).jpg" class="popup-image">
                        <div style="background-image: url('assets/front/images/galeri (3).jpg');"
                            class="gallery-item-image gallery-image img-fluid">
                            <img src="assets/front/images/galeri (3).jpg" class="img-fluid" alt="">
                        </div>
                        <!-- <img src="assets/front/images/galeri (3).jpg" class="gallery-image img-fluid" alt=""> -->
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-12">
                <div class="gallery-thumb">
                    <div class="gallery-info">
                        <!-- <small class="gallery-tag">Website</small> -->
                        <h3 class="gallery-title">Polo</h3>
                    </div>
                    <a href="assets/front/images/videos-liliana.mp4" class="popup-image">
                        <div style="background-image: url('assets/front/images/galeri (3).jpg');"
                            class="gallery-item-image gallery-image img-fluid">
                            <img src="assets/images/galeri (3).jpg" class="img-fluid" alt="">
                            <video src="assets/front/images/videos-liliana.mp4"
                                poster="assets/front/images/liliana-jawa-barat-VI.png"
                                class="rounded img-fluid d-block mx-auto" controls></video>
                        </div>
                        <!-- <img src="assets/images/galeri (3).jpg" class="gallery-image img-fluid" alt=""> -->
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- ***** Gallery End ***** -->
@stop

@section('js')
@endsection