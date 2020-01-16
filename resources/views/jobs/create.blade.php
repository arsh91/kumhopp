@extends('layouts.admin-layout')

@section('content')

	<div class="content-wrapper">
		<div class="page-header">
			<h3 class="page-title">
				 Create Job
			</h3>
			<p>
				<a href="{{ route('jobs.index') }}" class="btn btn-primary">Jobs List</a>
			</p>
		</div>
		<div class="card">
			<div class="card-body">
			
				{!! Form::open(['method' => 'POST', 'route' => ['jobs.store']]) !!}

				<div class="panel panel-default">
					<div class="panel-body">
						<div class="form-group">
							{!! Form::label('dealer_id', 'Assign Company*', ['class' => 'control-label']) !!}
							{!! Form::select('dealer_id', $dealers, old('dealer_id'), ['class' => 'form-control', 'id' => 'dealer_id_change']) !!}
							
							@if($errors->has('dealer_id'))
								<p class="help-block text-danger">
									{{ $errors->first('dealer_id') }}
								</p>
							@endif
						</div>

						<div class="form-group">
							{!! Form::label('Customer Full Name', 'Customer Full Name*', ['class' => 'control-label']) !!}
							{!! Form::text('customer_name', old('customer_name'), ['class' => 'form-control', 'id' => 'customer_name', 'placeholder' => '']) !!}
							@if($errors->has('customer_name'))
								<p class="help-block text-danger">
									{{ $errors->first('customer_name') }}
								</p>
							@endif
						</div>
						<div class="form-group">
							{!! Form::label('Contact Name', 'Contact Name*', ['class' => 'control-label']) !!}
							{!! Form::text('contact_name', old('contact_name'), ['class' => 'form-control', 'id'=>'contact_name', 'placeholder' => '']) !!}
							@if($errors->has('contact_name'))
								<p class="help-block text-danger">
									{{ $errors->first('contact_name') }}
								</p>
							@endif
						</div>
						<div class="form-group">
							{!! Form::label('Contact Phone', 'Contact Phone*', ['class' => 'control-label']) !!}
							{!! Form::text('phone', old('phone'), ['class' => 'form-control', 'id'=>'phone','placeholder' => '']) !!}
							@if($errors->has('phone'))
								<p class="help-block text-danger">
									{{ $errors->first('phone') }}
								</p>
							@endif
						</div>
						<div class="form-group">
							{!! Form::label('Contact Full Address', 'Contact Full Address*', ['class' => 'control-label']) !!}
							{!! Form::textarea('address', old('address'), ['class' => 'form-control', 'id' => 'address', 'placeholder' => '', 'rows'=>5]) !!}
							@if($errors->has('address'))
								<p class="help-block text-danger">
									{{ $errors->first('address') }}
								</p>
							@endif
						</div>
						<div class="form-group">
							{!! Form::label('Contacts Website', 'Contacts Website', ['class' => 'control-label']) !!}
							{!! Form::text('website', old('website'), ['class' => 'form-control', 'id' => 'website','placeholder' => '']) !!}
							@if($errors->has('website'))
								<p class="help-block text-danger">
									{{ $errors->first('website') }}
								</p>
							@endif
						</div>
						<div class="form-group">
							{!! Form::label('Job title', 'Job title*', ['class' => 'control-label']) !!}
							{!! Form::text('title', old('title'), ['class' => 'form-control', 'placeholder' => '']) !!}
							@if($errors->has('title'))
								<p class="help-block text-danger">
									{{ $errors->first('title') }}
								</p>
							@endif
						</div>
						<div class="form-group">
							{!! Form::label('Job Description', 'Job Description*', ['class' => 'control-label']) !!}
							{!! Form::textarea('description', old('description'), ['class' => 'form-control', 'placeholder' => '', 'rows'=>5]) !!}
							@if($errors->has('description'))
								<p class="help-block text-danger">
									{{ $errors->first('description') }}
								</p>
							@endif
						</div>
						<div class="form-group">
							{!! Form::label('Status', 'Status', ['class' => 'control-label']) !!}
							{!! Form::select('status', array('Pending', 'Approved', 'In Progress', 'Completed'), old('status'), ['class' => 'form-control']) !!}
							@if($errors->has('status'))
								<p class="help-block text-danger">
									{{ $errors->first('status') }}
								</p>
							@endif
						</div>
						<div class="form-group">
							{!! Form::label('Budget Allocation', 'Budget Allocation', ['class' => 'control-label']) !!}
							{!! Form::number('budget', old('budget'), ['class' => 'form-control', 'placeholder' => '']) !!}
							@if($errors->has('budget'))
								<p class="help-block text-danger">
									{{ $errors->first('budget') }}
								</p>
							@endif
						</div>
						
						<div class="form-group">
							{!! Form::label('Deadline', 'Deadline', ['class' => 'control-label']) !!}
							{!! Form::text('deadline', old('deadline'), ['class' => 'form-control', 'placeholder' => '', 'id'=>'deadline_cal']) !!}
							@if($errors->has('deadline'))
								<p class="help-block text-danger">
									{{ $errors->first('deadline') }}
								</p>
							@endif
						</div>
						<div class="form-group">
							{!! Form::label('Funding Option', 'Funding Option', ['class' => 'control-label']) !!}
							{!! Form::select('funding_option', array('None', 'ASM Fund', 'Promo Fund', 'Dealer Payment'), old('funding_option'), ['class' => 'form-control']) !!}
							@if($errors->has('funding_option'))
								<p class="help-block text-danger">
									{{ $errors->first('funding_option') }}
								</p>
							@endif
						</div>
						<div class="form-group">
							{!! Form::label('Target', 'Target*', ['class' => 'control-label']) !!}
							{!! Form::text('target', old('target'), ['class' => 'form-control', 'placeholder' => '']) !!}
							@if($errors->has('target'))
								<p class="help-block text-danger">
									{{ $errors->first('target') }}
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
	
	<script>
		jQuery(function(){
			jQuery("#deadline_cal").datepicker({ dateFormat: "yy-mm-dd" });
			
			
			//Auto fill the form on selecting the company name
			$('#dealer_id_change').change(function(){
		        var dealer_id = $('#dealer_id_change').find(":selected").val();
				
				//if( $('#dealer_id_change').has('option').length > 0 ) {
				if (dealer_id !== "") 
				{
					console.log("You have selected the country - " + dealer_id);
					//send an ajax and check the record if exists then fill the form
					$.ajax({
						url         : '{{ route("getJobRecordByDealerId", array("_token" => csrf_token())) }}',
						type        : 'POST',
						data        : {'dealer_id':dealer_id},
						dataType    : 'json',
						success: function(res) 
						{
							if(res.status =='1'){
								var fields = res.data; 
								//fill the fields with val
								 $('#customer_name').val(fields.customer_name);
								 $('#contact_name').val(fields.contact_name);
								 $('#phone').val(fields.phone);
								 $('#address').val(fields.address);
								 $('#website').val(fields.website);
							}else{
								$('#customer_name').val('');
								 $('#contact_name').val('');
								 $('#phone').val('');
								 $('#address').val('');
								 $('#website').val('');
							}
						},
						error:   function(res) {console.log(res)}
					});
					
				}else
				{
					console.log('nothing is selected');
				}
			});
		});
	</script>
@stop

