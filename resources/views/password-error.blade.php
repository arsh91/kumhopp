<!DOCTYPE html>
<html lang="en">

@include('layouts.admin-header-css')

<body class="login-page" style="background:url('{{ url('/public/img/bg-image.png') }}') no-repeat center center fixed; -webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover;">
  <div class="container-scroller">
    <div class="container-fluid">
        <div class="content-wrapper align-items-center auth">
            <div class="row w-100">
              <div class="col-lg-8 mx-auto" style="background-color:#ededed;">
                <div class="auth-form-light text-left p-5">
			        <div class="flex-center position-ref full-height">
						<div style="text-align:center;"> 
							@if ($errors->any())
								<div class="alert alert-danger">
									<ul>
										@foreach ($errors->all() as $error)
											<li>{{ $error }}</li>
										@endforeach
									</ul>
								</div>
							@endif
						</div>
						<p class="account"><a href="{{ url('/login') }}">Back</a></p>
			        </div>
			    </div>
			</div>
		</div>
	</div>
</div>
</div>
</body>
</html>
