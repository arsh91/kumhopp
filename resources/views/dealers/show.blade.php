@extends('layouts.admin-layout')

@section('content')

	<div class="content-wrapper">
		<div class="page-header">
			<h3 class="page-title">
				Dealer's View
			</h3>
			<p>
				<a href="{{ route('dealers.index') }}" class="btn btn-primary">@lang('Dealers List')</a>
			</p>
		</div>
		<div class="row">
			<div class="col-12 grid-margin">
				<div class="card">
					<div class="card-body">
					
						<div class="panel panel-default">
							<div class="panel-heading">
								View Dealer Detail
							</div>
							
							<div class="panel-body">
								<div class="row">
									<div class="col-md-6">
										<table class="table table-bordered table-striped">
										<tr><th>Dealer First Name</th>
											<td>{{ $dealers->first_name }}</td>
										</tr>
										<tr><th>Dealer Last Name</th>
											<td>{{ $dealers->last_name }}</td>
										</tr>
										<tr><th>Email Address</th>
											<td>{{ $dealers->email }}</td>
										</tr>
										<tr><th>Company Name</th>
											<td>{{ $dealers->dealers->company_name }}</td>
										</tr>
										<tr><th>Account No</th>
											<td>{{ $dealers->dealers->account_no }}</td>
										</tr>
										<tr><th>Contact</th>
											<td>{{ $dealers->dealers->contact }}</td>
										</tr>
										<tr><th>Address</th>
											<td>{{ $dealers->dealers->address1 }}</td>
										</tr>
										<tr><th>Town</th>
											<td>{{ $dealers->dealers->town }}</td>
										</tr>
										<tr><th>County</th>
											<td>{{ $dealers->dealers->county }}</td>
										</tr>
										<tr><th>Postal Code</th>
											<td>{{ $dealers->dealers->post_code }}</td>
										</tr>
										<tr><th>Region</th>
											<td>{{ $dealers->dealers->region }}</td>
										</tr>
										<tr><th>Dealer's Website</th>
											<td>{{ $dealers->dealers->website }}</td>
										</tr>
										<tr><th>Sales Person</th>
											<td>{{ $salesPersonEmail }}</td>
										</tr>
										<tr><th>Category</th>
											<td>{{ $dealers->dealers->category }}</td>
										</tr>
										<tr><th>Group</th>
											<td>{{ $dealers->dealers->group }}</td>
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