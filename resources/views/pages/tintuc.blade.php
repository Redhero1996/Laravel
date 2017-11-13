 @extends('layouts.index')
@section('title', 'Detail')
 @section('content')
 <!-- Page Content -->
    <div class="container">
        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-9">

                <!-- Blog Post -->

                <!-- Title -->
                <h1>{{$tintuc->TieuDe}}</h1>

                <!-- Author -->
                <p class="lead">
                    by <a href="#">Admin</a>
                </p>

                <!-- Preview Image -->
                <img class="img-responsive" src="upload/tintuc/{{$tintuc->Hinh}}" alt="{{$tintuc->TieuDe}}" style="width: 900px; height: 300px;">

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span> Posted on: {{$tintuc->created_at}}</p>                
                <hr>
                <!-- Post Content -->
                <p class="lead">{!! $tintuc->NoiDung!!}</p>
                
                <hr>
                <!-- Blog Comments -->

              

                <!-- Comment -->
                <div class="wrap-comment">
                    
                    @foreach($tintuc->comment as $cmt)
                        
                            <div class="media" id="{{$cmt->id}}">
                                @if(Auth::user()->id == $cmt->user->id)
                                    <div class="glyphicon glyphicon-remove" id="{{$cmt->id}}" style="float: right; color: gray"></div>
                                @endif    
                                    <a class="pull-left" href="#">
                                        <img class="media-object" src="{{$cmt->user->avatar}}" alt="" style="width: 50px; height: 50px">
                                    </a>
                                    <div class="media-body">
                                        <h4 class="media-heading" >
                                            <strong style="color: #0066ff; font-family:Arial Black, Gadget, sans-serif; font-size: 15px">{{$cmt->user->name}}</strong>
                                            <?php  
                                                $created_at = new DateTime($cmt->created_at);
                                                $time_zone = new DateTimeZone('Asia/Ho_Chi_Minh');
                                                $created_at->setTimezone($time_zone);

                                            ?>
                                            <small>{{$created_at->format('m/d/Y, h:i:s A ')}}</small>
                                        </h4>
                                        <span>{{$cmt->NoiDung}}</span>
                                    </div>
                                 
                            </div> 
                    
                    @endforeach
                   
                </div>
                
                 <hr>
                <div class="sum-comment" style="font-size: 15px">                                           
                    <span style="margin-left: 0px">{{$count}} </span><div class="glyphicon glyphicon-comment"></div>
                    <span style="margin-left: 30px">{{$count}} </span><div class="glyphicon glyphicon-heart-empty"></div>
                </div>

                   
                <!--   -->
                <!-- Comments Form -->
                 @if(Auth::user())
                    <div class="well">
                        <h4>Comment <span class="glyphicon glyphicon-pencil" ></span></h4>
                        <form action="comment/{{$tintuc->id}}" method="post" role="form" id="add_comment">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group">
                                <textarea class="form-control" rows="3"></textarea>
                            </div>
                            <button type="button" id="submit" class="btn btn-primary">Post</button>
                        </form>
                    </div>
                @endif                               
               
                <!-- Posted Comments -->
                
                    <div id="fb-root"></div>

                    <div class="fb-comments" data-href="https://developers.facebook.com/docs/plugins/comments#configurator" data-numposts="5"></div>


                
            </div>
        
      <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-3">

                <div class="panel panel-default">
                    <div class="panel-heading"><b>Relates News</b></div>
                    <div class="panel-body">
                    	@foreach($tinlienquan as $tt)
                        <!-- item -->
                        <div class="row" style="margin-top: 10px;">
                            <div class="col-md-5">
                                <a href="tintuc/{{$tt->id}}/{{$tt->TieuDeKhongDau}}.html">
                                    <img class="img-responsive" src="upload/tintuc/{{$tt->Hinh}}" alt="">
                                </a>
                            </div>
                            <div class="col-md-7">
                                <a href="tintuc/{{$tt->id}}/{{$tt->TieuDeKhongDau}}.html"><b>{{$tt->TieuDe}}</b></a>
                            </div>
                            <p style="padding-left: 5px;">{!!$tt->TomTat !!}</p>
                            <div class="break"></div>
                        </div>
                        <!-- end item -->
                        @endforeach
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading"><b>Hot News</b></div>
                    <div class="panel-body">
                    	@foreach($tinnoibat as $tt)
                        <!-- item -->
                        <div class="row" style="margin-top: 10px;">
                            <div class="col-md-5">
                                <a href="tintuc/{{$tt->id}}/{{$tt->TieuDeKhongDau}}.html">
                                    <img class="img-responsive" src="upload/tintuc/{{$tt->Hinh}}" alt="">
                                </a>
                            </div>
                             <div class="col-md-7">
                                <a href="tintuc/{{$tt->id}}/{{$tt->TieuDeKhongDau}}.html"><b>{{$tt->TieuDe}}</b></a>
                            </div>
                            <p style="padding-left: 5px;">{!!$tt->TomTat !!}</p>
                            <div class="break"></div>
                        </div>
                        <!-- end item -->
                        @endforeach
                    </div>
                </div>
                
            </div>

        </div>
        <!-- /.row -->
    </div>
    <!-- end Page Content -->
@endsection

@section('script')
    <script>
        $(document).ready(function(){
            $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });

            // Add comment
            $('#submit').click(function(e){
            //    alert("sf");
                e.preventDefault(); //  ngăn cản trình duyệt thực thi hành động mặc định.
                var NoiDung = $('textarea').val();               

                // alert(NoiDung);
                $.ajax({                                      
                    url: 'comment/'+{{$tintuc->id}} ,
                    type: "POST",
                    data: {noiDung: NoiDung}, // data: dl client gui di
                   // datatype: 'json',
                    success: function(data){ // data: dl server tra ve                         
                        var created_at = new Date().toLocaleString('en-US', {timeZone: 'Asia/Ho_Chi_Minh'});
                        // var time = $.format.Date(created_at,"Y-m-d H:i:s");              
                        // console.log(time);

                        var comment_id = data.comment.id;                    
                        var avatar = data.comment.user.avatar;
                        var name = data.comment.user.name;
                        var nd = data.comment.NoiDung;

                         var comment =`<div class="media" id="${comment_id}">
                            <div class="glyphicon glyphicon-remove" id="${comment_id}" style="float: right; color: gray"></div>
                            <a class="pull-left" href="#">
                                <img class="media-object" src="${avatar}" alt="" style="width: 50px; height: 50px">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading">
                                    <strong style="color: #0066ff; font-family:Arial Black, Gadget, sans-serif; font-size: 15px">${name}</strong>
                                    <small>${created_at}</small>
                                </h4>
                                <span>${nd}</span>
                            </div>
                        </div> `;

                       $('.wrap-comment').append(comment);
                       $('textarea').val('');
                       $('.sum-comment').html(`<div class="count" style="font-size: 15px">                                           
                        <span>${data.count} </span style="margin-left: 0px"><div class="glyphicon glyphicon-comment"></div>
                        <span style="margin-left: 30px">${data.count} </span><div class="glyphicon glyphicon-heart-empty"></div>
                    </div>`);
                       
                  
                    }
                });

            });

            // Delete comment 
           $('.glyphicon-remove').each(function(){
                var btn = this;
                $(btn).click(function(){

                    $.ajax({
                        url: 'tintuc/'+{{$tintuc->id}}+'/comment/'+btn.id,
                        type: "POST",
                        data: {id:btn.id},
                        success: function(data){
                            $('.media#'+btn.id).hide(600);
                            $('.sum-comment').html(`<div class="sum-comment" style="font-size: 15px">                                           
                                <span>${data.count} </span style="margin-left: 0px"><div class="glyphicon glyphicon-comment"></div>
                                <span style="margin-left: 30px">${data.count} </span><div class="glyphicon glyphicon-heart-empty"></div>
                            </div>`);
                        }
                    });
                });
           });

        });

//    (function(d, s, id) {
//   var js, fjs = d.getElementsByTagName(s)[0];
//   if (d.getElementById(id)) return;
//   js = d.createElement(s); js.id = id;
//   js.src = 'https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.10&appId=268051390385233';
//   fjs.parentNode.insertBefore(js, fjs);
// }(document, 'script', 'facebook-jssdk'));
    </script>
@endsection
