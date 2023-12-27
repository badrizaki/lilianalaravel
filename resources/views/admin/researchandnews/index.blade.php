@extends('admin.layouts.index')

@section('title', 'Research And News')
@section('researchandnews', 'active')

@section('css')
@endsection

@section('content')
<div class="grid_12">
    <h3>Research And News</h3>
    <br />
    <form action="{{ url('admin/researchandnews') }}" method="post" id="frm1" name="frm1" enctype="multipart/form-data" >
        <ol>
            <li>
                {{ csrf_field() }}
                <label for="title">Title English</label>
                <input name="title" value="{{ isset($item['researchandnews']->title) ? $item['researchandnews']->title : '' }}" id="title" size="60" class="textin" type="text">
            </li>
            <li>
                <label for="titleInd">Title Indonesia</label>
                <input name="titleInd" value="{{ isset($item['researchandnews']->titleInd) ? $item['researchandnews']->titleInd : '' }}" id="titleInd" size="60" class="textin" type="text">
            </li>
            <li>
                <label for="content">Content English</label>
                <textarea name="content" cols="80" rows="15" id="content" class="tinymce">{!! isset($item['researchandnews']->content) ? $item['researchandnews']->content : '' !!}</textarea>
            </li>
            <li>
                <label for="contentInd">Content Indonesia</label>
                <textarea name="contentInd" cols="80" rows="15" id="contentInd" class="tinymce">{!! isset($item['researchandnews']->contentInd) ? $item['researchandnews']->contentInd : '' !!}</textarea>
            </li>

            <li>
                <br /><div class="hr"></div><br />
                <span class="notes">Recommended dimension: 580 x 600 (recommended) px</span><br><br>
                <label>Image Banner</label>
                <input type="file" name="Filedata" class="file_input"><br>
                <br>
                <label></label>
                <img src="{{ ((isset($item) && $item['researchandnews']->imageUrl) ? image(''.$item['researchandnews']->imageUrl, Config::get('app.directory.images')) : '') }}" alt="" style="max-width:700px"/>
                <input type="hidden" name="old_img" value="{{ (isset($item) ? url(''.$item['researchandnews']->imageUrl) : '') }}" />
            </li>
            <li>
                <input type="submit" name="save" value=" save " />
            </li>
        </ol>
        <input type="hidden" name="id" value="1" />
        <input type="hidden" name="grp" value="" />
    </form>
</div>
@stop

@section('js')
@endsection