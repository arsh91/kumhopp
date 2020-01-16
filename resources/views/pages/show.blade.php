@extends('layouts.admin-layout')

@section('content')

	<div class="content-wrapper">
		<div class="page-header">
			<h3 class="page-title">
				Pages
			</h3>
			 <p>
				<a href="{{ route('pages.index') }}" class="btn btn-default">@lang('quickadmin.back_to_list')</a>
			</p>
		</div>
		<div class="row">
			<div class="col-12 grid-margin">
				<div class="card">
					<div class="card-body">
					
						<div class="panel panel-default">
							<div class="panel-heading">
								View
							</div>
							
							<div class="panel-body">
								<div class="row">
									<div class="col-md-6">
										<table class="table table-bordered table-striped">
											<tr><th>Pages Name</th>
										<td>{{ $pages->name }}</td></tr>
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