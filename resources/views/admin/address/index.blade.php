@extends('admin.layouts.index')

@section('title', 'Address')
@section('address', 'active')

@section('css')
@endsection

@section('content')
<div class="grid_12">
	<h3>Address</h3>
	<br />
	<form action="{{ route('address.index') }}" method="post" id="frm1" name="frm1" enctype="multipart/form-data" >
		<ol>
			{{ csrf_field() }}

			<li>
				<label for="title">Title English</label>
				<input name="title" value="{{ isset($item['contact']->title) ? $item['contact']->title : '' }}" id="title" size="60" class="textin" type="text">
			</li>
			<li>
				<label for="titleInd">Title Indonesia</label>
				<input name="titleInd" value="{{ isset($item['contact']->titleInd) ? $item['contact']->titleInd : '' }}" id="titleInd" size="60" class="textin" type="text">
			</li>
			<li>
				<label for="content">Content English</label>
				<textarea name="content" cols="80" rows="15" id="content" class="tinymce">{!! isset($item['contact']->content) ? $item['contact']->content : '' !!}</textarea>
			</li>
			<li>
				<label for="contentInd">Content Indonesia</label>
				<textarea name="contentInd" cols="80" rows="15" id="contentInd" class="tinymce">{!! isset($item['contact']->contentInd) ? $item['contact']->contentInd : '' !!}</textarea>
			</li>
            <li>
                <br /><div class="hr"></div><br />
                <span class="notes">Recommended dimension: 580 x 600 (recommended) px</span><br><br>
                <label>Image Banner</label>
                <input type="file" name="Filedata" class="file_input"><br>
                <br>
                <label></label>
                <img src="{{ ((isset($item) && $item['contact']->imageUrl) ? image(''.$item['contact']->imageUrl, Config::get('app.directory.images')) : '') }}" alt="" style="max-width:700px"/>
                <input type="hidden" name="old_img" value="{{ (isset($item) ? url(''.$item['contact']->imageUrl) : '') }}" />
            </li>

			<li>
				<label for="address">Head Office</label>
				<textarea name="address" cols="80" rows="15" id="address" class="tinymce">{{ isset($item['address']->value) ? $item['address']->value : '' }}</textarea>
			</li>
			<li>
				<label for="phoneNumber1">Phone Number Head Office</label>
				<input name="phoneNumber1" value="{{ isset($item['phoneNumber1']->value) ? $item['phoneNumber1']->value : '' }}" id="phoneNumber1" size="53" class="textin" type="text">
			</li>
			<li>
				<label for="fax">Fax Head Office</label>
				<input name="fax" value="{{ isset($item['fax']->value) ? $item['fax']->value : '' }}" id="fax" size="53" class="textin" type="text">
			</li>

			<li>
				<label for="branchOffice">Branch Office</label>
				<textarea name="branchOffice" cols="80" rows="15" id="branchOffice" class="tinymce-simple">{{ isset($item['branchOffice']->value) ? $item['branchOffice']->value : '' }}</textarea>
			</li>
			<li>
				<label for="phoneNumber2">Phone Number Branch Office</label>
				<input name="phoneNumber2" value="{{ isset($item['phoneNumber2']->value) ? $item['phoneNumber2']->value : '' }}" id="phoneNumber2" size="53" class="textin" type="text">
			</li>
			<li>
				<label for="fax2">Fax Branch Office</label>
				<input name="fax2" value="{{ isset($item['fax2']->value) ? $item['fax2']->value : '' }}" id="fax2" size="53" class="textin" type="text">
			</li>

			<!-- <li>
				<label for="emailInquiry">Email Inquiry</label>
				<input name="emailInquiry" value="{{ isset($item['emailInquiry']->value) ? $item['emailInquiry']->value : '' }}" id="emailInquiry" size="53" class="textin" type="text">
			</li> -->

			<li>
				<label for="facebook">Facebook</label>
				<input name="facebook" value="{{ isset($item['facebook']->value) ? $item['facebook']->value : '' }}" id="facebook" size="53" class="textin" type="text">
			</li>
			<li>
				<label for="instagram">Instagram</label>
				<input name="instagram" value="{{ isset($item['instagram']->value) ? $item['instagram']->value : '' }}" id="instagram" size="53" class="textin" type="text">
			</li>
			<li>
				<label for="linkedin">Linkedin</label>
				<input name="linkedin" value="{{ isset($item['linkedin']->value) ? $item['linkedin']->value : '' }}" id="linkedin" size="53" class="textin" type="text">
			</li>
			
			<!-- <li>
				<label for="whatsApp">Whats App</label>
				<input name="whatsApp" value="{{ isset($item['whatsApp']->value) ? $item['whatsApp']->value : '' }}" id="whatsApp" size="53" class="textin" type="text">
			</li>
			<li>
				<label for="PTName">Company Name</label>
				<input name="PTName" value="{{ isset($item['PTName']->value) ? $item['PTName']->value : '' }}" id="PTName" size="53" class="textin" type="text">
			</li> -->
			<li>
				<label for="copyright">Copyright</label>
				<input name="copyright" value="{{ isset($item['copyright']->value) ? $item['copyright']->value : '' }}" id="copyright" size="53" class="textin" type="text">
			</li>

			<!-- <li>
				<label for="title">MAP<br></label>
				<textarea name="maps" cols="90" rows="5">{{ isset($item['maps']->value) ? $item['maps']->value : '' }}</textarea><br>
			</li> -->
			<li>
				<label>&nbsp;</label>
				<input type="submit" name="sendimg" value=" save " /> &nbsp;
				<input type="button" name="cancel" value=" back " onclick="location.replace('{{ route('adminHome') }}')"/>
			</li>
		</ol>
		<input type="hidden" name="id" value="1" />
		<input type="hidden" name="grp" value="" />
	</form>
</div>
@stop

@section('js')
@endsection