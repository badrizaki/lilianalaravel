@extends('admin.layouts.index')

@section('title', 'Human Capital')
@section('humancapital', 'active')

@section('css')
    <link href="{{ url('assets/components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css') }}"
          rel="stylesheet">
    <link href="{{ url('assets/components/datatables-responsive/css/dataTables.responsive.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="grid_12">
        <h3>Human Capital</h3>
        <br />
        <form action="{{ url('admin/humancapitalmain') }}" method="post" id="frm1" name="frm1" enctype="multipart/form-data" >
            {{ csrf_field() }}
            <ol>
                <li>
                    <label for="title">Title English</label>
                    <input name="title" value="{{ isset($list['humancapital']->title) ? $list['humancapital']->title : '' }}" id="title" size="60" class="textin" type="text">
                </li>
                <li>
                    <label for="titleInd">Title Indonesia</label>
                    <input name="titleInd" value="{{ isset($list['humancapital']->titleInd) ? $list['humancapital']->titleInd : '' }}" id="titleInd" size="60" class="textin" type="text">
                </li>
                <li>
                    <label for="content">Content English</label>
                    <textarea name="content" cols="80" rows="15" id="content" class="tinymce">{!! isset($list['humancapital']->content) ? $list['humancapital']->content : '' !!}</textarea>
                </li>
                <li>
                    <label for="contentInd">Content Indonesia</label>
                    <textarea name="contentInd" cols="80" rows="15" id="contentInd" class="tinymce">{!! isset($list['humancapital']->contentInd) ? $list['humancapital']->contentInd : '' !!}</textarea>
                </li>

                <li style="display: none;">
                    <br /><div class="hr"></div><br />
                    <span class="notes">Recommended dimension: 580 x 600 (recommended) px</span><br><br>
                    <label>Image Banner</label>
                    <input type="file" name="Filedata" class="file_input"><br>
                    <br>
                    <label></label>
                    <img src="{{ ((isset($list) && $list['humancapital']->imageUrl) ? image(''.$list['humancapital']->imageUrl, Config::get('app.directory.images')) : '') }}" alt="" style="max-width:700px"/>
                    <input type="hidden" name="old_img" value="{{ (isset($item) ? url(''.$list['humancapital']->imageUrl) : '') }}" />
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
    <div class="grid_15">
        <hr>
        <h3>Human Capital Content</h3>
        <div class="imgadd">
            <a href="{{ route('humancapital.create') }}" title="Add Record">
                <img src="{{ url('assets/icons/icon_add.gif') }}" alt="Add" width="16" height="16" class="icon"/> Add
                Record
            </a>
        </div>

        <div class="container-fluid table-responsive" align="center-block">
            <table width="100%" id="dataTables" class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Date</th>
                    <th>Vacancy Your Are Applying For</th>
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
            listManager.listUrl = "{{ route('humancapital.list') }}";
            listManager.deleteUrl = "{{ route('humancapital.index') }}";
            listManager.token = "{{ csrf_token() }}";
            listManager.dataTable = [
                {"data": "name", "name": "applicant.name" },
                {"data": "email", "name": "applicant.email" },
                {"data": 'phoneNumber', "name": "applicant.phoneNumber"},
                {"data": 'created_at', "name": "applicant.created_at"},
                {"data": 'jobApply', "name": "applicant.jobApply"},
                {"data": 'action', name: 'action', orderable: false, searchable: false, "sClass": "actionList"},
            ];
            listManager.ready();
        });
    </script>
@endsection