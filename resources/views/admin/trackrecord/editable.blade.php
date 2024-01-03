@extends('admin.layouts.index')

@section('title', 'Rekam Jejak')

@section('css')
@endsection

@section('content')
<div class="section-header">
	<h1>Rekam Jejak</h1>
	<div class="section-header-breadcrumb">
		<div class="breadcrumb-item active"><a href="{{ url('admin') }}">Home</a></div>
		<div class="breadcrumb-item"><a href="{{ route('trackrecord.index') }}">Rekam Jejak</a></div>
		<div class="breadcrumb-item">{{ ($id == 0 ? 'Add New' : 'Update') }} Rekam Jejak</div>
	</div>
</div>
<form method="post" action="{{ url(route('trackrecord.index') . ($id == 0 ? '' : '/' . $id)) }}"
	enctype="multipart/form-data" class="editor">
	{{ csrf_field() }}
	@if($id != 0)
	<input name="_method" type="hidden" value="PUT">
	@endif

	<h2 class="section-title">Rekam Jejak</h2>
	<p class="section-lead">This menu for management Rekam Jejak.</p>

	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header">
					<h4>{{ ($id == 0 ? 'Add New' : 'Update') }} Rekam Jejak</h4>
				</div>
				<div class="card-body">
					<div class="form-group row mb-4">
						<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tanggal</label>
						<div class="col-sm-12 col-md-7">
							<input type="date" name="date" value="{{ old('date', isset($item) ? $item->date : '') }}"
								class="form-control">
						</div>
					</div>

					<div class="form-group row mb-4">
						<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Rekam Jejak</label>
						<div class="col-sm-12 col-md-7"><textarea name="contentInd" cols="80" rows="15" id="contentInd"
								class="tinymce form-control">{!! old('contentInd', isset($item) ? $item->contentInd : '') !!}</textarea>
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
						<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
						<div class="col-sm-12 col-md-7">
							<button type="submit" class="btn btn-primary">Save</button>
							&nbsp;
							<button type="button" class="btn btn-secondary"
								onClick="javascript:window.location.href = '{{ route('trackrecord.index') }}';return false;">Cancel</button>
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