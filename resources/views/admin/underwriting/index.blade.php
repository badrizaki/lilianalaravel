@extends('admin.layouts.index')

@section('title', 'Underwriting')
@section('underwriting', 'active')

@section('css')
@endsection

@section('content')
<div class="grid_12">
	<h3>Underwriting</h3>
	<br />
	<form action="{{ route('underwriting.index') }}" method="post" id="frm1" name="frm1" enctype="multipart/form-data" >
		{{ csrf_field() }}
		<ol>
			<li>
				<label for="titleIpo">Title Ipo English</label>
				<input name="titleIpo" value="{{ isset($item['ipo']->title) ? $item['ipo']->title : '' }}" id="titleIpo" size="60" class="textin" type="text">
			</li>
			<li>
				<label for="titleIpoInd">Title Ipo Indonesia</label>
				<input name="titleIpoInd" value="{{ isset($item['ipo']->titleInd) ? $item['ipo']->titleInd : '' }}" id="titleIpoInd" size="60" class="textin" type="text">
			</li>
			<li>
				<label for="contentIpo">Content Ipo English</label>
				<textarea name="contentIpo" cols="80" rows="15" id="contentIpo" class="tinymce">{!! isset($item['ipo']->content) ? $item['ipo']->content : '' !!}</textarea>
			</li>
			<li>
				<label for="contentIpoInd">Content Ipo Indonesia</label>
				<textarea name="contentIpoInd" cols="80" rows="15" id="contentIpoInd" class="tinymce">{!! isset($item['ipo']->contentInd) ? $item['ipo']->contentInd : '' !!}</textarea>
			</li>

			<li><hr></li>
			<li>
				<label for="titleRightIssue">Title Right Issue English</label>
				<input name="titleRightIssue" value="{{ isset($item['rightIssue']->title) ? $item['rightIssue']->title : '' }}" id="titleRightIssue" size="60" class="textin" type="text">
			</li>
			<li>
				<label for="titleRightIssueInd">Title Right Issue Indonesia</label>
				<input name="titleRightIssueInd" value="{{ isset($item['rightIssue']->titleInd) ? $item['rightIssue']->titleInd : '' }}" id="titleRightIssueInd" size="60" class="textin" type="text">
			</li>
			<li>
				<label for="contentRightIssue">Right Issue English</label>
				<textarea name="contentRightIssue" cols="80" rows="15" id="contentRightIssue" class="tinymce">{!! isset($item['rightIssue']->content) ? $item['rightIssue']->content : '' !!}</textarea>
			</li>
			<li>
				<label for="contentRightIssueInd">Right Issue Indonesia</label>
				<textarea name="contentRightIssueInd" cols="80" rows="15" id="contentRightIssueInd" class="tinymce">{!! isset($item['rightIssue']->contentInd) ? $item['rightIssue']->contentInd : '' !!}</textarea>
			</li>

			<li>
				<input type="submit" name="sendimg" value=" save " /> &nbsp;
				<input type="button" name="cancel" value=" back " onclick="location.replace('{{ route('underwriting.index') }}')"/>
			</li>
		</ol>
		<input type="hidden" name="id" value="1" />
		<input type="hidden" name="grp" value="" />
	</form>
</div>
@stop

@section('js')
@endsection