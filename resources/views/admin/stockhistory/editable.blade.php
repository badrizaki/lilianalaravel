@extends('admin.layouts.index')

@section('corporateAction', 'Stock History')
@section('stockhistory', 'active')

@section('css')
@endsection

@section('content')
<div class="grid_12">
	<h3>{{ ($id == 0 ? 'Add New' : 'Update') }} Stock History</h3>
	<br />
	<form method="post" action="{{ url(route('stockhistory.index') . ($id == 0 ? '' : '/' . $id)) }}" enctype="multipart/form-data" class="editor">
		{{ csrf_field() }}
		@if($id != 0)
		<input name="_method" type="hidden" value="PUT">
		@endif
		<ul>

			<li>
				<label>Corporate Action English</label>
				<input type="text" size="50" name="corporateAction" value="{{ old('corporateAction', isset($item) ? $item->corporateAction : '') }}" class="textin">
			</li>

			<li>
				<label>Corporate Action Indonesia</label>
				<input type="text" size="50" name="corporateActionInd" value="{{ old('corporateActionInd', isset($item) ? $item->corporateActionInd : '') }}" class="textin">
			</li>

			<li>
				<label>Date</label>
				<input type="date" name="date" value="{{ old('date', isset($item) ? $item->date : '') }}" class="textin">
			</li>

			<li>
				<label>Total Stock</label>
				<input type="text" size="50" name="totalStock" value="{{ old('totalStock', isset($item) ? $item->totalStock : '') }}" class="textin number" placeholder="number only">
			</li>

			<li>
				<label>Flag Total</label>
				<input type="checkbox" name="isTotal" value="1"  class="textin" {{ old('isTotal', isset($item) && $item->isTotal ? 'checked' : '') }} >
			</li>

			<li>
				<label>Sort Num</label>
				<input type="number" size="10" name="order" value="{{ old('order', isset($item) ? $item->order : '') }}" class="textin onlyNumeric">
			</li>

		</ul>
		<br /><div class="hr"></div><br />
		<div>
			<button type="submit">Save</button>
			&nbsp;
			<button type="button" onClick="javascript:window.location.href = '{{ route('stockhistory.index') }}';return false;">Cancel</button>
		</div>
		<input type="hidden" name="id" value="" />
	</form>
	&nbsp;
</div>
@stop

@section('js')
@endsection