 @extends('layout.index')
 <title>Search</title>
 @section('content')
 <!-- Page Content -->
    <div class="container">
        <div class="row">
            @include('layout.menu')

            <?php function changeColor($str, $keyword){
            	return str_replace($keyword, "<span style= 'color:red'><strong><i>$keyword</strong></i></span>", $str);
            } ?>


            <div class="col-md-9 ">
                <div class="panel panel-default">
                    <div class="panel-heading" style="background-color:#337AB7; color:white;">
                        <h4><b>Search: {{$keyword}}</b></h4>
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
	                            <h3>{!!changeColor($tt->TieuDe, $keyword)!!}</h3>
	                            <p>{!!changeColor($tt->TomTat, $keyword)!!}</p>
	                            <a class="btn btn-primary" href="tintuc/{{$tt->id}}/{{$tt->TieuDeKhongDau}}.html">Detail<span class="glyphicon glyphicon-chevron-right"></span></a>
	                        </div>
	                        <div class="break"></div>
	                    </div>
                    @endforeach

                    <!-- Phân trang -->
                  {{$tintuc->links()}}  

                    
                </div>
            </div> 

        </div>

    </div>
    <!-- end Page Content -->

@endsection