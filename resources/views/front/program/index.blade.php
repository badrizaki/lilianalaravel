@extends('front.layouts.front')

@section('title', 'Program')
@section('programActive', 'active')

@section('css')
<link rel="stylesheet" type="text/css" href="{{ url('assets/front/css/program.css') }}">
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
                        <h1>Program Liliana SPd, MSi</h1>
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

<!-- ***** Program Start ***** -->
<section class="section" id="program">
    <div class="container">
        <div class="row">
            <div class="item col-lg-4 col-md-6 col-12">
                <div class="service-item">
                    <img src="assets/front/images/liliana-program.jpg" class="thumbnail" alt="Liliana">
                    <h5 class="service-title">Sehat Bersama Rakyat (SBR)</h5>
                    <p>Program kesehatan masyarakat yang fokus pada pencegahan penyakit dan peningkatan kesehatan
                        melalui</p>
                    <a href="#" class="main-button">Selengkapnya</a>
                </div>
            </div>
            <div class="item col-lg-4 col-md-6 col-12">
                <div class="service-item">
                    <img src="assets/front/images/liliana-program.jpg" class="thumbnail" alt="Liliana">
                    <h5 class="service-title">Sehat Bersama Rakyat (SBR)</h5>
                    <p>Program kesehatan masyarakat yang fokus pada pencegahan penyakit dan peningkatan kesehatan
                        melalui</p>
                    <a href="#" class="main-button">Selengkapnya</a>
                </div>
            </div>
            <div class="item col-lg-4 col-md-6 col-12">
                <div class="service-item">
                    <img src="assets/front/images/liliana-program.jpg" class="thumbnail" alt="Liliana">
                    <h5 class="service-title">Sehat Bersama Rakyat (SBR)</h5>
                    <p>Program kesehatan masyarakat yang fokus pada pencegahan penyakit dan peningkatan kesehatan
                        melalui</p>
                    <a href="#" class="main-button">Selengkapnya</a>
                </div>
            </div>
            <div class="item col-lg-4 col-md-6 col-12">
                <div class="service-item">
                    <img src="assets/front/images/liliana-program.jpg" class="thumbnail" alt="Liliana">
                    <h5 class="service-title">Sehat Bersama Rakyat (SBR)</h5>
                    <p>Program kesehatan masyarakat yang fokus pada pencegahan penyakit dan peningkatan kesehatan
                        melalui</p>
                    <a href="#" class="main-button">Selengkapnya</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ***** Program End ***** -->
@stop

@section('js')
@endsection