@extends('user.layout.layout')
@section('content')

    <section class="container addtocart_box mb-5">
        <div class="row">
            <div class="col-lg-12 col-12 addtocart_box_content">
                @if(session('status'))
                    <div class="alert alert-info alert-dismissible mt-5">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><h4>{{ session('status') }}</h4>
                    </div>
                    <div class="row margintop_addtocart">
                        <div class="col-lg-4">
                            <a href="{{ route('index') }}" class="addtocart_continue">tiếp tục mua hàng</a>
                        </div>
                        <div class="col-lg-4">
                            <a href="{{ route('cart-index') }}" class="proceed_continue">chỉnh sửa giỏ hàng</a>
                        </div>
                        <div class="col-lg-4">
                            <a href="{{ route('check-out') }}" class="addtocart_continue">tiến hành thanh toán</a>
                        </div>
                    </div>
                @else
                    <h3>Đã thêm vào giỏ hàng</h3>
                    <div class=" col-lg-12 addtocart_box_checkout">
                        @foreach ($product as $item)
                            <div class="row margintop_addtocart">
                                @php
                                    $db = explode(",", $item->img);
                                @endphp
                                <div class="col-lg-2">
                                    <img src="{{$db[0]}}" width="100%" >
                                </div>
                                <div class="col-lg-4 addtocart_name">
                                    <a><h6>{{$item->title}}</h6></a>
                                    <h5>Số lượng: <b> 1 </b> </h5>
                                    <h5>Giá: <b style="font-family: 'font-medium">{{$item->price}}</b>₫</h5>
                                </div>
                                <div class="col-lg-3">
                                    <a href="{{ route('index') }}" class="addtocart_continue">tiếp tục mua hàng</a>
                                </div>
                                <div class="col-lg-3">
                                    <a href="{{ route('check-out') }}" class="proceed_continue">tiến hành thanh toán</a>
                                    <div class="addtocart_content_checkout">
                                        <h5>Tổng số khóa học: <b>1 </b> </h5>
                                        <h5>Tổng cộng: <b> {{$item->price}}</b>₫</h5>
                                        <a href="{{ route('cart-index') }}">chỉnh sửa giỏ hàng</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif


            </div>
        </div>
    </section>

@endsection
