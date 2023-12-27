@extends('admin.layouts.index')

@section('title', 'FAQ')
@section('faq', 'active')

@section('css')
    <link href="{{ url('assets/components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css') }}"
          rel="stylesheet">
    <link href="{{ url('assets/components/datatables-responsive/css/dataTables.responsive.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="grid_12">
        <h3>FAQ</h3>
        <br />
        <form action="{{ url('admin/faqmain') }}" method="post" id="frm1" name="frm1" enctype="multipart/form-data" >
            <ol>
                <li>
                    {{ csrf_field() }}
                    <label for="title">Title English</label>
                    <input name="title" value="{{ isset($list['faq']->title) ? $list['faq']->title : '' }}" id="title" size="60" class="textin" type="text">
                </li>
                <li>
                    <label for="titleInd">Title Indonesia</label>
                    <input name="titleInd" value="{{ isset($list['faq']->titleInd) ? $list['faq']->titleInd : '' }}" id="titleInd" size="60" class="textin" type="text">
                </li>
                <li>
                    <label for="content">Content English</label>
                    <textarea name="content" cols="80" rows="15" id="content" class="tinymce">{!! isset($list['faq']->content) ? $list['faq']->content : '' !!}</textarea>
                </li>
                <li>
                    <label for="contentInd">Content Indonesia</label>
                    <textarea name="contentInd" cols="80" rows="15" id="contentInd" class="tinymce">{!! isset($list['faq']->contentInd) ? $list['faq']->contentInd : '' !!}</textarea>
                </li>
                <li>
                    <br /><div class="hr"></div><br />
                    <span class="notes">Recommended dimension: 580 x 600 (recommended) px</span><br><br>
                    <label>Image Banner</label>
                    <input type="file" name="Filedata" class="file_input"><br>
                    <br>
                    <label></label>
                    <img src="{{ ((isset($list) && $list['faq']->imageUrl) ? image(''.$list['faq']->imageUrl, Config::get('app.directory.images')) : '') }}" alt="" style="max-width:700px"/>
                    <input type="hidden" name="old_img" value="{{ (isset($item) ? url(''.$list['faq']->imageUrl) : '') }}" />
                </li>
                <li>
                    <input type="submit" name="save" value=" save " />
                </li>
            </ol>
            <input type="hidden" name="id" value="1" />
            <input type="hidden" name="grp" value="" />
        </form>
    </div>
    <br>
    <div style="margin-left: 20px; margin-right: 20px;">
    <!-- <div class="grid_12"> -->
        <h3>FAQ Content</h3>
        <div class="imgadd">
            <a href="{{ route('faq.create') }}" title="Add Record">
                <img src="{{ url('assets/icons/icon_add.gif') }}" alt="Add" width="16" height="16" class="icon"/> Add
                Record
            </a>
        </div>

        <div class="container-fluid table-responsive" align="center-block">
            <table width="100%" id="dataTables" class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>Questions</th>
                    <th>Questions IND</th>
                    <th>Answer</th>
                    <th>Answer IND</th>
                    <th>Order</th>
                    <th width="38"></th>
                </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
        &nbsp;
    </div>
@stop

@section('js')
    <script src="{{ url('assets/components/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('assets/components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            listManager.listUrl = "{{ route('faq.list') }}";
            listManager.deleteUrl = "{{ route('faq.index') }}";
            listManager.token = "{{ csrf_token() }}";
            listManager.dataTable = [
                {"data": "title", "name": "faq.title" },
                {"data": "titleInd", "name": "faq.titleInd" },
                {"data": "shortContent", "name": "faq.shortContent" },
                {"data": "shortContentInd", "name": "faq.shortContentInd" },
                {"data": 'order', "name": "faq.order"},
                {"data": 'action', name: 'action', orderable: false, searchable: false, "sClass": "actionList"},
            ];
            listManager.ready();
        });
    </script>
@endsection