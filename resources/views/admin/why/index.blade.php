@extends('admin.layouts.index')

@section('title', 'Why Minna Padi')
@section('why', 'active')

@section('css')
    <link href="{{ url('assets/components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css') }}"
          rel="stylesheet">
    <link href="{{ url('assets/components/datatables-responsive/css/dataTables.responsive.css') }}" rel="stylesheet">
@endsection

@section('content')
    {{ csrf_field() }}
    <div class="grid_12">
        <h3>Why Minna Padi</h3>
        <div class="imgadd">
            <a href="{{ route('why.create') }}" title="Add Record">
                <img src="{{ url('assets/icons/icon_add.gif') }}" alt="Add" width="16" height="16" class="icon"/> Add
                Record
            </a>
        </div>

        <div class="container-fluid table-responsive" align="center-block">
            <table width="100%" id="dataTables" class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>Title English</th>
                    <th>Title Indonesia</th>
                    <th>Description English</th>
                    <th>Description Indonesia</th>
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
            listManager.listUrl = "{{ route('why.list') }}";
            listManager.deleteUrl = "{{ route('why.index') }}";
            listManager.token = "{{ csrf_token() }}";
            listManager.dataTable = [
                {"data": "title", "name": "why.title" },
                {"data": "titleInd", "name": "why.titleInd" },
                {"data": "content", "name": "why.content" },
                {"data": "contentInd", "name": "why.contentInd" },
                {"data": 'order', "name": "why.order"},
                {"data": 'action', name: 'action', orderable: false, searchable: false, "sClass": "actionList"},
            ];
            listManager.ready();
        });
    </script>
@endsection