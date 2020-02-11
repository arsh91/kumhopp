@extends('layouts.admin-layout')

@section('content')

	<div class="content-wrapper">		
		<div class="page-header" style="margin-bottom: 10px;">
			
			<div class="container">
				<div class="row">
					@if(session()->has('message'))
					    <div class="col-lg-12 alert alert-danger">
					        {{ session()->get('message') }}
					    </div>
					@endif
				</div>
				<div class="row">					
					<div class="col">
						<h3 class="page-title">
							KPP Store 
						</h3>						
					</div>
					<div class="col text-right">
						<h3 class="page-title">
							Your Current balance is {{$userPoints}} Credits.
						</h3>
					</div>
				</div>
			</div>	 
		</div>		
		

		<div class="container">
		<div class="row">
          @if (count($vouchers) > 0)
			@foreach ($vouchers as $voucher)
			<div class="col-lg-4 col-md-6 mb-4">
				<div class="card h-100">
				 <div class="card-body">  <h4 class="card-title">
				      <a class="text-dark" href="#">{{ $voucher->voucher_name }}</a>
				    </h4><a href="#">
				  	@if($voucher->voucher_image != '')
						<img class="img-fluid" src="{{ asset('uploads') }}/{{ $voucher->voucher_image }}" alt="{{ $voucher->voucher_name }}" height="250px">
					@else
						<img class="img-fluid" src='/img/default.jpg' alt="{{ $voucher->voucher_name }}" height="250px">	
					@endif
				  </a>
				  
				   
				    
				    <p class="card-text"><?php echo str_limit(strip_tags($voucher->voucher_description), 100); ?></p>
				  </div>
				  <div class="card-footer">
				    <!--<small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>-->
				    <!--<h5>£{{ $voucher->points }}</h5>-->
				    <div class="container">
						
						<form action="{{ url('/dealer/vouchers/addtocart', $voucher->id) }}" method="POST" >
							@csrf
							<div class="row">
								<div class="col-lg-4 col-md-2 mb-4">£{{ $voucher->points }}</div>
								<div class="col-lg-4 col-md-2 mb-4">
									<select name="item_quantity" style="max-width: 100%;">
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
										<option value="5">5</option>
									</select>
								</div>
								<div class="col-lg-4 col-md-2 mb-4">
									<button type="submit" class="btn btn-success" name="add_to_cart">Add</button>
								</div>
							</div>
						{!! Form::close() !!}
					</div><!---#cart container--->
				  </div>
				</div>
			</div>
			@endforeach
			@else
			<div class="col-lg-4 col-md-6 mb-4">
				<div class="card h-100">
					Nor Record Found!
				</div>
			</div>
		@endif
      </div>
	</div>
</div>
@stop