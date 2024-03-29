@extends('layouts.admin-layout')

@section('content')


	<div class="content-wrapper">
		<div class="page-header">
			<h3 class="page-title">
				Dealers
			</h3>
			 <p>
				<a href="{{ route('dealers.index') }}" class="btn btn-primary">@lang('Dealers List')</a>
			</p>
		</div>
		
		<div class="row">
			<div class="col-md-12 grid-margin stretch-card">
				<div class="card">
					<div style="display: none;">
						<?php echo "<pre>"; print_r($dealersData->dealers->account_no); echo "</pre>"; ?>
					</div>
					<div class="card-body">
						<h4 class="card-title">Edit</h4>
						{!! Form::model($dealersData, ['method' => 'PUT', 'route' => ['dealers.update', $dealersData->id]]) !!}
												
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
										{!! Form::text('email', old('email'), ['class' => 'form-control', 'placeholder' => '', 'disabled'=>'true']) !!}
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

										{!! Form::text('account_no', $dealersData->dealers->account_no, array('required', 'class'=>'form-control'))     !!}

										@if($errors->has('account_no'))
											<p class="help-block text-danger">
												{{ $errors->first('account_no') }}
											</p>
										@endif
									</div>
									<div class="form-group">
										{!! Form::label('Company Name', 'Company Name*', ['class' => 'control-label']) !!}
										{!! Form::text('company_name', $dealersData->dealers->company_name, ['class' => 'form-control', 'placeholder' => '']) !!}
										@if($errors->has('company_name'))
											<p class="help-block text-danger">
												{{ $errors->first('company_name') }}
											</p>
										@endif
									</div>
									<div class="form-group">
										{!! Form::label('Contact', 'Contact*', ['class' => 'control-label']) !!}
										{!! Form::text('contact', $dealersData->dealers->contact, ['class' => 'form-control', 'placeholder' => '']) !!}
										@if($errors->has('contact'))
											<p class="help-block text-danger">
												{{ $errors->first('contact') }}
											</p>
										@endif
									</div>
									<div class="form-group">
										{!! Form::label('Address1', 'Address1*', ['class' => 'control-label']) !!}
										{!! Form::text('address1', $dealersData->dealers->address1, ['class' => 'form-control', 'placeholder' => '']) !!}
										@if($errors->has('address1'))
											<p class="help-block text-danger">
												{{ $errors->first('address1') }}
											</p>
										@endif
									</div>
									<div class="form-group">
										{!! Form::label('Address2', 'Address2', ['class' => 'control-label']) !!}
										{!! Form::text('address2', $dealersData->dealers->address2, ['class' => 'form-control', 'placeholder' => '']) !!}
										@if($errors->has('address2'))
											<p class="help-block text-danger">
												{{ $errors->first('address2') }}
											</p>
										@endif
									</div>
									<div class="form-group">
										{!! Form::label('Address3', 'Address3', ['class' => 'control-label']) !!}
										{!! Form::text('address3', $dealersData->dealers->address3, ['class' => 'form-control', 'placeholder' => '']) !!}
										@if($errors->has('address3'))
											<p class="help-block text-danger">
												{{ $errors->first('address3') }}
											</p>
										@endif
									</div>
									<div class="form-group">
										{!! Form::label('Town', 'Town*', ['class' => 'control-label']) !!}
										{!! Form::text('town', $dealersData->dealers->town, ['class' => 'form-control', 'placeholder' => '']) !!}
										@if($errors->has('town'))
											<p class="help-block text-danger">
												{{ $errors->first('town') }}
											</p>
										@endif
									</div>
									<div class="form-group">
										{!! Form::label('County', 'County*', ['class' => 'control-label']) !!}
										{!! Form::text('county', $dealersData->dealers->county, ['class' => 'form-control', 'placeholder' => '']) !!}
										@if($errors->has('county'))
											<p class="help-block text-danger">
												{{ $errors->first('county') }}
											</p>
										@endif
									</div>
									<div class="form-group">
										{!! Form::label('Post Code', 'Post Code*', ['class' => 'control-label']) !!}
										{!! Form::text('post_code', $dealersData->dealers->post_code, ['class' => 'form-control', 'placeholder' => '']) !!}
										@if($errors->has('post_code'))
											<p class="help-block text-danger">
												{{ $errors->first('post_code') }}
											</p>
										@endif
									</div>
									<div class="form-group">
										{!! Form::label('Region', 'Region*', ['class' => 'control-label']) !!}
										{!! Form::text('region', $dealersData->dealers->region, ['class' => 'form-control', 'placeholder' => '']) !!}
										@if($errors->has('region'))
											<p class="help-block text-danger">
												{{ $errors->first('region') }}
											</p>
										@endif
									</div>
									<div class="form-group">
										{!! Form::label('Website', 'Website', ['class' => 'control-label']) !!}
										{!! Form::text('website', $dealersData->dealers->website, ['class' => 'form-control', 'placeholder' => '']) !!}
										@if($errors->has('website'))
											<p class="help-block text-danger">
												{{ $errors->first('website') }}
											</p>
										@endif
									</div>
									<div class="form-group">
										{!! Form::label('Category', 'Category*', ['class' => 'control-label']) !!}
										{!! Form::text('category', $dealersData->dealers->category, ['class' => 'form-control', 'placeholder' => '']) !!}
										@if($errors->has('category'))
											<p class="help-block text-danger">
												{{ $errors->first('category') }}
											</p>
										@endif
									</div>
									<div class="form-group">
										{!! Form::label('Group', 'Group*', ['class' => 'control-label']) !!}
										{!! Form::text('group', $dealersData->dealers->group, ['class' => 'form-control', 'placeholder' => '']) !!}
										@if($errors->has('group'))
											<p class="help-block text-danger">
												{{ $errors->first('group') }}
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

