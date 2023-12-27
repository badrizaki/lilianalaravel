@extends('admin.layouts.index')

@section('title', 'Website Name')

@section('css')
@endsection

@section('content')
<div class="section-header">
	<h1>Website Name</h1>
	<div class="section-header-breadcrumb">
		<div class="breadcrumb-item active"><a href="{{ route('adminHome') }}">Dashboard</a></div>
		<div class="breadcrumb-item">Website Name</div>
	</div>
</div>

<form action="{{ route('sitename.index') }}" method="post" id="frm1" name="frm1" enctype="multipart/form-data" >

	{{ csrf_field() }}
	<h2 class="section-title">Website Name</h2>
	<p class="section-lead">This menu for change website name.</p>

	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header">
					<h4>Change website name</h4>
				</div>
				<div class="card-body">
					<div class="form-group row mb-4">
						<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Website Name</label>
						<div class="col-sm-12 col-md-7">
							<input name="value" value="{{ isset($item['siteName']->value) ? $item['siteName']->value : '' }}" id="cvalue" size="60" class="form-control" type="text">
						</div>
					</div>

					<div class="form-group row mb-4">
						<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
						<div class="col-sm-12 col-md-7">
							<button type="submit" class="btn btn-primary">Save</button>
							&nbsp;
							<button type="button" class="btn btn-secondary" onClick="javascript:window.location.href = '{{ route('adminHome') }}';return false;">Cancel</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</form>
@stop

@section('js')
@endsection