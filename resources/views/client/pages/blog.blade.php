@extends('client.master')
@section('content')
    @push('name')
        <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
        <script>
            $(document).ready(function() {
                var itemsPerPage = 6; // số lượng bài viết trên mỗi trang
                var currentPage = 1; // trang hiện tại
                var totalItems = $('.blog-grid .blog-item').length; // tổng số lượng bài viết

                var totalPages = Math.ceil(totalItems / itemsPerPage); // số lượng trang

                // ẩn tất cả các bài viết, chỉ hiển thị bài viết của trang đầu tiên
                $('.blog-grid .blog-item').hide();
                $('.blog-grid .blog-item').slice(0, itemsPerPage).show();

                // thêm các nút pagination
                var pagination = '<li><a href="#" class="prev-page"><i class="ti-arrow-left"></i></a></li>';
                for (var i = 1; i <= totalPages; i++) {
                    pagination += '<li><a href="#" class="page-number">' + i + '</a></li>';
                }
                pagination += '<li><a href="#" class="next-page"><i class="ti-arrow-right"></i></a></li>';
                $('.pagination-wrap ul').html(pagination);

                // xử lý sự kiện click trên các nút pagination
                $('.pagination-wrap').on('click', '.page-number', function(e) {
                    e.preventDefault();
                    currentPage = parseInt($(this).text());
                    var start = (currentPage - 1) * itemsPerPage;
                    var end = start + itemsPerPage;
                    $('.blog-grid .blog-item').hide();
                    $('.blog-grid .blog-item').slice(start, end).show();
                    updatePagination();
                });

                $('.pagination-wrap').on('click', '.prev-page', function(e) {
                    e.preventDefault();
                    if (currentPage > 1) {
                        currentPage--;
                        var start = (currentPage - 1) * itemsPerPage;
                        var end = start + itemsPerPage;
                        $('.blog-grid .blog-item').hide();
                        $('.blog-grid .blog-item').slice(start, end).show();
                        updatePagination();
                    }
                });

                $('.pagination-wrap').on('click', '.next-page', function(e) {
                    e.preventDefault();
                    if (currentPage < totalPages) {
                        currentPage++;
                        var start = (currentPage - 1) * itemsPerPage;
                        var end = start + itemsPerPage;
                        $('.blog-grid .blog-item').hide();
                        $('.blog-grid .blog-item').slice(start, end).show();
                        updatePagination();
                    }
                });

                // cập nhật trạng thái của các nút pagination
                function updatePagination() {
                    $('.pagination-wrap .page-number').removeClass('active');
                    $('.pagination-wrap .page-number').eq(currentPage - 1).addClass('active');
                    $('.pagination-wrap .prev-page').toggleClass('disabled', currentPage === 1);
                    $('.pagination-wrap .next-page').toggleClass('disabled', currentPage === totalPages);
                }

                updatePagination();
            });
        </script>
    @endpush
    <section class="page_header d-flex align-items-center">
        <div class="container">
            <div class="section_heading text-center mb-40 wow fadeInUp" data-wow-delay="300ms">
                <h2>Barbershop News</h2>
                <div class="heading-line"></div>
            </div>
        </div>
    </section>
    <section class="blog-section padding">
        <div class="container">
            <div class="blog-wrap row">
                <div class="col-lg-8 sm-padding">
                    <div class="row blog-grid">
                        <div class="col-sm-6 padding-15">
                            <div class="blog-item">
                                <div class="blog-thumb">
                                    <img src="{{ asset('clientstrator/img/q1.jpg') }}" alt="post">
                                    <span class="category"><a href="#">Tiêu Đề</a></span>
                                </div>
                                <div class="blog-content">
                                    <h3><a href="#">Bạn đã sử dụng Sáp Vuốt Tóc Nam đúng cách chưa?</a></h3>
                                    <p>Đa phần các phái mạnh đều phải “nhờ vả” tới sáp vuốt tóc để có kiểu đầu ưng ý và theo
                                        phong cách của riêng mình nhưng có chắc các men đã biết cách sử dụng sáp vuốt tóc
                                        đúng điệu chưa?.</p>
                                    <a href="https://sapvuottocnam.com/ban-da-su-dung-sap-vuot-toc-nam-dung-cach-chua/"
                                        class="read-more">Read More</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 padding-15">
                            <div class="blog-item">
                                <div class="blog-thumb">
                                    <img src="{{ asset('clientstrator/img/q3.jpg') }}" height="300" alt="post">
                                    <span class="category"><a href="#">Tiêu Đề</a></span>
                                </div>
                                <div class="blog-content">
                                    <h3><a href="#">9 sao nam châu Á sở hữu kiểu tóc nam dài quyến rũ</a></h3>
                                    <p>Không hề kém cạnh so với những sao nam Hollwyood, những minh tinh châu Á với kiểu tóc
                                        nam dài bồng bềnh, quyến rũ cũng khiến hàng triệu trái tim thiếu nữ thổn thức và tạo
                                        nên trào lưu tóc tai cho cánh đàn ông. Cùng ELLE Man ngắm nhìn vẻ đẹp nam tính của
                                        các chàng trai qua nhiều kiểu tóc dài khác nhau như mullet, manbun..</p>
                                    <a href="https://www.elleman.vn/van-hoa-giai-tri/toc-nam-dai-sao-chau-a"
                                        class="read-more">Read More</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 padding-15">
                            <div class="blog-item">
                                <div class="blog-thumb">
                                    <img src="{{ asset('clientstrator/img/q4.jpg') }}" height="300" alt="post">
                                    <span class="category"><a href="#">Tiêu Đề</a></span>
                                </div>
                                <div class="blog-content">
                                    <h3><a href="#">5 kiểu tóc nam đẹp dành riêng cho đàn ông châu Á 2019.</a></h3>
                                    <p>
                                        Đàn ông châu Á có mái tóc thẳng, dày.  Từ một mái tóc undercut kiểu tóc nam thời trang châu Á trải dài từ quiff,
                                        vuốt ngược, pompadour, mohican, fringe, fades. Đây sẽ là gợi ý thú vị giúp bạn chọn được kiểu tóc phù hợp
                                        và một vẻ ngoài tuyệt vời nhé! </p>
                                    <a href="https://blog.30shine.com/5-kieu-toc-nam-dep-danh-rieng-cho-dan-ong-chau-a-2019/"
                                        class="read-more">Read More</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 padding-15">
                            <div class="blog-item">
                                <div class="blog-thumb">
                                    <img src="{{ asset('clientstrator/img/q5.jpg') }}" height="300" alt="post">
                                    <span class="category"><a href="#">Tiêu Đề</a></span>
                                </div>
                                <div class="blog-content">
                                    <h3><a href="#">Kiểu Tóc Nam Đẹp Chuẩn Men.</a></h3>
                                    <p>Hãy chọn kiểu tóc nam đẹp để thay đổi ngoại hình, trở nên Chuẩn Men. Những kiểu tóc
                                        nam chúng tôi mang tới trong bài này chắc chắn giúp bạn hài lòng..</p>
                                    <a href="https://nha360.com.vn/kieu-toc-nam-dep-chuan-men/" class="read-more">Read
                                        More</a>
                                </div>
                            </div>
                        </div>
                       
                       
                    </div>
                    <div class="row blog-grid">
                        <div class="col-sm-6 padding-15">
                            <div class="blog-item">
                                <div class="blog-thumb">
                                    <img src="{{ asset('clientstrator/img/q4.jpg') }}"alt="post">
                                    <span class="category"><a href="#">Tiêu Đề</a></span>
                                </div>
                                <div class="blog-content">
                                    <h3><a href="#">25 kiểu tóc nam Hàn Quốc đẹp thời thượng, HOT nhất 2023</a></h3>
                                    <p>Xu hướng làm đẹp phong cách Hàn Quốc được cả thế giới săn đón, trong đó có Việt Nam.
                                        Nếu các đấng mày râu đang tìm kiếm cho mình kiểu tóc nam Hàn Quốc đẹp và thời thượng
                                        nhất hiện nay, thì hãy cùng Đẹp365 tham khảo ngay sau đây.</p>
                                    <a href="https://dep365.com/kieu-toc-nam-han-quoc/" class="read-more">Read More</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 padding-15">
                            <div class="blog-item">
                                <div class="blog-thumb">
                                    <img src="{{ asset('clientstrator/img/q2.jpg') }}" height="300" alt="post">
                                    <span class="category"><a href="#">Tiêu Đề</a></span>
                                </div>
                                <div class="blog-content">
                                    <h3><a href="#">4 kiểu tóc nam đẹp kinh điển cho đàn ông châu Á.</a></h3>
                                    <p>Kiểu tóc nam châu Á – Bạn rất thích kiểu tóc của một sao nam Hollywood hay của một
                                        cầu thủ bóng đá tại giải Ngoại hạng Anh, nhưng khi bước ra khỏi hiệu cắt tóc thì bạn
                                        vô cùng thất vọng. Sao mà nó chẳng đẹp như mình nghĩ? Đó là vì không phải kiểu tóc
                                        nào cũng phù hợp với khuôn mặt nam giới châu Á chúng ta..</p>
                                    <a href="https://menback.com/co-the/4-kieu-toc-nam-dep-kinh-dien-cho-dan-ong-chau-a.html"
                                        class="read-more">Read More</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 padding-15">
                            <div class="blog-item">
                                <div class="blog-thumb">
                                    <img src="{{ asset('clientstrator/img/q6.jpeg') }}"alt="post">
                                    <span class="category"><a href="#">Tiêu Đề</a></span>
                                </div>
                                <div class="blog-content">
                                    <h3><a href="#">Hóa ra 06 lý do này là tác nhân khiến tóc hư tổn, gãy rụng bên
                                            cạnh uốn nhuộm</a></h3>
                                    <p>Chúng ta vẫn thường cho rằng uốn nhuộm khiến tóc hư tổn. Điều đó đúng nhưng chưa đủ.
                                        Bởi lẽ trên thực tế, vẫn còn rất nhiều nguyên nhân khác ảnh hưởng đến sức sống của
                                        tóc. Cùng Đẹp365 tìm hiểu kỹ hơn trong bài viết này nhé!</p>
                                    <a href="https://dep365.com/ly-do-nay-la-tac-nhan-khien-toc-hu-ton-gay-rung/"
                                        class="read-more">Read More</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 padding-15">
                            <div class="blog-item">
                                <div class="blog-thumb">
                                    <img src="{{ asset('clientstrator/img/q7.jpg') }}" height="300" alt="post">
                                    <span class="category"><a href="#">Tiêu Đề</a></span>
                                </div>
                                <div class="blog-content">
                                    <h3><a href="#">
                                            Sức hút kì lạ của những kiểu tóc nam đẹp đến từ Châu Âu (P2)</a>
                                    </h3>
                                    <p> Nhắc tới cái tên tóc kiểu Undercut thì từ đứa trẻ cấp 2 tới những chàng trai đang
                                        ngồi
                                        trong văn phòng hay kĩ sư cặm cụi bên công trình. Tấ cả đều phải ngẩng đầu dành một
                                        lời khen ngợi dành cho sự tinh tế và sự hấp dẫn. Bên cạnh đó còn có cả vẻ nam tính
                                        cùng sự gọn gàng bên trong nét tự nhiên của dòng tóc này.</p>
                                    <a href="https://blog.30shine.com/suc-hut-ki-la-cua-nhung-kieu-toc-nam-dep-den-tu-chau-au-p2/"
                                        class="read-more">Read More</a>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="col-sm-6 padding-15">
                            <div class="blog-item">
                                <div class="blog-thumb">
                                    <img src="img/post-4.jpg" alt="post">
                                    <span class="category"><a href="#">Tiêu Đề</a></span>
                                </div>
                                <div class="blog-content">
                                    <h3><a href="#">[HIT 2023] Top xu hướng các kiểu tóc nam ngắn đẹp nhất</a></h3>
                                    <p>Các kiểu tóc nam ngắn đẹp, điển trai theo phong cách hiện đại năm 2023 đang dần trở
                                        nên chiếm ưu thế trong xu hướng thời trang tóc nam hiện đại. Với thời tiết mùa hè
                                        nóng nực này thì một mái tóc ngắn gọn gàng sẽ giúp anh em trông mát mẻ hơn nhiều
                                        đấy. Một mái tóc vừa gọn gàng, mát mẻ vừa thời trang phong cách thì tại sao chúng ta
                                        lại không lựa chọn cho mình..</p>
                                    <a href="https://sapvuottocnam.com/toc-nam-ngan-dep/" class="read-more">Read More</a>
                                </div>
                            </div>
                        </div> --}}
                        {{-- <div class="col-sm-6 padding-15">
                            <div class="blog-item">
                                <div class="blog-thumb">
                                    <img src="img/post-5.jpg" alt="post">
                                    <span class="category"><a href="#">Tiêu Đề</a></span>
                                </div>
                                <div class="blog-content">
                                    <h3><a href="#">TOP #15 Tiệm cắt tóc nam đẹp ở Hà Nội HOT nhất năm 2023.</a></h3>
                                    <p>Ngày nay, nhu cầu làm đẹp của nam giới tăng lên đáng kể, đặc biệt là vấn đề tóc tai.
                                        Nó đồng nghĩa với việc những salon tóc hay barber mọc lên rất nhiều nhằm phục vụ nhu
                                        cầu của anh em. Khi mà việc làm hài lòng phái mạnh ngày càng trở nên khó hơn, thì...
                                    </p>
                                    <a href="https://sapvuottocnam.com/tiem-cat-toc-nam-o-ha-noi/" class="read-more">Read
                                        More</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 padding-15">
                            <div class="blog-item">
                                <div class="blog-thumb">
                                    <img src="img/post-6.jpg" alt="post">
                                    <span class="category"><a href="#">Tiêu Đề</a></span>
                                </div>
                                <div class="blog-content">
                                    <h3><a href="#">[XU HƯỚNG] Nhuộm tóc nam 2023 | Màu nhuộm HOT không thể bỏ
                                            qua</a></h3>
                                    <p>Câu chuyện về nhuộm tóc nam đang là chủ đề rất được phái mạnh quan tâm, bởi mái tóc
                                        cũng như một bức tranh chì đơn giản, nó không thể được gọi là hoàn hảo nếu chưa lên
                                        màu và được thay đổi. Vậy, nhuộm tóc nam sẽ mang lại điều gì cho mái tóc của bạn,
                                        các màu tóc nam nhuộm liệu có thực sự giúp bạn lột bỏ diện mạo cũ của mình và mang
                                        đến sự tự tin cho các chàng trai? Hãy cùng ad tìm hiểu nhé.</p>
                                    <a href="https://sapvuottocnam.com/nhuom-toc-nam/" class="read-more">Read More</a>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                    <ul class="pagination-wrap text-center mt-30">
                        <li><a href="#" class="prev-page"><i class="ti-arrow-left"></i></a></li>
                        <li><a href="#" class="page-number">1</a></li>
                        <li><a href="#" class="page-number">2</a></li>
                        <li><a href="#" class="page-number">3</a></li>
                        <li><a href="#" class="next-page"><i class="ti-arrow-right"></i></a></li>
                    </ul><!-- Pagination -->
                </div>
                <!--/. col-lg-8 -->
                <div class="col-lg-4 sm-padding">
                    <div class="sidebar-wrap">
                        <div class="widget-content">
                            <form action="" class="search-form">
                                <input type="text" class="form-control" placeholder="Type here">
                                <button class="search-btn" type="button"><i class="fa fa-search"></i></button>
                            </form>
                        </div>

                        <div class="widget-content">
                            <h4>Recent Posts</h4>
                            <ul class="thumb-post">
                                <li><img src="{{ asset('clientstrator/img/q4.jpg') }}" alt="post"><a href="https://menback.com/co-the/4-kieu-toc-nam-dep-kinh-dien-cho-dan-ong-chau-a.html">4 kiểu tóc nam đẹp kinh điển cho đàn ông châu Á.</a></li>
                                <li><img src="{{ asset('clientstrator/img/q5.jpg')  }}" alt="post"><a href="https://nha360.com.vn/kieu-toc-nam-dep-chuan-men/">Kiểu Tóc Nam Đẹp Chuẩn Men.</a></li>
                                <li><img src="{{ asset('clientstrator/img/q3.jpg')  }}" alt="post"><a href="https://www.elleman.vn/van-hoa-giai-tri/toc-nam-dai-sao-chau-a">9 sao nam châu Á sở hữu kiểu tóc nam dài quyến rũ</a></li>
                            </ul>
                        </div>
                        <!--tag clouds-->
                        <div class="widget-content">
                            <h4>Tag Clouds</h4>
                            <ul class="tags">
                                <li><a href="#">Architecture</a></li>
                                <li><a href="#">Interior Design</a></li>
                                <li><a href="#">Designing</a></li>
                                <li><a href="#">Construction</a></li>
                                <li><a href="#">Buildings</a></li>
                                <li><a href="#">Industrial</a></li>
                                <li><a href="#">Factory</a></li>
                                <li><a href="#">Material</a></li>
                            </ul>
                        </div>
                        <!--tag clouds-->
                    </div>
                    <!--/.sidebar-wrap-->
                </div>
                <!--/. col-lg-4 -->
            </div>
            <!--/.blog-wrap-->
        </div>
    </section>
    <!--/. blog-section -->
@endsection
