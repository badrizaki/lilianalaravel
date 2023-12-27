@extends('admin.layouts.email')

@section('title', '')

@section('css')
@endsection

@section('content')
<div>
   	<p style="font-family: 'blogger_sansregular',Helvetica,Arial,sans-serif;">Apply for a vacancy <strong>{{ $name }}</strong>.</p>
   	<div style="padding-left: 20px; padding-right: 20px; padding-bottom: 20px;">
	   	<table width="100%" cellpadding="4">
	   		<tr>
	   			<td>Name</td>
	   			<td>: <b>{{ $name }}</b></td>
	   		</tr>
	   		<tr>
	   			<td>E-mail</td>
	   			<td>: {{ $email }}</td>
	   		</tr>
	   		<tr>
	   			<td>Phone Number</td>
	   			<td>: {{ $phoneNumber }}</td>
	   		</tr>
	   		<tr>
	   			<td>Vacancy Applying For</td>
	   			<td>: {{ $jobApply }}</td>
	   		</tr>
	   		<tr>
	   			<td>Message</td>
	   			<td>: {{ $pesan }}</td>
	   		</tr>
	   	</table>
   	</div>
</div>
@stop

@section('js')
@endsection