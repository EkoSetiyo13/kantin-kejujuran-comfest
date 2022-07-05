<!-- Bottom Bar Start -->
<div class="bottom-bar">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-6">
                <div>
                    <a href="{{route('home.view')}}">
                        <!-- <img src="{{asset('assets/img/logo.png')}}" alt="Logo"> -->
                        <h3 style="padding-top: 10px">Kantin Kejujuran</h3>
                    </a>
                </div>
            </div>
            <div class="col-6">
                <div style="float:right">
                    @if(Auth::user())
                    <div class="">
                        <div class="nav-item dropdown">
                            <a style="padding-right: 10px;"> Saldo: Rp. {{Auth::user()->balance}}</a>
                            <a href="#" class="dropdown-toggle active" data-toggle="dropdown"> ID: {{Auth::user()->student_id}}</a>
                            <div class="dropdown-menu">
                                <a href="{{route('account.view')}}" class="dropdown-item">Profil</a>
                                <a href="{{route('logout.action')}}" class="dropdown-item">Keluar</a>
                            </div>
                        </div>
                    </div>
                    @else
                    <a href="{{route('login.view')}}" class="btn wishlist">
                        <i class="fa fa-arrow-circle-right "></i>
                        <span>Login</span>
                    </a>
                    <a href="{{route('register.view')}}" class="btn cart">
                        <i class="fa fa-user-plus"></i>
                        <span>Register</span>
                    </a>
                    @endif
                </div>

            </div>
        </div>
    </div>
</div>
<!-- Bottom Bar End -->


<!-- Nav Bar Start -->
<div class="nav">
    <div class="container-fluid">
        <nav class="navbar navbar-expand-md bg-dark navbar-dark" style="min-height: 60px">
            <a href="#" class="navbar-brand">MENU</a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                <div class="navbar-nav mr-auto">
                    <a href="{{route('home.view')}}" class="nav-item nav-link {{ (strpos(Route::currentRouteName(), 'home.view') === 0) ? 'active bottom-line' : '' }}"><b style="font-size: 18px">Beranda</b></a>
                    <a href="{{route('product.view')}}" class="nav-item nav-link {{ (strpos(Route::currentRouteName(), 'product.view') === 0) ? 'active bottom-line' : '' }} {{ (strpos(Route::currentRouteName(), 'product.detail') === 0) ? 'active bottom-line' : '' }}"><b style="font-size: 18px">Katalog Produk</b></a>
                </div>

            </div>
        </nav>
    </div>
</div>
<!-- Nav Bar End -->