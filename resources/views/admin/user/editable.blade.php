@extends('admin.layouts.index')

@section('title', 'User')

@section('css')
@endsection

@section('content')
<div class="section-header">
	<h1>User</h1>
	<div class="section-header-breadcrumb">
		<div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
		<div class="breadcrumb-item"><a href="{{ route('user.index') }}">User</a></div>
		<div class="breadcrumb-item">{{ ($id == 0 ? 'Add New' : 'Update') }} User</div>
	</div>
</div>
<form method="post" action="{{ url(route('user.index') . ($id == 0 ? '' : '/' . $id)) }}" enctype="multipart/form-data" class="editor">
	{{ csrf_field() }}
	@if($id != 0)
	<input name="_method" type="hidden" value="PUT">
	@endif
	
	<h2 class="section-title">User</h2>
	<p class="section-lead">This menu for management user CMS.</p>

	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header">
					<h4>{{ ($id == 0 ? 'Add New' : 'Update') }} User</h4>
				</div>
				<div class="card-body">
					<div class="form-group row mb-4">
						<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama</label>
						<div class="col-sm-12 col-md-7">
							<input type="text" name="name" value="{{ old('name', isset($item) ? $item->name : '') }}" class="form-control">
						</div>
					</div>

					<div class="form-group row mb-4">
						<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Email</label>
						<div class="col-sm-12 col-md-7"><input type="text" name="email" value="{{ old('email', isset($item) ? $item->email : '') }}" class="form-control"></div>
					</div>

					<div class="form-group row mb-4">
						<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Username</label>
						<div class="col-sm-12 col-md-7"><input type="text" name="username" value="{{ old('username', isset($item) ? $item->username : '') }}" class="form-control"></div>
					</div>

					<div class="form-group row mb-4">
						<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Password</label>
						<div class="col-sm-12 col-md-7"><input type="password" name="password" id="password" value="{{ old('password', isset($item) ? $item->password : '') }}" class="form-control"></div>
					</div>

					<div class="form-group row mb-4">
						<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Konfirmasi Password</label>
						<div class="col-sm-12 col-md-7"><input type="password" size="40" name="password_confirmation" value="{{ old('password_confirmation', isset($item) ? $item->password_confirmation : '') }}" class="form-control"></div>
					</div>

					<div class="form-group row mb-4">
						<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Role</label>
						<div class="col-sm-12 col-md-7">
							<select name="role_id" class="form-control">
								<option value="">Select Role</option>
								@if($lookupTable['roles'])
								@foreach($lookupTable['roles'] as $key => $data)
								<option value="{{ $data['id'] }}" {{ old('role_id', (isset($item) && $data['id'] == $item->role_id) ? 'selected' : '') }}>{{ $data['display_name'] }}</option>
								@endforeach
								@endif
							</select>
						</div>
					</div>

					<div class="form-group row mb-4">
						<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
						<div class="col-sm-12 col-md-7">
							<button type="submit" class="btn btn-primary">Save</button>
							&nbsp;
							<button type="button" class="btn btn-secondary" onClick="javascript:window.location.href = '{{ route('user.index') }}';return false;">Cancel</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<input type="hidden" name="id" value="" />
</form>
@stop

@section('js')
<script>
	$('#password').val('');
</script>
@endsection