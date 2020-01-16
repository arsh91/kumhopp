@extends('layouts.admin-layout')

@section('content')
  <div class="container mb-4">
      <div class="row">
      <div class="col-md-12 col-md-offset-12">
        <form action="{{ url('/dealer/vouchers/place_order', $voucher->id) }}" method="POST" class="form-horizontal" role="form">
          @csrf
          <fieldset>

            <!-- Form Name -->
            <legend>Address Details</legend>

            <!-- Text input-->
            <div class="form-group">
              <label class="col-sm-2 control-label" for="textinput">Street Address</label>
              <div class="col-sm-10">
                <input type="text" name="shipping_street" placeholder="Street Address, P.O. box etc" class="form-control">
              </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
              <label class="col-sm-2 control-label" for="textinput">City</label>
              <div class="col-sm-10">
                <input type="text" name="shipping_city" placeholder="City" class="form-control">
              </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
              <label class="col-sm-2 control-label" for="textinput">State</label>
              <div class="col-sm-10">
                <input type="text" name="shipping_state" placeholder="State" class="form-control">
              </div>

              <label class="col-sm-2 control-label" for="textinput">Postcode</label>
              <div class="col-sm-10">
                <input type="text" name="shipping_zipcode" placeholder="Post Code" class="form-control">
              </div>
            </div>
            <!-- Text input-->
            <div class="form-group">
              <label class="col-sm-2 control-label" for="textinput">Country</label>
              <div class="col-sm-10">
                <input type="text" name="shipping_country" placeholder="Country" class="form-control">
              </div>
            </div>
            <!-- Text input-->
            <div class="form-group">
              <label class="col-sm-2 control-label" for="textinput">Phone Number</label>
              <div class="col-sm-10">
                <input type="text" name="shipping_phoneno" placeholder="Phone Number" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <div class="pull-right">
                  <button type="submit" class="btn btn-default">Cancel</button>
                  <button type="submit" class="btn btn-primary">Save</button>
                </div>
              </div>
            </div>

          </fieldset>
        </form>
      </div><!-- /.col-lg-12 -->
    </div><!-- /.row -->
  </div>
@stop