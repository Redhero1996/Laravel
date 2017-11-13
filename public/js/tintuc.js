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
                         var created_at = data.comment.created_at;  
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
                       $('#sum-comment').html(data.count+ ' Comment');
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
                            $('#sum-comment').html(data.count+ ' Comment');
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