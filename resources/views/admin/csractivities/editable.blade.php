@extends('admin.layouts.index')

@section('title', 'CSR Activities')
@section('csractivities', 'active')

@section('css')
@endsection

@section('content')
<div class="grid_12">
	<h3>{{ ($id == 0 ? 'Add New' : 'Update') }} CSR Activities</h3>
	<br />
	<form method="post" action="{{ url(route('csractivities.index') . ($id == 0 ? '' : '/' . $id)) }}" enctype="multipart/form-data" class="editor">
		{{ csrf_field() }}
		@if($id != 0)
		<input name="_method" type="hidden" value="PUT">
		@endif
		<ul>

			<li>
				<label>Title English</label>
				<input type="text" size="50" name="title" value="{{ old('title', isset($item) ? $item->title : '') }}" class="textin">
			</li>

			<li>
				<label>Title Indonesia</label>
				<input type="text" size="50" name="titleInd" value="{{ old('titleInd', isset($item) ? $item->titleInd : '') }}" class="textin">
			</li>

			<li>
				<label for="shortContent">Short Content English</label>
				<textarea name="shortContent" cols="50" rows="10" id="shortContent" class="tinymce">{{ isset($item->shortContent) ? $item->shortContent : '' }}</textarea>
			</li>

			<li>
				<label for="shortContentInd">Short Content Indonesia</label>
				<textarea name="shortContentInd" cols="50" rows="10" id="shortContentInd" class="tinymce">{{ isset($item->shortContentInd) ? $item->shortContentInd : '' }}</textarea>
			</li>

			<li>
				<label for="content">Content English</label>
				<textarea name="content" cols="50" rows="10" id="content" class="tinymce">{{ isset($item->content) ? $item->content : '' }}</textarea>
			</li>

			<li>
				<label for="contentInd">Content Indonesia</label>
				<textarea name="contentInd" cols="50" rows="10" id="contentInd" class="tinymce">{{ isset($item->contentInd) ? $item->contentInd : '' }}</textarea>
			</li>

			<li>
				<label>Sort Num</label>
				<input type="number" size="10" name="order" value="{{ old('order', isset($item) ? $item->order : '') }}" class="textin">
			</li>

			<li>
				<br /><div class="hr"></div><br />
				<span class="notes">Recommended dimension: 312 x 312 (recommended) px</span><br><br>
				<label>Thumb</label>
                <img src="{{ url('assets/icons/icon_del.gif') }}" style="cursor: pointer; vertical-align: middle;" onclick="deleteImage('FiledataThumb')">
                <input type="hidden" name="deleteFiledataThumb" id="deleteFiledataThumb" value="">
				<input type="file" name="FiledataThumb" id="FiledataThumb" class="file_input" onchange="addFile('FiledataThumb')"><br>
				<br>
				<label></label>
				<img id="imageFiledataThumb" src="{{ ((isset($item) && $item->thumbUrl) ? image(''.$item->thumbUrl, Config::get('app.directory.image')) : '') }}" alt="" style="max-width:280px"/>
				<input type="hidden" name="old_img" value="{{ (isset($item) ? url(''.$item->thumbUrl) : '') }}" />
			</li>

			<li>
				<br /><div class="hr"></div><br />
				<span class="notes">Recommended dimension: 960 x 380 (recommended) px</span><br><br>
				<label>Image</label>
                <img src="{{ url('assets/icons/icon_del.gif') }}" style="cursor: pointer; vertical-align: middle;" onclick="deleteImage('Filedata')">
                <input type="hidden" name="deleteFiledata" id="deleteFiledata" value="">
				<input type="file" name="Filedata" id="Filedata" class="file_input" onchange="addFile('Filedata')"><br>
				<br>
				<label></label>
				<img id="imageFiledata" src="{{ ((isset($item) && $item->imageUrl) ? image(''.$item->imageUrl, Config::get('app.directory.image')) : '') }}" alt="" style="max-width:700px"/>
				<input type="hidden" name="old_img" value="{{ (isset($item) ? url(''.$item->imageUrl) : '') }}" />
			</li>

		</ul>
		<br /><div class="hr"></div><br />
		<div>
			<button type="submit">Save</button>
			&nbsp;
			<button type="button" onClick="javascript:window.location.href = '{{ route('csractivities.index') }}';return false;">Cancel</button>
		</div>
		<input type="hidden" name="id" value="" />
	</form>
	&nbsp;
</div>
@stop

@section('js')
@endsection