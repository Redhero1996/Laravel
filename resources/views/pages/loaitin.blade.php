 @extends('layouts.index')
@section('title', 'Category')
 @section('content')
 <!-- Page Content -->
    <div class="container">
        <div class="row">
            @include('layouts.menu')
            <div class="col-md-9 ">
                <div class="panel panel-default">
                    <div class="panel-heading" style="background-color:#337AB7; color:white;">
                        <h4><b>{{$loaitin->Ten}}</b></h4>
                    </div>
                   @foreach($tintuc as $tt)
	                    <div class="row-item row">                   
	                        <div class="col-md-3">
			                            <a href="tintuc/{{$tt->id}}/{{$tt->TieuDeKhongDau}}.html">
			                                <br>
			                                <img width="200px" height="200px" class="img-responsive" src="upload/tintuc/{{$tt->Hinh}}" alt="">
			                            </a>
			                 </div>

	                        <div class="col-md-9">
	                            <a href="tintuc/{{$tt->id}}/{{$tt->TieuDeKhongDau}}.html" style="color: #000">
                                    <h3><strong><i>{{$tt->TieuDe}}</i></strong></h3>
                                </a>
	                            <p>{{$tt->TomTat}}</p>
                            </div>
                           
	                        <div class="break"></div>
	                    </div>
                    @endforeach

                    <!-- Phân trang -->
                    <div style="text-align: center;">
                    	{{$tintuc->links()}}
                    </div>                    
                </div>
            </div> 

        </div>

    </div>
    <!-- end Page Content -->

@endsection