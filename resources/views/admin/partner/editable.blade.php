@extends('admin.layouts.index')

@section('title', 'Partner')
@section('partner', 'active')

@section('css')
@endsection

@section('content')
<div class="grid_12">
	<h3>{{ ($id == 0 ? 'Add New' : 'Update') }} Partner</h3>
	<br />
	<form method="post" action="{{ url(route('partner.index') . ($id == 0 ? '' : '/' . $id)) }}" enctype="multipart/form-data" class="editor">
		{{ csrf_field() }}
		@if($id != 0)
		<input name="_method" type="hidden" value="PUT">
		@endif
		<ul>

			<li>
				<label>Url</label>
				<input type="text" size="50" name="url" value="{{ old('url', isset($item) ? $item->url : '') }}" class="textin">
			</li>

			<li>
				<label>Name</label>
				<input type="text" size="50" name="name" value="{{ old('name', isset($item) ? $item->name : '') }}" class="textin">
			</li>

			<li>
				<label>Sort Num</label>
				<input type="number" size="10" name="order" value="{{ old('order', isset($item) ? $item->order : '') }}" class="textin">
			</li>

			<li>
				<br /><div class="hr"></div><br />
				<span class="notes">Recommended dimension: 200 x 45 (recommended) px</span><br><br>
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
			<button type="button" onClick="javascript:window.location.href = '{{ route('partner.index') }}';return false;">Cancel</button>
		</div>
		<input type="hidden" name="id" value="" />
	</form>
	&nbsp;
</div>
@stop

@section('js')
@endsection