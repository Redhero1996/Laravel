@extends('admin.layouts.index')
<title>Edit Slide</title>
@section('content')
  <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Slide
                            <small>{{$slide->Ten}}</small>
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
                        <form action="admin/slide/edit/{{$slide->id}}" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">                                                 
                            <div class="form-group">
                                <label>Name</label>
                                <input class="form-control" name="name" placeholder="Please Enter name slide" value="{{$slide->Ten}}" />
                            </div> 
                             <div class="form-group">
                                <label>Image</label>
                                <p>
                                    <img src="upload/slide/{{$slide->Hinh}}" width="200px">
                                </p>
                                <input type="file" name="Hinh" />
                            </div>                                                       
                            <div class="form-group">
                                <label>Content</label>
                                <textarea id="demo" name="NoiDung" rows="10" cols="100">{{$slide->NoiDung}}</textarea>
                            </div>
                           <div class="form-group">
                                <label>Link</label>
                                <input class="form-control" name="link" placeholder="Please Enter link" value="{{$slide->link}}" />
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