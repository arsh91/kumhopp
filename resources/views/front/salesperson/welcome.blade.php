@extends('layouts.admin-layout')

@section('content')


<div class="content-wrapper">
  <div class="container mt-3">
    <div class="page-header">
      <h4 class="page-title mb-4 text-right"> Hi <span style="color:red; font-weight: bold;"> {{Auth::user()->first_name.' '.Auth::user()->last_name}} </span>, Welcome to your KPP dashboard </h4>
      <hr>
    </div>
	   
	  
 
  </div>
</div>
@endsection