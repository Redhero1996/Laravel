 

    $(document).ready(function(){

        // Add comment
        $('#submit').click(function(e){
             e.preventDefault(); //  ngăn cản trình duyệt thực thi hành động mặc định.
            $.ajax({
                type: 'POST',
                url: 'comment/'+ {{ $tintuc->id }},
                data: {
                   _token: '{{ csrf_token() }}',
                   NoiDung : $('textarea').val(),
                },
                success: function(data){
                   $('.wrap-comment').appendTo(data);
                    $('textarea').val('');
                }
            });

        });

        // Remove comment
        $('#remove').on('click', function(){
            
             $.ajax({
                type: 'POST',
                url: 'comment/'+ {{$tintuc->id}},
                data:{
                    _token: '{{csrf_token()}}',
                    NoiDung: $('.media').val(),
                },
                 success: function(data){
                   $('.wrap-comment').removeClass(data);
                    
                }
             });
        });
    });