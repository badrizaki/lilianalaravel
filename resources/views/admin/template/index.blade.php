@extends('admin.layouts.index')

@section('title', 'Template')
@section('template', 'active')

@section('css')
@endsection

@section('content')
{{ csrf_field() }}
<div class="grid_12">
	<h3>Template</h3>
	<table width="100%" id="templateSorter">
		<thead>
			<tr>
				<th>Page</th>
				<th>Title</th>
				<th>Info</th>
				<th width="38"></th>
			</tr>
		</thead>
		<tbody>
			@if($list['template'])
			@foreach($list['template'] as $key => $data)
			<tr>
				<td>{{ $data['page'] }}</td>
				<td>
					<a href="{{ route('template.index') . '/'.$data['templateId'].'/edit' }}" title="Click to view">{{ $data['title'] }}</a>
				</td>
				<td>
					<a href="{{ route('template.index') . '/'.$data['templateId'].'/edit' }}" title="Edit"><img src="{{ url('assets/icons/icon_edit.gif') }}" alt="Edit"  width="16" height="16" class="icon" /></a>
				</td>
			</tr>
			@endforeach
			@else
			<tr>
				<td colspan="3">Data empty</td>
			</tr>
			@endif
		</tbody>
	</table>
	&nbsp;
</div>
@stop

@section('js')
<script>
	var fixHelper = function(e, ui) {
		ui.children().each(function() {
			$(this).width($(this).width());
		});
		return ui;
	};
	$('#templateSorter tbody').sortable({
		placeholder: 'ui-sortable-placeholder',
		start: function (event, ui) {
			ui.placeholder.html('<td colspan="3">&nbsp;</td>')},
			helper: fixHelper,
			update: function( event, ui ) {
				var arr = new Array;
				$(this).find('tr').each(function(index){
					arr[index] = $(this).find('input[name*=order_id]').val();
				});
				$.post('{{ route('template.index') }}/order', {
					'sort_id': arr.join(),
					'_token' : $('input[name=_token]').val()
				});
			}
		}).disableSelection();
</script>
@endsection