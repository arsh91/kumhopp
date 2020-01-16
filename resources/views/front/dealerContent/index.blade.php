@extends('layouts.admin-layout')

@section('content')

	<div class="content-wrapper">
		<div class="page-header">
			<h3 class="page-title">
				Content for dealer page
			</h3>
			 <p>
				<a href="{{ route('dealercontents.create') }}" class="btn btn-primary">Add New</a>
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
								<table class="table table-bordered table-striped {{ count($dealercontents) > 0 ? 'datatable' : '' }} dt-select">
									<thead>
										<tr>
											<th>Content Name</th>
											<th>Content Description</th>
											<th>Actions</th>
										</tr>
									</thead>
									
									<tbody>
										@if (count($dealerContents) > 0)
											@foreach ($dealerContents as $content)
												<tr data-entry-id="{{ $page->id }}">
													<td>{{ $content->content_name }}</td>
													<td><?php echo strip_tags($content->content_description); ?></td>													
													<td>
														<!--<a href="{{ route('contents.show',[$content->id]) }}" class="btn btn-xs btn-primary">View</a>-->
														<a href="{{ route('contents.edit',[$content->id]) }}" class="btn btn-xs btn-primary">Edit</a>
														{!! Form::open(array(
															'style' => 'display: inline-block;',
															'method' => 'DELETE',
															'onsubmit' => "return confirm('Are you sure?');",
															'route' => ['contents.destroy', $content->id])) !!}
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
