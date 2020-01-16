<!DOCTYPE html>
<html lang="en">
	@include('layouts.admin-header-css')
	<body>
	  <div class="container-scroller">
		@include('layouts.admin-dashboard-header')
		
		<div class="container-fluid page-body-wrapper">
		  <div class="main-panel">
			 @yield('content')
		  </div>
		  <!-- main-panel ends -->
		</div>
		<!-- page-body-wrapper ends -->
	  </div>
	  <!-- container-scroller -->
	  @include('layouts.admin-footor-js')
	  @yield('js_content')
	</body>

</html>
