@extends('admin.layouts.index')

@section('title', 'Brokerage')
@section('brokerage', 'active')

@section('css')
@endsection

@section('content')
<div class="grid_12">
	<h3>Brokerage</h3>
	<br />
	<form action="{{ route('brokerage.index') }}" method="post" id="frm1" name="frm1" enctype="multipart/form-data" >
		{{ csrf_field() }}
		<ol>
			<li>
				<label for="content">Content English</label>
				<textarea name="content" cols="80" rows="15" id="content" class="tinymce">{!! isset($item['brokerage']->content) ? $item['brokerage']->content : '' !!}</textarea>
			</li>
			<li>
				<label for="contentInd">Content Indonesia</label>
				<textarea name="contentInd" cols="80" rows="15" id="contentInd" class="tinymce">{!! isset($item['brokerage']->contentInd) ? $item['brokerage']->contentInd : '' !!}</textarea>
			</li>

			<li><hr></li>
			<li>
				<label for="titleEquity">Title Equity English</label>
				<input name="titleEquity" value="{{ isset($item['equity']->title) ? $item['equity']->title : '' }}" id="titleEquity" size="60" class="textin" type="text">
			</li>
			<li>
				<label for="titleEquityInd">Title Equity Indonesia</label>
				<input name="titleEquityInd" value="{{ isset($item['equity']->titleInd) ? $item['equity']->titleInd : '' }}" id="titleEquityInd" size="60" class="textin" type="text">
			</li>
			<li>
				<label for="contentEquity">Content Equity English</label>
				<textarea name="contentEquity" cols="80" rows="15" id="contentEquity" class="tinymce">{!! isset($item['equity']->content) ? $item['equity']->content : '' !!}</textarea>
			</li>
			<li>
				<label for="contentEquityInd">Content Equity Indonesia</label>
				<textarea name="contentEquityInd" cols="80" rows="15" id="contentEquityInd" class="tinymce">{!! isset($item['equity']->contentInd) ? $item['equity']->contentInd : '' !!}</textarea>
			</li>

			<li><hr></li>
			<li>
				<label for="titleFixedIncome">Title Fixed Income English</label>
				<input name="titleFixedIncome" value="{{ isset($item['fixedIncome']->title) ? $item['fixedIncome']->title : '' }}" id="titleFixedIncome" size="60" class="textin" type="text">
			</li>
			<li>
				<label for="titleFixedIncomeInd">Title Fixed Income Indonesia</label>
				<input name="titleFixedIncomeInd" value="{{ isset($item['fixedIncome']->titleInd) ? $item['fixedIncome']->titleInd : '' }}" id="titleFixedIncomeInd" size="60" class="textin" type="text">
			</li>
			<li>
				<label for="contentFixedIncome">Fixed Income English</label>
				<textarea name="contentFixedIncome" cols="80" rows="15" id="contentFixedIncome" class="tinymce">{!! isset($item['fixedIncome']->content) ? $item['fixedIncome']->content : '' !!}</textarea>
			</li>
			<li>
				<label for="contentFixedIncomeInd">Fixed Income Indonesia</label>
				<textarea name="contentFixedIncomeInd" cols="80" rows="15" id="contentFixedIncomeInd" class="tinymce">{!! isset($item['fixedIncome']->contentInd) ? $item['fixedIncome']->contentInd : '' !!}</textarea>
			</li>

            <!-- <li>
                <br /><div class="hr"></div><br />
                <span class="notes">Recommended dimension: 580 x 600 (recommended) px</span><br><br>
                <label>Image Banner</label>
                <input type="file" name="Filedata" class="file_input"><br>
                <br>
                <label></label>
                <img src="{{ ((isset($item) && $item['brokerage']->imageUrl) ? image(''.$item['brokerage']->imageUrl, Config::get('app.directory.images')) : '') }}" alt="" style="max-width:700px"/>
                <input type="hidden" name="old_img" value="{{ (isset($item) ? url(''.$item['brokerage']->imageUrl) : '') }}" />
            </li> -->
			<li>
				<label>&nbsp;</label>
				<input type="submit" name="sendimg" value=" save " /> &nbsp;
				<input type="button" name="cancel" value=" back " onclick="location.replace('{{ route('brokerage.index') }}')"/>
			</li>
		</ol>
		<input type="hidden" name="id" value="1" />
		<input type="hidden" name="grp" value="" />
	</form>
</div>
@stop

@section('js')
@endsection