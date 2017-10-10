 @extends('layouts.index')
<title>About</title>
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
	            		<h2 style="margin-top:0px; margin-bottom:0px;">About</h2>
	            	</div>

	            	<div class="panel-body">
	            		<!-- item -->
	            		<img width="720" height="61" src="http://thelostangles.com/wp-content/uploads/2014/11/HiweareLAs.png" class=" vc_box_border_grey attachment-full" alt="HiweareLAs">
					   <p style="text-align: center;">
					   	The focus of the Lost Angles’ design process is discovering the unique characteristics of our client’s needs that guide the design decisions from concept to completion. We love bringing ideas to reality! 
					   </p>
						<h1 style="text-align: center;">LOST ANGLES</h1>
						<p style="text-align: center;">Each person on our team brings a variety of talents, passions, and experiences to the table. In addition, we have developed working relationships with an extensive list of artists and craftspeople that help drive our creative potential as a company.
						</p>	
						<h1 style="text-align: center;">LOST ANGLES</h1>
						<p style="text-align: center;">This ultimately creates individual design solutions that promote brands, products, and services. We cultivate meaningful connections with our clients and believe that honest business and innovative design go hand in hand.
						</p>	
						<h1 style="text-align: center;">LOST ANGLES</h1>
						<p style="text-align: center;">We make things happen.</p>

					   	
					  

					</div>
	            </div>
        	</div>
        </div>
        <!-- /.row -->
    </div>
    <!-- end Page Content -->


@endsection    