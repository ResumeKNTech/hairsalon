@extends('client.master')
@section('content')
    <div class="mapouter">
        <div class="gmap_canvas">

            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.4602949547116!2d106.66478987394386!3d10.776014689372733!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f3ae5901877%3A0x42c37972de865906!2zODI4IMSQLiBTxrAgVuG6oW4gSOG6oW5oLCBQaMaw4budbmcgMTIsIFF14bqtbiAxMCwgVGjDoG5oIHBo4buRIEjhu5MgQ2jDrSBNaW5oLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1683048393762!5m2!1svi!2s"
                width="100%" height="350" style="border:0;" allowfullscreen="" id="gmap_canvas" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>

        </div>
        <style>
            .mapouter {
                position: relative;
                text-align: right;
                height: 350px;
                width: 100%;
            }

            .gmap_canvas {
                overflow: hidden;
                background: none !important;
                height: 350px;
                width: 100%;
            }
        </style>
    </div>

    <section class="contact-section padding">
        <div class="map"></div>
        <div class="container">
            <div class="contact-wrap d-flex align-items-center row">
                <div class="col-lg-6 sm-padding">
                    <div class="contact-info">
                        <h2>Bạn có thể liên lạc với chúng tôi<br> Gửi tin nhắn ngay hôm nay!</h2>
                        <p>Chào mừng đến với tiệm cắt tóc mới nhất của chúng tôi! Được thành lập vào năm 2023, chúng tôi tự
                            hào mang đến cho khách hàng của mình những trải nghiệm cắt tóc tuyệt vời nhất.</p>
                        <h3>828 Đường Sư Vạn Hạnh, Quận 10<br>TP HCM</h3>
                        <h4><span>Email:</span> mrkhoabin@gmail.com <br> <span>Phone:</span>  (+84) 0935769312 <br>
                   
                        </h4>
                    </div>
                </div>
                <div class="col-lg-6 sm-padding">
                    <div class="contact-form">
                        <form action="{{ route('client.booking.cl_contact') }}" method="post">
                            {{ csrf_field() }}
                            <div class="form-group colum-row row">
                                <div class="col-sm-6">
                                    <input type="text" id="name" name="customer" 
                                    value="{{ old('customer') }}" class="form-control"
                                        placeholder="Name" required>
                                </div>
                                <div class="col-sm-6">
                                    <input type="email" id="email" name="email"    value="{{ old('email') }}"  class="form-control"
                                        placeholder="Email" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <textarea id="message" name="contact"   value="{{ old('contact') }}"cols="30" rows="5" class="form-control message" placeholder="Message"
                                        required></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <button id="submit" class="default_btn" type="submit">Send Message</button>
                                </div>
                            </div>
                            <div id="form-messages" class="alert" role="alert"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- /.contact-section -->

   

@endsection
