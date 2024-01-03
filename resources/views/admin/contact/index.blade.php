@extends('admin.layouts.index')

@section('title', 'Contact')

@section('css')
@endsection

@section('content')
<div class="section-header">
    <h1>Contact</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ url('admin') }}">Contact</a></div>
    </div>
</div>
<form method="post" action="{{ route('about.update') }}" enctype="multipart/form-data" class="editor">
    {{ csrf_field() }}

    <h2 class="section-title">Contact Management</h2>
    <p class="section-lead">This menu for management Contact Page.</p>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Contact</h4>
                </div>
                <div class="card-body">
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Email</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="text" name="contactEmail"
                                value="{!! GetData::setting()->contactEmail['value'] !!}" class="form-control">
                        </div>
                    </div>
                    
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">No Telepon</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="text" name="phoneNumber1"
                                value="{!! GetData::setting()->phoneNumber1['value'] !!}" class="form-control">
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Facebook</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="text" name="facebook"
                                value="{!! GetData::setting()->facebook['value'] !!}" class="form-control">
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Linked in</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="text" name="linkedin"
                                value="{!! GetData::setting()->linkedin['value'] !!}" class="form-control">
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Instagram</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="text" name="instagram"
                                value="{!! GetData::setting()->instagram['value'] !!}" class="form-control">
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Youtube</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="text" name="youtube"
                                value="{!! GetData::setting()->youtube['value'] !!}" class="form-control">
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tiktok</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="text" name="tiktok"
                                value="{!! GetData::setting()->tiktok['value'] !!}" class="form-control">
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                        <div class="col-sm-12 col-md-7">
                            <button type="submit" class="btn btn-primary">Save</button>
                            &nbsp;
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" name="id" value="" />
</form>
@stop

@section('js')
@endsection