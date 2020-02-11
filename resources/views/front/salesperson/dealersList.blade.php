@extends('layouts.admin-layout')

@section('content')

	<div class="content-wrapper">
		<div class="page-header">
			<h3 class="page-title">
				Dealer List
			</h3>
			
		</div>
		<div class="row">
			<div class="col-12 grid-margin">
				<div class="card">
					<div class="card-body">
					
						<div class="panel panel-default">
							
							<div class="panel-body">
								<table class="table table-bordered table-striped {{ count($dealerList) > 0 ? 'datatable' : '' }} dt-select">
									<thead>
										<tr>
											<th>Company Name</th>
											<th>Account No</th>
											<th>Contact</th>
											<th>Address</th>
											<th>Town</th>
											<th>County</th>
											<th>Website</th>
										</tr>
									</thead>
									
									<tbody>
										@if (count($dealerList) > 0)
											@foreach ($dealerList as $dealer)
												<tr data-entry-id="{{ $dealer->id }}">
													<td>{{ $dealer->salesDealerUsers->company_name }}</td>
													<td>{{ $dealer->salesDealerUsers->account_no }}</td>
													<td>{{ $dealer->salesDealerUsers->contact }}</td>
													<td>{{ $dealer->salesDealerUsers->address1 }}</td>
													<td>{{ $dealer->salesDealerUsers->town }}</td>
													<td>{{ $dealer->salesDealerUsers->county }}</td>
													<td>{{ $dealer->salesDealerUsers->website }}</td>
												</tr>
											@endforeach
										@else
											<tr>
												<td colspan="11">No Record Found</td>
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

@endsection