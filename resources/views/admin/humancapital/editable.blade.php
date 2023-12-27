@extends('admin.layouts.index')

@section('title', 'Human Capital')
@section('humancapital', 'active')

@section('css')
<link href="{{ url('assets/components/select2/dist/css/select2.css') }}" rel="stylesheet">
<style type="text/css">
	label, div.textro label { width: 100px; }
</style>
@endsection

@section('content')
<div class="grid_12">
	<h3>{{ ($id == 0 ? 'Add New' : 'Update') }} Human Capital</h3>
	<br />
	<form method="post" action="{{ url(route('humancapital.index') . ($id == 0 ? '' : '/' . $id)) }}" enctype="multipart/form-data" class="editor">
		{{ csrf_field() }}
		@if($id != 0)
		<input name="_method" type="hidden" value="PUT">
		@endif
		<ul>
			<li>
				<label>Name</label>
				<input type="text" size="10" value="{{ old('name', isset($item) ? $item->name : '') }}" class="textin" readonly="readonly">
			</li>
			<li>
				<label>Email</label>
				<input type="text" size="10" value="{{ old('email', isset($item) ? $item->email : '') }}" class="textin" readonly="readonly">
			</li>
			<li>
				<label>Phone Number</label>
				<input type="text" size="10" value="{{ old('phoneNumber', isset($item) ? $item->phoneNumber : '') }}" class="textin" readonly="readonly">
			</li>

			<li>
				<label>Vacancy Your Are Applying For</label>
				<input type="text" size="10" value="{{ old('jobApply', isset($item) ? $item->jobApply : '') }}" class="textin" readonly="readonly">
			</li>

			<li>
				<label for="message">Message</label>
				<textarea cols="50" rows="10" id="description">{{ isset($item->message) ? $item->message : '' }}</textarea>
			</li>

		</ul>
		<br /><div class="hr"></div><br />
		<div>
			<button type="submit">Save</button>
			&nbsp;
			<button type="button" onClick="javascript:window.location.href = '{{ route('humancapital.index') }}';return false;">Cancel</button>
		</div>
		<input type="hidden" name="id" value="" />
	</form>
	&nbsp;
</div>
@stop

@section('js')
<script src="{{ url('assets/components/select2/dist/js/select2.full.min.js') }}"></script>
<script type="text/javascript">

	// $('.select2').select2();

	var experience = [];
	function addNewExperience()
	{
		html = '<div style="clear: both; margin-bottom: 10px;">';
			html += '<div style="width: 50px; float: left; margin-right: 10px;">';
				html += '<input type="number" style="width: 42px;" name="orderExperience[]" class="textin">';
			html += '</div>';
			html += '<div style="width: 65px; float: left; margin-right: 10px;">';
				html += '<select name="from[]" class="form-control select2" id="from">';
					@for ($i = date('Y'); $i > 1979; $i--)
					html += '<option value="{{ $i }}">{{ $i }}</option>';
					@endfor
				html += '</select>';
			html += '</div>';
			html += '<div style="width: 75px; float: left; margin-right: 10px;">';
				html += '<select name="to[]" class="form-control select2" id="to">';
					html += '<option value="NOW">Present</option>';
					@for ($i = date('Y'); $i > 1979; $i--)
					html += '<option value="{{ $i }}">{{ $i }}</option>';
					@endfor
				html += '</select>';
			html += '</div>';
			html += '<div style="width: 190px; float: left; margin-right: 10px;">';
				html += '<textarea name="experienceDescription[]" style="width: 97%;" rows="7" id="experienceDescription" placeholder="Description English"></textarea>';
			html += '</div>';
			html += '<div style="width: 190px; float: left; margin-right: 10px;">';
				html += '<textarea name="experienceDescriptionInd[]" style="width: 100%;" rows="7" id="experienceDescriptionInd" placeholder="Description Indonesia"></textarea>';
			html += '</div>';
			html += '<div style="width: 70px; float: left; margin-right: 10px;">';
				html += '<button style="margin-top: 6px; margin-left: 5px;" type="button" onclick="deleteExperience(this)"><img src="{{ url('assets/icons/icon_del.gif') }}" alt="Add" width="16" height="16" class="icon"/> <font style="font-size: 12px; vertical-align: text-top;">Delete</font></button>';
			html += '</div>';
		html += '</div>';
		$('#container-experience').append(html);
	}

	function deleteExperience(self)
	{
		$(self).parent().parent().remove();
	}
</script>
@endsection