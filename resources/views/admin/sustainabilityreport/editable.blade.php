@extends('admin.layouts.index')

@section('title', 'Sustainability Report')
@section('sustainabilityreport', 'active')

@section('css')
@endsection

@section('content')
<div class="grid_12">
	<h3>{{ ($id == 0 ? 'Add New' : 'Update') }} Sustainability Report</h3>
	<br />
	<form method="post" action="{{ url(route('sustainabilityreport.index') . ($id == 0 ? '' : '/' . $id)) }}" enctype="multipart/form-data" class="editor">
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
				<label for="content">Description English</label>
				<textarea name="content" cols="50" rows="10" id="content" class="tinymce">{{ isset($item->content) ? $item->content : '' }}</textarea>
			</li>

			<li>
				<label for="contentInd">Description Indonesia</label>
				<textarea name="contentInd" cols="50" rows="10" id="contentInd" class="tinymce">{{ isset($item->contentInd) ? $item->contentInd : '' }}</textarea>
			</li>

			<li>
				<label>Publish Date</label>
				<input type="date" name="publishDate" value="{{ old('publishDate', isset($item) ? $item->publishDate : '') }}" class="textin">
			</li>

            <li>
                <br /><div class="hr"></div><br />
                <label>File PDF</label>
                <img src="{{ url('assets/icons/icon_del.gif') }}" style="cursor: pointer; vertical-align: middle;" onclick="deleteImage('file1')">
                <input type="hidden" name="deletefile1" id="deletefile1" value="">
                <input type="file" name="file1" id="file1" class="file_input" onchange="addFile('file1')"><br>
                <br>
                @if (isset($item) && $item->pdfUrl != "")
                <object id="imagefile1" data="{{ (isset($item) ? url(''.$item->pdfUrl) : '') }}" type="application/pdf">
                    {{ (isset($item) ? '<iframe src="https://docs.google.com/viewer?url=' . url(''.$item->pdfUrl) . '&embedded=true"></iframe>' : '') }}
                </object>
                <br>{!! (isset($item) ? '<a href="' . url(''.$item->pdfUrl) . '" target="_blank" download>Download</a>' : '') !!}
                @endif
                <input type="hidden" name="old_img" value="{{ (isset($item) ? url(''.$item->pdfUrl) : '') }}" />
            </li>

			<li>
				<label>Sort Num</label>
				<input type="number" size="10" name="order" value="{{ old('order', isset($item) ? $item->order : '') }}" class="textin">
			</li>

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

		</ul>
		<br /><div class="hr"></div><br />
		<div>
			<button type="submit">Save</button>
			&nbsp;
			<button type="button" onClick="javascript:window.location.href = '{{ route('sustainabilityreport.index') }}';return false;">Cancel</button>
		</div>
		<input type="hidden" name="id" value="" />
	</form>
	&nbsp;
</div>
@stop

@section('js')
@endsection