@extends('client.master')
@section('content')
<div class="modal fade bs-example-modal-lg search-bg popup1" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content search-popup">
            <div class="text-center">
                <a href="#" class="close2" data-dismiss="modal" aria-label="Close">× close</a>
            </div>
            <div class="row search-outer">
                <div class="col-md-11"><input type="text" placeholder="Search for products..." /></div>
                <div class="col-md-1 text-right"><a href="#"><i class="fa fa-search" aria-hidden="true"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
@include('client.blocks.slider')
@include('client.blocks.about')
@include('client.blocks.service-section')
@include('client.blocks.book-section')
@include('client.blocks.slider')
@include('client.blocks.teams')
@include('client.blocks.slider')
@include('client.blocks.testimonial')
@include('client.blocks.pricing')
@include('client.blocks.blog-section')
@include('client.blocks.sponsor')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    setInterval(function() {
        alert('Đặt 30s hủy hẹn không sao');
    }, 70000);
});
</script>
@endsection
