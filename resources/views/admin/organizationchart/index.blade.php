@extends('admin.layouts.index')

@section('title', 'Organization Chart')
@section('organizationchart', 'active')

@section('css')
@endsection

@section('content')
<div class="grid_12">
	<h3>Organization Chart</h3>
	<br />
	<form action="{{ route('organizationchart.index') }}" method="post" id="frm1" name="frm1" enctype="multipart/form-data" >
		{{ csrf_field() }}
		<ol>
            <li>
                <br /><div class="hr"></div><br />
                <span class="notes">Recommended dimension: 680 x 420 (recommended) px</span><br><br>
                <label>Content</label>
                <img src="{{ url('assets/icons/icon_del.gif') }}" style="cursor: pointer; vertical-align: middle;" onclick="deleteImage('content2')">
                <input type="hidden" name="deletecontent2" id="deletecontent2" value="">
                <input type="file" name="content2" id="content2" class="file_input" onchange="addFile('content2')"><br>
                <br>
                <label></label>
                <img id="imagecontent2" src="{{ ((isset($item) && $item['organizationchart']->content2) ? image(''.$item['organizationchart']->content2, Config::get('app.directory.images')) : '') }}" alt="" style="max-width:700px"/>
                <input type="hidden" name="old_img" value="{{ (isset($item) ? url(''.$item['organizationchart']->content2) : '') }}" />
            </li>
			<li>
				<input type="submit" name="sendimg" value=" save " /> &nbsp;
				<input type="button" name="cancel" value=" back " onclick="location.replace('{{ route('organizationchart.index') }}')"/>
			</li>
		</ol>
		<input type="hidden" name="id" value="1" />
		<input type="hidden" name="grp" value="" />
	</form>
</div>
@stop

@section('js')
@endsection