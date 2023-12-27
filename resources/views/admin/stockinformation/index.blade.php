@extends('admin.layouts.index')

@section('title', 'Stock Information')
@section('stockinformation', 'active')

@section('css')
@endsection

@section('content')
<div class="grid_12">
    <h3>Stock Information</h3>
    <br />
    <form action="{{ url('admin/stockinformation') }}" method="post" id="frm1" name="frm1" enctype="multipart/form-data" >
        <ol>
            <li>
                {{ csrf_field() }}
                <label for="title">Title English</label>
                <input name="title" value="{{ isset($item['stockinformation']->title) ? $item['stockinformation']->title : '' }}" id="title" size="60" class="textin" type="text">
            </li>
            <li>
                <label for="titleInd">Title Indonesia</label>
                <input name="titleInd" value="{{ isset($item['stockinformation']->titleInd) ? $item['stockinformation']->titleInd : '' }}" id="titleInd" size="60" class="textin" type="text">
            </li>
            <li>
                <label for="content">Content English</label>
                <textarea name="content" cols="80" rows="15" id="content" class="tinymce">{!! isset($item['stockinformation']->content) ? $item['stockinformation']->content : '' !!}</textarea>
            </li>
            <li>
                <label for="contentInd">Content Indonesia</label>
                <textarea name="contentInd" cols="80" rows="15" id="contentInd" class="tinymce">{!! isset($item['stockinformation']->contentInd) ? $item['stockinformation']->contentInd : '' !!}</textarea>
            </li>

            <li>
                <br /><div class="hr"></div><br />
                <span class="notes">Recommended dimension: 690 x 630 (recommended) px</span><br><br>
                <label>Image Banner</label>
                <img src="{{ url('assets/icons/icon_del.gif') }}" style="cursor: pointer; vertical-align: middle;" onclick="deleteImage('Filedata')">
                <input type="hidden" name="deleteFiledata" id="deleteFiledata" value="">
                <input type="file" name="Filedata" id="Filedata" class="file_input" onchange="addFile('Filedata')"><br>
                <br>
                <label></label>
                <img id="imageFiledata" src="{{ ((isset($item) && $item['stockinformation']->imageUrl) ? image(''.$item['stockinformation']->imageUrl, Config::get('app.directory.images')) : '') }}" alt="" style="max-width:700px"/>
                <input type="hidden" name="old_img" value="{{ (isset($item) ? url(''.$item['stockinformation']->imageUrl) : '') }}" />
                <br /><div class="hr"></div><br />
            </li>
            <li>
                <label for="content2">Content</label>
                <textarea name="content2" cols="80" rows="15" id="content2" class="tinymce">{!! isset($item['stockinformation']->content2) ? $item['stockinformation']->content2 : '' !!}</textarea>
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