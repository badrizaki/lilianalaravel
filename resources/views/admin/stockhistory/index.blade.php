@extends('admin.layouts.index')

@section('title', 'Stock History')
@section('stockhistory', 'active')

@section('css')
    <link href="{{ url('assets/components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css') }}"
          rel="stylesheet">
    <link href="{{ url('assets/components/datatables-responsive/css/dataTables.responsive.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="grid_12">
        <h3>Stock History</h3>
        <div class="imgadd">
            <a href="{{ route('stockhistory.create') }}" title="Add Record">
                <img src="{{ url('assets/icons/icon_add.gif') }}" alt="Add" width="16" height="16" class="icon"/> Add
                Record
            </a>
        </div>

        <div class="container-fluid table-responsive" align="center-block">
            <table width="100%" id="dataTables" class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>Corporate Action English</th>
                    <th>Corporate Action Indonesia</th>
                    <th>Date</th>
                    <th>Total Stock</th>
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
            listManager.listUrl = "{{ route('stockhistory.list') }}";
            listManager.deleteUrl = "{{ route('stockhistory.index') }}";
            listManager.token = "{{ csrf_token() }}";
            listManager.dataTable = [
                {"data": "corporateAction", "name": "corporateAction" },
                {"data": "corporateActionInd", "name": "corporateActionInd" },
                {"data": "date", "name": "date" },
                {"data": "totalStock", "name": "totalStock" },
                {"data": 'order', "name": "order"},
                {"data": 'action', name: 'action', orderable: false, searchable: false, "sClass": "actionList"},
            ];
            listManager.ready();
        });
    </script>
@endsection