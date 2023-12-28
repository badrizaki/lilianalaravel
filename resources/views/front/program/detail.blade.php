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
                        class="img-fluid d-block ml-auto banner-image-title-page"
                        alt="{{ GetData::setting()->siteName['value'] }}">
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
            <div class="item col-lg-8 col-12">
                <h1>{{ $data['program']['titleInd'] }}</h1><br>
                <img src="{{ url('' . $data['program']['imageUrl']) }}" style="max-width:100%;" /><br><br>
                {!! $data['program']['contentInd'] !!}
            </div>
            <div class="item col-lg-4 col-12">
                @if(isset($list['program']) && $list['program'])
                @foreach($list['program'] as $key => $value)
                <div class="program-item-list">
                    <div class="pull-left container-thumb">
                        <img src="{{ url('' . $value['thumbUrl']) }}" alt="{{ $value['titleInd'] }}">
                    </div>
                    <h5 class="program-title"><a href="{{ url('program/detail/'. $value['programId']) }}">{{ $value['titleInd'] }}</a></h5>
                    <p>{{ $value['shortDescInd'] }}... <a href="{{ url('program/detail/'. $value['programId']) }}">Selengkapnya</a></p>
                </div>
                @endforeach
                @endif
            </div>
        </div>
    </div>
</section>
<!-- ***** Program End ***** -->
@stop

@section('js')
@endsection