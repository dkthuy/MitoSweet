@extends('user.layout.layout')
@section('content')

    <section class="shopping-cart">
        <div class="container">
            <div class="row shopping-content">
                <div class="col-lg-12">
                    <div class="row">
                        <h1>Giỏ hàng</h1>&emsp;
                        <h5 style="line-height: 3;">(0 sản phẩm)</h5>
                    </div>
                </div>
                <div class="col-lg-8 col-md-7">
                    <div class="shopping-empty">
                        <img class="mx-auto d-block" src="{{ asset('img/shoppingcart.png') }}" width="15%">
                        <span class="mx-auto d-block">Giỏ hàng trống</span>
                        <button class="mx-auto d-block btn-go" type="button" onclick="window.location.href='{{ route('index') }}'">Đến cửa hàng</button>
                    </div>
                </div>

                <div class="col-lg-4 col-md-5 pt-4">
                <form class="form-inline form-coupon">
                    <h5 class="mb-4">Have a coupon code?</h5>
                    <input id="coupon" class="form-control col-lg-8 col-md-7 col-8" type="text" placeholder="ENTER CODE..." aria-label="Subscribe">
                    <button id="btn-apply" class="btn btn-outline-success col-lg-4 col-md-5 col-4" type="submit">Apply</button>
                </form>
                <div class="order-list">
                    <ul class="col-lg-12">
                        <h5 class="mb-3" style="text-transform: none;">Order Summary</h5>
                        <li class="row list-item">
                            <h5 class="col-lg-6 col-md-6 col-6">subtotal:</h5>
                            <span class="col-lg-6 col-md-6 col-6">$0.00</span>
                        </li>
                        <li class="row list-item">
                            <h5 class="col-lg-6 col-md-6 col-6" style="font-family: 'font-thin'; font-weight: bold;">tax:</h5>
                            <span class="col-lg-6 col-md-6 col-6" style="font-family: 'font-thin'; font-weight: bold; ">$0.00</span>
                        </li>
                    </ul>
                    <div class="col-lg-12 total">
                        <div class="row">
                            <h5 class="col-lg-6 col-md-6 col-6">total:</h5>
                            <span class="col-lg-6 col-md-6 col-6">$0.00</span>
                        </div>
                    </div>
                </div>

                </div>
            </div>
        </div>
    </section>

@endsection
