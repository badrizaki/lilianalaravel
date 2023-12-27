@extends('admin.layouts.email')

@section('title', '')

@section('css')
@endsection

@section('content')
<div>
   <p>Hi Admin</p>
   <p>Below is detail from contact form :</p>
   <div style="background-color: #F2F2F2; padding-top: 10px; padding-bottom: 10px;">
      <ul>
         <li>Name : {{ $name }}</li>
         <li>Email : {{ $email }}</li>
         <li>Subject : {{ $subject }}</li>
         <li>Message : {{ $pesan }}</li>
      </ul>
   </div>
</div>
@stop

@section('js')
@endsection