@extends('layouts.admin-layout')

@section('content')
<div class="container">
<div class="content-wrapper">
	
	<div class="row">
		<div class="col-12 grid-margin">
			<div class="card">
				<div class="card-body">
				
					<div class="panel panel-default">
						<!-- <div class="panel-heading">
							
						</div> -->
						
						<div class="panel-body">
							<span style="font-weight: bold;">{{ ucfirst (Request::segment(1)) }}</span>
							section is coming soon !
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
		
</div>
</div>

@endsection