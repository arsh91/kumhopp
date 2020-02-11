@extends('layouts.admin-layout')

@section('content')


<div class="content-wrapper">
  <div class="container mt-3">
    <div class="page-header">
      <h4 class="page-title mb-4 text-right"> Hi <span style="color:red; font-weight: bold;"> {{Auth::user()->first_name.' '.Auth::user()->last_name}}</span>, welcome to your Kumho Performance Partner dashboard </h4>
      <hr>
    </div>
	  
	  
	  	<h5 class="card-title">Latest News</h5>
	  <div class="card-deck">
		  
      <div class="card"> <img src="../../../../public/img/n2.jpg" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Talking tyres with Tottenham</h5>
     <p class="card-text">Kumho recently capitalised on its unique relationship as Official Tyre Partner to Tottenham Hotspur by holding an all-embracing conference for some of its key customers at the Premier League football club’s new stadium.</p>
       </div>
        <div class="card-footer"> <small class="text-muted"><a href="{{ route('news2') }}">Read more </a></small> </div>
      </div>
      <div class="card"> <img src="../../../../public/img/n1.jpg" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Kumho receive even more awards.</h5>
         <p class="card-text">In recent years, the products of the ever-innovative Korean tyre producer Kumho have received a number of iF, Red Dot, IDEA and Good Design awards.</p>
        </div>
        <div class="card-footer"> <small class="text-muted"><a href="{{ route('news3') }}">Read more </a></small> </div>
      </div>
      <div class="card"> <img src="../../../../public/img/n3.jpg" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Sixth Place Finish for Tony</h5>
     <p class="card-text">Pushing up through the places during the final three stages of the Wales Rally GB, an incredible sixth-place finish for Motor Sport Digital Editor, Dominic Tobin and motorsport media man, Tony Jardine. </p>
        </div>
        <div class="card-footer"> <small class="text-muted"><a href="{{ route('news') }}">Read more </a></small> </div>
      </div>
    </div>

	  <h5 class="card-title mt-3">Quick Links</h5>
	  <hr>
    <div class="card-deck">
      <div class="card"> <img src="../../../../public/img/bg-image.png" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Diversified Suppliers</h5>
<!--          <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
-->        </div>
        <div class="card-footer"> <small class="text-muted"><a href="/suppliers/">Take me there</a></small> </div>
      </div>
      <div class="card"> <img src="../../../../public/img/2.jpg" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Marketing</h5>
     <!--     <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>-->
        </div>
        <div class="card-footer"> <small class="text-muted"><a href="/marketing/">Take me there</a></small> </div>
      </div>
      <div class="card"> <img src="../../../../public/img/3.jpg" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Kumho Store </h5>
     <!--     <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>-->
        </div>
        <div class="card-footer"> <small class="text-muted"><a href="/dealer/vouchers/">Take me there</a></small> </div>
      </div>
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