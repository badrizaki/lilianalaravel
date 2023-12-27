@extends('front.layouts.front')

@section('title', 'Profil')
@section('profileActive', 'active')

@section('css')
<link rel="stylesheet" type="text/css" href="{{ url('assets/front/css/about.css') }}">
<link rel="stylesheet" type="text/css" href="{{ url('assets/front/css/timeline.css') }}" />
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
                        <h1>Profil Liliana SPd, MSi</h1>
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

<!-- ***** About Start ***** -->
<section class="section" id="about">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>MENGENAL LILIANA SPd, MSi</h1><br>
                <p>LILIANA SPd, MSi Lahir pada tanggal ##-##-####, lebih dikenal dengan nama Liliana, Lorem ipsum dolor
                    sit amet, consectetur adipiscing elit. Pellentesque pulvinar quam et metus vehicula lobortis.
                    Quisque eget ipsum urna. Etiam gravida est fermentum lectus facilisis, faucibus varius sapien
                    blandit. Aliquam egestas tincidunt lacus ut aliquet. Quisque dignissim odio eu felis luctus, vitae
                    aliquam mauris egestas. Suspendisse potenti. Donec tempus est non dictum varius. Pellentesque
                    habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Praesent lobortis
                    massa ligula, eget consectetur ante egestas in. Aenean luctus dignissim turpis, in aliquam ante
                    lobortis eleifend. Ut sapien nisl, lobortis ac orci et, pretium dignissim mauris. Quisque at sem ac
                    elit rhoncus dignissim quis quis purus. Cras porta diam a mi vulputate, nec malesuada dui tempus.
                    Pellentesque pulvinar lectus vitae purus maximus rutrum. Orci varius natoque penatibus et magnis dis
                    parturient montes, nascetur ridiculus mus. In ultricies tortor quam, non placerat orci posuere a.
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-7 col-md-12 col-sm-12" data-scroll-reveal="enter left move 30px over 0.6s after 0.4s">
                <video src="assets/front/images/videos-liliana.mp4"
                    poster="assets/front/images/liliana-jawa-barat-VI.png" class="rounded img-fluid d-block mx-auto"
                    controls></video>
            </div>
            <div class="right-text col-lg-5 col-md-12 col-sm-12 mobile-top-fix">
                <div class="left-heading">
                    <h1>Kerja nyata membangun masyarakat madani</h1>
                </div>
                <div class="banner-description">
                    <p>Ayo dukung dan doakan saya untuk Indonesia yang lebih maju dengan memilih saya untuk mewakili
                        suara Anda di lembaga legislatif</p>
                </div>
                <div class="banner-nomor-nama">
                    <div class="pull-left banner-nomor">
                        <img src="assets/front/images/nomor.png" width="100%">
                    </div>
                    <div class="pull-left banner-nama">
                        <h2>Liliana SPd, MSi</h2>
                        <span>CALEG DPR-RI</span><br>
                        <small>Jawa Barat VI (Kota Depok - Kota Bekasi)</small>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <br><br>
                <h1>VISI & MISI LILIANA SPd, MSi</h1><br>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque pulvinar quam et metus vehicula
                    lobortis. Quisque eget ipsum urna. Etiam gravida est fermentum lectus facilisis, faucibus varius
                    sapien blandit. Aliquam egestas tincidunt lacus ut aliquet. Quisque dignissim odio eu felis luctus,
                    vitae aliquam mauris egestas. Suspendisse potenti. Donec tempus est non dictum varius. Pellentesque
                    habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Praesent lobortis
                    massa ligula, eget consectetur ante egestas in. Aenean luctus dignissim turpis, in aliquam ante
                    lobortis eleifend. Ut sapien nisl, lobortis ac orci et, pretium dignissim mauris. Quisque at sem ac
                    elit rhoncus dignissim quis quis purus. Cras porta diam a mi vulputate, nec malesuada dui tempus.
                    Pellentesque pulvinar lectus vitae purus maximus rutrum. Orci varius natoque penatibus et magnis dis
                    parturient montes, nascetur ridiculus mus. In ultricies tortor quam, non placerat orci posuere a.
                </p>
            </div>
        </div>
    </div>

</section>
<!-- ***** About End ***** -->

<!-- ***** Timeline Start ***** -->
<section class="timeline">
    <ul>
        <h1 style="text-align: center; color: #ffffff;">REKAM JEJAK LILIANA SPd, MSi</h1><br><br>
        <li>
            <div>
                <time>1934</time> At vero eos et accusamus et iusto odio dignissimos
                ducimus qui blanditiis praesentium At vero eos et accusamus et iusto
                odio dignissimos ducimus qui blanditiis praesentium
            </div>
        </li>
        <li>
            <div>
                <time>1937</time> Proin quam velit, efficitur vel neque vitae,
                rhoncus commodo mi. Suspendisse finibus mauris et bibendum molestie.
                Aenean ex augue, varius et pulvinar in, pretium non nisi.
            </div>
        </li>
        <li>
            <div>
                <time>1940</time> Proin iaculis, nibh eget efficitur varius, libero
                tellus porta dolor, at pulvinar tortor ex eget ligula. Integer eu
                dapibus arcu, sit amet sollicitudin eros.
            </div>
        </li>
        <li>
            <div>
                <time>1943</time> In mattis elit vitae odio posuere, nec maximus
                massa varius. Suspendisse varius volutpat mattis. Vestibulum id
                magna est.
            </div>
        </li>
        <li>
            <div>
                <time>1946</time> In mattis elit vitae odio posuere, nec maximus
                massa varius. Suspendisse varius volutpat mattis. Vestibulum id
                magna est.
            </div>
        </li>
        <li>
            <div>
                <time>1956</time> In mattis elit vitae odio posuere, nec maximus
                massa varius. Suspendisse varius volutpat mattis. Vestibulum id
                magna est.
            </div>
        </li>
        <li>
            <div>
                <time>1957</time> In mattis elit vitae odio posuere, nec maximus
                massa varius. Suspendisse varius volutpat mattis. Vestibulum id
                magna est.
            </div>
        </li>
        <li>
            <div>
                <time>1967</time> Aenean condimentum odio a bibendum rhoncus. Ut
                mauris felis, volutpat eget porta faucibus, euismod quis ante.
            </div>
        </li>
        <li>
            <div>
                <time>1977</time> Vestibulum porttitor lorem sed pharetra dignissim.
                Nulla maximus, dui a tristique iaculis, quam dolor convallis enim,
                non dignissim ligula ipsum a turpis.
            </div>
        </li>
        <li>
            <div>
                <time>1985</time> In mattis elit vitae odio posuere, nec maximus
                massa varius. Suspendisse varius volutpat mattis. Vestibulum id
                magna est.
            </div>
        </li>
        <li>
            <div>
                <time>2000</time> In mattis elit vitae odio posuere, nec maximus
                massa varius. Suspendisse varius volutpat mattis. Vestibulum id
                magna est.
            </div>
        </li>
        <li>
            <div>
                <time>2005</time> In mattis elit vitae odio posuere, nec maximus
                massa varius. Suspendisse varius volutpat mattis. Vestibulum id
                magna est.
            </div>
        </li>
    </ul>
</section>
<!-- ***** Timeline End ***** -->

<!-- ***** Program Start ***** -->
<section class="section" id="services">
    <div class="container">
        <div class="row">
            <h1 style="color: #990000; text-align: center; margin-bottom: 50px; width: 100%;">PROGRAM</h1>
            <div class="owl-carousel owl-theme">
                <div class="item service-item">
                    <img src="assets/front/images/liliana-program.jpg" class="thumbnail" alt="Liliana">
                    <h5 class="service-title">Sehat Bersama Rakyat (SBR)</h5>
                    <p>Program kesehatan masyarakat yang fokus pada pencegahan penyakit dan peningkatan kesehatan
                        melalui</p>
                    <a href="#" class="main-button">Selengkapnya</a>
                </div>
                <div class="item service-item">
                    <img src="assets/front/images/liliana-program.jpg" class="thumbnail" alt="Liliana">
                    <h5 class="service-title">Sehat Bersama Rakyat (SBR)</h5>
                    <p>Program kesehatan masyarakat yang fokus pada pencegahan penyakit dan peningkatan kesehatan
                        melalui</p>
                    <a href="#" class="main-button">Selengkapnya</a>
                </div>
                <div class="item service-item">
                    <img src="assets/front/images/liliana-program.jpg" class="thumbnail" alt="Liliana">
                    <h5 class="service-title">Sehat Bersama Rakyat (SBR)</h5>
                    <p>Program kesehatan masyarakat yang fokus pada pencegahan penyakit dan peningkatan kesehatan
                        melalui</p>
                    <a href="#" class="main-button">Selengkapnya</a>
                </div>
                <div class="item service-item">
                    <img src="assets/front/images/liliana-program.jpg" class="thumbnail" alt="Liliana">
                    <h5 class="service-title">Sehat Bersama Rakyat (SBR)</h5>
                    <p>Program kesehatan masyarakat yang fokus pada pencegahan penyakit dan peningkatan kesehatan
                        melalui</p>
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
@stop

@section('js')
<!-- JS For About -->
<script src="{{ url('assets/front/js/timeline.js') }}"></script>
@endsection