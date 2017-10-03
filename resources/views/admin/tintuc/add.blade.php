@extends('admin.layouts.index')
<title>Add News</title>
@section('content')
   <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">News
                            <small>Add</small>
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
                        <form action="admin/tintuc/add" method="POST" enctype="multipart/form-data">
                        	<input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="form-group">
                                <label>Category</label>                              
                                <select class="form-control" name="TheLoai" id="TheLoai" onclick="load_ajax()">
                                     @foreach($theloai as $tl)
                                    	<option value="{{$tl->id}}">{{$tl->Ten}}</option>
                                    @endforeach
                                </select>
                            </div>
                             <div class="form-group">
                                <label>Product</label>
                                 <select class="form-control" name="LoaiTin" id="LoaiTin">
                                    @foreach($loaitin as $lt)
                                    	<option value="{{$lt->id}}">{{$lt->Ten}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Title</label>
                                <input class="form-control" name="TieuDe" placeholder="Please Enter Title" />
                            </div>                            
                            <div class="form-group">
                                <label>Summary</label>
                                <textarea name="TomTat" id="demo" class="form-control ckeditor" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Content</label>
                                <textarea id="demo" class="form-control ckeditor" name="NoiDung" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Image</label>
                                <input type="file" name="Hinh" />
                            </div>
                            <div class="form-group">
                                <label>Highlights</label>
                                <label class="radio-inline">
                                    <input name="NoiBat" value="0" checked="" type="radio">No
                                </label>
                                <label class="radio-inline">
                                    <input name="NoiBat" value="1" type="radio">Yes
                                </label>
                            </div>
                            <button type="submit" class="btn btn-default">Add</button>
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
	<script>
		$(document).ready(function(){
			$('#TheLoai').change(function(){
				var idTheLoai = $(this).val();
				// tao va goi 1 trang ajax
				$.get("admin/ajax/loaitin/"+idTheLoai, function(data){
					$("#LoaiTin").html(data);
				});  // lay theloai ve de truyen idTheLoai sang va nhan cai theloai ve
			});
		});
	// function load_ajax(){
	// 	$.ajax({
	// 	    url: 'admin/ajax/loaitin/'+idTheLoai, // gửi ajax đến file result.php
	// 	    type: 'GET', // chọn phương thức gửi là post
	// 	    dataType: 'html', // dữ liệu trả về dạng text
	// 	    data: { // Danh sách các thuộc tính sẽ gửi đi
	// 	        'idTheLoai': $('#TheLoai').val()
	// 	    },
		   
	// 	    success: function(data) {
	// 	        $("#LoaiTin").html(data);
	// 	    },
	// 	    error: function() {
	// 	        alert('Có lỗi trong quá trình xử lý');
	// 	    }
	// 	});
	// }
    
	</script>
@endsection
	