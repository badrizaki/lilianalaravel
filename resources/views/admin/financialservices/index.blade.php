@extends('admin.layouts.index')

@section('title', 'Financial Services')
@section('financialservices', 'active')

@section('css')
@endsection

@section('content')
<div class="grid_12">
	<h3>Financial Services</h3>
	<br />
	<form action="{{ route('financialservices.index') }}" method="post" id="frm1" name="frm1" enctype="multipart/form-data" >
		<ol>
			<li>
				{{ csrf_field() }}
				<label for="title">Title English</label>
				<input name="title" value="{{ isset($item['financialservices']->title) ? $item['financialservices']->title : '' }}" id="title" size="60" class="textin" type="text">
			</li>
			<li>
				<label for="titleInd">Title Indonesia</label>
				<input name="titleInd" value="{{ isset($item['financialservices']->titleInd) ? $item['financialservices']->titleInd : '' }}" id="titleInd" size="60" class="textin" type="text">
			</li>
			<li>
				<label for="content">Content English</label>
				<textarea name="content" cols="80" rows="15" id="content" class="tinymce">{!! isset($item['financialservices']->content) ? $item['financialservices']->content : '' !!}</textarea>
			</li>
			<li>
				<label for="contentInd">Content Indonesia</label>
				<textarea name="contentInd" cols="80" rows="15" id="contentInd" class="tinymce">{!! isset($item['financialservices']->contentInd) ? $item['financialservices']->contentInd : '' !!}</textarea>
			</li>

            <li>
                <br /><div class="hr"></div><br />
                <span class="notes">Recommended dimension: 580 x 600 (recommended) px</span><br><br>
                <label>Image Banner</label>
                <input type="file" name="Filedata" class="file_input"><br>
                <br>
                <label></label>
                <img src="{{ ((isset($item) && $item['financialservices']->imageUrl) ? image(''.$item['financialservices']->imageUrl, Config::get('app.directory.images')) : '') }}" alt="" style="max-width:700px"/>
                <input type="hidden" name="old_img" value="{{ (isset($item) ? url(''.$item['financialservices']->imageUrl) : '') }}" />
            </li>
			<li>
				<input type="submit" name="sendimg" value=" save " /> &nbsp;
				<input type="button" name="cancel" value=" back " onclick="location.replace('{{ route('financialservices.index') }}')"/>
			</li>
		</ol>
		<input type="hidden" name="id" value="1" />
		<input type="hidden" name="grp" value="" />
	</form>
</div>
@stop

@section('js')
@endsection