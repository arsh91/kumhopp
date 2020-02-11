@extends('layouts.admin-layout')

@section('content')


	<div class="content-wrapper">
		<div class="page-header">
			<h3 class="page-title">
				Jobs
			</h3>
			<p>
				<a href="{{ route('jobs.index') }}" class="btn btn-primary">Jobs List</a>
			</p>
		</div>
		
		<div class="row">
			<div class="col-md-12 grid-margin stretch-card">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title">Edit</h4>
						{!! Form::model($jobs, ['method' => 'PUT', 'route' => ['jobs.update', $jobs->id]]) !!}
												
							<div class="panel panel-default">
								<div class="panel-body">
									<div class="form-group">
										{!! Form::label('dealer_id', 'Assign Company*', ['class' => 'control-label']) !!}
										{!! Form::select('dealer_id', $dealers, old('dealer_id'), ['class' => 'form-control']) !!}
										
										@if($errors->has('dealer_id'))
											<p class="help-block text-danger">
												{{ $errors->first('dealer_id') }}
											</p>
										@endif
									</div>
									<div class="form-group">
										{!! Form::label('Customer Full Name', 'Customer Full Name*', ['class' => 'control-label']) !!}
										{!! Form::text('customer_name', old('customer_name'), ['class' => 'form-control', 'placeholder' => '']) !!}
										@if($errors->has('customer_name'))
											<p class="help-block text-danger">
												{{ $errors->first('customer_name') }}
											</p>
										@endif
									</div>
									<div class="form-group">
										{!! Form::label('Contact Name', 'Contact Name*', ['class' => 'control-label']) !!}
										{!! Form::text('contact_name', old('contact_name'), ['class' => 'form-control', 'placeholder' => '']) !!}
										@if($errors->has('contact_name'))
											<p class="help-block text-danger">
												{{ $errors->first('contact_name') }}
											</p>
										@endif
									</div>
									<div class="form-group">
										{!! Form::label('Contact Phone', 'Contact Phone*', ['class' => 'control-label']) !!}
										{!! Form::text('phone', old('phone'), ['class' => 'form-control', 'placeholder' => '']) !!}
										@if($errors->has('phone'))
											<p class="help-block text-danger">
												{{ $errors->first('phone') }}
											</p>
										@endif
									</div>
									<div class="form-group">
										{!! Form::label('Contact Full Address', 'Contact Full Address*', ['class' => 'control-label']) !!}
										{!! Form::textarea('address', old('address'), ['class' => 'form-control', 'placeholder' => '', 'rows'=>5]) !!}
										@if($errors->has('address'))
											<p class="help-block text-danger">
												{{ $errors->first('address') }}
											</p>
										@endif
									</div>
									<div class="form-group">
										{!! Form::label('Contacts Website', 'Contacts Website', ['class' => 'control-label']) !!}
										{!! Form::text('website', old('website'), ['class' => 'form-control', 'placeholder' => '']) !!}
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
										{!! Form::label('Sell-In/Out', 'Sell-In/Out', ['class' => 'control-label']) !!}
										{!! Form::select('sell_status', array('0'=>'Sell-Out', '1'=>'Sell-In'), old('sell_status'),['class' => 'form-control sell_status_select']) !!}
										@if($errors->has('sell_status'))
											<p class="help-block text-danger">
												{{ $errors->first('sell_status') }}
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
									<div class="form-group" id="targetField" style="display:none;">
										{!! Form::label('Target', 'Target', ['class' => 'control-label']) !!}
										{!! Form::text('target', old('target'), ['class' => 'form-control', 'placeholder' => '']) !!}
										@if($errors->has('target'))
											<p class="help-block text-danger">
												{{ $errors->first('target') }}
											</p>
										@endif
									</div>
									<div class="form-group" id="rewardField" style="display:none;">
										{!! Form::label('Reward Per Tyre', 'Reward Per Tyre', ['class' => 'control-label']) !!}
										{!! Form::text('reward_per_tyre', old('target'), ['class' => 'form-control', 'placeholder' => '']) !!}
										@if($errors->has('reward_per_tyre'))
											<p class="help-block text-danger">
												{{ $errors->first('reward_per_tyre') }}
											</p>
										@endif
									</div>
									<div class="form-group" id="campaign_start_date_field">
										{!! Form::label('Campaign Start Date', 'Campaign Start Date', ['class' => 'control-label']) !!}
										{!! Form::text('campaign_start_date', old('campaign_start_date'), ['class' => 'form-control', 'placeholder' => '', 'id'=>'campaign_start_date_cal']) !!}
										@if($errors->has('campaign_start_date'))
											<p class="help-block text-danger">
												{{ $errors->first('campaign_start_date') }}
											</p>
										@endif
									</div>
									<div class="form-group" id="campaign_end_date_field">
										{!! Form::label('Campaign End Date', 'Campaign End Date', ['class' => 'control-label']) !!}
										{!! Form::text('campaign_end_date', old('campaign_end_date'), ['class' => 'form-control', 'placeholder' => '', 'id'=>'campaign_end_date_cal']) !!}
										@if($errors->has('campaign_end_date'))
											<p class="help-block text-danger">
												{{ $errors->first('campaign_end_date') }}
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
	
	<script>
		jQuery(function(){
			
			//also check on page load
			var selStatusSell = $('.sell_status_select').find(":selected").val();
			
			if(selStatusSell == 1){
				$('#targetField').show();
				$('#rewardField').show();
				//$("#campaign_start_date_field").hide();
				//$("#campaign_end_date_field").hide();
				
			}
			
			//show some fields on change of sell-in/output_add_rewrite_var
			$('.sell_status_select').change(function(){
				var sell_status_val = $('.sell_status_select').find(":selected").val();
				console.log(sell_status_val);
				
				//CASE I :- if sell-in is selected
				if(sell_status_val == 1){
					$('#targetField').show();
					$('#rewardField').show();
					//$("#campaign_start_date_field").hide();
					//$("#campaign_end_date_field").hide();
				}else{
					$('#targetField').hide();
					$('#rewardField').hide();
					//$("#campaign_start_date_field").show();
					//$("#campaign_end_date_field").show();
				}
			});
			
						
			//datepicker for #campaign_end_date_cal
			
			$("#campaign_start_date_cal").datepicker({
				dateFormat: "yy-mm-dd",
				minDate: 0,
				onSelect: function () {
					var dt2 = $('#campaign_end_date_cal');
					var startDate = $(this).datepicker('getDate');
					//add 30 days to selected date
					startDate.setDate(startDate.getDate() + 30);
					var minDate = $(this).datepicker('getDate');
					var dt2Date = dt2.datepicker('getDate');
					//difference in days. 86400 seconds in day, 1000 ms in second
					var dateDiff = (dt2Date - minDate)/(86400 * 1000);

					//dt2 not set or dt1 date is greater than dt2 date
					if (dt2Date == null || dateDiff < 0) {
							dt2.datepicker('setDate', minDate);
					}
					//dt1 date is 30 days under dt2 date
					else if (dateDiff > 30){
							dt2.datepicker('setDate', startDate);
					}
					//sets dt2 maxDate to the last day of 30 days window
					dt2.datepicker('option', 'maxDate', startDate);
					//first day which can be selected in dt2 is selected date in dt1
					dt2.datepicker('option', 'minDate', minDate);
				}
			});
			$('#campaign_end_date_cal').datepicker({
				dateFormat: "yy-mm-dd",
				minDate: 0
			});	
			
			jQuery("#deadline_cal").datepicker({ dateFormat: "yy-mm-dd" });
		});
	</script>
@stop

