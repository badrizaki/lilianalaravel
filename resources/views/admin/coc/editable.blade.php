@extends('admin.layouts.index')

@section('title', 'CODE of Conduct')
@section('coc', 'active')

@section('css')
@endsection

@section('content')
<div class="grid_12">
	<h3>{{ ($id == 0 ? 'Add New' : 'Update') }} CODE of Conduct</h3>
	<br />
	<form method="post" action="{{ url(route('coc.index') . ($id == 0 ? '' : '/' . $id)) }}" enctype="multipart/form-data" class="editor">
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

		</ul>
		<br /><div class="hr"></div><br />
		<div>
			<button type="submit">Save</button>
			&nbsp;
			<button type="button" onClick="javascript:window.location.href = '{{ route('coc.index') }}';return false;">Cancel</button>
		</div>
		<input type="hidden" name="id" value="" />
	</form>
	&nbsp;
</div>
@stop

@section('js')
@endsection