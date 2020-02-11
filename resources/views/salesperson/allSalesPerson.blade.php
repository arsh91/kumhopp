@extends('layouts.admin-layout')

@section('content')

	<div class="content-wrapper">
		<div class="page-header">
			<h3 class="page-title">
				Sales Person Listing
			</h3>
			 <p>
				<a href="{{ route('salesperson.create') }}" class="btn btn-primary">Add New</a>
				
				<!--<a href="{{ route('salesperson.index') }}" target="_blank">All Imported Sales Person's</a>-->
			</p>
			<div class="clearfix"></div>
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
								<table id="salesPersonTable" class="table table-bordered table-striped {{ count($allSalesPerson) > 0 ? 'datatable' : '' }} dt-select">
									<thead>
										<tr>
											<!--<th style="text-align:center;"><input type="checkbox" id="select-all" /></th>-->
											<th>Sale Person Email</th>
											<th>Action</th>
										</tr>
									</thead>
									
									<tbody>
										@if (count($allSalesPerson) > 0)
											@foreach ($allSalesPerson as $sales)
												<tr data-entry-id="{{ $sales['id'] }}">
													<td>{{ $sales->email }}</td>
													<td>
														<!--<a href="{{ route('salesperson.show',[$sales->id]) }}" class="btn btn-xs btn-primary">View</a>-->
														<a href="{{ route('salesperson.edit',[$sales->id]) }}" class="btn btn-xs btn-primary">Edit</a>
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
	
	$('#salesPersonTable').DataTable();
});
</script>
@endsection