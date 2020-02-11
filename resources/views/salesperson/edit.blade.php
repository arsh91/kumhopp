@extends('layouts.admin-layout')

@section('content')

	<div class="content-wrapper">
		<div class="page-header">
			<h3 class="page-title">
				 Create Sales Person Account
			</h3>
			<p>
				<a href="{{ url('/salesperson/allsalesperson') }}" class="btn btn-primary">@lang('Sales Person List')</a>
			</p>
		</div>
		<div class="card">
			<div class="card-body">
			
				{!! Form::model($salesPersonData, ['method' => 'PUT', 'route' => ['salesperson.update', $salesPersonData->id]]) !!}


				<div class="panel panel-default">
					<div class="panel-body">
						<div class="form-group">
							{!! Form::label('Select Dealer', 'Select Dealer*', ['class' => 'control-label']) !!}
							<select name="dealer_id[]" width="100%" id="dealer_id" class="form-control" multiple="multiple" data-oldVal = "{{ $alreadySeleDealer }}">
								<option value="0">Select Dealer</option>
								@forelse($dealerList as $key => $dealer)
								<option value="{{ $dealer->id }}">{{ $dealer->company_name }}</option> 
								@empty @endforelse 
							</select>
							
							@if($errors->has('dealer_id'))
								<p class="help-block text-danger">
									{{ $errors->first('dealer_id') }}
								</p>
							@endif
						</div>
						<div class="form-group">
							{!! Form::label('First Name', 'First Name*', ['class' => 'control-label']) !!}
							{!! Form::text('first_name', old('first_name'), ['class' => 'form-control', 'placeholder' => '']) !!}
							@if($errors->has('first_name'))
								<p class="help-block text-danger">
									{{ $errors->first('first_name') }}
								</p>
							@endif
						</div>
						<div class="form-group">
							{!! Form::label('Last Name', 'Last Name*', ['class' => 'control-label']) !!}
							{!! Form::text('last_name', old('last_name'), ['class' => 'form-control', 'placeholder' => '']) !!}
							@if($errors->has('last_name'))
								<p class="help-block text-danger">
									{{ $errors->first('last_name') }}
								</p>
							@endif
						</div>
						<div class="form-group">
							{!! Form::label('email', 'Email*', ['class' => 'control-label']) !!}
							{!! Form::text('email', old('email'), ['class' => 'form-control', 'placeholder' => '']) !!}
							@if($errors->has('email'))
								<p class="help-block text-danger">
									{{ $errors->first('email') }}
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
    //alert('here');
$(document).ready(function() {
	//alert('here');
	var $eventSelect = $("#dealer_id");
	
	//Select2 on Agency Dropdown 
	$eventSelect.select2({
		placeholder: "Select Dealer",
		allowClear: true
	});
	
	var carrierFilterSel = new Array();
	carrierFilterSel[0] = $('#dealer_id').attr('data-oldVal');
	console.log(JSON.parse(carrierFilterSel[0]));
	//$('#dealer_id').select2('val', ["value1", "value2", "value3"]);
	$("#dealer_id").select2("val", [JSON.parse(carrierFilterSel[0])]);
})
 </script>
@stop