@extends('admin.layouts.index')

@section('title', 'Keyword')

@section('css')
@endsection

@section('content')
<div class="section-header">
	<h1>Keyword</h1>
	<div class="section-header-breadcrumb">
		<div class="breadcrumb-item active"><a href="{{ url('admin') }}">Keyword</a></div>
	</div>
</div>
<form method="post" action="{{ route('metakey.update') }}" enctype="multipart/form-data" class="editor">
	{{ csrf_field() }}

	<h2 class="section-title">Keyword Management</h2>
	<p class="section-lead">This menu for management Keyword Page.</p>

	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header">
					<h4>Keyword</h4>
				</div>
				<div class="card-body">
					<div class="form-group row mb-4">
						<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Website Keywords</label>
						<div class="col-sm-12 col-md-7">
							<textarea name="value" cols="80" rows="15" id="value"
								class="form-control">{!! GetData::setting()->metaKeywords['value'] !!}</textarea>
						</div>
					</div>
					<div class="form-group row mb-4">
						<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
						<div class="col-sm-12 col-md-7">
							<button type="submit" class="btn btn-primary">Save</button>
							&nbsp;
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
@endsection