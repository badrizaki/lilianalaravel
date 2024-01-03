@extends('admin.layouts.index')

@section('title', 'Profile')

@section('css')
@endsection

@section('content')
<div class="section-header">
	<h1>Profile</h1>
	<div class="section-header-breadcrumb">
		<div class="breadcrumb-item active"><a href="{{ url('admin') }}">Profile</a></div>
	</div>
</div>
<form method="post" action="{{ route('about.update') }}" enctype="multipart/form-data" class="editor">
	{{ csrf_field() }}

	<h2 class="section-title">Profile Management</h2>
	<p class="section-lead">This menu for management Profile Page.</p>

	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header">
					<h4>Profile</h4>
				</div>
				<div class="card-body">
					<div class="form-group row mb-4">
						<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Judul</label>
						<div class="col-sm-12 col-md-7">
							<input type="text" name="titleInd"
								value="{!! GetData::textBank()->aboutHome['titleInd'] !!}" class="form-control">
						</div>
					</div>
					<div class="form-group row mb-4">
						<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Deskripsi</label>
						<div class="col-sm-12 col-md-7">
							<textarea name="contentInd" cols="80" rows="15" id="contentInd"
								class="tinymce">{!! GetData::textBank()->aboutHome['contentInd'] !!}</textarea>
						</div>
					</div>
					<div class="form-group row mb-4">
						<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tentang</label>
						<div class="col-sm-12 col-md-7">
							<textarea name="content2Ind" cols="80" rows="15" id="content2Ind"
								class="tinymce">{!! GetData::textBank()->aboutHome['content2Ind'] !!}</textarea>
						</div>
					</div>

					<div class="form-group row mb-4">
						<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Thumbnail Video</label>
						<div class="col-sm-12 col-md-7">
							<span class="notes">Recommended dimension: 1906 x 1080 (recommended) px</span><br><br>
							<!-- <img src="{{ url('assets/icons/icon_del.gif') }}"
								style="cursor: pointer; vertical-align: middle;"
								onclick="deleteImage('Filedata')"> -->
							<input type="hidden" name="deleteFiledata" id="deleteFiledata" value="">
							<input type="file" name="Filedata" id="Filedata" class="file_input"
								onchange="addFile('Filedata')"><br>
							<br>

							<img src="{{ ((GetData::textBank()->aboutHome['imageUrl']) ? image(''.GetData::textBank()->aboutHome['imageUrl'], Config::get('app.directory.images')) : '') }}"
								alt="" style="max-width:400px" id="imageFiledata" />
							<input type="hidden" name="old_img"
								value="{{ (GetData::textBank()->aboutHome['imageUrl'] ? url(''.GetData::textBank()->aboutHome['imageUrl']) : '') }}" />
						</div>
					</div>

					<div class="form-group row mb-4">
						<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Video</label>
						<div class="col-sm-12 col-md-7">
							<!-- <img src="{{ url('assets/icons/icon_del.gif') }}"
								style="cursor: pointer; vertical-align: middle;"
								onclick="deleteImage('Filedata2')"> -->
							<input type="hidden" name="deleteFiledata2" id="deleteFiledata2" value="">
							<input type="file" name="Filedata2" id="Filedata2" class="file_input"
								onchange="addFile('Filedata2')"><br>
							<br>

							<video src="{!! url('' . GetData::textBank()->aboutHome['imageUrl2']) !!}"
								poster="{!! url('' . GetData::textBank()->aboutHome['imageUrl']) !!}"
								class="rounded img-fluid d-block mx-auto" controls></video>
							<input type="hidden" name="old_img2"
								value="{{ (GetData::textBank()->aboutHome['imageUrl2'] ? url(''.GetData::textBank()->aboutHome['imageUrl2']) : '') }}" />
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