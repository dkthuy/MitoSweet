@extends('user.layout.layout')
@section('content')

    <section class="order-form">
        <div class="container">
            <div class="form-order">
                <h1>Đặt bánh</h1>
                @if(session('status'))
                    <div class="alert alert-info alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>{{ session('status') }}
                    </div>
                @endif
                @if(session()->has('fail'))
                    <div class="alert alert-danger alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        {{ session('fail') }}
                    </div>
                @endif
                <h5>Thông tin</h5>
                <form action="{{ route('sendorder') }}" method="POST">
                    @csrf
                    <div class="form-row">
                        @foreach ($cake as $item)
                            <div class="col-md-4">
                                <input type="text" name="title" class="form-control" placeholder="Tên bánh" value="{{$item->title}}" required>
                            </div>
                            <div class="col-md-4">
                                <input type="tel" id="phone" name="phone" class="form-control" placeholder="Số điện thoại" required>
                            </div>
                            <div class="col-md-4">
                                <input type="email" name="email" class="form-control" placeholder="Email của bạn" required>
                            </div>
                            <div class="col-md-4">
                                <input type="date" name="date" class="form-control" placeholder="Ngày nhận bánh" required>
                            </div>
                            <div class="col-md-4">
                                <input type="text" name="name" class="form-control" placeholder="Người đặt bánh" required>
                            </div>
                            <div class="col-md-4">
                                <input type="text" name="address" class="form-control" placeholder="Địa chỉ nhận bánh" required>
                            </div>
                        @endforeach
                    </div>

                    <div class="form-row mt-4">
                        <div class="col-md-7 pb-5">
                            <h5>Chi tiết bánh - Giá tiền:
                                @foreach ($cake as $cakes)
                                    @foreach ($size as $sizes)
                                        @foreach (explode(",", $cakes->cake_sizes) as $item)
                                            @if ($item == $sizes->id)
                                                {{ ($cakes->price)*($sizes->heso) }}₫ |
                                            @endif
                                        @endforeach
                                    @endforeach
                                @endforeach</h5>
                            <div class="form-row">
                                <div class="col-md-6">
                                    <select class="js-type form-control" name="size" id="size">
                                        @foreach ($cake as $cakes)
                                            @foreach ($size as $sizes)
                                                @foreach (explode(",", $cakes->cake_sizes) as $item)
                                                    @if ($item == $sizes->id)
                                                    <option value="{{$sizes->id}}">{{$sizes->title}}</option>
                                                    @endif
                                                @endforeach
                                            @endforeach
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <select class="js-type form-control" name="type" id="type">
                                        @foreach ($cake as $cakes)
                                            @foreach ($type as $item)
                                                @if ($cakes->cake_types == $item->id)
                                                    <option selected value="{{$item->id}}">{{$item->title}}</option>
                                                @else
                                                    <option value="{{$item->id}}">{{$item->title}}</option>
                                                @endif
                                            @endforeach
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-12">
                                    <input type="text" name="subject" class="form-control" placeholder="Chữ viết lên bánh">
                                </div>
                                <div class="col-md-12">
                                    <textarea class="form-control" name="note" rows="7" cols="50" placeholder="Ghi chú (Nếu có)"></textarea>
                                </div>
                            </div>

                            <button class="col-md-6 btn-send" type="submit">Gửi</button>

                        </div>
                        @foreach ($cake as $cakes)
                            @php
                                $db = explode(",", $cakes->img);
                            @endphp
                            <div class="col-md-5">
                                <h5>Hình ảnh minh họa</h5>
                                <img src="{{$db[0]}}" width="100%">
                            </div>
                        @endforeach
                    </div>
                </form>
            </div>
        </div>
    </section>

@endsection
