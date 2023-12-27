@extends('admin.layouts.index')

@section('title', 'Account Opening')
@section('accountopening', 'active')

@section('css')
@endsection

@section('content')
<div class="grid_12">
	<h3>{{ ($id == 0 ? 'Add New' : 'Update') }} Account Opening</h3>
	<br />
	<form method="post" action="{{ url(route('accountopening.index') . ($id == 0 ? '' : '/' . $id)) }}" enctype="multipart/form-data" class="editor">
		{{ csrf_field() }}
		@if($id != 0)
		<input name="_method" type="hidden" value="PUT">
		@endif
		<ul>

			<li>
				<label>Title Home English</label>
				<input type="text" size="50" name="titleHome" value="{{ old('titleHome', isset($item) ? $item->titleHome : '') }}" class="textin">
			</li>

			<li>
				<label>Title Home Indonesia</label>
				<input type="text" size="50" name="titleHomeInd" value="{{ old('titleHomeInd', isset($item) ? $item->titleHomeInd : '') }}" class="textin">
			</li>

			<li>
				<label for="contentHome">Content Home English</label>
				<textarea name="contentHome" cols="50" rows="10" id="contentHome" class="tinymce">{{ isset($item->contentHome) ? $item->contentHome : '' }}</textarea>
			</li>

			<li>
				<label for="contentHomeInd">Content Home Indonesia</label>
				<textarea name="contentHomeInd" cols="50" rows="10" id="contentHomeInd" class="tinymce">{{ isset($item->contentHomeInd) ? $item->contentHomeInd : '' }}</textarea>
			</li>

			<li>
				<label>Title English</label>
				<input type="text" size="50" name="title" value="{{ old('title', isset($item) ? $item->title : '') }}" class="textin">
			</li>

			<li>
				<label>Title Indonesia</label>
				<input type="text" size="50" name="titleInd" value="{{ old('titleInd', isset($item) ? $item->titleInd : '') }}" class="textin">
			</li>

			<li>
				<label for="content">Content English</label>
				<textarea name="content" cols="50" rows="10" id="content" class="tinymce">{{ isset($item->content) ? $item->content : '' }}</textarea>
			</li>

			<li>
				<label for="contentInd">Content Indonesia</label>
				<textarea name="contentInd" cols="50" rows="10" id="contentInd" class="tinymce">{{ isset($item->contentInd) ? $item->contentInd : '' }}</textarea>
			</li>

            <li><br /><div class="hr"></div><br /></li>
			<li>
				<label>Title Download English</label>
				<input type="text" size="50" name="pdfText" value="{{ old('pdfText', isset($item) ? $item->pdfText : '') }}" class="textin">
			</li>

			<li>
				<label>Title Download Indonesia</label>
				<input type="text" size="50" name="pdfTextInd" value="{{ old('pdfTextInd', isset($item) ? $item->pdfTextInd : '') }}" class="textin">
			</li>

			<li>
				<label>Online Opening Account Url</label>
				<input type="text" size="50" name="buttonUrl" value="{{ old('buttonUrl', isset($item) ? $item->buttonUrl : '') }}" class="textin" placeholder="example.com">
				<!-- <input type="text" size="50" name="buttonUrl" value="{{ old('buttonUrl', isset($item) ? $item->buttonUrl : '') }}" class="textin" placeholder="http://example.com/ (full with 'http://')"> -->
			</li>

            <li>
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
		</ul>
		<br /><div class="hr"></div><br />
		<div>
			<button type="submit">Save</button>
			&nbsp;
			<button type="button" onClick="javascript:window.location.href = '{{ route('accountopening.index') }}';return false;">Cancel</button>
		</div>
		<input type="hidden" name="id" value="" />
	</form>
	&nbsp;
</div>
@stop

@section('js')
@endsection