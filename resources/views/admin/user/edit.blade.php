@extends('admin.layouts.index')
<title>Edit Users</title>
 @section('content')

  <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">User
                            <small>{{$user->name}}</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
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
                        <form action="admin/user/edit/{{$user->id}}" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">   
                             <div class="form-group">
                                <label>Image</label>
                                <p>
                                    <img src="upload/users/{{$user->image}}" style="width: 200px; height: 200px">
                                </p>
                                <input type="file" name="image" />
                            </div>                 
                            <div class="form-group">
                                <label>Name</label>
                                <input class="form-control" name="name" placeholder="Please enter username" value="{{$user->name}}" />
                            </div>                                                     
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" placeholder="Please enter email" value="{{$user->email}}" readonly="" />
                            </div>
                           <div class="form-group">
                                <input type="checkbox" name="changePassword" id="changePassword">
                                <label> Change password</label>
                                <input type="password" class="form-control password" name="password" placeholder="Please enter password" disabled="" />
                            </div> 
                            <div class="form-group">
                                <label>Enter password again</label>
                                <input type="password" class="form-control password" name="passwordAgain" placeholder="Please enter password" disabled="" />
                            </div> 
                            <div class="form-group">
                                <label>Level</label>
                               <label class="radio-inline">
                                    <!-- Kiem tra da dc check chua -->
                                    <input name="quyen" value="0" 
                                        @if($user->quyen == 0)
                                            {{'checked'}}
                                        @endif
                                      type="radio">User
                                </label>
                                <label class="radio-inline">
                                    <input name="quyen" value="1" 
                                         @if($user->quyen == 1)
                                            {{'checked'}}
                                        @endif
                                    type="radio">Admin
                                </label>
                            </div>
                            <button type="submit" class="btn btn-default">Edit</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
@endsection         

@section('script')
    <script >
        $(document).ready(function(){
            $('#changePassword').change(function(){
                if($(this).is(':checked')){
                    $('.password').removeAttr('disabled');
                }else{
                    $('.password').attr('disabled', '');
                }
            });
        });
    </script>
@endsection