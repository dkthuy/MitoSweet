@extends('user.layout.layout')
@section('content')

    <div class="container-fluid" style="background-color: #f5f2f0;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    @if(session('status'))
                        <div class="alert alert-info alert-dismissible mt-5">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>{{ session('status') }}
                        </div>
                    @endif
                    <div class="col-lg-12 checkout_title_box">
                        <div class="col-lg-12">
                            <h4>Thanh toán</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8" >
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-12 checkout_phancach">
                                    <h5>Hình thức thanh toán</h5>
                                    <hr class="hr mt-4">
                                </div>
                                <div class="col-lg-12 checkout_logo">
                                    <a data-toggle="collapse" href="#chuyenkhoan" aria-controls="chuyenkhoan">
                                        <img src="{{ asset('img/tt.png') }}" width="100px">
                                    </a>
                                    <div class="collapse mt-3" id="chuyenkhoan">
                                        <div class="card card-body checkout_logo_title p-3">
                                            <p>
                                                Để đăng ký khoá học online, bạn vui lòng chuyển toàn bộ học phí của khóa học qua:
                                            </p>
                                            <p>
                                                Vietcombank <br>
                                                MitoSweets <br>
                                                0123004525468
                                            </p>
                                            <p>
                                                Nội dung chuyển khoản: Tên đăng nhập + Mã số khoá học <br>
                                                Ví dụ: Quynhhoa kb01
                                            </p>
                                            <p>
                                                Sau khi chuyển khoản bạn vui lòng chụp biên lai xác nhận và gửi cho Admin để được cấp quyền truy cập trong thời gian sớm nhất.
                                            </p>
                                        </div>
                                    </div>
                                {{-- <a href="#"><img src="img/checkout_logo_2.png" alt="mastercard" width="150px"></a>
                                <a href="#"><img src="img/checkout_logo_3.png" alt="paypal" width="150px"></a>
                                <a href="#"><img src="img/checkout_logo_4.png" alt="momo" width="150px"> </a> --}}
                                </div>
                            </div>
                            <form action="{{ route('out-cart') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <div class="col-lg-12 checkout_nameoc">
                                        <h6 class="text-uppercase">* Tên đầy đủ</h6>
                                        <input type="text" name="name">
                                    </div>
                                    <div class="col-lg-12 checkout_cartn">
                                        <h6 class="text-uppercase">* email</h6>
                                        <input type="text" name="email">
                                    </div>
                                    <div class="col-lg-12 checkout_expires">
                                        <h6 class="text-uppercase">* Số điện thoại</h6>
                                        <input type="number" name="phone" pattern="(09|03|07|08|05)+([0-9]{8})\b">
                                    </div>
                                    <div class="col-lg-12 checkout_ccvn">
                                        <h6 class="text-uppercase">* Ghi chú</h6>
                                        <textarea name="note" id="" cols="77" rows="5"></textarea>
                                    </div>
                                    <div class="col-lg-5 checkout_button_save">
                                        <button type="submit">Thanh toán</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="col-lg-12 checkout_box_shoppingcart">
                        <div class="col-lg-12 checkout_shopppingcart_title">
                            <div class="col-lg-12">
                                <h6>Giỏ hàng</h6>
                            </div>
                        </div>
                        @foreach ($cart as $item)
                            <div class="col-lg-12 checkout_shopppingcart_product">
                                <div class="row">
                                    @php
                                        $db = explode(",", $item->associatedModel->img);
                                    @endphp
                                    <div class="col-lg-4 col-4" style="padding: 0;">
                                        <a href=""><img src="{{$db[0]}}" width="100px"></a>
                                    </div>
                                    <div class="col-lg-8 col-8" >
                                        <a><h6 class="text-capitalize">{{$item->associatedModel->title}}</h6></a>
                                        <h5>Số lượng: {{$item->quantity}}</h5>
                                        <h4>Giá: <b style="font-weight: 100; font-family:'font-medium';">{{$item->price}}</b>₫</h4>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                            <div class="col-lg-12 subtotal" style="padding:0;">
                                <h6>Tổng cộng: {{Cart::getSubTotal()}}₫</h6>
                            </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 mb-5">
                                    <form class="form-inline form-coupon" action="{{ route('cpcheckout') }}">
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
                                                @foreach(Cart::getConditions() as $condition)
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
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
