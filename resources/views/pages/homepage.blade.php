@extends('layouts.index')
@section('title', 'Homepage')
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
	            		<h2 style="margin-top:0px; margin-bottom:0px;">News</h2>
	            	</div>

	            	<div class="panel-body">
	            		<!-- item -->
	            		@foreach($theloai as $tl)
	            			@if(count($tl->loaitin) > 0)
							    <div class="row-item row">
				                	<h3>
				                		<a href="">{{$tl->Ten}}</a> | 	
				                		@foreach($tl->loaitin as $lt)
				                		<small><a href="loaitin/{{$lt->id}}/{{$lt->TenKhongDau}}.html"><i>{{$lt->Ten}}</i></a>/</small>
				                		@endforeach
				                	</h3>
				                	<?php 
				                		// lấy ra 5 tin tức nổi bật ms nhất
				                		$data = $lt->tintuc->where('NoiBat', 1)->sortByDesc('created_at')->take(5);
				                		// lấy ra 1 tin. trong data chỉ còn 4 tin. trả về kiểu mảng
				                		$tin1 = $data->shift();

				                	 ?>
				                	<div class="col-md-8 border-right">
				                		<div class="col-md-5">
					                        <a href="tintuc/{{$tin1['id']}}/{{$tin1['TieuDeKhongDau']}}.html">
					                            <img class="img-responsive" src="upload/tintuc/{{$tin1['Hinh']}}" alt="">
					                        </a>
					                    </div>

					                    <div class="col-md-7">
					                       <a style="color: #000" href="tintuc/{{$tin1['id']}}/{{$tin1['TieuDeKhongDau']}}.html">
					                    		<h4><strong><i>{{$tin1['TieuDe']}}</i></strong></h4>
					                    	</a>
					                        <p>{{$tin1['TomTat']}}</p>
					                    </div>
				                	</div>
				                    

									<div class="col-md-4">
										<!-- Goi all cac tin con lai -->
										@foreach($data->all() as $tintuc)
										<a href="tintuc/{{$tintuc['id']}}/{{$tintuc['TieuDeKhongDau']}}.html">
											<h4>
												<span class="glyphicon glyphicon-list-alt"></span>
												{{$tintuc['TieuDe']}}
											</h4>
										</a>
										@endforeach
									</div>
									
									<div class="break"></div>
				                </div>
				            @endif
				        @endforeach        
		                <!-- end item -->

					</div>
	            </div>
        	</div>
        </div>
        <!-- /.row -->
    </div>
    <!-- end Page Content -->
@endsection