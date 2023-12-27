@extends('admin.layouts.index')

@section('title', 'Supporting Institutions')
@section('supportinginstitutions', 'active')

@section('css')
@endsection

@section('content')
<div class="grid_12">
	<h3>{{ ($id == 0 ? 'Add New' : 'Update') }} Supporting Institutions</h3>
	<br />
	<form method="post" action="{{ url(route('supportinginstitutions.index') . ($id == 0 ? '' : '/' . $id)) }}" enctype="multipart/form-data" class="editor">
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
				<label>Institution</label>
				<input type="text" size="50" name="location" value="{{ old('location', isset($item) ? $item->location : '') }}" class="textin">
			</li>

			<li>
				<label for="address">Address</label>
				<textarea name="address" cols="50" rows="10" id="address" class="tinymce">{{ isset($item->address) ? $item->address : '' }}</textarea>
			</li>

			<li>
				<label>Phone</label>
				<input type="text" size="50" name="phone" value="{{ old('phone', isset($item) ? $item->phone : '') }}" class="textin">
			</li>

			<li>
				<label>Email</label>
				<input type="text" size="50" name="email" value="{{ old('email', isset($item) ? $item->email : '') }}" class="textin">
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
			<button type="button" onClick="javascript:window.location.href = '{{ route('supportinginstitutions.index') }}';return false;">Cancel</button>
		</div>
		<input type="hidden" name="id" value="" />
	</form>
	&nbsp;
</div>
@stop

@section('js')
@endsection