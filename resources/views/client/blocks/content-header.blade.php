<header id="header" class="header-section">
    <div class="container">
        <nav class="navbar ">
            <a href="#" class="navbar-brand"><img src="{{ asset('clientstrator/img/logo.png') }}"
                    alt="Barbershop"></a>
            <div class="d-flex menu-wrap align-items-center">
                <div id="mainmenu" class="mainmenu">
                    <ul class="nav">
                        <li> <a href="{{ route('indexpage') }}"> Trang chủ<span class="sr-only">(current)</span></a>
                          
                        </li>
                       
                        
                        <li><a href="{{ route('blog') }}">Blog</a>

                        </li>
                        <li> <a href="{{route('contactus') }}">Liên Lạc</a></li>
                    </ul>
                </div>
                <div class="header-btn">
                    <a href="{{route('client.booking.booking_create')}}" class="menu-btn">Đặt Lịch Hẹn</a>
                </div>
            </div>
        </nav>
    </div>
</header>
<!--.header-section -->
