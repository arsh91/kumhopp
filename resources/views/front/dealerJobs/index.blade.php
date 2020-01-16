@extends('layouts.admin-layout')

@section('content')
<div class="container">
	<div class="content-wrapper">

		<div class="row">
			<div class="col-12 grid-margin">
				<div class="card">
					<div class="card-header bg-dark">
			          <h2 class="text-white">Activity </h2>
				  </div>
					<div class="card-body">

<table class="table table-bordered table-striped {{ count($dealerJobs) > 0 ? 'datatable' : '' }} dt-select">
				<thead>
					<tr>
						<th width="102">Job Name</th>
						<th width="212">Job Description</th>
						<th width="58">Date</th>
						<th width="94">Cost</th>
			        </tr>
		        </thead>
									
				<tbody>
					@if (count($dealerJobs) > 0)
											@foreach ($dealerJobs as $job)
							<tr data-entry-id="{{ $job->id }}">
								<td>{{ $job->title }}</td>
								<td><?php echo strip_tags($job->description); ?></td>
								<td>December </td>
								<td><!--<a href="{{ url('/getJobDetail',[$job->id]) }}" class="btn btn-xs btn-primary">View Job</a>-->£500 </td>
					        </tr>
						@endforeach
					@else
						<tr>
							<td colspan="4">No Record Found</td>
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
@stop
