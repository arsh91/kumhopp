@extends('layouts.admin-layout')

@section('content')

	<div class="content-wrapper">
		<div class="page-header">
			<h3 class="page-title">
				vouchers
			</h3>
			 <p>
				<a href="{{ route('vouchers.create') }}" class="btn btn-primary">Add New</a>
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
								<table class="table table-bordered table-striped {{ count($vouchers) > 0 ? 'datatable' : '' }} dt-select">
									<thead>
										<tr>
											<!--<th style="text-align:center;"><input type="checkbox" id="select-all" /></th>-->
											<th>Voucher Name</th>
											<th>Voucher Description</th>
											<th>Voucher Image</th>
											<th>Voucher Points</th>
											<th>Actions</th>
										</tr>
									</thead>
									
									<tbody>
										@if (count($vouchers) > 0)
											@foreach ($vouchers as $voucher)
												<tr data-entry-id="{{ $voucher->id }}">
													<td>{{ $voucher->voucher_name }}</td>
													<td><?php echo strip_tags($voucher->voucher_description); ?></td>
													<td>
														@if($voucher->voucher_image != '')
															<img class="img-fluid" src="{{ asset('uploads') }}/{{ $voucher->voucher_image }}">
														@else
															<img class="img-fluid" src='/img/default.jpg'>	
														@endif
														</td>
													<td>{{ $voucher->points }}</td>												
													<td>
														<!--<a href="{{ route('vouchers.show',[$voucher->id]) }}" class="btn btn-xs btn-primary">View</a>-->
														<a href="{{ route('vouchers.edit',[$voucher->id]) }}" class="btn btn-xs btn-primary">Edit</a>
														{!! Form::open(array(
															'style' => 'display: inline-block;',
															'method' => 'DELETE',
															'onsubmit' => "return confirm('Are you sure?');",
															'route' => ['vouchers.destroy', $voucher->id])) !!}
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