@extends('admin.layouts.index')

@section('title', 'Home Banner')
@section('homebanner', 'active')

@section('css')
@endsection

@section('content')
<div class="grid_12">
	<h3>Home Banner</h3>
	<br />
	<form class="propfrm" action="{{ route('homebanner.index') }}" method="post" id="frm" name="frm" enctype="multipart/form-data">
		<ul>
			<li>
				{{ csrf_field() }}
				<label>Upload Image<br /><br /></label>
				<input type="file" name="userfile3" id="file_upload">
				<a class="uploadnow" href="javascript:$('#file_upload').uploadifive('upload')">Upload Now</a>
				<br />
				<span class="notes">Recommended dimension: 580 x 600 (recommended) px</span>
				<div class="hr"></div>
			</li>
		</ul>
	</form><br />

	<form class="propfrm2" action="{{ route('homebanner.index') . '/' . $item['sliderId'] }}" method="post" id="frm2" name="frm">
		{{ csrf_field() }}
		<input name="_method" type="hidden" value="PUT">
		<img src="{{ url(''.$item['thumbUrl']) }}" width="320" height="150" />
		<ul style="width:350px;float:right;margin-top:-10px;">
			<!-- <li>
				<label class="short">URL</label>
				<input type="text" name="url" size="42" value="{{ $item['url'] }}" class="textin" />
			<li> -->
			<li>
				<label class="short">Title</label>
				<input type="text" name="sliderTitle" size="42" value="{{ $item['sliderTitle'] }}" class="textin" />
			</li>
			<li>
				<label for="sliderText">Content</label>
				<textarea name="sliderText" cols="80" rows="15" id="sliderText" class="tinymce-simple">{!! $item['sliderText'] !!}</textarea>
			</li>
			<li>
				<label class="short">&nbsp;</label>
				<button>Save</button>
				<button onClick="location.href='{{ route('homebanner.index') }}';return false;">Cancel</button>
				<br /><br />
			</li>
		</ul>
		<div class="hr"></div>
	</form><br />

	<ul class="topbanner img-album">
		@foreach($list['slider'] as $key => $data)
		<li>
			<a href="{{ url(''.$data['imageUrl']) }}" rel="prettyPhoto">
				<img src="{{ image(''.$data['thumbUrl']) }}" alt="{{ $data['sliderFilename'] }}" width="320" height="150" />
			</a>
			<a class="edt_img" href="{{ route('homebanner.index') . '/' . $data['sliderId'] . '/edit' }}" title="Edit Caption" style="right:30px">
				<img src="{{ url('assets/icons/icon_edit.gif') }}" alt="Edit Caption" />
			</a>
			<a class="del_img" href="{{ url(route('homebanner.index').'/delete/'.$data['sliderId']) }}" title="Delete" >
				<img src="{{ url('assets/icons/icon_del.gif') }}" alt="Delete Banner" />
			</a>
			<input type="hidden" name="order_id[]" value="{{ $data['sliderId'] }}" />
		</li>
		@endforeach
	</ul>
	&nbsp;
</div>
@stop

@section('js')

<script type="text/javascript">
	$(function()
	{
		var li = '';
		$('#file_upload').uploadifive({
			'fileSizeLimit' : 2048,
			'height' : 24,
			'auto' : false,
			'removeCompleted' : true,
			'multi' : true,
            'formData' : {'_token' : $('input[name=_token]').val(), 'gal_id' : '', 'mode' : ''},
			'uploadScript' : '{{ route('homebanner.index') }}',
			'onUploadComplete' : function(file, data)
			{
				$('.img-album').append(data);
				$("a[rel^='prettyPhoto']").prettyPhoto();
			},
			'onQueueComplete' : function(uploads)
			{
				location.reload();
				$('.img-album').sortable('destroy');
				$('.img-album').sortable().bind('sortupdate', function()
				{
					var arr = new Array;
					$(this).find('li').each(function(index){
						arr[index] = $(this).find('input[name=order_id]').val();
					});
					$.post('{{ route('homebanner.index') }}/order', {
						'sort_id': arr.join(),
						'_token' : $('input[name=_token]').val()
					});
				});
			}
		});

		$('.img-album,.topbanner').sortable({
			placeholder: 'ui-sortable-placeholder',
			forcePlaceholderSize: true,
			helper : 'clone',
			update: function( event, ui ) {
				var arr = new Array;
				$(this).find('li').each(function(index){
					arr[index] = $(this).find('input[name*=order_id]').val();
				});
				$.post('{{ route('homebanner.index') }}/order', {
					'sort_id': arr.join(),
					'_token' : $('input[name=_token]').val()
				});
			}
		});
	});
</script>
@endsection