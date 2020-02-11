@extends('layouts.admin-layout')

@section('content')

	<div class="content-wrapper">
		<div class="page-header">
			<h3 class="page-title">
				Jobs
			</h3>
			 <p>
				<a href="{{ route('salespersonjobs.index') }}" class="btn btn-primary">Back to List</a>
			</p>
		</div>
		<div class="row">
			<div class="col-12 grid-margin">
				<div class="card">
					<div class="card-body">
					
						<div class="panel panel-default">
							<div class="panel-heading">
								View
							</div>
							
							<div class="panel-body">
								<div class="row">
									<div class="col-md-6">
										<table class="table table-bordered table-striped">
											<tr>
												<th>Company Name</th>
												<td>{{ $jobs[0]->dealerCompany->company_name }}</td>
											</tr>
											<tr>
												<th>Customer Full Name</th>
												<td>{{ $jobs[0]->customer_name }}</td>
											</tr>
											<tr>
												<th>Contact Name</th>
												<td>{{ $jobs[0]->contact_name }}</td>
											</tr>
											<tr>
												<th>Contact Phone</th>
												<td>{{ $jobs[0]->phone }}</td>
											</tr>
											<tr>
												<th>Job Title</th>
												<td>{{ $jobs[0]->title }}</td>
											</tr>
											<tr>
												<th>Job Description</th>
												<td>{{ $jobs[0]->description }}</td>
											</tr>
											<tr>
												<th>Request Date</th>
												<td>{{ $jobs[0]->created_at }}</td>
											</tr>
											<tr>
												<th>Status</th>
												<td>
													@if($jobs[0]->status == 1 || $jobs[0]->status == 3)
														<button type="button" class="btn btn-success">Active</button>
													@else
														<button type="button" class="btn btn-warning">In-Active</button>
													@endif
												</td>
											</tr>
											<tr>
												<th>Budget Allocation</th>
												<td>{{ $jobs[0]->budget }}</td>
											</tr>
											<tr>
												<th>Deadline</th>
												<td>{{ $jobs[0]->deadline }}</td>
											</tr>
											<tr>
												<th>Funding Option</th>
												<td>{{ $jobs[0]->fund_option }}</td>
											</tr>
											<tr>
												<th>Target</th>
												<td>{{ $jobs[0]->target }}</td>
											</tr>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
    
@stop