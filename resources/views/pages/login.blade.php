@extends('layout.index')
<title>Sign in</title>

@section('content')
<!-- Page Content -->
    <div class="container" style="height: 90%">

    	<!-- slider -->
    	<div class="row carousel-holder">
    		<div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="panel panel-default">
				  	<div class="panel-heading">Sign In</div>
				  	<div class="panel-body">
				  		 <!-- In error -->
                        @if(count($errors) > 0)
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $err)
                                    {{$err}}<br>
                                @endforeach
                            </div>
                        @endif

                        <!-- In message -->
                        @if(session('notification'))
                            <div class="alert alert-danger">
                                {{session('notification')}}
                            </div>
                         <!-- In message -->
                        @elseif(session('created'))
                            <div class="alert alert-success">
                                {{session('created')}}
                            </div>
                        @endif
				    	<form action="login" method="POST">
				    		<input type="hidden" name="_token" value="{{csrf_token()}}">
							<div>
				    			<label>Email</label>
							  	<input type="email" class="form-control" placeholder="Email" name="email" 
							  	>
							</div>
							<br>	
							<div>
				    			<label>Password</label>
							  	<input type="password" class="form-control" name="password">
							</div>
							<br>
							<button type="submit" class="btn btn-primary">Log in
							</button>
				    	</form>
				  	</div>
				</div>
            </div>
            <div class="col-md-4"></div>
        </div>
        <!-- end slide -->
    </div>
    <!-- end Page Content -->
@endsection   