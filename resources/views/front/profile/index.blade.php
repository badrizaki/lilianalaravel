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
                        class="img-fluid d-block ml-auto banner-image-title-page"
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
            <div class="col-12">
                <h1>{!! GetData::textBank()->aboutHome['titleInd'] !!}</h1><br>
                {!! GetData::textBank()->aboutHome['content2Ind'] !!}
            </div>
        </div>
        <div class="row">
            <div class="col-lg-7 col-md-12 col-sm-12" data-scroll-reveal="enter left move 30px over 0.6s after 0.4s">
                <video src="{!! GetData::textBank()->aboutHome['imageUrl2'] !!}"
                    poster="{!! GetData::textBank()->aboutHome['imageUrl'] !!}"
                    class="rounded img-fluid d-block mx-auto" controls></video>
            </div>
            <div class="right-text col-lg-5 col-md-12 col-sm-12 mobile-top-fix">
                <div class="left-heading">
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
        </div>
        <div class="row">
            <div class="col-12">
                <br><br>
                <h1>{!! GetData::textBank()->visimisi['titleInd'] !!}</h1><br>
                {!! GetData::textBank()->visimisi['contentInd'] !!}
            </div>
        </div>
    </div>

</section>
<!-- ***** About End ***** -->

<!-- ***** Timeline Start ***** -->
<section class="timeline">
    <ul>
        <h1 style="text-align: center; color: #ffffff;">REKAM JEJAK LILIANA SPd, MSi</h1><br><br>

        @if(isset($list['trackRecord']) && $list['trackRecord'])
        @foreach($list['trackRecord'] as $key => $value)
        <li>
            <div>
                <time>{{ date('Y', strtotime($value['date'])) }}</time> {!! $value['contentInd'] !!}
            </div>
        </li>
        @endforeach
        @endif

    </ul>
</section>
<!-- ***** Timeline End ***** -->

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
@stop

@section('js')
<!-- JS For About -->
<script src="{{ url('assets/front/js/timeline.js') }}"></script>
@endsection