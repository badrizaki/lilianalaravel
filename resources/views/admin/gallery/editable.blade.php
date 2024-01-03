@extends('admin.layouts.index')

@section('title', 'Galeri')

@section('css')
@endsection

@section('content')
<div class="section-header">
	<h1>Galeri</h1>
	<div class="section-header-breadcrumb">
		<div class="breadcrumb-item active"><a href="{{ url('admin') }}">Home</a></div>
		<div class="breadcrumb-item"><a href="{{ route('gallery.index') }}">Galeri</a></div>
		<div class="breadcrumb-item">{{ ($id == 0 ? 'Add New' : 'Update') }} Galeri</div>
	</div>
</div>
<form method="post" action="{{ url(route('gallery.index') . ($id == 0 ? '' : '/' . $id)) }}"
	enctype="multipart/form-data" class="editor">
	{{ csrf_field() }}
	@if($id != 0)
	<input name="_method" type="hidden" value="PUT">
	@endif

	<h2 class="section-title">Galeri</h2>
	<p class="section-lead">This menu for management Galeri.</p>

	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header">
					<h4>{{ ($id == 0 ? 'Add New' : 'Update') }} Galeri</h4>
				</div>
				<div class="card-body">
					<div class="form-group row mb-4">
						<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Judul</label>
						<div class="col-sm-12 col-md-7">
							<input type="text" name="titleInd"
								value="{{ old('titleInd', isset($item) ? $item->titleInd : '') }}" class="form-control">
						</div>
					</div>

					<div class="form-group row mb-4">
						<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tipe Galeri</label>
						<div class="col-sm-12 col-md-7">
							<select name="galleryType" class="form-control">
								<option value="">Pilih Tipe Galeri</option>
								<option value="IMAGE" {{ old('galleryType', (isset($item) && "IMAGE"==$item->
									galleryType) ? 'selected' : '') }}>Gambar</option>
								<option value="VIDEO" {{ old('galleryType', (isset($item) && "VIDEO"==$item->
									galleryType) ? 'selected' : '') }}>Video</option>
							</select>
						</div>
					</div>

					<div class="form-group row mb-4">
						<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Order</label>
						<div class="col-sm-12 col-md-7">
							<input type="number" name="order"
								value="{{ old('order', isset($item) ? $item->order : '') }}" class="form-control">
						</div>
					</div>

					<div class="form-group row mb-4">
						<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Image</label>
						<div class="col-sm-12 col-md-7">
							<span class="notes">Recommended dimension: 740 x 550 (recommended) px</span><br><br>
							<input type="hidden" name="deleteFiledata" id="deleteFiledata" value="">
							<input type="file" name="Filedata" id="Filedata" class="file_input"
								onchange="addFile('Filedata')"><br>
							<br>

							@if (isset($item) && "IMAGE" == $item->galleryType)
							<img src="{{ old('imageUrl', isset($item) ? url('' . $item->imageUrl) : '') }}" alt=""
								style="max-width:400px" id="imageFiledata" />
							@else
							<video src="{{ old('imageUrl', isset($item) ? url('' . $item->imageUrl) : '') }}"
								poster="{{ old('imageUrl', isset($item) ? url('' . $item->imageUrl) : '') }}"
								class="rounded img-fluid d-block mx-auto" controls></video>
							@endif
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
								onClick="javascript:window.location.href = '{{ route('gallery.index') }}';return false;">Cancel</button>
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