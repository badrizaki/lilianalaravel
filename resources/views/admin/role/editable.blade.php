@extends('admin.layouts.index')

@section('title', 'Role')

@section('css')
<link href="{{ url('assets/modules/datatables/DataTables/datatables.min.css') }}" rel="stylesheet">
<style type="text/css">
#dtTable_filter { display: none; }
</style>
@endsection

@section('content')
<div class="section-header">
    <h1>Role</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="{{ route('role.index') }}">Role</a></div>
        <div class="breadcrumb-item">{{ ($id == 0 ? 'Add New' : 'Update') }} Role</div>
    </div>
</div>

<form method="post" action="{{ url(route('role.index') . ($id == 0 ? '' : '/' . $id)) }}" enctype="multipart/form-data" class="editor">
	{{ csrf_field() }}
	@if($id != 0)
	<input name="_method" type="hidden" value="PUT">
	@endif

	<h2 class="section-title">Role</h2>
	<p class="section-lead">This menu for setting role, using on privilage whole menus in CMS.</p>

	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header">
					<h4>{{ ($id == 0 ? 'Add New' : 'Update') }} Role</h4>
				</div>
				<div class="card-body">
					<div class="form-group row mb-4">
						<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Role Code</label>
						<div class="col-sm-12 col-md-7">
							@if (isset($item) && $item->name == "super_admin")
							<input type="hidden" name="name" value="{{ old('name', isset($item) ? $item->name : '') }}" class="form-control">
							{{ old('name', isset($item) ? $item->name : '') }}
							@else
							<input type="text" name="name" value="{{ old('name', isset($item) ? $item->name : '') }}" class="form-control">
							@endif
						</div>
					</div>

					<div class="form-group row mb-4">
						<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Role Name</label>
						<div class="col-sm-12 col-md-7"><input type="text" size="20" name="display_name" value="{{ old('display_name', isset($item) ? $item->display_name : '') }}" class="form-control"></div>
					</div>

					<div class="form-group row mb-4">
						<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Description</label>
						<div class="col-sm-12 col-md-7">
							<textarea name="description" class="form-control" rows="7" cols="50">{{ old('description', isset($item) ? $item->description : '') }}</textarea>
						</div>
					</div>

					<div class="form-group row mb-4">
						<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Permission</label>
					</div>

					<div class="form-group row mb-4">
						<div class="col-12">
							<table width="100%" id="dtTable" class="table table-striped table-hover">
								<thead>
									<tr>
										<th width="50">&nbsp;</th>
										<th>Name</th>
										<th>Read</th>
										<th>Create</th>
										<th>Update</th>
										<th>Delete</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($lookupTable['permission'] as $permissionName => $data)
									<tr>
										<td>{!! isset($permissionName) ? '<input type="checkbox" class="primary" id="'.str_replace(' ', '', $permissionName).'" onclick="checkedAllPermission(this);" data-id="'.str_replace(' ', '', $permissionName).'">' : '' !!}</td>
										<td>{!! isset($permissionName) ? '<label for="'.str_replace(' ', '', $permissionName).'">' . $permissionName . '</label>' : '' !!}</td>
										<!-- <td>{!! isset($permissionName) ? '<input type="checkbox" class="primary" id="'.str_replace(' ', '', $permissionName).'" onclick="checkedAllPermission(this);" data-id="'.str_replace(' ', '', $permissionName).'">&nbsp;&nbsp;&nbsp;<label for="'.str_replace(' ', '', $permissionName).'">' . $permissionName . '</label>' : '' !!}</td> -->

										<td>
											{!! isset($data['READ']['id']) ? '<input type="checkbox" name="permission[]" class="'.str_replace(' ', '', $permissionName).'" onclick="checkedPermission(this);" data-id="'.str_replace(' ', '', $permissionName).'" value="'.$data['READ']['id'].'" '.$data['READ']['checked'].'>' : '-' !!}
										</td>
										<td>
											{!! isset($data['CREATE']['id']) ? '<input type="checkbox" name="permission[]" class="'.str_replace(' ', '', $permissionName).'" onclick="checkedPermission(this);" data-id="'.str_replace(' ', '', $permissionName).'" value="'.$data['CREATE']['id'].'" '.$data['CREATE']['checked'].'>' : '-' !!}
										</td>
										<td>
											{!! isset($data['UPDATE']['id']) ? '<input type="checkbox" name="permission[]" class="'.str_replace(' ', '', $permissionName).'" onclick="checkedPermission(this);" data-id="'.str_replace(' ', '', $permissionName).'" value="'.$data['UPDATE']['id'].'" '.$data['UPDATE']['checked'].'>' : '-' !!}
										</td>
										<td>
											{!! isset($data['DELETE']['id']) ? '<input type="checkbox" name="permission[]" class="'.str_replace(' ', '', $permissionName).'" onclick="checkedPermission(this);" data-id="'.str_replace(' ', '', $permissionName).'" value="'.$data['DELETE']['id'].'" '.$data['DELETE']['checked'].'>' : '-' !!}
										</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>

					<div class="form-group row mb-4">
						<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
						<div class="col-sm-12 col-md-7">
							<button type="submit" class="btn btn-primary">Save</button>
							&nbsp;
							<button type="button" class="btn btn-secondary" onClick="javascript:window.location.href = '{{ route('role.index') }}';return false;">Cancel</button>
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
<script src="{{ url('assets/modules/datatables/DataTables/datatables.min.js') }}"></script>
<script>
	$(document).ready(function()
	{
		var idCheckbox = "";
		$('input[type="checkbox"].primary').each(function ()
		{
			idCheckbox = $(this).data('id');
			if ($('.'+idCheckbox+':checked').length == $('.'+idCheckbox).length)
			{
				$('#'+idCheckbox).prop('checked', true);
			}
		});
	});
	function checkedAllPermission(self)
	{
		var checkId = $(self).data('id');
		if ($(self).is(':checked')) {
			$('.'+checkId).prop('checked', true);
		}
		else {
			$('.'+checkId).prop('checked', false);
		}
	}
	function checkedPermission(self)
	{
		var idCheckbox = $(self).data('id');
		if ($('.'+idCheckbox+':checked').length == $('.'+idCheckbox).length)
		{
			$('#'+idCheckbox).prop('checked', true);
		}
		else {
			$('#'+idCheckbox).prop('checked', false);
		}
	}
</script>
@endsection