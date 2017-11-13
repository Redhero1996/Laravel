 @extends('layouts.index')
@section('title', 'Acount')
 @section('content')
 <!-- Page Content -->
    <div class="container" style="height: 90%">

    	<!-- slider -->
    	<div class="row carousel-holder">
            <div class="col-md-2">
            </div>
            <div class="col-md-8">
                <div class="panel panel-default">
				  	<div class="panel-heading">Account Information</div>				  	 
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
                            <div class="alert alert-success">
                                {{session('notification')}}
                            </div>
                        @endif
				    	<form action="user/{{Auth::user()->id}}" method="POST" enctype="multipart/form-data">
				    		<input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div>
                                <label>Avatar</label>                               
                                    <p>
                                        <img src="{{Auth::user()->avatar}}" style="width: 200px; height: 200px; ">                                      
                                    </p>                               
                                <input type="file" name="image" />
                            </div><br>       
				    		<div>
				    			<label>UserName</label>
							  	<input type="text" class="form-control" placeholder="Username" name="name" aria-describedby="basic-addon1" value="{{Auth::user()->name}}">
							</div>
							<br>
							<div>
				    			<label>Email</label>
							  	<input type="email" class="form-control" placeholder="Email" name="email" aria-describedby="basic-addon1" value="{{Auth::user()->email}}" 
							  	readonly 
							  	>
							</div>
							<br>	
							<div>
								<input type="checkbox" class="" name="checkpassword" id="checkpassword">
				    			<label>Change your password</label>
							  	<input type="password" class="form-control password" name="password" aria-describedby="basic-addon1" disabled>
							</div>
							<br>
							<div>
				    			<label>Reset your password</label>
							  	<input type="password" class="form-control password" name="passwordAgain" aria-describedby="basic-addon1" disabled>
							</div>
							<br>
							<button type="submit" class="btn btn-primary">Edit
							</button>

				    	</form>
				  	</div>
				</div>
            </div>
            <div class="col-md-2">
            </div>
        </div>
        <!-- end slide -->
    </div>
    <!-- end Page Content -->
@endsection

@section('script')
    <script >
        $(document).ready(function(){
            $('#checkpassword').change(function(){
                if($(this).is(':checked')){
                    $('.password').removeAttr('disabled');
                }else{
                    $('.password').attr('disabled', '');
                }
            });
        });
    </script>
@endsection