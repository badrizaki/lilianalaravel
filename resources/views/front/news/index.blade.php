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
                        class="img-fluid d-block ml-auto banner-image-title-page"
                        alt="{{ GetData::setting()->siteName['value'] }}">
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
</section>
<!-- ***** News End ***** -->

@stop

@section('js')
@endsection