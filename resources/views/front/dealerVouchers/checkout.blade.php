@extends('layouts.admin-layout')

@section('content')


<div class="container mb-4">
    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th scope="col"> </th>
                            <th scope="col">Product</th>
                            <th scope="col" class="text-center">Quantity</th>
                            <th scope="col" class="text-right">Price</th>
                            <th> </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        //echo "<pre>"; print_r($cart); echo "</pre>"; 
                        foreach ($cart['items'] as $key => $voucherCart) {
                          //  echo "<pre>"; print_r($voucherCart); echo "</pre>"; 
                        }
                        //die; ?>
                    	@if (count($cart) > 0)

							@foreach ($cart['items'] as $key => $voucherCart)

		                        <tr class="voucher_{{$key}}">
		                            <td>
		                            	@if($voucherCart['voucher_image'] != '')
											<img class="img-fluid" src="{{ asset('uploads') }}/{{ $voucherCart['voucher_image'] }}" alt="{{ $voucherCart['voucher_name'] }}" style="height: 50%;width: 50%;">
										@else
											<img class="img-fluid" src='/img/default.jpg' alt="{{ $voucherCart['voucher_name'] }}" style="height: 100px;width: 100px;">	
										@endif
		                            </td>
		                            <td>{{$voucherCart['voucher_name']}}</td>
		                            <td>{{$voucherCart['voucherQuantity']}}</td>
		                            <td class="text-right">£{{ $voucherCart['points'] }}</td>
		                            <td class="text-right"><button class="btn btn-sm btn-danger"><i class="fa fa-trash">Remove</i> </button> </td>
		                        </tr> 
                       		@endforeach
						@endif                       
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>Sub-Total</td>
                            <td class="text-right">£{{ $cart['totalCartValue'] }}</td>
                        </tr>
                        <!-- <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>Shipping</td>
                            <td class="text-right">6,90 €</td>
                        </tr> -->
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><strong>Total</strong></td>
                            <td class="text-right"><strong>£{{ $cart['totalCartValue'] }}</strong></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div><!--#col-12-->

        <!--#shipping address form-->
        <div class="col-12">
            <div class="table-responsive">
                <h3>Shipping Address</h3>
            </div>
        </div>
        
        <div class="col-12">
            <form method="POST" action="{{ url('/dealer/vouchers/place_order') }}" class="form-horizontal">
            @csrf
            <div class="table-responsive">
                <div class="container mb-4">
                  <div class="row">
                  <div class="col-md-12 col-md-offset-12">
                    
                        <!-- Form Name -->
                        <!-- <legend>Address Details</legend> -->

                        <!-- Text input-->
                        <div class="form-group">
                          <label class="col-sm-2 control-label" for="textinput">Street Address</label>
                          <div class="col-sm-12">
                            <input type="text" name="shipping_street" placeholder="Street Address, P.O. box etc" class="form-control">
                            @if($errors->has('shipping_street'))
                                <p class="help-block text-danger">
                                    {{ $errors->first('shipping_street') }}
                                </p>
                            @endif
                          </div>                          
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                          <label class="col-sm-2 control-label" for="textinput">City</label>
                          <div class="col-sm-12">
                            <input type="text" name="shipping_city" placeholder="City" class="form-control">
                            @if($errors->has('shipping_city'))
                                <p class="help-block text-danger">
                                    {{ $errors->first('shipping_city') }}
                                </p>
                            @endif
                          </div>                          
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                          <label class="col-sm-2 control-label" for="textinput">County</label>
                          <div class="col-sm-12">
                            <input type="text" name="shipping_state" placeholder="County" class="form-control">
                            @if($errors->has('shipping_state'))
                                <p class="help-block text-danger">
                                    {{ $errors->first('shipping_state') }}
                                </p>
                            @endif
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-sm-2 control-label" for="textinput">Postcode</label>
                          <div class="col-sm-12">
                            <input type="text" name="shipping_zipcode" placeholder="Post Code" class="form-control">
                            @if($errors->has('shipping_zipcode'))
                                <p class="help-block text-danger">
                                    {{ $errors->first('shipping_zipcode') }}
                                </p>
                            @endif
                          </div>                          
                        </div>
                        <!-- Text input-->
                        <div class="form-group">
                          <label class="col-sm-2 control-label" for="textinput">Country</label>
                          <div class="col-sm-12">
                            <input type="text" name="shipping_country" placeholder="Country" class="form-control">
                            @if($errors->has('shipping_country'))
                                <p class="help-block text-danger">
                                    {{ $errors->first('shipping_country') }}
                                </p>
                            @endif
                          </div>                          
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                          <label class="col-sm-2 control-label" for="textinput">Phone Number</label>
                          <div class="col-sm-12">
                            <input type="text" name="shipping_phoneno" placeholder="Phone Number" class="form-control">
                            @if($errors->has('shipping_phoneno'))
                                <p class="help-block text-danger">
                                    {{ $errors->first('shipping_phoneno') }}
                                </p>
                            @endif
                          </div>
                        </div>
                        <!-- <div class="form-group">
                          <div class="col-sm-offset-2 col-sm-12">
                            <div class="pull-right">
                              <button type="submit" class="btn btn-default">Cancel</button>
                              <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                          </div>
                        </div>s -->
                    
                  </div><!-- /.col-lg-12 -->
                </div><!-- /.row -->
              </div>
            </div>
        <!-- </div>
        <div class="col mb-2"> -->
            <div class="container mb-4">
                <div class="row">
                    <div class="col-sm-12  col-md-6">
                        <!-- <a href="{{ url('/dealer/vouchers') }}" class="btn btn-block btn-light">Continue Shopping</a> -->                    
                    </div>
                    
                    <div class="col-sm-12 col-md-6">                        
                        
                        <button type="submit" class="btn btn-lg btn-block btn-success text-uppercase">Checkout</button>
                    </div>                
                </div>
            </div>
        </div><!--#col mb-2-->
        </form>
    </div>
</div>
@stop