@extends('layouts.admin-layout')

@section('content')

	<div class="content-wrapper">
		<div class="page-header">
			<h3 class="page-title">
				Jobs
			</h3>
			<!--<p>
				<a href="{{ route('jobs.create') }}" class="btn btn-primary">Add New</a>
			</p>-->
			<p>
			<div class="clearfix">
				<a href="{{ route('jobs.create') }}" class="btn btn-primary float-left">Add New</a>
				@if( count($salesPerson) > 0 )
				<form action="" method="get">	
					<div class="float-right">
						<label for="sales_person">Filter by Sales Person:</label>
						<div class="form-group">						
							<select name="sales_person" id="sales_person_sel" class="form-control" data-oldVal = "{{ app('request')->input('sales_person') }}">
								<option value="">Select Sales Person</option>
								@foreach($salesPerson as $sp)
									<option value="{{$sp->id}}">{{$sp->email}}</option>
								@endforeach
							</select>
						</div>
						<button type="submit" class="btn btn-primary"> Search </button>
					</div>
				</form>
				@endif
			</div>
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
								<table class="table table-bordered table-striped {{ count($jobs) > 0 ? 'datatable' : '' }} dt-select">
									<thead>
										<tr>
											<!--<th>Customer Full Name</th>
											<th>Contact Name</th>
											<th>Contact Phone</th>-->
											<th>Company</th>
											<th>Job Title</th>
											<th>Sales Person</th>
											<th>Job Description</th>
											<th>Request Date</th>
											<th>Status</th>
											<th>Budget Allocation</th>
											<!--<th>Deadline</th>
											<th>Target</th>-->
											<!--<th>Created By</th>-->
											<th>Actions</th>
										</tr>
									</thead>
									
									<tbody>
										@if (count($jobs) > 0)
											@foreach ($jobs as $job)
												<tr data-entry-id="{{ $job->id }}">
													<!--<td>{{ $job->customer_name }}</td>
													<td>{{ $job->contact_name }}</td>
													<td>{{ $job->phone }}</td>-->
													<td>{{ $job->dealerCompany->company_name }}</td>
													<td>{{ $job->title }}</td>
													<td>{{ $job->getSalesPerson->email }} 
													@if($job->getSalesPerson->role == 1) <span style="color:#28a745">(Admin)</span> @endif
													</td>
													<td><?php echo strip_tags($job->description); ?></td>
													<td>{{ date('d/M/y', strtotime($job->created_at)) }}</td>
													<!--<td class="status {{$job->status}}">
													
													@if($job->status == 1 || $job->status == 3)
														<button type="button" class="btn btn-success">Active</button>
													@else
														<button type="button" class="btn btn-warning">In-Active</button>
													@endif</td>-->
													
													<td>
													
													@if($job->status == 0)
														<button type="button" class="btn btn-warning">Pending</button>
													@elseif($job->status == 1)
														<button type="button" class="btn btn-success">Approved</button>
													@elseif($job->status == 2)
														<button type="button" class="btn btn-warning">In Progress</button>
													@else	
														<button type="button" class="btn btn-success">Completed</button>
													@endif
													</td>
													
													<td>{{ $job->budget }}</td>
													<!--<td>{{ $job->deadline }}</td>
													<td>{{ $job->target }}</td>-->
													<!--<td>{{ $job->job_created_by }}</td>-->
													
													<td>
														<a href="{{ route('jobs.show',[$job->id]) }}" class="btn btn-xs btn-primary">View</a>
														<a href="{{ route('jobs.edit',[$job->id]) }}" class="btn btn-xs btn-primary">Edit</a>
														{!! Form::open(array(
															'style' => 'display: inline-block;',
															'method' => 'DELETE',
															'onsubmit' => "return confirm('Are you sure?');",
															'route' => ['jobs.destroy', $job->id])) !!}
														{!! Form::submit('Delete', array('class' => 'btn btn-xs btn-danger')) !!}
														{!! Form::close() !!}
													</td>
												</tr>
											@endforeach
										@else
											<tr>
												<td colspan="12">No Record Found</td>
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
		//get selected value from search filter
		var sales_filter = $('#sales_person_sel').attr('data-oldVal');
		//console.log(sales_filter);
		
		if (typeof sales_filter  !== "undefined" && sales_filter != ""){
			$('#sales_person_sel').val(sales_filter);			
		}
		
		$('.copy-to-clipboard input').click(function() {
			$(this).focus();
			$(this).select();
			document.execCommand('copy');
			alert("Copied");
		});
});
</script>
@endsection