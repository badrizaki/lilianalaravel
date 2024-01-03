@extends('admin.layouts.index')

@section('title', 'Program')

@section('css')
@endsection

@section('content')
<div class="section-header">
	<h1>Program</h1>
	<div class="section-header-breadcrumb">
		<div class="breadcrumb-item active"><a href="{{ url('admin') }}">Home</a></div>
		<div class="breadcrumb-item"><a href="{{ route('program.index') }}">Program</a></div>
		<div class="breadcrumb-item">{{ ($id == 0 ? 'Add New' : 'Update') }} Program</div>
	</div>
</div>
<form method="post" action="{{ url(route('program.index') . ($id == 0 ? '' : '/' . $id)) }}"
	enctype="multipart/form-data" class="editor">
	{{ csrf_field() }}
	@if($id != 0)
	<input name="_method" type="hidden" value="PUT">
	@endif

	<h2 class="section-title">Program</h2>
	<p class="section-lead">This menu for management Program.</p>

	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header">
					<h4>{{ ($id == 0 ? 'Add New' : 'Update') }} Program</h4>
				</div>
				<div class="card-body">
					<div class="form-group row mb-4">
						<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Judul</label>
						<div class="col-sm-12 col-md-7">
							<input type="text" name="titleInd" value="{{ old('titleInd', isset($item) ? $item->titleInd : '') }}"
								class="form-control">
						</div>
					</div>

					<div class="form-group row mb-4">
						<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Short Program</label>
						<div class="col-sm-12 col-md-7"><textarea name="shortDescInd" cols="80" rows="15" id="shortDescInd"
								class="form-control">{!! old('shortDescInd', isset($item) ? $item->shortDescInd : '') !!}</textarea>
						</div>
					</div>

					<div class="form-group row mb-4">
						<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Program</label>
						<div class="col-sm-12 col-md-7"><textarea name="contentInd" cols="80" rows="15" id="contentInd"
								class="tinymce">{!! old('contentInd', isset($item) ? $item->contentInd : '') !!}</textarea>
						</div>
					</div>

					<div class="form-group row mb-4">
						<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Order</label>
						<div class="col-sm-12 col-md-7">
							<input type="number" name="order" value="{{ old('order', isset($item) ? $item->order : '') }}"
								class="form-control">
						</div>
					</div>

					<div class="form-group row mb-4">
						<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Image</label>
						<div class="col-sm-12 col-md-7">
							<span class="notes">Recommended dimension: 740 x 550 (recommended) px</span><br><br>
							<!-- <img src="{{ url('assets/icons/icon_del.gif') }}"
								style="cursor: pointer; vertical-align: middle;"
								onclick="deleteImage('Filedata')"> -->
							<input type="hidden" name="deleteFiledata" id="deleteFiledata" value="">
							<input type="file" name="Filedata" id="Filedata" class="file_input"
								onchange="addFile('Filedata')"><br>
							<br>

							<img src="{{ old('imageUrl', isset($item) ? url('' . $item->imageUrl) : '') }}"
								alt="" style="max-width:400px" id="imageFiledata" />
							<input type="hidden" name="old_img"
								value="{{ old('imageUrl', isset($item) ? $item->imageUrl : '') }}" />
						</div>
					</div>

					<div class="form-group row mb-4">
						<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
						<div class="col-sm-12 col-md-7">
							<button type="submit" class="btn btn-primary">Save</button>
							&nbsp;
							<button type="button" class="btn btn-secondary"
								onClick="javascript:window.location.href = '{{ route('program.index') }}';return false;">Cancel</button>
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
</script>
@endsection