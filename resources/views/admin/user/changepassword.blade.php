@extends('admin.layouts.index')

@section('title', 'Change Password')

@section('css')
@endsection

@section('content')
<div class="grid_12">
	<h3>Change Administrator Password</h3><br />
	<form action="{{ url('admin/changepassword/store') }}" method="post" accept-charset="utf-8">
		{{ csrf_field() }}
		<label>Old Password</label><input type="password" name="current_password" value="" size="20" maxlength="15" class="textin"  />
		<br /><br /><label>New Password</label><input type="password" name="password" value="" size="20" maxlength="15" class="textin"  />
		<br /><label>Confirmation</label><input type="password" name="password_confirmation" value="" size="20" maxlength="15" class="textin"  />
		<br /><br /><hr />
		<input type="submit" name="send" value="Save" class="submitfrm"  />&nbsp;
	</form>
</div>
@stop

@section('js')
@endsection