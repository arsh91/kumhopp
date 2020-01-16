@extends('layouts.admin-layout')

@section('content')

	<div class="content-wrapper">
		<div class="page-header">
			<h3 class="page-title">
				Content for dealer page
			</h3>
			 <p>
			 	This content is going to show on <span <span style="color:red; font-weight: bold;"> Dealer's Dashboard</span>  
			<!-- 	<a href="{{ route('dealercontents.create') }}" class="btn btn-primary">Add New</a> -->
			</p>
		</div>
		<div class="row">
			<div class="col-12 grid-margin">
				<div class="card">
					<div class="card-body">
					
						<div class="panel panel-default">
							<!-- <div class="panel-heading">
								List
							</div> -->

							<div class="panel-body">
								<table class="table table-bordered table-striped dt-select">
									<thead>
										<tr>
											<th>Content Name</th>
											<th>Content Description</th>
											<th>Actions</th>
											<!-- <th>Show Content</th> -->
										</tr>
									</thead>
									
									<tbody>
										@if (count($dealerContents) > 0)
											@foreach ($dealerContents as $content)
												<tr data-entry-id="{{ $content->id }}">
													<td>{{ $content->content_name }}</td>
													<td><?php echo strip_tags($content->content_description); ?></td>													
													<td>
														<a href="{{ route('dealercontents.edit',[$content->id]) }}" class="btn btn-xs btn-primary">Edit</a>
														<!-- {!! Form::open(array(
															'style' => 'display: inline-block;',
															'method' => 'DELETE',
															'onsubmit' => "return confirm('Are you sure?');",
															'route' => ['dealercontents.destroy', $content->id])) !!}
														{!! Form::submit('Delete', array('class' => 'btn btn-xs btn-danger')) !!}
														{!! Form::close() !!}    -->
													</td>
													<!-- <td>
														<a href="javascript:void(0)" class="btn btn-xs btn-primary" title="This will add a banner on dealer's dashboard">Show</a>
														<a style="display: none;" href="javascript:void(0)" class="btn btn-xs btn-primary" title="This will hide the banner from dealer's dashboard">Hide</a>
													</td> -->
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
