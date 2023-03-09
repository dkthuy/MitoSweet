@extends('user.layout.layout')
@section('content')
    <section class="shopping-cart">
        <div class="container">
            <div class="row shopping-content">
                <div class="col-lg-12">
                    <div class="row">
                        <h1>Giỏ hàng</h1>&emsp;
                        <h5 style="line-height: 3;">({{$cart->count()}} sản phẩm)</h5>
                    </div>
                </div>
                @if ($cart->count() != 0)
                    <div class="col-lg-8 col-md-7">
                        <ul class="shopping-list">
                            @foreach ($cart as $item)
                                <li class="shopping-item">
                                    <div class="row shopping-box">
                                        @php
                                            $db = explode(",", $item->associatedModel->img);
                                        @endphp
                                        <div class="col-lg-3 col-md-4">
                                            <img src="{{$db[0]}}" width="100%">
                                        </div>
                                        <div class="col-lg-5 col-md-8 product-name">
                                            <a><h5 class="text-uppercase">{{$item->associatedModel->title}}</h5></a>
                                            <div class="row">
                                                <a href="{{ route('cart-destroy', ['id'=>$item->id]) }}" class="col-lg-4 col-md-5 col-3"><h7>Xóa</h7></a>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-12 price">
                                            <h6>Giá khóa học: <span>{{$item->price}}</span>₫</h6>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                        <div class="col-lg-12 subtotal">
                            <h5>Tổng cộng: {{Cart::getSubTotal()}}₫</h5>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-5 pt-4">
                        <button class="col-lg-12 btn-checkout" onclick="window.location.href='{{route('check-out')}}'" type="button">Thanh toán</button>

                        <form class="form-inline form-coupon" action="{{ route('coupon') }}">
                            <h5 class="mb-4">Mã khuyến mãi</h5>
                            @if(session('no'))
                                <div class="alert alert-danger alert-dismissible">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>{{ session('no') }}
                                </div>
                            @endif
                            <input id="coupon" class="form-control col-lg-8 col-md-7 col-8" type="text" name="coupon" placeholder="NHẬP MÃ..." aria-label="Subscribe">
                            <button id="btn-apply" class="btn btn-outline-success col-lg-4 col-md-5 col-4" type="submit">Áp dụng</button>
                        </form>
                        <div class="order-list">
                            <ul class="col-lg-12">
                                <h5 class="mb-3" style="text-transform: none;">Tóm tắt đơn hàng</h5>
                                <li class="row list-item">
                                    <h5 class="col-lg-6 col-md-6 col-6">tổng cộng:</h5>
                                    <span class="col-lg-6 col-md-6 col-6">{{Cart::getSubTotal()}}₫</span>
                                </li>
                                <li class="row list-item">
                                    <h5 class="col-lg-6 col-md-6 col-6" style="font-family: 'font-thin'; font-weight: bold;">giảm giá:</h5>
                                    @foreach($coupon as $condition)
                                        <span class="col-lg-6 col-md-6 col-6" style="font-family: 'font-thin'; font-weight: bold; ">{{$condition->getValue()}}</span>
                                    @endforeach
                                </li>
                            </ul>
                            <div class="col-lg-12 total">
                                <div class="row">
                                    <h5 class="col-lg-6 col-md-6 col-6">thành tiền:</h5>
                                    <span class="col-lg-6 col-md-6 col-6">{{Cart::getTotal()}}₫</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="col-lg-8 col-md-7">
                        <div class="shopping-empty">
                            <img class="mx-auto d-block" src="{{ asset('img/shoppingcart.png') }}" width="15%">
                            <span class="mx-auto d-block">Giỏ hàng trống</span>
                            <button class="mx-auto d-block btn-go" type="button" onclick="window.location.href='{{ route('online') }}'">Đến cửa hàng</button>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-5 pt-4">
                        <form class="form-inline form-coupon" action="{{ route('coupon') }}">
                            <h5 class="mb-4">Mã khuyến mãi</h5>
                            @if(session('no'))
                                <div class="alert alert-danger alert-dismissible">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>{{ session('no') }}
                                </div>
                            @endif
                            <input id="coupon" class="form-control col-lg-8 col-md-7 col-8" type="text" name="coupon" placeholder="NHẬP MÃ..." aria-label="Subscribe">
                            <button id="btn-apply" class="btn btn-outline-success col-lg-4 col-md-5 col-4" type="submit">Áp dụng</button>
                        </form>
                        <div class="order-list">
                            <ul class="col-lg-12">
                                <h5 class="mb-3" style="text-transform: none;">Tóm tắt đơn hàng</h5>
                                <li class="row list-item">
                                    <h5 class="col-lg-6 col-md-6 col-6">tổng cộng:</h5>
                                    <span class="col-lg-6 col-md-6 col-6">{{Cart::getSubTotal()}}₫</span>
                                </li>
                                <li class="row list-item">
                                    <h5 class="col-lg-6 col-md-6 col-6" style="font-family: 'font-thin'; font-weight: bold;">giảm giá:</h5>
                                    @foreach($coupon as $condition)
                                        <span class="col-lg-6 col-md-6 col-6" style="font-family: 'font-thin'; font-weight: bold; ">{{$condition->getValue()}}</span>
                                    @endforeach
                                </li>
                            </ul>
                            <div class="col-lg-12 total">
                                <div class="row">
                                    <h5 class="col-lg-6 col-md-6 col-6">thành tiền:</h5>
                                    <span class="col-lg-6 col-md-6 col-6">{{Cart::getTotal()}}₫</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif



            </div>
        </div>
    </section>

@endsection
