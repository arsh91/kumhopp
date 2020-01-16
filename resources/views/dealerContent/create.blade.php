@extends('layouts.admin-layout')

@section('content')

	<div class="content-wrapper">
		<div class="page-header">
			<h3 class="page-title">
				 Create Content
			</h3>
		</div>
		<div class="card">
			<div class="card-body">
			
				{!! Form::open(['method' => 'POST', 'route' => ['dealercontents.store']]) !!}

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
							{!! Form::textarea('content_description', old('content_description'), ['class' => 'form-control', 'id'
							=> 'elm1', 'placeholder' => '']) !!}
							@if($errors->has('content_description'))
								<p class="help-block text-danger">
									{{ $errors->first('content_description') }}
								</p>
							@endif
						</div>						
					</div>
				</div>

				{!! Form::submit('Save', ['class' => 'btn btn-danger']) !!}
				{!! Form::close() !!}
			</div>
		</div>
	</div>

@stop

