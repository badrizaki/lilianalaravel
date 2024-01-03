@extends('admin.layouts.index')

@section('title', 'Rekam Jejak')

@section('css')
<link href="{{ url('assets/modules/datatables/DataTables/datatables.min.css') }}" rel="stylesheet">
@endsection

@section('content')
{{ csrf_field() }}
<div class="section-header">
    <h1>Rekam Jejak</h1>
    <div class="section-header-button">
        <a href="{{ route('trackrecord.create') }}" title="Add Record" class="btn btn-xs btn-primary">Add New</a>
    </div>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Home</a></div>
        <div class="breadcrumb-item">Rekam Jejak</div>
    </div>
</div>
<div class="section-body">
    <h2 class="section-title">Rekam Jejak</h2>
    <p class="section-lead">This menu for management Rekam Jejak. You can create new <a
            href="{{ route('trackrecord.create') }}">here</a>.</p>
    <div class="card">
        <div class="card-body">
            <table width="100%" id="dataTables" class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>Rekam Jejak</th>
                        <th>Order</th>
                        <th width="150"></th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>
@stop

@section('js')
<script src="{{ url('assets/modules/datatables/DataTables/datatables.min.js') }}"></script>
<script>
    $(document).ready(function () {
        listManager.listUrl = "{{ route('trackrecord.index') }}/list";
        listManager.deleteUrl = "{{ route('trackrecord.index') }}";
        listManager.token = "{{ csrf_token() }}";
        listManager.dataTable = [
            { "data": "date", "name": "trackrecord.date" },
            { "data": "contentInd", "name": "trackrecord.contentInd" },
            { "data": "order", "name": "trackrecord.order" },
            { "data": 'action', name: 'action', orderable: false, searchable: false, "sClass": "actionList" },
        ];
        listManager.ready();
    });
</script>
@endsection