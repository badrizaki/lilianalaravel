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

            @if(isset($list['gallery']) && $list['gallery'])
            @foreach($list['gallery'] as $key => $value)
            <div class="col-lg-4 col-md-6 col-12">
                <div class="gallery-thumb">
                    <div class="gallery-info">
                        <!-- <small class="gallery-tag">{{ $value['titleInd'] }}</small> -->
                        <h3 class="gallery-title">{{ $value['titleInd'] }}</h3>
                    </div>
                    <a href="{{ url('' . $value['imageUrl'] ) }}" class="popup-image">
                        <div style="background-image: url('{{ url('' . $value['imageUrl'] ) }}');"
                            class="gallery-item-image gallery-image img-fluid">
                            <img src="{{ url('' . $value['imageUrl'] ) }}" class="img-fluid"
                                alt="{{ $value['titleInd'] }}">
                        </div>
                    </a>
                </div>
            </div>
            @endforeach
            @endif

            <!-- <div class="col-lg-4 col-md-6 col-12">
                <div class="gallery-thumb">
                    <div class="gallery-info">
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
                    </a>
                </div>
            </div> -->

        </div>
    </div>
</section>
<!-- ***** Gallery End ***** -->
@stop

@section('js')
@endsection