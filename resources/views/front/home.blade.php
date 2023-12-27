@extends('front.layouts.front')

@section('title', 'Home')
@section('homeActive', 'active')

@section('css')
@endsection

@section('content')
<!-- ***** Welcome Area Start ***** -->
<div class="welcome-area" id="welcome">
   <div class="header-text">
      <div class="container">
         <div class="row">
            <div class="left-text col-lg-6 col-md-6 col-sm-12 col-xs-12"
               data-scroll-reveal="enter left move 30px over 0.6s after 0.4s">
               <div class="banner-title">
                  <h1>{!! GetData::textBank()->topContent['titleInd'] !!}</h1>
               </div>
               <div class="banner-description">
                  <p>{!! GetData::textBank()->topContent['contentInd'] !!}</p>
               </div>
               <div class="banner-nomor-nama">
                  <div class="pull-left banner-nomor">
                     <img src="{{ url('assets/front/images/nomor.png') }}"
                        alt="{{ GetData::setting()->siteName['value'] }}" width="100%">
                  </div>
                  <div class="pull-left banner-nama">{!! GetData::textBank()->topContent['content2Ind'] !!}</div>
               </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12"
               data-scroll-reveal="enter right move 30px over 0.6s after 0.4s">
               <img src="{{ url('' . GetData::textBank()->topContent['imageUrl']) }}"
                  class="rounded img-fluid d-block mx-auto banner-image"
                  alt="{{ GetData::setting()->siteName['value'] }}">
            </div>
         </div>
      </div>
   </div>
</div>
<!-- ***** Welcome Area End ***** -->

<!-- ***** About Start ***** -->
<section class="section" id="about">
   <div class="container">
      <div class="row">
         <div class="col-lg-7 col-md-12 col-sm-12" data-scroll-reveal="enter left move 30px over 0.6s after 0.4s">
            <!-- <img src="{{ url('assets/front/images/liliana-jawa-barat-VI.png') }}" class="rounded img-fluid d-block mx-auto" alt="Liliana"> -->
            <video src="{!! GetData::textBank()->aboutHome['imageUrl2'] !!}"
               poster="{!! GetData::textBank()->aboutHome['imageUrl'] !!}" class="rounded img-fluid d-block mx-auto"
               controls></video>
         </div>
         <div class="right-text col-lg-5 col-md-12 col-sm-12 mobile-top-fix">
            <div class="left-heading">
               <h5>{!! GetData::textBank()->aboutHome['titleInd'] !!}</h5>
            </div>
            <div class="left-text">
               <p>{!! GetData::textBank()->aboutHome['contentInd'] !!}</p>
               <a href="{{ url('about') }}" class="main-button">LIHAT LEBIH LANJUT</a>
            </div>
         </div>
      </div>
   </div>

   <div id="main-card" class="container">
      <div class="row">
         <div class="col-lg-12">
            <div class="row">
               <!-- ***** Features Small Item Start ***** -->
               <div class="col-lg-4 col-md-6 col-sm-6 col-12"
                  data-scroll-reveal="enter bottom move 50px over 0.6s after 0.2s" data-scroll-reveal-id="1"
                  data-scroll-reveal-initialized="true" data-scroll-reveal-complete="true">
                  <a href="{{ url('about') }}">
                     <div class="features-small-item">
                        <div class="icon">
                           <i><img src="{{ url('assets/front/images/service-icon-01.png') }}"
                                 alt="{{ GetData::setting()->siteName['value'] }}"></i>
                        </div>
                        <h5 class="features-title">Profile</h5>
                        <p>Temukan Lebih Dalam Profil dan Latar Belakang <strong>LILIANA SPd, MSi</strong></p>
                     </div>
                  </a>
               </div>
               <!-- ***** Features Small Item End ***** -->

               <!-- ***** Features Small Item Start ***** -->
               <div class="col-lg-4 col-md-6 col-sm-6 col-12"
                  data-scroll-reveal="enter bottom move 50px over 0.6s after 0.4s" data-scroll-reveal-id="2"
                  data-scroll-reveal-initialized="true" data-scroll-reveal-complete="true">
                  <a href="{{ url('program') }}">
                     <div class="features-small-item">
                        <div class="icon">
                           <i><img src="{{ url('assets/front/images/service-icon-02.png') }}"
                                 alt="{{ GetData::setting()->siteName['value'] }}"></i>
                        </div>
                        <h5 class="features-title">Program</h5>
                        <p>Satukan Langkah, Wujudkan Perubahan Nyata Bersama <strong>LILIANA SPd, MSi</strong></p>
                     </div>
                  </a>
               </div>
               <!-- ***** Features Small Item End ***** -->

               <!-- ***** Features Small Item Start ***** -->
               <div class="col-lg-4 col-md-6 col-sm-6 col-12"
                  data-scroll-reveal="enter bottom move 50px over 0.6s after 0.6s" data-scroll-reveal-id="3"
                  data-scroll-reveal-initialized="true" data-scroll-reveal-complete="true">
                  <a href="{{ url('support') }}">
                     <div class="features-small-item">
                        <div class="icon">
                           <i><img src="{{ url('assets/front/images/service-icon-03.png') }}"
                                 alt="{{ GetData::setting()->siteName['value'] }}"></i>
                        </div>
                        <h5 class="features-title">Dukungan</h5>
                        <p>Suarakan Pesan Dukungan dan Aspirasi Anda kepada <strong>LILIANA SPd, MSi</strong></p>
                     </div>
                  </a>
               </div>
               <!-- ***** Features Small Item End ***** -->
            </div>
         </div>
      </div>
   </div>
</section>
<!-- ***** About End ***** -->

<!-- ***** Program Start ***** -->
<section class="section" id="services">
   <div class="container">
      <div class="row">
         <h1 style="color: #990000; text-align: center; margin-bottom: 50px; width: 100%;">PROGRAM</h1>
         <div class="owl-carousel owl-theme">

            @if(isset($list['program']) && $list['program'])
            @foreach($list['program'] as $key => $value)
            <div class="item service-item">
               <img src="{{ url('' . $value['thumbUrl']) }}" class="thumbnail" alt="{{ $value['titleInd'] }}">
               <h5 class="service-title">{{ $value['titleInd'] }}</h5>
               <p>{{ $value['shortDescInd'] }}</p>
               <a href="{{ url('program/detail/'. $value['programId']) }}" class="main-button">Selengkapnya</a>
            </div>
            @endforeach
            @endif

         </div>
      </div>
   </div>
   <div class="container load-more-container">
      <div class="row">
         <div class="col-12">
            <a href="{{ url('program') }}" class="secondary-button" style="text-align: center;">Lihat Lebih Banyak
               Program</a>
         </div>
      </div>
   </div>
</section>
<!-- ***** Program End ***** -->

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
                     <img src="{{ url('' . $value['imageUrl'] ) }}" class="img-fluid" alt="{{ $value['titleInd'] }}">
                  </div>
               </a>
            </div>
         </div>
         @endforeach
         @endif

      </div>
   </div>
   <div class="container load-more-container">
      <div class="row">
         <div class="col-12">
            <a href="{{ url('gallery') }}" class="main-button" style="text-align: center;">Lihat Lebih Banyak Galeri</a>
         </div>
      </div>
   </div>
</section>
<!-- ***** Gallery End ***** -->

<!-- ***** News Start ***** -->
<section class="news section-padding">
   <div class="container">
      <div class="row">
         <h1 style="color: #990000; text-align: center; margin-bottom: 30px; width: 100%;">BERITA</h1>

         @if(isset($list['news']) && $list['news'])
         @foreach($list['news'] as $key => $value)
         <div class="col-lg-4 col-md-6 col-12">
            <div class="news-thumb" style="background-image: url('{{ url('' . $value['thumbUrl']) }}');"><a
                  href="#"></a>
            </div>
            <div class="news-title">
               <h2><a href="{{ url('news/detail/' . $value['newsId'] ) }}">{{ $value['titleInd'] }}</a></h2>
            </div>
            <div class="news-short-content">
               <p>{{ $value['shortDescInd'] }}</p>
            </div>
            <a href="{{ url('news/detail/' . $value['newsId'] ) }}" class="secondary-button">Selengkapnya</a>
         </div>
         @endforeach
         @endif

      </div>
   </div>
   <div class="container load-more-container">
      <div class="row">
         <div class="col-12">
            <a href="{{ url('news') }}" class="main-button" style="text-align: center;">Lihat Lebih Banyak Berita</a>
         </div>
      </div>
   </div>
</section>
<!-- ***** News End ***** -->
@stop

@section('js')
@endsection