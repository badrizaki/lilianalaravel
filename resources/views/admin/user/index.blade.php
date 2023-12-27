@extends('admin.layouts.index')

@section('title', 'User')

@section('css')
<link href="{{ url('assets/modules/datatables/DataTables/datatables.min.css') }}" rel="stylesheet">
@endsection

@section('content')
{{ csrf_field() }}
<div class="section-header">
    <h1>User</h1>
    <div class="section-header-button">
        <a href="{{ route('user.create') }}" title="Add Record" class="btn btn-xs btn-primary">Add New</a>
    </div>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item">User</div>
    </div>
</div>
<div class="section-body">
    <h2 class="section-title">User</h2>
    <p class="section-lead">This menu for management user CMS. You can create new <a href="{{ route('user.create') }}">here</a>.</p>
    <div class="card">
        <div class="card-body">
            <table width="100%" id="dataTables" class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Role</th>
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
    $(document).ready(function() {
        listManager.listUrl = "{{ route('user.index') }}/list";
        listManager.deleteUrl = "{{ route('user.index') }}";
        listManager.token = "{{ csrf_token() }}";
        listManager.dataTable = [
        {"data": "name", "name": "users.name" },
        {"data": "email", "name": "users.email" },
        {"data": "display_name", "name": "role.display_name", searchable: false },
        {"data": 'action', name: 'action', orderable: false, searchable: false, "sClass": "actionList"},
        ];
        listManager.ready();
    });
</script>
@endsection