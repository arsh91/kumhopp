@inject('request', 'Illuminate\Http\Request')   
   <!-- partial:partials/_navbar.html -->
   	<nav style="border-bottom: 7px solid #ed2024" class="navbar navbar-expand-lg navbar-dark bg-dark">
		<a  class="navbar-brand img-fluid" href="{{url('/')}}"><img class="col-md-4 col-sm-2" src="{{ url('/public/img/Kumho_PP_logo_White.png') }}" /></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNav">
			<ul class="nav navbar-nav ml-auto">
				<!--<li class="nav-item active">
					<a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
				</li-->
				<li style="display:none;">
				<?php print_r(Auth::user()->role); ?>
				</li>
							
					<li>
						<a class="nav-link" href="{{ url('/') }}">
							<span class="menu-title">Home</span>
							<i class="mdi mdi-contacts menu-icon"></i>
						</a>
					</li>
				@if ( Auth::user()->role == 1 )
					<li class="{{ $request->segment(1) == 'dealers' ? 'active' : '' }} nav-item">
							<a class="nav-link" href="{{ route('dealers.index') }}">
							<span class="menu-title">Dealers</span>
							<i class="mdi mdi-contacts menu-icon"></i>
						</a>
					</li>
					<li class="{{ $request->segment(1) == 'salesperson' ? 'active' : '' }} nav-item">
							<a class="nav-link" href="{{ url('salesperson/allsalesperson') }}">
							<span class="menu-title">Sales Person</span>
							<i class="mdi mdi-contacts menu-icon"></i>
						</a>
					</li>
					<!--<li>
						<a class="nav-link" href="{{ route('pages.index') }}">
							<span class="menu-title">Pages</span>
							<i class="mdi mdi-contacts menu-icon"></i>
						</a>
					</li>-->
					<!--<li>
						<a class="nav-link" href="{{ route('dealercontents.index') }}">
							<span class="menu-title">Dealer Content</span>
							<i class="mdi mdi-contacts menu-icon"></i>
						</a>
					</li>-->
	
				
					<li class="{{ $request->segment(1) == 'jobs' ? 'active' : '' }} nav-item">
						<a class="nav-link" href="{{ url('/jobs') }}">
							<span class="menu-title">Jobs</span>
							<i class="mdi mdi-contacts menu-icon"></i>
						</a>
					</li>
				
					<li class="{{ $request->segment(1) == 'vouchers' ? 'active' : '' }} nav-item">
						<a class="nav-link" href="{{ url('/vouchers') }}">
							<span class="menu-title">Vouchers</span>
							<i class="mdi mdi-contacts menu-icon"></i>
						</a>
					</li>			
					
					<li class="{{ $request->segment(1) == 'suppliers' ? 'active' : '' }} nav-item">
						<a class="nav-link" href="{{ url('/suppliers') }}">
							<span class="menu-title">Diversified Suppliers</span>
							<i class="mdi mdi-contacts menu-icon"></i>
						</a>
					</li>
					<li class="{{ $request->segment(1) == 'marketing' ? 'active' : '' }} nav-item">
						<a class="nav-link" href="{{ url('/marketing') }}">
							<span class="menu-title">Marketing</span>
							<i class="mdi mdi-contacts menu-icon"></i>
						</a>
					</li>
					<li class="{{ $request->segment(1) == 'downloads' ? 'active' : '' }} nav-item">
						<a class="nav-link" href="{{ url('/downloads') }}">
							<span class="menu-title">Tyre Information</span>
							<i class="mdi mdi-contacts menu-icon"></i>
						</a>
					</li>
					
					<li>
						<a class="nav-link" href="{{ url('/logout') }}">
							<span class="menu-title">Logout</span>
							<i class="mdi mdi-contacts menu-icon"></i>
						</a>
					</li>
				@elseif ( Auth::user()->role == 2 )
					
				
					<!--<li>
						<a class="nav-link" href="{{ url('/') }}">
							<span class="menu-title">Home</span>
							<i class="mdi mdi-contacts menu-icon"></i>
						</a>
					</li>-->
				
				
				<li>
						<a class="nav-link" href="{{ url('/') }}">
							<span class="menu-title">News</span>
							<i class="mdi mdi-contacts menu-icon"></i>
						</a>
					</li>
				
					<li>
						<a href="{{ url('http://kos.kumhotyre.co.uk/nosuk/') }}" target="new" class="nav-link">
							<span class="menu-title">KOS</span>
							
						</a>
					</li>
				
				
					<li class="{{ $request->segment(1) == 'dealerJobs' ? 'active' : '' }} nav-item">
						<a class="nav-link" href="{{ url('/dealerJobs') }}">
							<span class="menu-title">Activity</span>
							<i class="mdi mdi-contacts menu-icon"></i>
						</a>
					</li>
					<li>
						<a class="nav-link" href="{{ url('/dealer/vouchers') }}">
							<span class="menu-title"><i class="fas fa-shopping-basket"></i> Store</span>
							<i class="mdi mdi-contacts menu-icon"></i>
						</a>
					</li>
					
					<li class="{{ $request->segment(1) == 'suppliers' ? 'active' : '' }} nav-item">
						<a class="nav-link" href="{{ url('/suppliers') }}">
							<span class="menu-title">Diversified Suppliers</span>
							<i class="mdi mdi-contacts menu-icon"></i>
						</a>
					</li>
					<li>
						<a class="nav-link" href="{{ url('/marketing') }}">
							<span class="menu-title">Marketing</span>
							<i class="mdi mdi-contacts menu-icon"></i>
						</a>
					</li>
					<li>
						<a class="nav-link" href="{{ url('/downloads') }}">
							<span class="menu-title">Tyre Information</span>
							<i class="mdi mdi-contacts menu-icon"></i>
						</a>
					</li>
					
					<li>
						<a class="nav-link" href="{{ url('/logout') }}">
							<span class="menu-title">Logout</span>
							<i class="mdi mdi-contacts menu-icon"></i>
						</a>
					</li>
				@elseif ( Auth::user()->role == 3 )
					<li class="{{ $request->segment(1) == 'salespersonjobs' ? 'active' : '' }} nav-item">
						<a class="nav-link" href="{{ url('/salespersonjobs') }}">
							<span class="menu-title">Jobs</span>
							<i class="mdi mdi-contacts menu-icon"></i>
						</a>
					</li>
					<li class="{{ $request->segment(1) == 'salespersondealers' ? 'active' : '' }} nav-item">
						<a class="nav-link" href="{{ url('/salespersondealers') }}">
							<span class="menu-title">Dealers</span>
							<i class="mdi mdi-contacts menu-icon"></i>
						</a>
					</li>
					<li class="{{ $request->segment(1) == 'marketing' ? 'active' : '' }} nav-item">
						<a class="nav-link" href="{{ url('/marketing') }}">
							<span class="menu-title">Marketing</span>
							<i class="mdi mdi-contacts menu-icon"></i>
						</a>
					</li>
					<li class="{{ $request->segment(1) == 'downloads' ? 'active' : '' }} nav-item">
						<a class="nav-link" href="{{ url('/downloads') }}">
							<span class="menu-title">Tyre Information</span>
							<i class="mdi mdi-contacts menu-icon"></i>
						</a>
					</li>
					<li>
						<a class="nav-link" href="{{ url('/logout') }}">
							<span class="menu-title">Logout</span>
							<i class="mdi mdi-contacts menu-icon"></i>
						</a>
					</li>
				@elseif ( Auth::user()->role == 4 )
					<li>
						<a class="nav-link" href="{{ url('/news') }}">
							<span class="menu-title">News</span>
							<i class="mdi mdi-contacts menu-icon"></i>
						</a>
					</li>
					<li>
						<a class="nav-link" href="{{ url('/marketing') }}">
							<span class="menu-title">Marketing</span>
							<i class="mdi mdi-contacts menu-icon"></i>
						</a>
					</li>
					<li>
						<a class="nav-link" href="{{ url('/downloads') }}">
							<span class="menu-title">Tyre Information</span>
							<i class="mdi mdi-contacts menu-icon"></i>
						</a>
					</li>
					
					<li>
						<a class="nav-link" href="{{ url('/logout') }}">
							<span class="menu-title">Logout</span>
							<i class="mdi mdi-contacts menu-icon"></i>
						</a>
					</li>
				@else
					sale person
				@endif
				
				<!--
				@if ( Auth::user()->isAdmin())
					
				
				@else-->
					<!-- <li>
						<a class="nav-link" href="javascript:void(0)">
							<span class="menu-title">Hi {{Auth::user()->first_name.' '.Auth::user()->last_name}}</span>
							<i class="mdi mdi-contacts menu-icon"></i>
						</a>						
					</li> -->
				<!--@endif
				-->
				
					
					
					
			</ul>
		</div>
	</nav>
    <!-- partial -->
	<div class="mb-5" style="background:url('{{ url('/public/img/Kumho_Cover_v1.jpg') }}') no-repeat  bottom  fixed; -webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover; height:200px" ></div>