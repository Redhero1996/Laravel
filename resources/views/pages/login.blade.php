@extends('layout.index')
@section('title', 'Login')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>

                <div class="panel-body">

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
                            <div class="form-group">
                                <label for="email" class="col-md-4 control-label">E-Mail Address</label>
                                <input type="email" class="form-control" placeholder="email" name="email" value="{{old('email')}}" >
                                @if($errors->has('email'))
                                    <span style="color: red;"><i>{{$errors->first('email')}}</i></span>
                                @endif
                            </div>
                            <br>    
                            <div class="form-group">
                                <label for="password" class="col-md-4 control-label">Password</label>
                                <input type="password" id="password" class="form-control" name="password" placeholder="password">
                                 @if($errors->has('password'))
                                    <span style="color: red;"><i>{{$errors->first('password')}}</i></span>
                                @endif
                            </div>
                            <br>
                             <div id="remember" class="checkbox">
                                <label>
                                     <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                </label>
                            </div>
                            <button id="btnLogin" type="submit" class="btn btn-primary">Log in
                            </button>

                            <a class="btn btn-link" href="{{ route('password.request') }}"> Forgot Your Password? </a>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
  

@section('script')
    <script>
        $(document).ready(function(){
            $('#formLogin').validate({
                rule:{
                    email:{
                        required: true,
                        email: true,
                    },
                    password:{
                        required:true,
                        minlenght: 6
                    }
                    
                },
                // validate đúng
                submitHandler: function(form){
                    $(form).ajaxSubmit();
                }
            });
        });
    </script>
@endsection

