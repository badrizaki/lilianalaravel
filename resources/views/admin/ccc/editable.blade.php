@extends('admin.layouts.index')

@section('title', 'Corporate Charter & Committee')
@section('ccc', 'active')

@section('css')
@endsection

@section('content')
<div class="grid_12">
	<h3>{{ ($id == 0 ? 'Add New' : 'Update') }} Corporate Charter & Committee</h3>
	<br />
	<form method="post" action="{{ url(route('ccc.index') . ($id == 0 ? '' : '/' . $id)) }}" enctype="multipart/form-data" class="editor">
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
				<label for="description">Description English</label>
				<textarea name="description" cols="50" rows="10" id="description" class="tinymce">{{ isset($item->description) ? $item->description : '' }}</textarea>
			</li>

			<li>
				<label for="descriptionInd">Description Indonesia</label>
				<textarea name="descriptionInd" cols="50" rows="10" id="descriptionInd" class="tinymce">{{ isset($item->descriptionInd) ? $item->descriptionInd : '' }}</textarea>
			</li>

			<li>
				<label>Sort Num</label>
				<input type="number" size="10" name="order" value="{{ old('order', isset($item) ? $item->order : '') }}" class="textin">
			</li>

			<!-- ADA SLIDER KE TABLE FILE -->
			
			<!-- <li>
				<br /><div class="hr"></div><br />
				<span class="notes">Recommended dimension: 420 x 420 (recommended) px</span><br><br>
				<label>Thumb</label>
				<input type="file" name="FiledataThumb" class="file_input"><br>
				<br>
				<label></label>
				<img src="{{ ((isset($item) && $item->thumbUrl) ? image(''.$item->thumbUrl, Config::get('app.directory.gallery')) : '') }}" alt="" style="max-width:280px"/>
				<input type="hidden" name="old_img" value="{{ (isset($item) ? url(''.$item->thumbUrl) : '') }}" />
			</li>

			<li>
				<br /><div class="hr"></div><br />
				<span class="notes">Recommended dimension: 960 x 660 (recommended) px</span><br><br>
				<label>Image</label>
				<input type="file" name="Filedata" class="file_input"><br>
				<br>
				<label></label>
				<img src="{{ ((isset($item) && $item->imageUrl) ? image(''.$item->imageUrl, Config::get('app.directory.gallery')) : '') }}" alt="" style="max-width:700px"/>
				<input type="hidden" name="old_img" value="{{ (isset($item) ? url(''.$item->imageUrl) : '') }}" />
			</li> -->

		<ul>
			<li>
				<label>File</label><button type="button" onclick="addNewFile()"><img src="{{ url('assets/icons/icon_add.gif') }}" alt="Add" width="16" height="16" class="icon"/> <font style="font-size: 12px; vertical-align: text-top;">Add File</font></button>
			</li>
			<hr>
			<li id="container-file" style="width: 100%;">
				<div style="clear: both; margin-bottom: 20px;">
					<div style="width: 50px; float: left; margin-right: 10px;">
						<strong style="font-size: 10px;">Order</strong>
					</div>
					<div style="width: 240px; float: left; margin-right: 10px;">
						<strong style="font-size: 10px;">File</strong>
					</div>
					<div style="width: 300px; float: left; margin-right: 10px;">
						<strong style="font-size: 10px;">Image Cover</strong><br>
		                <span class="notes">Recommended dimension: 580 x 600 (recommended) px</span><br><br>
					</div>
					<div style="width: 70px; float: left; margin-right: 10px;">
					</div>
				</div>
				
				<!-- <div style="clear: both; margin-bottom: 10px;">
					<div style="width: 50px; float: left; margin-right: 10px;">
						<input type="number" style="width: 42px;" name="orderFile[]" class="textin">
					</div>
					<div style="width: 240px; float: left; margin-right: 10px;">
	                    <input type="file" name="FilePDF" class="file_input">
					</div>
					<div style="width: 300px; float: left; margin-right: 10px;">
		                <input type="file" name="Filedata" class="file_input">
					</div>
					<div style="width: 70px; float: left; margin-right: 10px;">
						<button style="margin-top: 6px; margin-left: 5px;" type="button" onclick="deleteExperience(this)"><img src="{{ url('assets/icons/icon_del.gif') }}" alt="Add" width="16" height="16" class="icon"/> <font style="font-size: 12px; vertical-align: text-top;">Delete</font></button>
					</div>
				</div> -->

				@if(isset($lookupTable['file']) && $lookupTable['file'])
				@foreach($lookupTable['file'] as $key => $value)
				<div style="clear: both; margin-bottom: 10px;">
					<div style="width: 50px; float: left; margin-right: 10px;">
						<input type="number" style="width: 42px;" name="orderFile[]" class="textin" value="{{ $value['order'] }}">
					</div>
					<div style="width: 240px; float: left; margin-right: 10px;">
	                    <input type="file" name="FilePDF[]" class="file_input"><br>
	                    <br>
	                    <object data="{{ url(''.$value['fileUrl']) }}" type="application/pdf" width="200px">
	                        <iframe src="https://docs.google.com/viewer?url={{ url(''.$value['fileUrl']) }}&embedded=true" width="200px"></iframe>
	                    </object>
	                    <br><a href="{{ url(''.$value['fileUrl']) }}" download>Download</a>
	                    <input type="hidden" name="FilePDFOld[]" value="{{ $value['fileUrl'] }}" />
	                    <input type="hidden" name="FileNamePDFOld[]" value="{{ $value['filename'] }}" />
					</div>
					<div style="width: 300px; float: left; margin-right: 10px;">
		                <input type="file" name="Filedata[]" class="file_input"><br>
		                <br>
		                <label></label>
		                <img src="{{ image(''.$value['imageUrl'], Config::get('app.directory.images')) }}" alt="" style="max-width:200px"/>
		                <input type="hidden" name="FiledataOld[]" value="{{ $value['imageUrl'] }}" />
					</div>
					<div style="width: 70px; float: left; margin-right: 10px;">
						<button style="margin-top: 6px; margin-left: 5px;" type="button" onclick="deleteExperience(this)"><img src="{{ url('assets/icons/icon_del.gif') }}" alt="Add" width="16" height="16" class="icon"/> <font style="font-size: 12px; vertical-align: text-top;">Delete</font></button>
					</div>
				</div>

				@endforeach
				@endif
				<div style="clear: both;"></div>
			</li>

		</ul>
		</ul>
		<br /><div class="hr"></div><br />
		<div>
			<button type="submit">Save</button>
			&nbsp;
			<button type="button" onClick="javascript:window.location.href = '{{ route('ccc.index') }}';return false;">Cancel</button>
		</div>
		<input type="hidden" name="id" value="" />
	</form>
	&nbsp;
</div>
@stop

@section('js')
<script type="text/javascript">
	var file = [];
	function addNewFile()
	{
		html = '<div style="clear: both; margin-bottom: 10px;">';
			html += '<div style="width: 50px; float: left; margin-right: 10px;">';
				html += '<input type="number" style="width: 42px;" name="orderFile[]" class="textin" value="1">';
			html += '</div>';
			html += '<div style="width: 240px; float: left; margin-right: 10px;">';
                html += '<input type="file" name="FilePDF[]" class="file_input">';
			html += '</div>';
			html += '<div style="width: 300px; float: left; margin-right: 10px;">';
                html += '<input type="file" name="Filedata[]" class="file_input">';
			html += '</div>';
			html += '<div style="width: 70px; float: left; margin-right: 10px;">';
				html += '<button style="margin-top: 6px; margin-left: 5px;" type="button" onclick="deleteExperience(this)"><img src="{{ url('assets/icons/icon_del.gif') }}" alt="Add" width="16" height="16" class="icon"/> <font style="font-size: 12px; vertical-align: text-top;">Delete</font></button>';
			html += '</div>';
		html += '</div>';
		$('#container-file').append(html);
	}

	function deleteExperience(self)
	{
		$(self).parent().parent().remove();
	}
</script>
@endsection