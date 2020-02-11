@extends('layouts.admin-layout')

@section('content')

	<div class="content-wrapper">
		<div class="page-header">
			<h3 class="page-title">
				Dealers
			</h3>
			 <p>
				<a href="{{ route('dealers.create') }}" class="btn btn-primary">Add New</a>
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
								<table class="table table-bordered table-striped {{ count($dealers) > 0 ? 'datatable' : '' }} dt-select" id="myTablees">
									<thead>
										<tr>
											<!--<th style="text-align:center;"><input type="checkbox" id="select-all" /></th>-->
											<th>Company Name</th>
											<th>Dealer Email</th>
											<th style="display:none;">Status</th>
											<th>Dealer Points</th>
											<th>Monthly Sales</th>
											<th>Actions</th>
										</tr>
									</thead>
									
									<tbody>
										@if (count($dealers) > 0)
											@foreach ($dealers as $dealer)
												<tr data-entry-id="{{ $dealer->id }}">
													<td>{{ $dealer->dealers->company_name }}</td>
													<td>{{ $dealer->email }}</td>
													<td style="display:none;">
													@if($dealer->status == 0)
														<a href="{{ url('dealers/status/'.$dealer->id.'/1') }}" class="btn btn-xs btn-success">Register for KPP</a>
													@else
														<a href="javascript:void(0)" class="btn btn-xs btn-primary">Registered</a>
													@endif
														
													</td>
													<td>{{ $dealer->points }}</td>
													<td>
														@if($dealer->status == 0)
															<a href="javascript:void(0)" class="btn btn-xs btn btn-warning disabled">Sales</a>		
														@else
														<a href="{{ url('dealers/sales/'.$dealer->id) }}" class="btn btn-xs btn btn-warning">Sales</a>
														@endif
													</td>
													<td>
														<a href="{{ route('dealers.show',[$dealer->id]) }}" class="btn btn-xs btn-primary">View</a>
														<a href="{{ route('dealers.edit',[$dealer->id]) }}" class="btn btn-xs btn-primary">Edit</a>
														{!! Form::open(array(
															'style' => 'display: inline-block;',
															'method' => 'DELETE',
															'onsubmit' => "return confirm('Are you sure?');",
															'route' => ['dealers.destroy', $dealer->id])) !!}
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

@section('js_content')
   <script type="text/javascript">
      $(document).ready(function($) {
        
          $(".clickable-row").click(function() {
              
          });

          var table = $('#myTable').DataTable({
            "columnDefs": [
              {"targets": 0, "orderable": false },
              {"targets": 7, "orderable": false }
            ],
            processing: true,
            serverSide: true,
            ajax: '{!! url('admin/order-list-paginate') !!}',

            columns: [
                { data: 'DT_RowIndex'},
                { data: 'first_name', name: 'first_name' },
                { data: 'email', name: 'email' },
              ],
          });

          $('#myTable tbody').on('click', 'tr', function () {
              var data = table.row( this ).data();
               console.log(data.id);
              window.location = "<?php echo url('admin/each-order-detail'); ?>"+'/'+data.id;
          } );
      });
     
   </script>
   <script type="text/javascript">
      $(document).ready(function() {
          $('#myTablees').DataTable();
      } );
    </script>

@endsection