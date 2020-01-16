@extends('layouts.admin-layout')

@section('content')

	<div class="content-wrapper">
		<div class="page-header">
			<h3 class="page-title">
				 Create Sale
			</h3>
			<p>
				<a href="{{ url('dealers/sales/'.$dealer_id) }}" class="btn btn-primary">Back</a>
			</p>
		</div>
		<div class="card">
			<div class="card-body">
			
				{!! Form::open(['method' => 'POST', 'route' => ['dealersales.store']]) !!}

				<div class="panel panel-default">
					<div class="panel-body">
						<div class="form-group">
							{!! Form::label('Sale Figure', 'Sale Figure*', ['class' => 'control-label']) !!}
							{!! Form::text('sale_figure', old('sale_figure'), ['class' => 'form-control', 'placeholder' => '']) !!}
							@if($errors->has('sale_figure'))
								<p class="help-block text-danger">
									{{ $errors->first('sale_figure') }}
								</p>
							@endif
						</div>
						<div class="form-group">
							{!! Form::label('Sale Month', 'Sale Month*', ['class' => 'control-label']) !!}
							<select id="month" name="sale_month" class="form-control">
								<option value=''>--Select Month--</option>
								<option value='Janaury'>Janaury</option>
								<option value='February'>February</option>
								<option value='March'>March</option>
								<option value='April'>April</option>
								<option value='May'>May</option>
								<option value='June'>June</option>
								<option value='July'>July</option>
								<option value='August'>August</option>
								<option value='September'>September</option>
								<option value='October'>October</option>
								<option value='November'>November</option>
								<option value='December'>December</option>
							</select>
							@if($errors->has('sale_month'))
								<p class="help-block text-danger">
									{{ $errors->first('sale_month') }}
								</p>
							@endif
						</div>
						
						<div class="form-group">
							{!! Form::label('Sale Year', 'Sale Year*', ['class' => 'control-label']) !!}
							<select name="sale_year" id="year" class="form-control">
								<option value="">--Select Year--</option>
							</select>
							@if($errors->has('sale_year'))
								<p class="help-block text-danger">
									{{ $errors->first(sale_year) }}
								</p>
							@endif
						</div>
						
						<div class="form-group">
							<input type="hidden" value={{$dealer_id}} name="dealer_id" />
						</div>
					</div>
				</div>

				{!! Form::submit('Save', ['class' => 'btn btn-danger']) !!}
				{!! Form::close() !!}
			</div>
		</div>
	</div>

	<script type="text/javascript">
	for(y = 2000; y <= 2030; y++) {
			var optn = document.createElement("OPTION");
			optn.text = y;
			optn.value = y;
			
			// if year is 2015 selected
			/*if (y == 2015) {
				optn.selected = true;
			}*/
			
			document.getElementById('year').options.add(optn);
	}
	</script>
@stop
