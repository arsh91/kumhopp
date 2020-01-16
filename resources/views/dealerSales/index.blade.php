@extends('layouts.admin-layout')

@section('content')

	<div class="content-wrapper">
		<div class="page-header">
			<h3 class="page-title">
				Dealer Sales
			</h3>
			 <p>
				<a href="{{ url('dealers/sales/create/'.$dealer_id) }}" class="btn btn-primary">Add New</a>
			</p>
		</div>
		<div class="row">
			<div class="col-12 grid-margin">
				<div class="card">
					<div class="card-body">
					
						<div class="panel panel-default">
							<div class="panel-heading">
								List
							</div>

							<div class="panel-body">
								<table class="table table-bordered table-striped {{ count($sales) > 0 ? 'datatable' : '' }} dt-select">
									<thead>
										<tr>
											<!--<th style="text-align:center;"><input type="checkbox" id="select-all" /></th>-->
											<th>Sale Figures</th>
											<th>Sale Month</th>
											<th>Sale Year</th>
										</tr>
									</thead>
									
									<tbody>
										@if (count($sales) > 0)
											@foreach ($sales as $sale)
												<tr data-entry-id="{{ $sale->id }}">
													<td>{{ $sale->sale_figure }}</td>
													<td>{{ $sale->sale_month }}</td>													
													<td>{{ $sale->sale_year }}</td>
													<td>
														<a href="{{ route('dealersales.show',[$sale->id]) }}" class="btn btn-xs btn-primary">View</a>
														<a href="{{ route('dealersales.edit',[$sale->id]) }}" class="btn btn-xs btn-primary">Edit</a>
														{!! Form::open(array(
															'style' => 'display: inline-block;',
															'method' => 'DELETE',
															'onsubmit' => "return confirm('Are you sure?');",
															'route' => ['dealersales.destroy', $sale->id, $sale->dealer_id])) !!}
														{!! Form::submit('Delete', array('class' => 'btn btn-xs btn-danger')) !!}
														{!! Form::close() !!}														
													</td>													
													
												</tr>
											@endforeach
										@else
											<tr>
												<td colspan="3">No Record Found</td>
											</tr>
										@endif
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@stop
@section('js_content')
<script type="text/javascript">
	$(function() {
	$('.copy-to-clipboard input').click(function() {
	$(this).focus();
	$(this).select();
	document.execCommand('copy');
	alert("Copied");
    });
});
</script>
@endsection