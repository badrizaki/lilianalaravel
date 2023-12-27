@extends('admin.layouts.index')

@section('title', 'Overview')
@section('overview', 'active')

@section('css')
@endsection

@section('content')
<div class="grid_12">
	<h3>Overview</h3>
	<br />
	<form action="{{ route('overview.index') }}" method="post" id="frm1" name="frm1" enctype="multipart/form-data" >
		{{ csrf_field() }}
		<ol>
			<li>
				<label for="content">Content English</label>
				<textarea name="content" cols="80" rows="15" id="content" class="tinymce">{!! isset($item['overview']->content) ? $item['overview']->content : '' !!}</textarea>
			</li>
			<li>
				<label for="contentInd">Content Indonesia</label>
				<textarea name="contentInd" cols="80" rows="15" id="contentInd" class="tinymce">{!! isset($item['overview']->contentInd) ? $item['overview']->contentInd : '' !!}</textarea>
			</li>
			<li>
				<label for="contentVision">vision English</label>
				<textarea name="contentVision" cols="80" rows="15" id="contentVision" class="tinymce">{!! isset($item['vision']->content) ? $item['vision']->content : '' !!}</textarea>
			</li>
			<li>
				<label for="contentVisionInd">vision Indonesia</label>
				<textarea name="contentVisionInd" cols="80" rows="15" id="contentVisionInd" class="tinymce">{!! isset($item['vision']->contentInd) ? $item['vision']->contentInd : '' !!}</textarea>
			</li>
			<li>
				<label for="contentMission">Mission English</label>
				<textarea name="contentMission" cols="80" rows="15" id="contentMission" class="tinymce">{!! isset($item['mission']->content) ? $item['mission']->content : '' !!}</textarea>
			</li>
			<li>
				<label for="contentMissionInd">Mission Indonesia</label>
				<textarea name="contentMissionInd" cols="80" rows="15" id="contentMissionInd" class="tinymce">{!! isset($item['mission']->contentInd) ? $item['mission']->contentInd : '' !!}</textarea>
			</li>
            <!-- <li>
                <br /><div class="hr"></div><br />
                <span class="notes">Recommended dimension: 580 x 600 (recommended) px</span><br><br>
                <label>Image Banner</label>
                <input type="file" name="Filedata" class="file_input"><br>
                <br>
                <label></label>
                <img src="{{ ((isset($item) && $item['overview']->imageUrl) ? image(''.$item['overview']->imageUrl, Config::get('app.directory.images')) : '') }}" alt="" style="max-width:700px"/>
                <input type="hidden" name="old_img" value="{{ (isset($item) ? url(''.$item['overview']->imageUrl) : '') }}" />
            </li> -->
			<li>
				<input type="submit" name="sendimg" value=" save " /> &nbsp;
				<input type="button" name="cancel" value=" back " onclick="location.replace('{{ route('overview.index') }}')"/>
			</li>
		</ol>
		<input type="hidden" name="id" value="1" />
		<input type="hidden" name="grp" value="" />
	</form>
</div>
@stop

@section('js')
@endsection