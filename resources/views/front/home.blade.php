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
                  <h1>Kerja nyata membangun masyarakat madani</h1>
               </div>
               <div class="banner-description">
                  <p>Ayo dukung dan doakan saya untuk Indonesia yang lebih maju dengan memilih saya untuk mewakili suara
                     Anda di lembaga legislatif</p>
               </div>
               <div class="banner-nomor-nama">
                  <div class="pull-left banner-nomor">
                     <img src="{{ url('assets/front/images/nomor.png') }}"
                        alt="{{ GetData::setting()->siteName['value'] }}" width="100%">
                  </div>
                  <div class="pull-left banner-nama">
                     <h2>Liliana SPd, MSi</h2>
                     <span>CALEG DPR-RI</span><br>
                     <small>Jawa Barat VI (Kota Depok - Kota Bekasi)</small>
                  </div>
               </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12"
               data-scroll-reveal="enter right move 30px over 0.6s after 0.4s">
               <img src="{{ url('assets/front/images/liliana-banner-1.png') }}"
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
            <video src="{{ url('assets/front/images/videos-liliana.mp4') }}"
               poster="{{ url('assets/front/images/liliana-jawa-barat-VI.png') }}"
               class="rounded img-fluid d-block mx-auto" controls></video>
         </div>
         <div class="right-text col-lg-5 col-md-12 col-sm-12 mobile-top-fix">
            <div class="left-heading">
               <h5>MENGENAL LILIANA SPd, MSi</h5>
            </div>
            <div class="left-text">
               <p>Memiliki keahlian dalam memahami isu-isu kompleks dan menghadirkannya dengan solusi yang inovatif</p>
               <a href="#about2" class="main-button">LIHAT LEBIH LANJUT</a>
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
                  <div class="features-small-item">
                     <div class="icon">
                        <i><img src="assets/front/images/service-icon-01.png" alt=""></i>
                     </div>
                     <h5 class="features-title">Profile</h5>
                     <p>Temukan Lebih Dalam Profil dan Latar Belakang <strong>LILIANA SPd, MSi</strong></p>
                  </div>
               </div>
               <!-- ***** Features Small Item End ***** -->

               <!-- ***** Features Small Item Start ***** -->
               <div class="col-lg-4 col-md-6 col-sm-6 col-12"
                  data-scroll-reveal="enter bottom move 50px over 0.6s after 0.4s" data-scroll-reveal-id="2"
                  data-scroll-reveal-initialized="true" data-scroll-reveal-complete="true">
                  <div class="features-small-item">
                     <div class="icon">
                        <i><img src="assets/front/images/service-icon-02.png" alt="{{ GetData::setting()->siteName['value'] }}"></i>
                     </div>
                     <h5 class="features-title">Program</h5>
                     <p>Satukan Langkah, Wujudkan Perubahan Nyata Bersama <strong>LILIANA SPd, MSi</strong></p>
                  </div>
               </div>
               <!-- ***** Features Small Item End ***** -->

               <!-- ***** Features Small Item Start ***** -->
               <div class="col-lg-4 col-md-6 col-sm-6 col-12"
                  data-scroll-reveal="enter bottom move 50px over 0.6s after 0.6s" data-scroll-reveal-id="3"
                  data-scroll-reveal-initialized="true" data-scroll-reveal-complete="true">
                  <div class="features-small-item">
                     <div class="icon">
                        <i><img src="assets/front/images/service-icon-03.png" alt=""></i>
                     </div>
                     <h5 class="features-title">Dukungan</h5>
                     <p>Suarakan Pesan Dukungan dan Aspirasi Anda kepada <strong>LILIANA SPd, MSi</strong></p>
                  </div>
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
            <div class="item service-item">
               <img src="assets/front/images/liliana-program.jpg" class="thumbnail" alt="Liliana">
               <h5 class="service-title">Sehat Bersama Rakyat (SBR)</h5>
               <p>Program kesehatan masyarakat yang fokus pada pencegahan penyakit dan peningkatan kesehatan melalui</p>
               <a href="#" class="main-button">Selengkapnya</a>
            </div>
            <div class="item service-item">
               <img src="assets/front/images/liliana-program.jpg" class="thumbnail" alt="Liliana">
               <h5 class="service-title">Sehat Bersama Rakyat (SBR)</h5>
               <p>Program kesehatan masyarakat yang fokus pada pencegahan penyakit dan peningkatan kesehatan melalui</p>
               <a href="#" class="main-button">Selengkapnya</a>
            </div>
            <div class="item service-item">
               <img src="assets/front/images/liliana-program.jpg" class="thumbnail" alt="Liliana">
               <h5 class="service-title">Sehat Bersama Rakyat (SBR)</h5>
               <p>Program kesehatan masyarakat yang fokus pada pencegahan penyakit dan peningkatan kesehatan melalui</p>
               <a href="#" class="main-button">Selengkapnya</a>
            </div>
            <div class="item service-item">
               <img src="assets/front/images/liliana-program.jpg" class="thumbnail" alt="Liliana">
               <h5 class="service-title">Sehat Bersama Rakyat (SBR)</h5>
               <p>Program kesehatan masyarakat yang fokus pada pencegahan penyakit dan peningkatan kesehatan melalui</p>
               <a href="#" class="main-button">Selengkapnya</a>
            </div>
         </div>
      </div>
   </div>
   <div class="container load-more-container">
      <div class="row">
         <div class="col-12">
            <a href="#" class="secondary-button" style="text-align: center;">Lihat Lebih Banyak Program</a>
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
                  <!-- <img src="assets/front/images/galeri (1).jpg" class="gallery-image img-fluid" alt="Liliana"> -->
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
                  <!-- <img src="assets/front/images/galeri (2).jpg" class="gallery-image img-fluid" alt=""> -->
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

      </div>
   </div>
   <div class="container load-more-container">
      <div class="row">
         <div class="col-12">
            <a href="#" class="main-button" style="text-align: center;">Lihat Lebih Banyak Galeri</a>
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
         <div class="col-lg-4 col-md-6 col-12">
            <div class="news-thumb" style="background-image: url('assets/front/images/galeri (1).jpg');"><a
                  href="#"></a>
            </div>
            <div class="news-title">
               <h2><a href="#">Ziarah ke Makam Bung Karno, Prabowo: Beliau Mempersatukan Kita</a></h2>
            </div>
            <div class="news-short-content">
               <p>Ketua Umum sekaligus calon presiden nomor Urut 02, Prabowo Subianto melakukan Ziarah ke Makam Bapak
                  Proklamator Ir. Soekarno yang terletak di Blitar, Jawa Timur, Minggu</p>
            </div>
            <a href="#" class="secondary-button">Selengkapnya</a>
         </div>
         <div class="col-lg-4 col-md-6 col-12">
            <div class="news-thumb" style="background-image: url('assets/front/images/galeri (1).jpg');"><a
                  href="#"></a>
            </div>
            <div class="news-title">
               <h2><a href="#">Ziarah ke Makam Bung Karno, Prabowo: Beliau Mempersatukan Kita</a></h2>
            </div>
            <div class="news-short-content">
               <p>Ketua Umum sekaligus calon presiden nomor Urut 02, Prabowo Subianto melakukan Ziarah ke Makam Bapak
                  Proklamator Ir. Soekarno yang terletak di Blitar, Jawa Timur, Minggu</p>
            </div>
            <a href="#" class="secondary-button">Selengkapnya</a>
         </div>
         <div class="col-lg-4 col-md-6 col-12">
            <div class="news-thumb" style="background-image: url('assets/front/images/galeri (1).jpg');"><a
                  href="#"></a>
            </div>
            <div class="news-title">
               <h2><a href="#">Ziarah ke Makam Bung Karno, Prabowo: Beliau Mempersatukan Kita</a></h2>
            </div>
            <div class="news-short-content">
               <p>Ketua Umum sekaligus calon presiden nomor Urut 02, Prabowo Subianto melakukan Ziarah ke Makam Bapak
                  Proklamator Ir. Soekarno yang terletak di Blitar, Jawa Timur, Minggu</p>
            </div>
            <a href="#" class="secondary-button">Selengkapnya</a>
         </div>
      </div>
   </div>
   <div class="container load-more-container">
      <div class="row">
         <div class="col-12">
            <a href="#" class="main-button" style="text-align: center;">Lihat Lebih Banyak Berita</a>
         </div>
      </div>
   </div>
</section>
<!-- ***** News End ***** -->
@stop

@section('js')
@endsection