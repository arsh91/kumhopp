@extends('layouts.admin-layout')

@section('content')

	<div class="content-wrapper">
		<div class="page-header">
			<h3 class="page-title">
				 Create Page
			</h3>
		</div>
		<div class="card">
			<div class="card-body">
			
				{!! Form::open(['method' => 'POST', 'route' => ['pages.store']]) !!}

				<div class="panel panel-default">
					<div class="panel-body">
						<div class="form-group">
							{!! Form::label('Page Name', 'Page Name*', ['class' => 'control-label']) !!}
							{!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => '']) !!}
							@if($errors->has('name'))
								<p class="help-block text-danger">
									{{ $errors->first('name') }}
								</p>
							@endif
						</div>
						<div class="form-group">
							{!! Form::label('Page Description', 'Page Description*', ['class' => 'control-label']) !!}
							{!! Form::textarea('description', old('description'), ['class' => 'form-control', 'id'
							=> 'elm1', 'placeholder' => '']) !!}
							@if($errors->has('description'))
								<p class="help-block text-danger">
									{{ $errors->first('description') }}
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

