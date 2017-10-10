
 <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{url('/homepage')}}">Laravel News</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="about">About</a>
                    </li>
                    <li>
                        <a href="contact">Contact</a>
                    </li>
                </ul>

                <form action="search" method="POST" class="navbar-form navbar-left" role="search">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
			        <div class="form-group">
			          <input type="text" name="keyword" class="form-control" placeholder="Search">
			        </div>
			        <button type="submit" class="btn btn-default">Search</button>
			    </form>

			    <ul class="nav navbar-nav pull-right">
                    <!-- nếu k tồn tại biến ng dùng : isset() để ktra điều đó -->
                    @if(!Auth::user())
                        <li>
                            <a href="{{ route('register') }}">Sign up</a>
                        </li>
                        <li>
                            <a href="{{ route('login') }}">Sign in</a>
                        </li>
                    @else
                        <li>
                        	<a href="user">
                        		<img src="upload/users/{{Auth::user()->image}}" style="width: 25px; height: 25px; border-radius: 50% 50%;">
                        		{{Auth::user()->name}}
                        	</a>
                        </li>

                        <li>
                        	<a href="logout">Log out</a>
                        </li>
                    @endif
                </ul>
            </div>


            
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>