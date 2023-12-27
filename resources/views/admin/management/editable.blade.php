@extends('admin.layouts.index')

@section('title', 'Management')
@section('management', 'active')

@section('css')
<link href="{{ url('assets/components/select2/dist/css/select2.css') }}" rel="stylesheet">
<style type="text/css">
	label, div.textro label { width: 100px; }
</style>
@endsection

@section('content')
<div class="grid_12">
	<h3>{{ ($id == 0 ? 'Add New' : 'Update') }} Management</h3>
	<br />
	<form method="post" action="{{ url(route('management.index') . ($id == 0 ? '' : '/' . $id)) }}" enctype="multipart/form-data" class="editor">
		{{ csrf_field() }}
		@if($id != 0)
		<input name="_method" type="hidden" value="PUT">
		@endif
		<ul>
			<li>
				<label for="type">Position</label>
				<select name="type" id="type">
					<option value="">Select Position</option>
					<option value="COMMISSIONER" {{ old('type', (isset($item) && 'COMMISSIONER' == $item->type) ? 'selected' : '') }}>COMMISSIONER</option>
					<option value="DIRECTOR" {{ old('type', (isset($item) && 'DIRECTOR' == $item->type) ? 'selected' : '') }}>DIRECTOR</option>
				</select>
			</li>

			<li>
				<label>Name</label>
				<input type="text" size="50" name="name" value="{{ old('name', isset($item) ? $item->name : '') }}" class="textin">
			</li>

			<li>
				<label for="shortDescription">Description English</label>
				<textarea name="shortDescription" cols="50" rows="10" id="shortDescription" class="tinymce">{{ isset($item->shortDescription) ? $item->shortDescription : '' }}</textarea>
			</li>

			<li>
				<label for="shortDescriptionInd">Description Indonesia</label>
				<textarea name="shortDescriptionInd" cols="50" rows="10" id="shortDescriptionInd" class="tinymce">{{ isset($item->shortDescriptionInd) ? $item->shortDescriptionInd : '' }}</textarea>
			</li>

			<li>
				<label>Nationality</label>
				<input type="text" size="50" name="nationality" value="{{ old('nationality', isset($item) ? $item->nationality : '') }}" class="textin">
			</li>

			<li>
				<label>Date of Birth</label>
				<input type="date" size="50" name="dob" value="{{ old('dob', isset($item) ? $item->dob : '') }}" class="textin">
			</li>

			<li>
				<label>Education English</label>
				<input type="text" size="50" name="lastEducation" value="{{ old('lastEducation', isset($item) ? $item->lastEducation : '') }}" class="textin">
			</li>
			<li>
				<label>Education Indonesia</label>
				<input type="text" size="50" name="lastEducationInd" value="{{ old('lastEducationInd', isset($item) ? $item->lastEducationInd : '') }}" class="textin">
			</li>

			<li>
				<label for="appointmentHistory">History of Appointment English</label>
				<textarea name="appointmentHistory" cols="50" rows="10" id="appointmentHistory" class="tinymce">{{ isset($item->appointmentHistory) ? $item->appointmentHistory : '' }}</textarea>
			</li>
			<li>
				<label for="appointmentHistoryInd">History of Appointment Indonesia</label>
				<textarea name="appointmentHistoryInd" cols="50" rows="10" id="appointmentHistoryInd" class="tinymce">{{ isset($item->appointmentHistoryInd) ? $item->appointmentHistoryInd : '' }}</textarea>
			</li>

			<li>
				<label>Current Position English</label>
				<input type="text" size="50" name="currentPosition" value="{{ old('currentPosition', isset($item) ? $item->currentPosition : '') }}" class="textin">
			</li>
			<li>
				<label>Current Position Indonesia</label>
				<input type="text" size="50" name="currentPositionInd" value="{{ old('currentPositionInd', isset($item) ? $item->currentPositionInd : '') }}" class="textin">
			</li>

			<li>
				<label>Affiliate Relations English</label>
				<input type="text" size="50" name="affiliate" value="{{ old('affiliate', isset($item) ? $item->affiliate : '') }}" class="textin">
			</li>
			<li>
				<label>Affiliate Relations Indonesia</label>
				<input type="text" size="50" name="affiliateInd" value="{{ old('affiliateInd', isset($item) ? $item->affiliateInd : '') }}" class="textin">
			</li>

			<li>
				<label>MPI's Share</label>
				<input type="text" size="50" name="mpiShare" value="{{ old('mpiShare', isset($item) ? $item->mpiShare : '') }}" class="textin">
			</li>

			<li>
				<label>Sort Num</label>
				<input type="number" size="10" name="order" value="{{ old('order', isset($item) ? $item->order : '') }}" class="textin">
			</li>

            <li>
                <br /><div class="hr"></div><br />
                <span class="notes">Recommended dimension: 485 x 590 (recommended) px</span><br><br>
                <label>Image</label>
                <!-- <img src="{{ url('assets/icons/icon_del.gif') }}" style="cursor: pointer; vertical-align: middle;" onclick="deleteImage('Filedata')"> -->
                <input type="hidden" name="deleteFiledata" id="deleteFiledata" value="">
				<input type="file" name="Filedata" id="Filedata" class="file_input" onchange="addFile('Filedata')"><br>
                <br>
                <label></label>
                <img id="imageFiledata" src="{{ ((isset($item) && $item->imageUrl) ? image(''.$item->imageUrl, Config::get('app.directory.images')) : '') }}" alt="" style="max-width:700px"/>
                <input type="hidden" name="old_img" value="{{ (isset($item) ? url(''.$item->imageUrl) : '') }}" />
            </li>
		</ul>
		<hr>
		<ul>
			<li>
				<label>Experience</label><button type="button" onclick="addNewExperience()"><img src="{{ url('assets/icons/icon_add.gif') }}" alt="Add" width="16" height="16" class="icon"/> <font style="font-size: 12px; vertical-align: text-top;">Add Experience</font></button>
			</li>
			<li id="container-experience" style="width: 100%;">
				<div style="clear: both; margin-bottom: 20px;">
					<div style="width: 50px; float: left; margin-right: 10px;">
						<strong style="font-size: 10px;">Order</strong>
					</div>
					<div style="width: 65px; float: left; margin-right: 10px;">
						<strong style="font-size: 10px;">From</strong>
					</div>
					<div style="width: 75px; float: left; margin-right: 10px;">
						<strong style="font-size: 10px;">To</strong>
					</div>
					<div style="width: 190px; float: left; margin-right: 10px;">
						<strong style="font-size: 10px;">Description English</strong>
					</div>
					<div style="width: 190px; float: left; margin-right: 10px;">
						<strong style="font-size: 10px;">Description Indonesia</strong>
					</div>
					<div style="width: 70px; float: left; margin-right: 10px;">
					</div>
				</div>
				
				<!-- <div style="clear: both; margin-bottom: 10px;">
					<div style="width: 50px; float: left; margin-right: 10px;">
						<input type="number" style="width: 42px;" name="orderExperience[]" class="textin">
					</div>
					<div style="width: 65px; float: left; margin-right: 10px;">
						<select name="from[]" class="form-control select2" id="from">
							@for ($i = date('Y'); $i > 1979; $i--)
							<option value="{{ $i }}">{{ $i }}</option>
							@endfor
						</select>
					</div>
					<div style="width: 75px; float: left; margin-right: 10px;">
						<select name="to[]" class="form-control select2" id="to">
							<option value="Present">Present</option>
							@for ($i = date('Y'); $i > 1979; $i--)
							<option value="{{ $i }}">{{ $i }}</option>
							@endfor
						</select>
					</div>
					<div style="width: 190px; float: left; margin-right: 10px;">
						<textarea name="experienceDescription[]" style="width: 97%;" rows="7" id="experienceDescription" placeholder="Description"></textarea>
					</div>
					<div style="width: 190px; float: left; margin-right: 10px;">
						<textarea name="experienceDescriptionInd[]" style="width: 100%;" rows="7" id="experienceDescriptionInd" placeholder="Description Indonesia"></textarea>
					</div>
					<div style="width: 70px; float: left; margin-right: 10px;">
						<button style="margin-top: 6px; margin-left: 5px;" type="button" onclick="deleteExperience(this)"><img src="{{ url('assets/icons/icon_del.gif') }}" alt="Add" width="16" height="16" class="icon"/> <font style="font-size: 12px; vertical-align: text-top;">Delete</font></button>
					</div>
				</div> -->
				@if($lookupTable['experience'])
				@foreach($lookupTable['experience'] as $key => $value)
				<div style="clear: both; margin-bottom: 10px;">
					<div style="width: 50px; float: left; margin-right: 10px;">
						<input type="number" style="width: 42px;" name="orderExperience[]" class="textin" value="{{ $value['order'] }}">
					</div>
					<div style="width: 65px; float: left; margin-right: 10px;">
						<select name="from[]" class="form-control select2" id="from">
							@for ($i = date('Y'); $i > 1979; $i--)
							<option value="{{ $i }}" {{ ($i == $value['from']) ? "selected" : "" }}>{{ $i }}</option>
							@endfor
						</select>
					</div>
					<div style="width: 75px; float: left; margin-right: 10px;">
						<select name="to[]" class="form-control select2" id="to">
							<option value="Present">Present</option>
							@for ($i = date('Y'); $i > 1979; $i--)
							<option value="{{ $i }}" {{ ($i == $value['to']) ? "selected" : "" }}>{{ $i }}</option>
							@endfor
						</select>
					</div>
					<div style="width: 190px; float: left; margin-right: 10px;">
						<textarea name="experienceDescription[]" style="width: 97%;" rows="7" id="experienceDescription" placeholder="Description">{!! $value['experienceDescription'] !!}</textarea>
					</div>
					<div style="width: 190px; float: left; margin-right: 10px;">
						<textarea name="experienceDescriptionInd[]" style="width: 100%;" rows="7" id="experienceDescriptionInd" placeholder="Description Indonesia">{!! $value['experienceDescriptionInd'] !!}</textarea>
					</div>
					<div style="width: 70px; float: left; margin-right: 10px;">
						<button style="margin-top: 6px; margin-left: 5px;" type="button" onclick="deleteExperience(this)"><img src="{{ url('assets/icons/icon_del.gif') }}" alt="Add" width="16" height="16" class="icon"/> <font style="font-size: 12px; vertical-align: text-top;">Delete</font></button>
					</div>
				</div>
				@endforeach
				@endif
				<div style="clear: both;"></div>
			</li>

		</ul>
		<br /><div class="hr"></div><br />
		<div>
			<button type="submit">Save</button>
			&nbsp;
			<button type="button" onClick="javascript:window.location.href = '{{ route('management.index') }}';return false;">Cancel</button>
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
					html += '<option value="Present">Present</option>';
					@for ($i = date('Y'); $i > 1979; $i--)
					html += '<option value="{{ $i }}">{{ $i }}</option>';
					@endfor
				html += '</select>';
			html += '</div>';
			html += '<div style="width: 190px; float: left; margin-right: 10px;">';
				html += '<textarea name="experienceDescription[]" style="width: 97%;" rows="7" id="experienceDescription" placeholder="Description"></textarea>';
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