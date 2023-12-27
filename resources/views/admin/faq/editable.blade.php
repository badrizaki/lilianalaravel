@extends('admin.layouts.index')

@section('title', 'FAQ')
@section('faq', 'active')

@section('css')
@endsection

@section('content')
<div class="grid_12">
	<h3>{{ ($id == 0 ? 'Add New' : 'Update') }} FAQ</h3>
	<br />
	<form method="post" action="{{ url(route('faq.index') . ($id == 0 ? '' : '/' . $id)) }}" enctype="multipart/form-data" class="editor">
		{{ csrf_field() }}
		@if($id != 0)
		<input name="_method" type="hidden" value="PUT">
		@endif
		<ul>

			<li>
				<label>Questions English</label>
				<input type="text" size="50" name="title" value="{{ old('title', isset($item) ? $item->title : '') }}" class="textin">
			</li>

			<li>
				<label>Questions Indonesia</label>
				<input type="text" size="50" name="titleInd" value="{{ old('titleInd', isset($item) ? $item->titleInd : '') }}" class="textin">
			</li>
<!-- 
			<li>
				<label for="shortContent">Short Content English</label>
				<textarea name="shortContent" cols="50" rows="10" id="shortContent" class="tinymce">{{ isset($item->shortContent) ? $item->shortContent : '' }}</textarea>
			</li>

			<li>
				<label for="shortContentInd">Short Content Indonesia</label>
				<textarea name="shortContentInd" cols="50" rows="10" id="shortContentInd" class="tinymce">{{ isset($item->shortContentInd) ? $item->shortContentInd : '' }}</textarea>
			</li>
 -->
			<li>
				<label for="content">Answer English</label>
				<textarea name="content" cols="50" rows="10" id="content" class="tinymce">{{ isset($item->content) ? $item->content : '' }}</textarea>
			</li>

			<li>
				<label for="contentInd">Answer Indonesia</label>
				<textarea name="contentInd" cols="50" rows="10" id="contentInd" class="tinymce">{{ isset($item->contentInd) ? $item->contentInd : '' }}</textarea>
			</li>
<!-- 
			<li>
				<label>Publish Date</label>
				<input type="date" name="publishDate" value="{{ old('publishDate', isset($item) ? $item->publishDate : '') }}" class="textin">
			</li>
 -->
			<li>
				<label>Sort Num</label>
				<input type="number" size="10" name="order" value="{{ old('order', isset($item) ? $item->order : '') }}" class="textin">
			</li>
<!-- 
			<li>
				<br /><div class="hr"></div><br />
				<span class="notes">Recommended dimension: 312 x 312 (recommended) px</span><br><br>
				<label>Thumb</label>
				<input type="file" name="FiledataThumb" class="file_input"><br>
				<br>
				<label></label>
				<img src="{{ ((isset($item) && $item->thumbUrl) ? image(''.$item->thumbUrl, Config::get('app.directory.image')) : '') }}" alt="" style="max-width:280px"/>
				<input type="hidden" name="old_img" value="{{ (isset($item) ? url(''.$item->thumbUrl) : '') }}" />
			</li>

			<li>
				<br /><div class="hr"></div><br />
				<span class="notes">Recommended dimension: 960 x 380 (recommended) px</span><br><br>
				<label>Image</label>
				<input type="file" name="Filedata" class="file_input"><br>
				<br>
				<label></label>
				<img src="{{ ((isset($item) && $item->imageUrl) ? image(''.$item->imageUrl, Config::get('app.directory.image')) : '') }}" alt="" style="max-width:700px"/>
				<input type="hidden" name="old_img" value="{{ (isset($item) ? url(''.$item->imageUrl) : '') }}" />
			</li>
 -->
		</ul>
		<br /><div class="hr"></div><br />
		<div>
			<button type="submit">Save</button>
			&nbsp;
			<button type="button" onClick="javascript:window.location.href = '{{ route('faq.index') }}';return false;">Cancel</button>
		</div>
		<input type="hidden" name="id" value="" />
	</form>
	&nbsp;
</div>
@stop

@section('js')
@endsection