@extends('admin.layouts.index')

@section('title', 'Good Corporate Governance')
@section('corporategovernance', 'active')

@section('css')
@endsection

@section('content')
<div class="grid_12">
	<h3>Good Corporate Governance</h3>
	<br />
	<form action="{{ route('corporategovernance.index') }}" method="post" id="frm1" name="frm1" enctype="multipart/form-data" >
		<ol>
			<li>
				{{ csrf_field() }}
				<label for="title">Title English</label>
				<input name="title" value="{{ isset($item['corporategovernance']->title) ? $item['corporategovernance']->title : '' }}" id="title" size="60" class="textin" type="text">
			</li>
			<li>
				<label for="titleInd">Title Indonesia</label>
				<input name="titleInd" value="{{ isset($item['corporategovernance']->titleInd) ? $item['corporategovernance']->titleInd : '' }}" id="titleInd" size="60" class="textin" type="text">
			</li>
			<li>
				<label for="content">Content English</label>
				<textarea name="content" cols="80" rows="15" id="content" class="tinymce">{!! isset($item['corporategovernance']->content) ? $item['corporategovernance']->content : '' !!}</textarea>
			</li>
			<li>
				<label for="contentInd">Content Indonesia</label>
				<textarea name="contentInd" cols="80" rows="15" id="contentInd" class="tinymce">{!! isset($item['corporategovernance']->contentInd) ? $item['corporategovernance']->contentInd : '' !!}</textarea>
			</li>

            <li>
                <br /><div class="hr"></div><br />
                <span class="notes">Recommended dimension: 580 x 600 (recommended) px</span><br><br>
                <label>Image Banner</label>
                <input type="file" name="Filedata" class="file_input"><br>
                <br>
                <label></label>
                <img src="{{ ((isset($item) && $item['corporategovernance']->imageUrl) ? image(''.$item['corporategovernance']->imageUrl, Config::get('app.directory.images')) : '') }}" alt="" style="max-width:700px"/>
                <input type="hidden" name="old_img" value="{{ (isset($item) ? url(''.$item['corporategovernance']->imageUrl) : '') }}" />
            </li>

			<li>
				<input type="submit" name="sendimg" value=" save " /> &nbsp;
				<input type="button" name="cancel" value=" back " onclick="location.replace('{{ route('corporategovernance.index') }}')"/>
			</li>
		</ol>
		<input type="hidden" name="id" value="1" />
		<input type="hidden" name="grp" value="" />
	</form>
</div>
@stop

@section('js')
@endsection