@extends('layouts.admin-layout')

@section('content')

	<div class="content-wrapper">
		<div class="page-header">
			<h3 class="page-title">
				 Create Dealer Account
			</h3>
			<p>
				<a href="{{ route('dealers.index') }}" class="btn btn-primary">@lang('Dealers List')</a>
			</p>
		</div>
		<div class="card">
			<div class="card-body">
			
				{!! Form::open(['method' => 'POST', 'route' => ['dealers.store']]) !!}

				<div class="panel panel-default">
					<div class="panel-body">
						<div class="form-group">
							{!! Form::label('First Name', 'Dealer First Name*', ['class' => 'control-label']) !!}
							{!! Form::text('first_name', old('first_name'), ['class' => 'form-control', 'placeholder' => '']) !!}
							@if($errors->has('first_name'))
								<p class="help-block text-danger">
									{{ $errors->first('first_name') }}
								</p>
							@endif
						</div>
						<div class="form-group">
							{!! Form::label('Last Name', 'Dealer Last Name*', ['class' => 'control-label']) !!}
							{!! Form::text('last_name', old('last_name'), ['class' => 'form-control', 'placeholder' => '']) !!}
							@if($errors->has('last_name'))
								<p class="help-block text-danger">
									{{ $errors->first('last_name') }}
								</p>
							@endif
						</div>
						<div class="form-group">
							{!! Form::label('email', 'Dealer Email*', ['class' => 'control-label']) !!}
							{!! Form::text('email', old('email'), ['class' => 'form-control', 'placeholder' => '']) !!}
							@if($errors->has('email'))
								<p class="help-block text-danger">
									{{ $errors->first('email') }}
								</p>
							@endif
						</div>
						<div class="form-group">
							{!! Form::label('phone', 'Dealer Phone', ['class' => 'control-label']) !!}
							{!! Form::text('phone', old('phone'), ['class' => 'form-control', 'placeholder' => '']) !!}
							@if($errors->has('phone'))
								<p class="help-block text-danger">
									{{ $errors->first('phone') }}
								</p>
							@endif
						</div>
						<div class="form-group">
							{!! Form::label('points', 'Points', ['class' => 'control-label']) !!}
							{!! Form::number('points', old('points'), ['class' => 'form-control', 'placeholder' => '']) !!}
							@if($errors->has('points'))
								<p class="help-block text-danger">
									{{ $errors->first('points') }}
								</p>
							@endif
						</div>
						<div class="form-group">
							{!! Form::label('Account No', 'Account No*', ['class' => 'control-label']) !!}
							{!! Form::text('account_no', old('account_no'), ['class' => 'form-control', 'placeholder' => '']) !!}
							@if($errors->has('account_no'))
								<p class="help-block text-danger">
									{{ $errors->first('account_no') }}
								</p>
							@endif
						</div>
						<div class="form-group">
							{!! Form::label('Company Name', 'Company Name*', ['class' => 'control-label']) !!}
							{!! Form::text('company_name', old('company_name'), ['class' => 'form-control', 'placeholder' => '']) !!}
							@if($errors->has('company_name'))
								<p class="help-block text-danger">
									{{ $errors->first('company_name') }}
								</p>
							@endif
						</div>
						<div class="form-group">
							{!! Form::label('Contact', 'Contact*', ['class' => 'control-label']) !!}
							{!! Form::text('contact', old('contact'), ['class' => 'form-control', 'placeholder' => '']) !!}
							@if($errors->has('contact'))
								<p class="help-block text-danger">
									{{ $errors->first('contact') }}
								</p>
							@endif
						</div>
						<div class="form-group">
							{!! Form::label('Address1', 'Address1*', ['class' => 'control-label']) !!}
							{!! Form::text('address1', old('address1'), ['class' => 'form-control', 'placeholder' => '']) !!}
							@if($errors->has('address1'))
								<p class="help-block text-danger">
									{{ $errors->first('address1') }}
								</p>
							@endif
						</div>
						<div class="form-group">
							{!! Form::label('Address2', 'Address2', ['class' => 'control-label']) !!}
							{!! Form::text('address2', old('address2'), ['class' => 'form-control', 'placeholder' => '']) !!}
							@if($errors->has('address2'))
								<p class="help-block text-danger">
									{{ $errors->first('address2') }}
								</p>
							@endif
						</div>
						<div class="form-group">
							{!! Form::label('Address3', 'Address3', ['class' => 'control-label']) !!}
							{!! Form::text('address3', old('address3'), ['class' => 'form-control', 'placeholder' => '']) !!}
							@if($errors->has('address3'))
								<p class="help-block text-danger">
									{{ $errors->first('address3') }}
								</p>
							@endif
						</div>
						<div class="form-group">
							{!! Form::label('Town', 'Town*', ['class' => 'control-label']) !!}
							{!! Form::text('town', old('town'), ['class' => 'form-control', 'placeholder' => '']) !!}
							@if($errors->has('town'))
								<p class="help-block text-danger">
									{{ $errors->first('town') }}
								</p>
							@endif
						</div>
						<div class="form-group">
							{!! Form::label('County', 'County*', ['class' => 'control-label']) !!}
							{!! Form::text('county', old('county'), ['class' => 'form-control', 'placeholder' => '']) !!}
							@if($errors->has('county'))
								<p class="help-block text-danger">
									{{ $errors->first('county') }}
								</p>
							@endif
						</div>
						<div class="form-group">
							{!! Form::label('Post Code', 'Post Code*', ['class' => 'control-label']) !!}
							{!! Form::text('post_code', old('post_code'), ['class' => 'form-control', 'placeholder' => '']) !!}
							@if($errors->has('post_code'))
								<p class="help-block text-danger">
									{{ $errors->first('post_code') }}
								</p>
							@endif
						</div>
						<div class="form-group">
							{!! Form::label('Region', 'Region*', ['class' => 'control-label']) !!}
							{!! Form::text('region', old('region'), ['class' => 'form-control', 'placeholder' => '']) !!}
							@if($errors->has('region'))
								<p class="help-block text-danger">
									{{ $errors->first('region') }}
								</p>
							@endif
						</div>
						<div class="form-group">
							{!! Form::label('Website', 'Website', ['class' => 'control-label']) !!}
							{!! Form::text('website', old('website'), ['class' => 'form-control', 'placeholder' => '']) !!}
							@if($errors->has('website'))
								<p class="help-block text-danger">
									{{ $errors->first('website') }}
								</p>
							@endif
						</div>
						<div class="form-group">
							{!! Form::label('Category', 'Category*', ['class' => 'control-label']) !!}
							{!! Form::text('category', old('category'), ['class' => 'form-control', 'placeholder' => '']) !!}
							@if($errors->has('category'))
								<p class="help-block text-danger">
									{{ $errors->first('category') }}
								</p>
							@endif
						</div>
						<div class="form-group">
							{!! Form::label('Group', 'Group*', ['class' => 'control-label']) !!}
							{!! Form::text('group', old('group'), ['class' => 'form-control', 'placeholder' => '']) !!}
							@if($errors->has('group'))
								<p class="help-block text-danger">
									{{ $errors->first('group') }}
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

