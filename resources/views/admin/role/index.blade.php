@extends('admin.layouts.index')

@section('title', 'Role')

@section('css')
<link href="{{ url('assets/modules/datatables/DataTables/datatables.min.css') }}" rel="stylesheet">
@endsection

@section('content')
{{ csrf_field() }}
<div class="section-header">
    <h1>Role</h1>
    <div class="section-header-button">
        <a href="{{ route('role.create') }}" title="Add Record" class="btn btn-xs btn-primary">Add New</a>
    </div>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item">Role</div>
    </div>
</div>

<div class="section-body">
    <h2 class="section-title">Role</h2>
    <p class="section-lead">This menu for management role, using on privilage whole menus in CMS. You can create new <a href="{{ route('role.create') }}">here</a>.</p>
    <div class="card">
        <div class="card-body">
            <table width="100%" id="dataTables" class="table table-striped table-hover table-default-theme">
                <thead>
                    <tr>
                        <th>Role Code</th>
                        <th>Role Name</th>
                        <th>Description</th>
                        <th width="150">#</th>
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
        listManager.listUrl = "{{ route('role.index') }}/list";
        listManager.deleteUrl = "{{ route('role.index') }}";
        listManager.token = "{{ csrf_token() }}";
        listManager.dataTable = [
        {"data": "name", "name": "roles.name" },
        {"data": "display_name", "name": "roles.display_name" },
        {"data": "description", "name": "roles.description" },
        {"data": 'action', name: 'action', orderable: false, searchable: false, "sClass": "actionList"},
        ];
        listManager.ready();
    });
</script>
@endsection