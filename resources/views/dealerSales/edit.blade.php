@extends('layouts.admin-layout')

@section('content')


	<div class="content-wrapper">
		<div class="page-header">
			<h3 class="page-title">
				Sales
			</h3>
			<p>
				<a href="{{ url('dealers/sales/'.$sales->dealer_id) }}" class="btn btn-primary">Back</a>
			</p>
		</div>
		
		<div class="row">
			<div class="col-md-12 grid-margin stretch-card">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title">Edit the sale for {{$sales->sale_month}}  {{$sales->sale_year}}</h4>
						
						{!! Form::model($sales, ['method' => 'PUT', 'route' => ['dealersales.update', $sales->id]]) !!}
												
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
										{!! Form::hidden('dealer_id', old('dealer_id'), ['class' => 'form-control', 'placeholder' => '']) !!}
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

