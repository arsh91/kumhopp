@extends('layouts.admin-layout')

@section('content')

	<div class="content-wrapper">
		<div class="page-header">
			<h3 class="page-title">
				Sales
			</h3>
			<p>
				<a href="{{ url('dealers/sales/'.$sales->dealer_id) }}" class="btn btn-primary">Back</a>
			</p>
		</div>
		<div class="row">
			<div class="col-12 grid-margin">
				<div class="card">
					<div class="card-body">
					
						<div class="panel panel-default">							
							<div class="panel-body">
								<div class="row">
									<div class="col-md-6">
										<table class="table table-bordered table-striped">
											<tr><th>Sale for {{ $sales->sale_month }} {{$sales->sale_year}}</th>
										<td>{{ $sales->sale_figure }}</td></tr>
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