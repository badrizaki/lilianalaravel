@extends('admin.layouts.index')

@section('title', 'Code of Conduct')
@section('coc', 'active')

@section('css')
    <link href="{{ url('assets/components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css') }}"
          rel="stylesheet">
    <link href="{{ url('assets/components/datatables-responsive/css/dataTables.responsive.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="grid_12">
        <h3>Code of Conduct</h3>
        <br />
        <form action="{{ url('admin/cocmain') }}" method="post" id="frm1" name="frm1" enctype="multipart/form-data" >
            {{ csrf_field() }}
            <ol>
                <li>
                    <br /><div class="hr"></div><br />
                    <label>File  English</label>
                    <img src="{{ url('assets/icons/icon_del.gif') }}" style="cursor: pointer; vertical-align: middle;" onclick="deleteImage('file1')">
                    <input type="hidden" name="deletefile1" id="deletefile1" value="">
                    <input type="file" name="file1" id="file1" class="file_input" onchange="addFile('file1')"><br>
                    <br>
                    @if (isset($list) && $list['coc']->content2 != "")
                    <object id="imagefile1" data="{{ (isset($list) ? url(''.$list['coc']->content2) : '') }}" type="application/pdf">
                        <iframe src="https://docs.google.com/viewer?url={{ (isset($list) ? url(''.$list['coc']->content2) : '') }}&embedded=true"></iframe>
                    </object>
                    <br><a href="{{ url(''.$list['coc']->content2) }}" target="_blank" download>Download</a>
                    @endif
                    <input type="hidden" name="old_img" value="{{ (isset($list) ? url(''.$list['coc']->content2) : '') }}" />
                </li>
                <li>
                    <br /><div class="hr"></div><br />
                    <label>File Indonesia</label>
                    <img src="{{ url('assets/icons/icon_del.gif') }}" style="cursor: pointer; vertical-align: middle;" onclick="deleteImage('file2')">
                    <input type="hidden" name="deletefile2" id="deletefile2" value="">
                    <input type="file" name="file2" id="file2" class="file_input" onchange="addFile('file2')"><br>
                    <br>
                    @if (isset($list) && $list['coc']->content2Ind != "")
                    <object id="imagefile2" data="{{ (isset($list) ? url(''.$list['coc']->content2Ind) : '') }}" type="application/pdf">
                        <iframe src="https://docs.google.com/viewer?url={{ (isset($list) ? url(''.$list['coc']->content2Ind) : '') }}&embedded=true"></iframe>
                    </object>
                    <br><a href="{{ url(''.$list['coc']->content2Ind) }}" download>Download</a>
                    @endif
                    <input type="hidden" name="old_img" value="{{ (isset($list) ? url(''.$list['coc']->content2Ind) : '') }}" />
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
    <div class="grid_12" style="width: 920px;">
        <hr>
        <h3>Code of Conduct Content</h3>
        <div class="imgadd">
            <a href="{{ route('coc.create') }}" title="Add Record">
                <img src="{{ url('assets/icons/icon_add.gif') }}" alt="Add" width="16" height="16" class="icon"/> Add
                Record
            </a>
        </div>

        <div class="container-fluid table-responsive" align="center-block">
            <table width="100%" id="dataTables" class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>Title</th>
                    <th>Title IND</th>
                    <th>Description</th>
                    <th>Description IND</th>
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
            listManager.listUrl = "{{ route('coc.list') }}";
            listManager.deleteUrl = "{{ route('coc.index') }}";
            listManager.token = "{{ csrf_token() }}";
            listManager.dataTable = [
                {"data": "title", "name": "coc.title" },
                {"data": "titleInd", "name": "coc.titleInd" },
                {"data": "description", "name": "coc.description" },
                {"data": "descriptionInd", "name": "coc.descriptionInd" },
                {"data": 'order', "name": "coc.order"},
                {"data": 'action', name: 'action', orderable: false, searchable: false, "sClass": "actionList"},
            ];
            listManager.ready();
        });
    </script>
@endsection