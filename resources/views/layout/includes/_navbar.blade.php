<nav class="navbar navbar-default navbar-fixed-top">
    <div class="brand">
        <img src="{{asset('assets/img/logo-color.png')}}" alt="Siap Logo" class="img-responsive logo">
    </div>
    <div class="container-fluid">
        <div class="navbar-btn">
            <button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
        </div>
        <div id="navbar-menu">
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <span>{{session('username')}}</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
                    <ul class="dropdown-menu">
                        <li><a href="/profile/{{session('id_user')}}"><i class="lnr lnr-user"></i> <span>Profil Saya</span></a></li>
                        <li><a href="/editPassword/{{session('id_user')}}"><i class="lnr lnr-lock"></i> <span>Ubah Kata Sandi</span></a></li>
                        <li><a href="{{ url('/logout') }}"><i class="lnr lnr-exit"></i> <span>Keluar</span></a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
