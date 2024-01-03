@extends('admin.layouts.index')

@section('title', 'Home')

@section('css')
@endsection

@section('content')
<div class="section-header">
	<h1>Home</h1>
	<div class="section-header-breadcrumb">
		<div class="breadcrumb-item active"><a href="{{ url('admin') }}">Home</a></div>
	</div>
</div>
<form method="post" action="{{ route('homecontent.update') }}" enctype="multipart/form-data" class="editor">
	{{ csrf_field() }}

	<h2 class="section-title">Home Management</h2>
	<p class="section-lead">This menu for management Home Page.</p>

	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header">
					<h4>Home</h4>
				</div>
				<div class="card-body">
					<div class="form-group row mb-4">
						<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Judul Banner</label>
						<div class="col-sm-12 col-md-7">
							<input type="text" name="titleInd"
								value="{!! GetData::textBank()->topContent['titleInd'] !!}" class="form-control">
						</div>
					</div>
					<div class="form-group row mb-4">
						<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Konten Banner</label>
						<div class="col-sm-12 col-md-7">
							<textarea name="contentInd" cols="80" rows="15" id="contentInd"
								class="tinymce">{!! GetData::textBank()->topContent['contentInd'] !!}</textarea>
						</div>
					</div>
					<div class="form-group row mb-4">
						<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Detail Banner</label>
						<div class="col-sm-12 col-md-7">
							<textarea name="content2Ind" cols="80" rows="15" id="content2Ind"
								class="tinymce">{!! GetData::textBank()->topContent['content2Ind'] !!}</textarea>
						</div>
					</div>

					<div class="form-group row mb-4">
						<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Image Banner</label>
						<div class="col-sm-12 col-md-7">
							<span class="notes">Recommended dimension: 450 x 560 (recommended) px</span><br><br>
							<!-- <img src="{{ url('assets/icons/icon_del.gif') }}"
								style="cursor: pointer; vertical-align: middle;"
								onclick="deleteImage('Filedata')"> -->
							<input type="hidden" name="deleteFiledata" id="deleteFiledata" value="">
							<input type="file" name="Filedata" id="Filedata" class="file_input" onchange="addFile('Filedata')"><br>
							<br>

							<img src="{{ ((GetData::textBank()->topContent['imageUrl']) ? image(''.GetData::textBank()->topContent['imageUrl'], Config::get('app.directory.images')) : '') }}"
								alt="" style="max-width:400px" id="imageFiledata" />
							<input type="hidden" name="old_img"
								value="{{ (GetData::textBank()->topContent['imageUrl'] ? url(''.GetData::textBank()->topContent['imageUrl']) : '') }}" />
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