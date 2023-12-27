@extends('admin.layouts.index')

@section('title', 'Emails')
@section('emails', 'active')

@section('css')
@endsection

@section('content')
<div class="grid_12">
	<h3>Emails</h3>
	<br />
	<form action="{{ route('emails.index') }}" method="post" id="frm1" name="frm1" enctype="multipart/form-data" >
		{{ csrf_field() }}
		<ol>
			<li>
				<label for="contactEmail">Contact E-mail</label>
				<input type="text" name="contactEmail" value="{{ isset($item['contactEmail']->value) ? $item['contactEmail']->value : '' }}" id="contactEmail" size="50" class="textin"  /> <span class="notes">*</span>
			</li>
			<li>
				<span class="notes">* Can be a single email or a comma-delimited list</span>
				<br /><br /><div class="hr"></div>
			</li>
			<li>
				<label for="adminEmail">Admin E-mail</label>
				<input type="text" name="adminEmail" value="{{ isset($item['adminEmail']->value) ? $item['adminEmail']->value : '' }}" size="50" class="textin"  /> <span class="notes">**</span>
			</li>
			<li>
				<span class="notes">** Only one email address allowed</span>
				<br /><br /><div class="hr"></div>
			</li>
			<li>
				<input type="submit" name="sendimg" value=" save " /> &nbsp;
			</li>
		</ol>
		<input type="hidden" name="id" value="1" />
		<input type="hidden" name="grp" value="" />
	</form>
</div>
@stop

@section('js')
@endsection