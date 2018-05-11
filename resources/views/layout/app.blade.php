<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <link rel="icon" type="image/png" href="{{ URL::asset('img/favicon.ico') }}">

    <!--     Fonts and icons     -->
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,300,700' rel='stylesheet' type='text/css'>
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/nucleo-icons.css') }}">

    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/paper-kit.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/style.css')}}">
    
     
    <title>Alumni | @yield('title')</title>
</head>

<body>
  
    <nav class="navbar navbar-expand-md fixed-top bg-foot">
        <div class="container">
            <div class="navbar-translate">
                <button class="navbar-toggler navbar-toggler-right navbar-burger" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-bar"></span>
                    <span class="navbar-toggler-bar"></span>
                    <span class="navbar-toggler-bar"></span>
                </button>
                <a class="navbar-brand" href="#" style="font-size: 20px;">Alumni</a>
            </div>
            <div class="collapse navbar-collapse" id="navbarToggler">
                <ul class="navbar-nav ml-auto" id="navside">
             
                    <li class="nav-item"><a class="nav-link" href="/">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link" href="/forum">Forum</a></li>
                    <li class="nav-item"><a class="nav-link" href="/status">Alumni</a></li>
        
                    <li class="nav-item"><a class="nav-link" href="/bukutamu">Buku tamu</a></li>
                    @if(Route::has('login'))
                        @if (Auth::check())
                    <div class="nav-item dropdown" >
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" id="dropdownMenuButton" href="#pk" role="button" aria-haspopup="true" aria-expanded="false">Postingan</a>
                        <ul class="dropdown-menu dropdown-menu-right dropdown-info" aria-labelledby="dropdownMenuButton">
                            <li class="dropdown-header">Postingan</li>
                            
                            <a class="dropdown-item" href="{{ route('forum.create')}}">Tuis Forum [admin/users]</a>
                            @if(Auth::user()->level==0)
                            <a class="dropdown-item" href="{{ route('berita.create')}}">Tulis Artikel [admin]</a>
                            <a class="dropdown-item" href="/kategori">Kategori Forum [admin]</a>
                            <a class="dropdown-item" href="/alumni">Data Alumni [admin]</a>
                            <a class="dropdown-item" href="{{ route('bukutamu1.index')}}">Bukutamu [admin]</a>
                            @endif
                           
                        </ul>
                    </div>
                    
                    <div class="nav-item dropdown" >
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" id="dropdownMenuButton" href="#pk" role="button" aria-haspopup="true" aria-expanded="false">Profil</a>
                        <ul class="dropdown-menu dropdown-menu-right dropdown-info" aria-labelledby="dropdownMenuButton">
                            <li class="dropdown-header">Profil</li>
                            <a class="dropdown-item" href="profil/{{Auth::user()->NIS }}">Edit  Profil</a>
                            @if(Auth::user()->level==1)
                            <a class="dropdown-item" href="{{route('mystatus.show' , Auth::user()->NIS)}}">My Status</a>
                            @endif
                            <a class="dropdown-item" href="{{route('ubahpass.index')}}">Ubah Password</a>
                            <a class="dropdown-item" href="{{ route('logout')}}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"
                                        >{{ __('Keluar') }}</a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                        </ul>
                    </div>
                    @endif
                        @endif
                    <li class="nav-item"><a class="nav-link" href="profilsekolah.html">Profil Sekolah</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Navigasi-->


    @yield('beranda')

    

    <!-- Footer -->
    <footer class="footer bg-foot">
        <div class="container">
            <div class="row"  >
                <nav class="footer-nav">
                    <ul>
                        <li><a href="#" style="color: #fff;">Home</a></li>
                        <li><a href="#" style="color: #fff;">About</a></li>
                        <li><a href="#" style="color: #fff;">Contact</a></li>
                    </ul>
                </nav>
                <div class="credits ml-auto">
                    <span class="copyright" style="color: #fff;">
                          Mtwo Cyber © <script>document.write(new Date().getFullYear())</script></i>
                    </span>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer -->
</body>

<!-- Core JS Files -->
<script src="{{ URL::asset('js/jquery-3.2.1.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('js/jquery-ui-1.12.1.custom.min.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('js/popper.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('js/bootstrap.min.js') }}" type="text/javascript"></script>

<!-- Switches -->
<script src="{{ URL::asset('js/bootstrap-switch.min.js') }}"></script>

<!--  Plugins for Slider -->
<script src="{{ URL::asset('js/nouislider.js') }}"></script>

<!--  Plugins for DateTimePicker -->
<script src="{{ URL::asset('js/moment.min.js') }}"></script>
<script src="{{ URL::asset('js/bootstrap-datetimepicker.min.js') }}"></script>

<!--  Paper Kit Initialization and functons -->
<script src="{{ URL::asset('js/paper-kit.js') }}"></script>
<script src="js/sweetalert.min.js"></script>
</html>
