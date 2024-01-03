@extends('admin.layouts.index')

@section('title', 'Visi & Misi')

@section('css')
@endsection

@section('content')
<div class="section-header">
	<h1>Visi & Misi</h1>
	<div class="section-header-breadcrumb">
		<div class="breadcrumb-item active"><a href="{{ url('admin') }}">Visi & Misi</a></div>
	</div>
</div>
<form method="post" action="{{ route('visimisi.update') }}" enctype="multipart/form-data" class="editor">
	{{ csrf_field() }}

	<h2 class="section-title">Visi & Misi Management</h2>
	<p class="section-lead">This menu for management Visi & Misi Page.</p>

	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header">
					<h4>Visi & Misi</h4>
				</div>
				<div class="card-body">
					<div class="form-group row mb-4">
						<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Judul</label>
						<div class="col-sm-12 col-md-7">
							<input type="text" name="titleInd"
								value="{!! GetData::textBank()->visimisi['titleInd'] !!}" class="form-control">
						</div>
					</div>
					<div class="form-group row mb-4">
						<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Visi & Misi</label>
						<div class="col-sm-12 col-md-7">
							<textarea name="contentInd" cols="80" rows="15" id="contentInd"
								class="tinymce">{!! GetData::textBank()->visimisi['contentInd'] !!}</textarea>
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