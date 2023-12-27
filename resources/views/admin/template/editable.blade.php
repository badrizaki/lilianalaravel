@extends('admin.layouts.index')

@section('title', 'Template')
@section('template', 'active')

@section('css')
@endsection

@section('content')
<div class="grid_12">
	<h3>{{ ($id == 0 ? 'Add New' : 'Update') }} Template</h3>
	<br />
	<form method="post" action="{{ url(route('template.index') . ($id == 0 ? '' : '/' . $id)) }}" enctype="multipart/form-data" class="editor">
		{{ csrf_field() }}
	    @if($id != 0)
	    <input name="_method" type="hidden" value="PUT">
		@endif
		<ul>
			<li>
				<label>Title</label>
				<input type="text" size="70" name="title" value="{{ old('title', isset($item) ? $item->title : '') }}" class="textin">
			</li>
			<li>
				<label>Content</label>
				<textarea name="content" class="tinymce" rows="25" cols="85">{{ old('content', isset($item) ? $item->content : '') }}</textarea>
			</li>
		</ul>
		<br /><div class="hr"></div><br />
		<div>
			<button type="submit">Save</button>
			&nbsp;
			<button type="button" onClick="javascript:window.location.href = '{{ route('template.index') }}';return false;">Cancel</button>
		</div>
		<input type="hidden" name="id" value="" />
	</form>
	&nbsp;
</div>
@stop

@section('js')
@endsection