@extends('layouts.admin-layout')

@section('content')

<style>.code-display {
    word-wrap: break-word;
    word-break: break-all;
    font-family: 'Source Code Pro', monospace;
    text-align: justify;
    font-size: 12px;
    margin: 12px;
    padding: 12px;
    background: 
    rgba(0,0,0,0.1);
}</style>
<div class="container">
<div class="content-wrapper">
	
	<div class="row">
		<div class="col-12 grid-margin">
			<div class="card">
				<div class="card-body"> 
					<div class="panel-body">
				<div class="pricing-header px-3 py-3 pt-md-4 pb-md-4 mx-auto text-center">
  <h1 class="display-4">Marketing</h1>
  <p class="lead"></p>
</div>
						
						<div class="container">
							
							<div class="card-deck mb-3 text-center">
    <div class="card mb-6 shadow-sm">
      <div class="card-header">
        <h4 class="my-0 font-weight-normal">Kumho Tyre Logo </h4>
      </div>
      <div class="card-body">
		   
		  <img class="img-fluid"  src="../../../public/img/KT-logo.jpg" >
		  
		  

		  <a class="btn btn-danger btn-block" href="../../../public/img/KT-logo.jpg" role="button">Download Logo</a>
      </div>
    </div>

								  <div class="card mb-6 shadow-sm">
      <div class="card-header">
        <h4 class="my-0 font-weight-normal">Kumho Tyre Logo with Strapline</h4>
      </div>
      <div class="card-body">
		   
		  <img class="img-fluid"  src="../../../public/img/KT-logo-ws.jpg" >
		  
		  

		  <a class="btn btn-danger btn-block" href="../../../public/img/KT-logo-ws.jpg" role="button">Download Logo with Strapline</a>
      </div>
    </div>
    
  </div>
							<h2>WEBSITE INFORMATION </h2> <hr>
							
  <div class="card-deck mb-3 text-center">
    <div class="card mb-6 shadow-sm">
      <div class="card-header">
        <h4 class="my-0 font-weight-normal">Kumho Tyre Range </h4>
      </div>
      <div class="card-body">
		   <p> Add the Kumho Tyre range to your site just simply Insert the following HTML into your website's code wherever you'd like the Kumho tyre page: </p>
		  <img class="img-fluid" src="../../../public/img/Tyre-range.jpg" alt=""/> 
       
   <div class="code-display" id="text_copy">&lt;script class='kumho_insertion'&gt;var 
  j=document.createElement('script');j.src='https://kumhomarketing.co.uk/chainloader.js';document.querySelector('head').appendChild(j);delete 
  j;&lt;/script&gt;</div>
		  
		  <a class="btn btn-info btn-block" href="https://kumhomarketing.co.uk/kumho.html" role="button">View Demo page</a>
      </div>
    </div>
	  
<!--	@if ( Auth::user()->role != 4 )
    <div class="card mb-6 shadow-sm">
      <div class="card-header">
        <h4 class="my-0 font-weight-normal">Kumho Warranty</h4>
      </div>
      <div class="card-body">
		   <p>In order to guarantee that your customers get the most out of our tyres, we are delighted to offer a Lifetime Warranty on the Kumho tyres </p>
		  <img class="img-fluid" src="../../../public/img/Tyre-warranty.jpg" alt=""/> 
       
   <div class="code-display" id="text_copy">&lt;script class='kumho_insertion'>var j=document.createElement('script');j.src='https://media.kumhomarketing.co.uk/chainloader2.js';document.querySelector('head').appendChild(j);delete j;&lt;/script&gt;</div>
		  
		  <a class="btn btn-info btn-block" href="https://kumhomarketing.co.uk/tyre-warranty.html" role="button">View Demo page</a>
      </div>
    </div>
	@endif-->
	  
  </div>
					
		<h2>WEB VIDEOS</h2> <hr>	
							<div class="card-deck mb-3 text-center">
    <div class="card mb-4 shadow-sm">
     
      <div class="card-body">
		  <div class="embed-responsive embed-responsive-16by9">
  <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/f48c1dN4fLU" allowfullscreen></iframe>
</div>
		  
      </div>
    </div>
		
								
    <div class="card mb-4 shadow-sm">

      <div class="card-body">
		 
<div class="embed-responsive embed-responsive-16by9">
  <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/0PtAqAjeKpk" allowfullscreen></iframe>
</div>
      </div>
    </div>
								
								   <div class="card mb-4 shadow-sm">

      <div class="card-body">
		  <div class="embed-responsive embed-responsive-16by9">
  <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/imhh8qFr25M" allowfullscreen></iframe>
</div>

      </div>
    </div>

  </div>
							
							<div class="card-deck mb-3 text-center">
    <div class="card mb-4 shadow-sm">
     
      <div class="card-body">
		  <div class="embed-responsive embed-responsive-16by9">
  <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/BP--1BJKyPo" allowfullscreen></iframe>
</div>
		  
      </div>
    </div>
		
								
    <div class="card mb-4 shadow-sm">

      <div class="card-body">
		 
<div class="embed-responsive embed-responsive-16by9">
  <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/MzkgPwKhgDc" allowfullscreen></iframe>
</div>
      </div>
    </div>
								
								   <div class="card mb-4 shadow-sm">

      <div class="card-body">
		  <div class="embed-responsive embed-responsive-16by9">
  <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/m7It1Y5nrXY" allowfullscreen></iframe>
</div>

      </div>
    </div>

  </div>
							<div class="card-deck mb-3 text-center">
    <div class="card mb-4 shadow-sm">
     
      <div class="card-body">
		  <div class="embed-responsive embed-responsive-16by9">
  <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/9ZmEkljyv1U" allowfullscreen></iframe>
</div>
		  
      </div>
    </div>
		
								
    <div class="card mb-4 shadow-sm">

      <div class="card-body">
		 
<div class="embed-responsive embed-responsive-16by9">
  <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/LlYQ4GPhIH4" allowfullscreen></iframe>
</div>
      </div>
    </div>
								
								   <div class="card mb-4 shadow-sm">

      <div class="card-body">
		  <div class="embed-responsive embed-responsive-16by9">
  <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/r1WVCoK4crk" allowfullscreen></iframe>
</div>

      </div>
    </div>

  </div>
	
						<h2>PRODUCT	POSTERS </h2> <hr>
						<div class="card-deck mb-3 text-center">
		
    <div class="card mb-4 shadow-sm">
      <div class="card-header">
        <h4 class="my-0 font-weight-normal">Crugen HP91 Poster</h4>
      </div>
      <div class="card-body">
        <p class="card-title pricing-card-title"></p>
   
		  <img class="img-fluid" src="../../../public/img/Crugen_HP91.jpg" alt=""/> 

      </div>
		  <div class="card-footer text-muted">
            <a href="../../../public/img/Crugen_HP91.jpg">Download</a> </div>
    </div>
								
								
		<div class="card mb-4 shadow-sm">
      <div class="card-header">
        <h4 class="my-0 font-weight-normal">Ecowing ES31 Poster</h4>
      </div>
      <div class="card-body">
        <p class="card-title pricing-card-title"></p>
   
		  <img class="img-fluid" src="../../../public/img/Ecowing_ES31.jpg" alt=""/> 

      </div>
									    <div class="card-footer text-muted">
    <a href="../../../public/img/Ecowing_ES31.jpg">Download</a> </div>

    </div>
								
		  <div class="card mb-4 shadow-sm">
      <div class="card-header">
        <h4 class="my-0 font-weight-normal">Ecsta PS91 Poster</h4>
      </div>
      <div class="card-body">
        <p class="card-title pricing-card-title"></p>
   
		  <img class="img-fluid" src="../../../public/img/Ecsta_PS91.jpg" alt=""/> 

      </div>
			    <div class="card-footer text-muted">
  <a href="../../../public/img/Ecsta_PS91.jpg">Download</a> </div>

							
    </div>						 

    
  </div>						
							
	<div class="card-deck mb-3 text-center">
		
    <div class="card mb-4 shadow-sm">
      <div class="card-header">
        <h4 class="my-0 font-weight-normal">Ecsta PS71 Poster</h4>
      </div>
      <div class="card-body">
        <p class="card-title pricing-card-title"></p>
   
		  <img class="img-fluid" src="../../../public/img/Ecsta_PS71.jpg" alt=""/> 

      </div>
		  <div class="card-footer text-muted">
            <a href="../../../public/img/Ecsta_PS71.jpg">Download</a> </div>
    </div>
								
								
		<div class="card mb-4 shadow-sm">
      <div class="card-header">
        <h4 class="my-0 font-weight-normal">PortTran KC53 Poster</h4>
      </div>
      <div class="card-body">
        <p class="card-title pricing-card-title"></p>
   
		  <img class="img-fluid" src="../../../public/img/PortTran_KC53.jpg" alt=""/> 

      </div>
									    <div class="card-footer text-muted">
    <a href="../../../public/img/PortTran_KC53.jpg">Download</a> </div>

    </div>
								
		  <div class="card mb-4 shadow-sm">
      <div class="card-header">
        <h4 class="my-0 font-weight-normal">Solous4S HA31 Poster</h4>
      </div>
      <div class="card-body">
        <p class="card-title pricing-card-title"></p>
   
		  <img class="img-fluid" src="../../../public/img/Solous4S_HA31.jpg" alt=""/> 

      </div>
			    <div class="card-footer text-muted">
  <a href="../../../public/img/Solous4S_HA31.jpg">Download</a> </div>

							
    </div>						 

    
  </div>
							
							<h2>CAMPAIGN INFORMATION </h2> <hr>
							
	<div class="card-deck mb-3 text-center">
    <div class="card mb-4 shadow-sm">
      <div class="card-header">
        <h4 class="my-0 font-weight-normal">Amazon Voucher Campaign</h4>
      </div>
      <div class="card-body">
        <p class="card-title pricing-card-title"></p>
   
		  <img class="img-fluid" src="../../../public/img/Amazon-vouchers.jpg" alt=""/> 

      </div>
    </div>
								
								  <div class="card mb-4 shadow-sm">
      <div class="card-header">
        <h4 class="my-0 font-weight-normal">Easter Egg Giveaway Campaign</h4>
      </div>
      <div class="card-body">
        <p class="card-title pricing-card-title"></p>
   
		  <img class="img-fluid" src="../../../public/img/Easter.jpg" alt=""/> 

      </div>
    </div>
								
		  <div class="card mb-4 shadow-sm">
      <div class="card-header">
        <h4 class="my-0 font-weight-normal">Love2shop Voucher Campaign</h4>
      </div>
      <div class="card-body">
        <p class="card-title pricing-card-title"></p>
   
		  <img class="img-fluid" src="../../../public/img/Love2shop.jpg" alt=""/> 

      </div>
    </div>						 

    
  </div>
  
	<div class="card-deck mb-3 text-center">
    <div class="card mb-4 shadow-sm">
      <div class="card-header">
        <h4 class="my-0 font-weight-normal">Win Back Campaign</h4>
      </div>
      <div class="card-body">
        <p class="card-title pricing-card-title"></p>
   
		  <img class="img-fluid" src="../../../public/img/Winback.jpg" alt=""/> 

      </div>
    </div>
								
								  <div class="card mb-4 shadow-sm">
      <div class="card-header">
        <h4 class="my-0 font-weight-normal">Money off Tyres Campaign</h4>
      </div>
      <div class="card-body">
        <p class="card-title pricing-card-title"></p>
   
		  <img class="img-fluid" src="../../../public/img/Moneyoff.jpg" alt=""/> 

      </div>
    </div>
								
		  <div class="card mb-4 shadow-sm">
      <div class="card-header">
        <h4 class="my-0 font-weight-normal">Garden Toys </h4>
      </div>
      <div class="card-body">
        <p class="card-title pricing-card-title"></p>
   
		  <img class="img-fluid" src="../../../public/img/SummerToys.jpg" alt=""/> 

      </div>
    </div>						 

    
  </div>		
							
							<div class="card-deck mb-3 text-center">
    <div class="card mb-4 shadow-sm">
      <div class="card-header">
        <h4 class="my-0 font-weight-normal">Campaign Bundles</h4>
      </div>
      <div class="card-body">
        <p class="card-title pricing-card-title"></p>
   
		  <img class="img-fluid" src="../../../public/img/bundle.jpg" alt=""/> 

      </div>
    </div>
								
								  <div class="card mb-4 shadow-sm">
      <div class="card-header">
        <h4 class="my-0 font-weight-normal">Campaign Bundles</h4>
      </div>
      <div class="card-body">
        <p class="card-title pricing-card-title"></p>
   
		  <img class="img-fluid" src="../../../public/img/bundle2.jpg" alt=""/> 

      </div>
    </div>
								
		  <div class="card mb-4 shadow-sm">
      <div class="card-header">
        <h4 class="my-0 font-weight-normal">Digital Screens </h4>
      </div>
      <div class="card-body">
        <p class="card-title pricing-card-title"></p>
   
		  <img class="img-fluid" src="../../../public/img/screen.jpg" alt=""/> 

      </div>
    </div>						 

    
  </div>
							
</div>
				    </div>
				</div>
			</div>
		</div>
	</div>
		
</div>
</div>

@endsection