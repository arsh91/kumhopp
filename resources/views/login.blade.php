<!DOCTYPE html>
<html lang="en">
	
	<style>
* {
  box-sizing: border-box;
}

body {
  margin: 0;
  font-family: Arial;
  font-size: 17px;
}

#myVideo {
  position: fixed;
  right: 0;
  bottom: 0;
  min-width: 100%; 
  min-height: 100%;
}

.content {
  position: fixed;
  bottom: 0;
  background: rgba(0, 0, 0, 0.5);
  color: #f1f1f1;
  width: 100%;
  padding: 20px;
}

#myBtn {
  width: 200px;
  font-size: 18px;
  padding: 10px;
  border: none;
  background: #000;
  color: #fff;
  cursor: pointer;
}

#myBtn:hover {
  background: #ddd;
  color: black;
}
</style>


<video autoplay muted loop id="myVideo">
  <source src="../../public/img/KumhoTyreUK.mp4" type="video/mp4">
  Your browser does not support HTML5 video.
</video>

<div class="content">
  <h2>Welcome to Kumho Tyre Performance Partner Portal </h2>
  <p>We have developed our new online platform to provide you with a one stop shop for all your Kumho brand marketing requirements. Whether you need to know how close you are to an incentive target, download product images, check on the latest news or order electronic goods from our store – this is your go-to site.</p>
  <button id="myBtn" onclick="myFunction()">Pause</button>
</div>

<script>
var video = document.getElementById("myVideo");
var btn = document.getElementById("myBtn");

function myFunction() {
  if (video.paused) {
    video.play();
    btn.innerHTML = "Pause";
  } else {
    video.pause();
    btn.innerHTML = "Play";
  }
}
</script>

@include('layouts.admin-header-css')

<body class="login-page" style="background:url('{{ url('/public/img/bg-image.png') }}') no-repeat center center fixed; -webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover;">
  <div class="container-scroller">
    <div class="container-fluid">
      <div class="content-wrapper align-items-center auth">
        <div class="row w-100 mt-5">
          <div class="col-lg-4 mx-auto rounded" style="background-color:#333;">
            <div class="auth-form-light text-left p-5">
				<img class="img-fluid p-5" src="{{ url('/public/img/Kumho_PP_logo_White.png') }}" />
				<!--<h4>Kumhopp Admin Login</h4-->
              
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

              <form method="post" action="{{ url('/login') }}">
                 @csrf
                <div class="form-group">
                  <input type="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Email" name="email">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password" name="password"> 
                </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn" style="background-color:#e30613;color:#fff;">SIGN IN</button>
                </div>
                <p class="account text-white"><a class="text-white" href="{{ url('/forgot-password') }}">Forgot Password?</a></p>

              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  @include('layouts.admin-footor-js')
</body>

</html>
