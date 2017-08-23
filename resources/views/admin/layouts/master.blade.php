<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>CVM | Admin Console</title>


        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <!-- Styles -->
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <style>
            html, body {
                background-color: #fff;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            title.a{
              color: #636b6f;
            }

            .content{

              display: block;
              width:100%;
            }


            .full-height {
                height: 60vh;
            }

            .flex-center {
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                /*text-align: center;*/
                height:100%;
            }

            .height{
              height:100%;
            }

            .title {
                font-size: 75px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-top: 50px;
            }


            /* sidebar */
            .sidebar1 {
    background: #F17153;
    /* For browsers that do not support gradients */
    background: -webkit-linear-gradient(#F17153, #F58D63, #f1ab53);
    /* For Safari 5.1 to 6.0 */
    background: -o-linear-gradient(#F17153, #F58D63, #f1ab53);
    /* For Opera 11.1 to 12.0 */
    background: -moz-linear-gradient(#F17153, #F58D63, #f1ab53);
    /* For Firefox 3.6 to 15 */
    background: linear-gradient(#F17153, #F58D63, #f1ab53);
    /* Standard syntax */
    padding: 0px;
    min-height: 100%;
}

.logo>a img {
    margin-top: 30px;
    padding: 3px;
    border: 3px solid white;
    border-radius: 100%;
}
.list,a {
    color: #fff;
    list-style: none;
    padding-left: 0px;
}

.list> li, h5 {
    padding: 5px 0px 5px 40px;
}
.list>li:hover {
    background-color: rgba(255, 255, 255, 0.2);
    border-left: 5px solid white;
    color: white;
    font-weight: bolder;
    padding-left: 35px;}

.left-navigation a:hover,a:focus {
    color: #FFFFFF;
    text-decoration: none;
  }

.hiddenblank{
    display: inline-block;
    vertical-align: top;
}


        </style>
    </head>
    <body>
            <div class="content">

              <div class="height">


            <div class="col-md-2 col-sm-4 sidebar1" id="sticker">
                <div class="logo">
                    <a href="/admin"><img src="https://static.comicvine.com/uploads/square_small/11/114183/5147868-bart_simpson.png" width="40%" class="img-responsive center-block" alt="profile"></a>
                </div><br>

                <div class="left-navigation">
                    <ul class="list">
                        <h5><strong>User Management</strong></h5>
                        <li><a href="{{ url('admin/users/') }}">Users</a></li>
                        <li><a href="{{ url('admin/users/create') }}">Create User</a></li>

                    </ul>

                    <br>

                    <ul class="list">
                        <h5><strong>Applications</strong></h5>
                        <li><a href="{{ url('admin/jobs') }}">Job Announcements</a></li>
                        <li><a href="{{ url('admin/jobs/create') }}">Create Announcement</a></li>
                        <li><a href="{{ url('admin/comments') }}">Manage Comments</a></li>
                        <li><a href="{{ url('admin/applications') }}">Candidates</a></li>
                      </ul>
                </div>
            </div>
        <div class="col-md-10 position-ref">

                <div class="top-right links">{{date('d-m-Y')}} | <strong>Laravel:</strong> {{ App::VERSION() }}
                        <a href="{{ url('/admin') }}">Hello, {{ Auth::user()->name }}</a>
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>

                </div>


            <div class="content">
                <div class="title m-b-md">
                    CV Manager
                </div>

                @if(Session::has('flash_message'))
           <div class="alert alert-success">
               {{ Session::get('flash_message') }}
           </div>
                @endif

                <div> @yield('content') </div>
                <div class="m-b-md col-lg-12"> <hr>(C) 2017 </div><br>
            </div>
        </div>
</div>
        </div>

    </body>
</html>
