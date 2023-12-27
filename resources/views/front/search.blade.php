@extends('front.layouts.front')

@section('title', 'Search')
@section('search', 'active')

@section('css')
<style>
#menu { margin-bottom: 40px; }
.search-content { border-bottom: 1px solid #cccccc; margin-top: 20px; padding-bottom: 10px; }
.search-content .search-link { color: #4349c4; font-size: 12px; text-decoration: none; font-style: italic; }
</style>
@endsection

@section('content')
<section>
   <div class="container-fluid">
      <div class="row">
         <div class="col-12 padding-left-content padding-right-content container-padding-top">
            <div class="desktop">
               <a href="{{ url('') }}"><img src="{{ url('assets/front/img/logo.png') }}" class="logo" style="margin-bottom: 50px;"></a>
            </div>
            <div style="margin-top: 20px;">
               <h1 class="title" style="text-align: center; color: #4d4d4d; background: transparent; -webkit-text-fill-color: #4d4d4d;">Search Result</h1>
            </div>
            <div>
               Your search result using keyword :  <strong>'{{ app('request')->input('keyword') }}'</strong>
               <p>Please enter search keyword (min 3 character)</p>
            </div>

            @if (count($list) > 0)
            <div>
               @if(isset($list['informationDisclosure']) && $list['informationDisclosure'])
               @foreach($list['informationDisclosure'] as $key => $value)
               <div class="search-content">
                  <div class="result">{!! getTextLang($value['content'], $value['contentInd']) !!}</div>
                  <a class="search-link" href="{{ url('information-disclosure#container-main-content') }}">Investor Relations / Information Disclosure</a>
               </div>
               @endforeach
               @endif

               @if(isset($list['annualReports']) && $list['annualReports'])
               @foreach($list['annualReports'] as $key => $value)
               <div class="search-content">
                  <div class="result">{!! getTextLang($value['content'], $value['contentInd']) !!}</div>
                  <a class="search-link" href="{{ url('annual-reports#container-main-content') }}">Investor Relations / Annual Reports</a>
               </div>
               @endforeach
               @endif

               @if(isset($list['financialStatement']) && $list['financialStatement'])
               @foreach($list['financialStatement'] as $key => $value)
               <div class="search-content">
                  <div class="result">{!! getTextLang($value['content'], $value['contentInd']) !!}</div>
                  <a class="search-link" href="{{ url('financial-statement#container-main-content') }}">Investor Relations / Financial Statement</a>
               </div>
               @endforeach
               @endif

               @if(isset($list['meetingShareholders']) && $list['meetingShareholders'])
               @foreach($list['meetingShareholders'] as $key => $value)
               <div class="search-content">
                  <div class="result">{!! getTextLang($value['content'], $value['contentInd']) !!}</div>
                  <a class="search-link" href="{{ url('general-meeting-shareholders#container-main-content') }}">Investor Relations / General Meeting Shareholders</a>
               </div>
               @endforeach
               @endif
            </div>
            @endif
         </div>
      </div>
   </div>
</section>
@stop

@section('js')
<script>
</script>
@endsection