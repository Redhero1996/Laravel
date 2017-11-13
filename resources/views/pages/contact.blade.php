@extends('layouts.index')  
@section('title', 'Contact')
@section('content')
  <!-- Page Content -->
    <div class="container">

    	<!-- slider -->
    	@include('layouts.slide')
        <!-- end slide -->

        <div class="space20"></div>


        <div class="row main-left">
            @include('layouts.menu')

            <div class="col-md-9">
	            <div class="panel panel-default">            
	            	<div class="panel-heading" style="background-color:#337AB7; color:white;" >
	            		<h2 style="margin-top:0px; margin-bottom:0px;">Contact</h2>
	            	</div>

	            	<div class="panel-body">
	            		<!-- item -->
                        <h3><span class="glyphicon glyphicon-align-left"></span> Infomation</h3>
					    
                        <div class="break"></div>
					   	<h4><span class= "glyphicon glyphicon-home "></span> Address : </h4>
                        <p>Los Angeles, California, USA</p>

                        <h4><span class="glyphicon glyphicon-envelope"></span> Email : </h4>
                        <p>herogustin1996@gmail.com</p>

                        <h4><span class="glyphicon glyphicon-phone-alt"></span> Telphone : </h4>
                        <p>+84 69694326543 </p>



                        <br><br>
                        <h3><span class="glyphicon glyphicon-globe"></span> Map</h3>
                        <div class="break"></div><br>
                        <iframe src="https://www.google.com/maps/embed?Los+Angeles+City+Attorney/@34.053138,-118.2447127,17z/data=!4m12!1m6!3m5!1s0x0:0x70b582b6e9a0ec1c!2sLos+Angeles+City+Attorney!8m2!3d34.053138!4d-118.242524!3m4!1s0x0:0x70b582b6e9a0ec1c!8m2!3d34.053138!4d-118.242524" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                       
	            </div>
        	</div>
        </div>
        <!-- /.row -->
    </div>
    <!-- end Page Content -->
@endsection    