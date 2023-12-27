@extends('front.layouts.front')

@section('title', 'Berita')
@section('newsActive', 'active')

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
                        <h1>BERITA</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12"
                    data-scroll-reveal="enter right move 30px over 0.6s after 0.4s">
                    <img src="{{ url('assets/front/images/liliana-spd-msi-profile.png') }}"
                        class="img-fluid d-block ml-auto banner-image-title-page" alt="{{ GetData::setting()->siteName['value'] }}">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ***** Welcome Area End ***** -->

<!-- ***** News Start ***** -->
<section class="news section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-12">
                <div class="news-thumb" style="background-image: url('assets/front/images/galeri (1).jpg');"><a href="#"></a>
                </div>
                <div class="news-title">
                    <h2><a href="#">Ziarah ke Makam Bung Karno, Prabowo: Beliau Mempersatukan Kita</a></h2>
                </div>
                <div class="news-short-content">
                    <p>Ketua Umum sekaligus calon presiden nomor Urut 02, Prabowo Subianto melakukan Ziarah ke Makam
                        Bapak Proklamator Ir. Soekarno yang terletak di Blitar, Jawa Timur, Minggu</p>
                </div>
                <a href="#" class="secondary-button">Selengkapnya</a>
            </div>
            <div class="col-lg-4 col-md-6 col-12">
                <div class="news-thumb" style="background-image: url('assets/front/images/galeri (1).jpg');"><a href="#"></a>
                </div>
                <div class="news-title">
                    <h2><a href="#">Ziarah ke Makam Bung Karno, Prabowo: Beliau Mempersatukan Kita</a></h2>
                </div>
                <div class="news-short-content">
                    <p>Ketua Umum sekaligus calon presiden nomor Urut 02, Prabowo Subianto melakukan Ziarah ke Makam
                        Bapak Proklamator Ir. Soekarno yang terletak di Blitar, Jawa Timur, Minggu</p>
                </div>
                <a href="#" class="secondary-button">Selengkapnya</a>
            </div>
            <div class="col-lg-4 col-md-6 col-12">
                <div class="news-thumb" style="background-image: url('assets/front/images/galeri (1).jpg');"><a href="#"></a>
                </div>
                <div class="news-title">
                    <h2><a href="#">Ziarah ke Makam Bung Karno, Prabowo: Beliau Mempersatukan Kita</a></h2>
                </div>
                <div class="news-short-content">
                    <p>Ketua Umum sekaligus calon presiden nomor Urut 02, Prabowo Subianto melakukan Ziarah ke Makam
                        Bapak Proklamator Ir. Soekarno yang terletak di Blitar, Jawa Timur, Minggu</p>
                </div>
                <a href="#" class="secondary-button">Selengkapnya</a>
            </div>
        </div>
    </div>
</section>
<!-- ***** News End ***** -->

@stop

@section('js')
@endsection