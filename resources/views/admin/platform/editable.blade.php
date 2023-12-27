@extends('admin.layouts.index')

@section('title', 'Platform')
@section('platform', 'active')

@section('css')
<style type="text/css">
	label { width: 200px; }
</style>
@endsection

@section('content')
<div class="grid_12">
	<h3>{{ ($id == 0 ? 'Add New' : 'Update') }} Platform</h3>
	<br />
	<form method="post" action="{{ url(route('platform.index') . ($id == 0 ? '' : '/' . $id)) }}" enctype="multipart/form-data" class="editor">
		{{ csrf_field() }}
		@if($id != 0)
		<input name="_method" type="hidden" value="PUT">
		@endif
		<ul>

			<li>
				<label>Name English</label>
				<input type="text" size="50" name="platformName" value="{{ old('platformName', isset($item) ? $item->platformName : '') }}" class="textin">
			</li>

			<li>
				<label>Name Indonesia</label>
				<input type="text" size="50" name="platformNameInd" value="{{ old('platformNameInd', isset($item) ? $item->platformNameInd : '') }}" class="textin">
			</li>

			<li>
				<label>Title English</label>
				<input type="text" size="50" name="platformTitle" value="{{ old('platformTitle', isset($item) ? $item->platformTitle : '') }}" class="textin">
			</li>

			<li>
				<label>Title Indonesia</label>
				<input type="text" size="50" name="platformTitleInd" value="{{ old('platformTitleInd', isset($item) ? $item->platformTitleInd : '') }}" class="textin">
			</li>

			<li>
				<label>Home Title English</label>
				<input type="text" size="50" name="homeTitle" value="{{ old('homeTitle', isset($item) ? $item->homeTitle : '') }}" class="textin">
			</li>

			<li>
				<label>Home Title Indonesia</label>
				<input type="text" size="50" name="homeTitleInd" value="{{ old('homeTitleInd', isset($item) ? $item->homeTitleInd : '') }}" class="textin">
			</li>

			<li>
				<label>Description English</label>
				<textarea name="description" cols="50" rows="10" id="description" class="tinymce">{{ isset($item->description) ? $item->description : '' }}</textarea>
			</li>

			<li>
				<label>Description Indonesia</label>
				<textarea name="descriptionInd" cols="50" rows="10" id="descriptionInd" class="tinymce">{{ isset($item->descriptionInd) ? $item->descriptionInd : '' }}</textarea>
			</li>

			<li>
				<label>Feature Title English</label>
				<input type="text" size="50" name="featureTitle" value="{{ old('featureTitle', isset($item) ? $item->featureTitle : '') }}" class="textin">
			</li>

			<li>
				<label>Feature Title Indonesia</label>
				<input type="text" size="50" name="featureTitleInd" value="{{ old('featureTitleInd', isset($item) ? $item->featureTitleInd : '') }}" class="textin">
			</li>

			<li>
				<label>Platform Download English</label>
				<textarea name="platformDownload" cols="50" rows="10" id="platformDownload" class="tinymce">{{ isset($item->platformDownload) ? $item->platformDownload : '' }}</textarea>
			</li>

			<li>
				<label>Platform Download Indonesia</label>
				<textarea name="platformDownloadInd" cols="50" rows="10" id="platformDownloadInd" class="tinymce">{{ isset($item->platformDownloadInd) ? $item->platformDownloadInd : '' }}</textarea>
			</li>

			<li>
				<label>Sort Num</label>
				<input type="number" size="10" name="order" value="{{ old('order', isset($item) ? $item->order : '') }}" class="textin">
			</li>

			<li>
				<br /><div class="hr"></div><br />
				<span class="notes">Recommended dimension: 80 x 80 (recommended) px</span><br><br>
				<label>Home Image</label>
                <img src="{{ url('assets/icons/icon_del.gif') }}" style="cursor: pointer; vertical-align: middle;" onclick="deleteImage('FiledataIconHome')">
                <input type="hidden" name="deleteFiledataIconHome" id="deleteFiledataIconHome" value="">
				<input type="file" name="FiledataIconHome" id="FiledataIconHome" class="file_input" onchange="addFile('FiledataIconHome')"><br>
				<br>
				<label></label>
				<img id="imageFiledataIconHome" src="{{ ((isset($item) && $item->iconHome) ? image(''.$item->iconHome, Config::get('app.directory.image')) : '') }}" alt="" style="max-width:700px"/>
				<input type="hidden" name="old_img" value="{{ (isset($item) ? url(''.$item->iconHome) : '') }}" />
			</li>

			<li>
				<br /><div class="hr"></div><br />
				<span class="notes">Recommended dimension: 630 x 580 (recommended) px</span><br><br>
				<label>Image</label>
                <img src="{{ url('assets/icons/icon_del.gif') }}" style="cursor: pointer; vertical-align: middle;" onclick="deleteImage('Filedata')">
                <input type="hidden" name="deleteFiledata" id="deleteFiledata" value="">
				<input type="file" name="Filedata" id="Filedata" class="file_input" onchange="addFile('Filedata')"><br>
				<br>
				<label></label>
				<img id="imageFiledata" src="{{ ((isset($item) && $item->imageUrl) ? image(''.$item->imageUrl, Config::get('app.directory.image')) : '') }}" alt="" style="max-width:700px"/>
				<input type="hidden" name="old_img" value="{{ (isset($item) ? url(''.$item->imageUrl) : '') }}" />
			</li>

		</ul><hr>
		<ul>
			<li>
				<label>Feature</label><button type="button" onclick="addNewFeature()"><img src="{{ url('assets/icons/icon_add.gif') }}" alt="Add" width="16" height="16" class="icon"/> <font style="font-size: 12px; vertical-align: text-top;">Add Feature</font></button>
			</li>
			<li id="container-feature" style="width: 100%;">
				<div style="clear: both; margin-bottom: 20px;">
					<div style="width: 50px; float: left; margin-right: 10px;">
						<strong style="font-size: 10px;">Order</strong>
					</div>
					<div style="width: 270px; float: left; margin-right: 10px;">
						<strong style="font-size: 10px;">Feature English</strong>
					</div>
					<div style="width: 270px; float: left; margin-right: 10px;">
						<strong style="font-size: 10px;">Feature Indonesia</strong>
					</div>
					<div style="width: 70px; float: left; margin-right: 10px;">
					</div>
				</div>
				@if($lookupTable['feature'])
				@foreach($lookupTable['feature'] as $key => $value)
				<div style="clear: both; margin-bottom: 10px;">
					<div style="width: 50px; float: left; margin-right: 10px;">
						<input type="number" style="width: 42px;" name="orderFeature[]" class="textin" value="{{ $value['order'] }}">
					</div>
					<div style="width: 270px; float: left; margin-right: 10px;">
						<textarea name="descriptionFeature[]" style="width: 97%;" rows="7" id="descriptionFeature" placeholder="Description English">{!! $value['description'] !!}</textarea>
					</div>
					<div style="width: 270px; float: left; margin-right: 10px;">
						<textarea name="descriptionFeatureInd[]" style="width: 100%;" rows="7" id="descriptionFeatureInd" placeholder="Description Indonesia">{!! $value['descriptionInd'] !!}</textarea>
					</div>
					<div style="width: 70px; float: left; margin-right: 10px;">
						<button style="margin-top: 6px; margin-left: 5px;" type="button" onclick="deleteFeature(this)"><img src="{{ url('assets/icons/icon_del.gif') }}" alt="Add" width="16" height="16" class="icon"/> <font style="font-size: 12px; vertical-align: text-top;">Delete</font></button>
					</div>
				</div>
				@endforeach
				@endif
				<div style="clear: both;"></div>
			</li>
		</ul>
		<br /><div class="hr"></div><br />
		<div>
			<button type="submit">Save</button>
			&nbsp;
			<button type="button" onClick="javascript:window.location.href = '{{ route('platform.index') }}';return false;">Cancel</button>
		</div>
		<input type="hidden" name="id" value="" />
	</form>
	&nbsp;
</div>
@stop

@section('js')
<script type="text/javascript">
	var feature = [];
	var orderFeature = 1;

	@if($lookupTable['feature'])
	@foreach($lookupTable['feature'] as $key => $value)
		orderFeature = {{ $value['order'] }};
	@endforeach
	@endif

	function addNewFeature()
	{
		html = '<div style="clear: both; margin-bottom: 10px;">';
			html += '<div style="width: 50px; float: left; margin-right: 10px;">';
				html += '<input type="number" style="width: 42px;" name="orderFeature[]" class="textin" value="' + orderFeature + '">';
			html += '</div>';
			html += '<div style="width: 270px; float: left; margin-right: 10px;">';
				html += '<textarea name="descriptionFeature[]" style="width: 97%;" rows="7" id="descriptionFeature" placeholder="Description English"></textarea>';
			html += '</div>';
			html += '<div style="width: 270px; float: left; margin-right: 10px;">';
				html += '<textarea name="descriptionFeatureInd[]" style="width: 100%;" rows="7" id="descriptionFeatureInd" placeholder="Description Indonesia"></textarea>';
			html += '</div>';
			html += '<div style="width: 70px; float: left; margin-right: 10px;">';
				html += '<button style="margin-top: 6px; margin-left: 5px;" type="button" onclick="deleteFeature(this)"><img src="{{ url('assets/icons/icon_del.gif') }}" alt="Add" width="16" height="16" class="icon"/> <font style="font-size: 12px; vertical-align: text-top;">Delete</font></button>';
			html += '</div>';
		html += '</div>';
		$('#container-feature').append(html);
		orderFeature++;
	}

	function deleteFeature(self)
	{
		$(self).parent().parent().remove();
	}
</script>
@endsection