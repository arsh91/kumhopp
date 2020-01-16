@extends('layouts.admin-layout')

@section('content')

	<div class="content-wrapper">
		<div class="page-header">
			<h3 class="page-title">
				Job Detail
			</h3>
			 <p>
				<a href="{{ url('/dealerJobs') }}" class="btn btn-default">Back</a>
			</p>
		</div>
		<div class="row">
			<div class="col-12 grid-margin">
				<div class="card">
					<div class="card-body">
					
						<div class="panel panel-default">
							<div class="panel-heading">
								@lang('quickadmin.view')
							</div>
							
							<div class="panel-body">
								<div class="row">
									<div class="col-md-6">
										<table class="table table-bordered table-striped">
										@foreach($dealerJob as $job)
										    @if($job->count() > 0)
										    	<tr>
												<th>Customer Name</th>
													<td>{{ $job->customer_name }}</td>
												</tr>
												<tr>
												<th>Contact Name</th>
													<td>{{ $job->contact_name }}</td>
												</tr>
												<tr>
												<th>Customer Phone</th>
													<td>{{ $job->phone }}</td>
												</tr>
												<tr>
												<th>Customer Address</th>
													<td>{{ $job->address }}</td>
												</tr>
												<tr>
												<th>Customer Website</th>
													<td>{{ $job->website }}</td>
												</tr>
												<tr>
												<th>Job's Title</th>
													<td>{{ $job->title }}</td>
												</tr>
												<tr>
												<th>JOb's Description</th>
													<td>{{ $job->description }}</td>
												</tr>
												<tr>
												<th>Budget</th>
													<td>{{ $job->budget }}</td>
												</tr>
										    @else
										        <tr> No Such Detail Found </tr>
										    @endif
										@endforeach	
										
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