@extends('admin.layouts.index')

@section('title', 'Description')
@section('metadesc', 'active')

@section('css')
@endsection

@section('content')
<div class="grid_12">
	<h3>Website Description</h3>
	<br />
	<form action="{{ route('metadesc.index') }}" method="post" id="frm1" name="frm1" enctype="multipart/form-data" >
		<ol>
			<li>
				{{ csrf_field() }}
				<label for="content">Website Description</label>
				<textarea name="value" cols="80" rows="15" id="value">{{ isset($item['metaDesc']->value) ? $item['metaDesc']->value : '' }}</textarea>
			</li>
			<li>
				<label>&nbsp;</label>
				<input type="submit" name="sendimg" value=" save " /> &nbsp;
				<input type="button" name="cancel" value=" back " onclick="location.replace('{{ route('adminHome') }}')"/>
			</li>
		</ol>
		<input type="hidden" name="id" value="1" />
		<input type="hidden" name="grp" value="" />
	</form>
</div>
@stop

@section('js')
@endsection