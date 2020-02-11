@extends('layouts.admin-layout')

@section('content')

	<div class="content-wrapper">
		<div class="page-header">
			<h3 class="page-title">
				Jobs
			</h3>
			 <p>
				<a href="{{ route('salespersonjobs.create') }}" class="btn btn-primary">Add New</a>
			</p>
		</div>
		<div class="row">
			<div class="col-12 grid-margin">
				<div class="card">
					<div class="card-body">
					
						<div class="panel panel-default">
							<div class="panel-heading">
								Jobs List
							</div>
							<div class="panel-body">
								<table class="table table-bordered table-striped {{ count($jobs) > 0 ? 'datatable' : '' }} dt-select">
									<thead>
										<tr>
											<th>Customer Full Name</th>
											<th>Contact Name</th>
											<th>Contact Phone</th>
											<th>Job Title</th>
											<th>Job Description</th>
											<th>Company</th>
											<th>Request Date</th>
											<th>Status</th>
											<th>Budget Allocation</th>
											<th>Deadline</th>
											<th>Target</th>
											<th>Actions</th>
										</tr>
									</thead>
									
									<tbody>
										@if (count($jobs) > 0)
											@foreach ($jobs as $job)
												<tr data-entry-id="{{ $job->id }}">
													<td>{{ $job->customer_name }}</td>
													<td>{{ $job->contact_name }}</td>
													<td>{{ $job->phone }}</td>
													<td>{{ $job->title }}</td>
													<td><?php echo strip_tags($job->description); ?></td>
													<td>{{ $job->dealerCompany->company_name }}</td>
													<td>{{ $job->created_at }}</td>
													<td>
													@if($job->status == 1 || $job->status == 3)
														<button type="button" class="btn btn-success">Active</button>
													@else
														<button type="button" class="btn btn-warning">In-Active</button>
													@endif</td>
													<td>{{ $job->budget }}</td>
													<td>{{ $job->deadline }}</td>
													<td>{{ $job->target }}</td>
													
													<td>
														<a href="{{ route('salespersonjobs.show',[$job->id]) }}" class="btn btn-xs btn-primary">View</a>
														<a href="{{ route('salespersonjobs.edit',[$job->id]) }}" class="btn btn-xs btn-primary">Edit</a>
														<!--{!! Form::open(array(
															'style' => 'display: inline-block;',
															'method' => 'DELETE',
															'onsubmit' => "return confirm('Are you sure?');",
															'route' => ['salespersonjobs.destroy', $job->id])) !!}
														{!! Form::submit('Delete', array('class' => 'btn btn-xs btn-danger')) !!}
														{!! Form::close() !!}-->
													</td>
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