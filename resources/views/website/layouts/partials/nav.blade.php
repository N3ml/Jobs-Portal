
    <header>
        <!-- Header Start -->
        <div class="header-area header-transparrent">
            <div class="headder-top header-sticky">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-3 col-md-2">
                            <!-- Logo -->
                            <div class="logo">
                                <a href="index.html"><img src="{{ asset('website') }}/img/logo/logo.png" alt=""></a>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-9">
                            <div class="menu-wrapper">
                                <!-- Main-menu -->
                                <div class="main-menu">
                                    <nav class="d-none d-lg-block">
                                        <ul id="navigation">
                                            <li><a href="{{url('/')}}">Home</a></li>
                                            <li><a href="about.html">About</a></li>
                                            <li><a href="contact.html">Contact</a></li>
                                            @auth()
                                                @if(auth()->user()->isApplicant())
                                                <li><a href="">My Profile</a></li>
                                                @endif
                                                @if(auth()->user()->isAdmin())
                                                <li><a href="{{url('admin/home')}}">Dashbord</a></li>
                                                @endif
                                            @endauth
                                        </ul>
                                    </nav>
                                </div>
                                <!-- Header-btn -->
                                <div class="header-btn d-none f-right d-lg-block">
                                    @auth()
                                        <a onclick="document.getElementById('logoutForm').submit()" href="#" class="btn head-btn2">Logout</a>
                                        <form action="{{ route('logout') }}" method="post" id="logoutForm">
                                            @csrf
                                        </form>
                                    @endauth
                                    @guest()
                                        <a href="{{route('website.register')}}" class="btn head-btn1">Register</a>
                                        <a href="{{route('website.login')}}" class="btn head-btn2">Login</a>
                                    @endguest
                                </div>

                            </div>
                        </div>
                        <!-- Mobile Menu -->
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header End -->
    </header>
