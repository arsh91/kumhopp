@extends('layouts.admin-layout')

@section('content')


<div class="content-wrapper">
  <div class="container mt-3">
    <div class="page-header">
      <h4 class="page-title mb-4 text-right"> Hi <span style="color:red; font-weight: bold;"> {{Auth::user()->first_name.' '.Auth::user()->last_name}} </span>, Welcome to your KPP dashboard </h4>
      <hr>
    </div>
    <div class="row">
      <div class="col-md-8">
        <h3>Sixth Place Finish for Tony Jardine &amp; Dominic Tobin at WRGB </h3>
        <p> Pushing up through the places during the final three stages of the Wales Rally GB, an incredible sixth-place finish for Motor Sport Digital Editor, Dominic Tobin and motorsport media man, Tony Jardine. </p>
        <p>Delighted after his debut, Tobin explained how he enjoyed his first rally experience. </p>
		   <p><a href="/news" class="btn btn-secondary " role="button" aria-pressed="true">Read More</a></p>
		  
      </div>
      <div class="col-md-46"><img src="https://kumhotyre.co.uk/wp-content/uploads/2019/10/Tony-Jardine-and-Dominic-Tobin-celebrate-at-the-finish-of-WRGB.-300x200.jpg" class="img-fluid rounded  img-hover-zoom" alt="Latest News"> </div>
    </div>
	  
	  <hr>
    <div class="card-deck" style="width:400px;">
      <!--<div class="card"> <img src="../../../../public/img/bg-image.png" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Diversified Suppliers</h5>
<!--          <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
-->        <!--</div>
        <div class="card-footer"> <small class="text-muted"><a href="/suppliers/">Take me there</a></small> </div>
      </div>-->
      <div class="card"> <img src="../../../../public/img/2.jpg" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Marketing</h5>
     <!--     <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>-->
        </div>
        <div class="card-footer"> <small class="text-muted"><a href="/marketing/">Take me there</a></small> </div>
      </div>
      <!--<div class="card"> <img src="../../../../public/img/3.jpg" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Kumho Store </h5>
     <!--     <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>-->
        <!--</div>
        <div class="card-footer"> <small class="text-muted"><a href="/dealer/vouchers/">Take me there</a></small> </div>
      </div>-->
    </div>
  <!--    <div class="card-deck mt-3">
      <div class="card"> <img src="../../../../public/img/bg-image.png" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Downloads</h5>
          <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
        </div>
        <div class="card-footer"> <small class="text-muted">Last updated 3 mins ago</small> </div>
      </div>
      <div class="card"> <img src="../../../../public/img/bg-image.png" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">My Kumho Activity</h5>
          <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
        </div>
        <div class="card-footer"> <small class="text-muted">Last updated 3 mins ago</small> </div>
      </div>
      <div class="card"> <img src="../../../../public/img/bg-image.png" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Latest News and Updates </h5>
          <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
        </div>
        <div class="card-footer"> <small class="text-muted">Last updated 3 mins ago</small> </div>
      </div>
    </div>-->
	  
	  
<!--    <div class="row">

      <div class="col-md-12 card text-white bg-dark mt-4 ">
		  

  <div class="card-header">
    <h3>Current Promotion</h3>
  </div>
 
    <p class="card-text">		  <img src="../../../../public/img/ThisMonthsOffer_v1.jpg" class="img-fluid rounded mb-5" alt="Current Kumho Promotion ">
</p>


		  
      </div>
    </div>-->
  </div>
</div>
@endsection