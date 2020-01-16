@extends('layouts.admin-layout')

@section('content')


	<div class="content-wrapper">
		<div class="page-header">
			<h3 class="page-title">
				Pages
			</h3>
			 <p>
				<a href="{{ route('dealercontents.index') }}" class="btn btn-primary">Pages List</a>
			</p>
		</div>
		
		<div class="row">
			<div class="col-md-12 grid-margin stretch-card">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title">Edit</h4>
						{!! Form::model($dealercontents, ['method' => 'PUT', 'route' => ['dealercontents.update', $dealercontents->id]]) !!}
												
							<div class="panel panel-default">
								<div class="panel-body">
									<div class="form-group">
										{!! Form::label('Content Name', 'Content Name*', ['class' => 'control-label']) !!}
										{!! Form::text('content_name', old('content_name'), ['class' => 'form-control', 'placeholder' => '']) !!}
										@if($errors->has('content_name'))
											<p class="help-block text-danger">
												{{ $errors->first('content_name') }}
											</p>
										@endif
									</div>
									<div class="form-group">
										{!! Form::label('Content Description', 'Content Description*', ['class' => 'control-label']) !!}
										{!! Form::textarea('content_description', old('content_description'), ['class' => 'form-control','id' => 'elm1', 'placeholder' => '']) !!}
										@if($errors->has('content_description'))
											<p class="help-block text-danger">
												{{ $errors->first('content_description') }}
											</p>
										@endif
									</div>									
								</div>
							</div>
							{!! Form::submit('Update', ['class' => 'btn btn-danger']) !!}
						{!! Form::close() !!}
					</div>
				</div>
			</div>
		</div>
	</div>
@stop

