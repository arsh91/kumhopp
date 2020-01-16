@extends('layouts.admin-layout')

@section('content')

	<div class="content-wrapper">
		<div class="page-header">
			<h3 class="page-title">
				 Create Voucher
			</h3>
		</div>
		<div class="card">
			<div class="card-body">
			
				{!! Form::open(['method' => 'POST', 'enctype'=>'multipart/form-data', 'route' => ['vouchers.store']]) !!}

				<div class="panel panel-default">
					<div class="panel-body">
						<div class="form-group">
							{!! Form::label('Voucher Name', 'Voucher Name*', ['class' => 'control-label']) !!}
							{!! Form::text('voucher_name', old('voucher_name'), ['class' => 'form-control', 'placeholder' => '']) !!}
							@if($errors->has('voucher_name'))
								<p class="help-block text-danger">
									{{ $errors->first('voucher_name') }}
								</p>
							@endif
						</div>						
						<div class="form-group">
							{!! Form::label('Voucher Description', 'Voucher Description*', ['class' => 'control-label']) !!}
							{!! Form::textarea('voucher_description', old('voucher_description'), ['class' => 'form-control', 'id'
							=> 'elm1', 'placeholder' => '']) !!}
							@if($errors->has('voucher_description'))
								<p class="help-block text-danger">
									{{ $errors->first('voucher_description') }}
								</p>
							@endif
						</div>
						<div class="form-group">
								{!! Form::label('Voucher Points', 'Voucher Points*', ['class' => 'control-label']) !!}
								{!! Form::number('points', old('points'), ['class' => 'form-control','id' => 'elm1', 'placeholder' => '']) !!}
								@if($errors->has('points'))
									<p class="help-block text-danger">
										{{ $errors->first('points') }}
									</p>
								@endif
						</div>
						<div class="form-group">
							{!! Form::label('Voucher Image', 'Voucher Image*', ['class' => 'control-label']) !!}
							{!! Form::file('voucher_image', old('voucher_image'), ['class' => 'form-control']) !!}
							@if($errors->has('voucher_image'))
								<p class="help-block text-danger">
									{{ $errors->first('voucher_image') }}
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

