@extends('layouts.res_layout')
@section('navbar-brand', 'Redeem Voucher')
@section('content')

 <script type="text/javascript">
 	$(document).ready(function() {
	 	swal({ 
	 	  title: "Success",
	 	   text: "You have redeemed this voucher",
	 	    type: "sucess" 
	 	  },
	 	  function(){
	 	    window.location.href = '/';
	 	})
	 });
 </script>
@endsection