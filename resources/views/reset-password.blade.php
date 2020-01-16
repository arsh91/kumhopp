<!DOCTYPE html>
<html lang="en">

@include('layouts.admin-header-css')

<body class="login-page" style="background:url('{{ url('/public/img/bg-image.png') }}') no-repeat center center fixed; -webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover;">
    <div class="container-scroller">
        <div class="container-fluid">
            <div class="content-wrapper align-items-center auth">
                <div class="row w-100 mt-5">
                  <div class="col-lg-4 mx-auto" style="background-color:#333;">
                    <div class="auth-form-light text-left p-5">
				<img class="img-fluid p-5" src="{{ url('/public/img/Kumho_PP_logo_White.png') }}" />
                            <div class="account-section">    
                                <div class="account-form">
                                    <div class="account-form-inner">                                        
                                        <div id="exTab1" class="container-fluid passwordReset"> 					
										<form class="form-horizontal" method="POST" action="{{ route('reset-password') }}">
										@if ($errors->any())
											<div class="alert alert-danger">
												<ul>
													@foreach ($errors->all() as $error)
														<li>{{ $error }}</li>
													@endforeach
												</ul>
											</div>
										@endif											
												{{ csrf_field()}}

												<input type="hidden" name="token" value="{{ $token }}" />
												<div class="tab-content clearfix">
													<div class="tab-pane active" id="1a">
														<div class="tab-pane-inner">
															<div class="form-group">
																<input id="password" type="password" class="form-control form-control-lg" placeholder="Enter Password" name="password" required>
															</div>
															
															<div class="form-group">							
																<input id="password-confirm" type="password" class="form-control form-control-lg" placeholder="Confirm Password" name="password_confirmation" required>
															</div>
															<div class="form-group">
															  <button type="submit" class="loginbtn btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn" style="background-color:#e30613;color:#fff;">Reset Password</button>
															</div>
															<p class="account text-white"><a class="text-white" href="{{ url('/login') }}">Forgot Password?</a></p>
														</div>
													</div>
												</div>
											</form>
										</div><!-- account form inner -->
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		@include('layouts.admin-footor-js')
	</body>
</html>