@extends('layouts.admin-layout')

@section('content')

	<div class="content-wrapper">
		<div class="page-header">
			<h3 class="page-title">
				Sales Person Listing
			</h3>
			 <p>
				<a href="{{ route('salesperson.create') }}" class="btn btn-primary">Add New</a>
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
								<table id="salesPersonTable" class="table table-bordered table-striped {{ count($salesperson) > 0 ? 'datatable' : '' }} dt-select">
									<thead>
										<tr>
											<!--<th style="text-align:center;"><input type="checkbox" id="select-all" /></th>-->
											<th>Sale Person Email</th>
											<th>Dealer's Account No</th>
											<th>Company Name</th>
											<th>Post Code</th>
											<th>Region</th>
											<th>Category</th>
											<th>Group</th>
										</tr>
									</thead>
									
									<tbody>
										@if (count($salesperson) > 0)
											@foreach ($salesperson as $sales)
												<tr data-entry-id="{{ $sales['id'] }}">
													<td>{{ $sales['sales_users']['email'] }}</td>
													<td>{{ $sales['sales_dealer_users']['account_no'] }}</td>
													<td>{{ $sales['sales_dealer_users']['company_name'] }}</td>
													<td>{{ $sales['sales_dealer_users']['post_code'] }}</td>
													<td>{{ $sales['sales_dealer_users']['region'] }}</td>
													<td>{{ $sales['sales_dealer_users']['category']	}}</td>
													<td>{{ $sales['sales_dealer_users']['group'] }}</td>
													
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