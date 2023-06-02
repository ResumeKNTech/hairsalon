<section class="book_section padding">
    <div class="book_bg"></div>
    <div class="map_pattern"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-6">
                <form action="appointment.php" method="post" id="appointment_form"
                    class="form-horizontal appointment_form">
                    <div class="book_content">
                        <p>Thợ cắt tóc là người có nghề chính là cắt tỉa, làm đẹp, tạo kiểu và cạo râu cho nam giới và trẻ em.</p>
                    </div>




                    <div class="header-btn" style="text-align: center">
                        <a href="{{ route('client.booking.booking_create') }}" class="menu-btn">Đặt lịch hẹn</a>
                    </div>
                    <div id="msg-status" class="alert" role="alert"></div>
                </form>
            </div>
        </div>
    </div>
</section><!-- /.book_section -->
