@extends('admin.layouts.index')

@section('title', 'Berita')

@section('css')
<link href="{{ url('assets/modules/datatables/DataTables/datatables.min.css') }}" rel="stylesheet">
@endsection

@section('content')
{{ csrf_field() }}
<div class="section-header">
    <h1>Berita</h1>
    <div class="section-header-button">
        <a href="{{ route('news.create') }}" title="Add Record" class="btn btn-xs btn-primary">Add New</a>
    </div>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Home</a></div>
        <div class="breadcrumb-item">Berita</div>
    </div>
</div>
<div class="section-body">
    <h2 class="section-title">Berita</h2>
    <p class="section-lead">This menu for management Berita. You can create new <a
            href="{{ route('news.create') }}">here</a>.</p>
    <div class="card">
        <div class="card-body">
            <table width="100%" id="dataTables" class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Judul</th>
                        <th>Deskripsi</th>
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
        listManager.listUrl = "{{ route('news.index') }}/list";
        listManager.deleteUrl = "{{ route('news.index') }}";
        listManager.token = "{{ csrf_token() }}";
        listManager.dataTable = [
            { "data": "titleInd", "name": "news.titleInd" },
            { "data": "shortDescInd", "name": "news.shortDescInd" },
            { "data": "order", "name": "news.order" },
            { "data": 'action', name: 'action', orderable: false, searchable: false, "sClass": "actionList" },
        ];
        listManager.ready();
    });
</script>
@endsection