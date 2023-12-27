<div class="row">
   @if (isset($list['news']) && $list['news'])
   @foreach ($list['news'] as $key => $data)
   <div class="row content-list">
      <div class="col-sm-3 content-left">
         <img src="{{ image(''.$data['thumbUrl']) }}">
      </div>
      <div class="col-sm-9 content-right">
         <span class="title">{!! getTextLang($data['title'], $data['titleInd']) !!}</span>
         <div>{!! getTextLang($data['shortContent'], $data['shortContentInd']) !!}</div>
         <div class="read-more"><a href="{{ url('news/'.$data['newsId']) }}">View Detail</a></div>
      </div>
   </div>
   @endforeach
   <div class="col-sm-12">
      <div class="container-pagination">
         <ul class="pagination">
            <li class="paginate_button previous disabled" aria-controls="dataTables" tabindex="0" id="dataTables_previous">
               <a href="javascript:;" class="prev-page" data-page="{{ $list['prevPage'] }}" onclick="prevPage(this);"><img src="{{ url('assets/front/img/arrow-paging-number-left.png') }}"></a>
            </li>
            <li class="paginate_button" aria-controls="dataTables" tabindex="0">
               <a href="javascript:;" style="cursor: default;">{{ $list['page'] }} of {{ $list['totalPage'] }}</a>
            </li>
            <li class="paginate_button next" aria-controls="dataTables" tabindex="0" id="dataTables_next">
               <a href="javascript:;" class="next-page" data-page="{{ $list['nextPage'] }}" onclick="nextPage(this);"><img src="{{ url('assets/front/img/arrow-paging-number-right.png') }}"></a>
            </li>
         </ul>
      </div>
   </div>
   @endif
</div>