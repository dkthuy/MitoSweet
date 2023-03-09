@extends('user.layout.layout')
@section('content')

    <section class="container">
        <h3 class="col-lg-12" style="text-align: center; margin-top: 50px">Liên hệ với chúng tôi</h3>
        <div class="row" style="margin:50px 0">
            @foreach ($interface as $item)
                @if (strstr($item->item_id,'phone'))
                <div class="col-lg-4 contact_box_icon" >
                    <img src="{{ asset('img/phone_icon.png') }}" alt="phone">
                    <h4 style="color:#be5000; margin:15px 0;">ĐIỆN THOẠI</h4>
                    <h4>{{$item->item_value}}</h4>
                </div>
                @elseif(strstr($item->item_id,'address'))
                    <div class="col-lg-4 contact_box_icon contact_box_border_1">
                        <img src="{{ asset('img/localtion_icon.png') }}" alt="localtion">
                        <h4 style="color:#be5000; margin:15px 0;">ĐỊA CHỈ</h4>
                        <h4>{{$item->item_value}}</h4>
                    </div>
                @elseif(strstr($item->item_id,'email'))
                    <div class="col-lg-4 contact_box_icon contact_box_border_1" >
                        <img style="width:15%; margin: 18px 0; margin:15px 0 22px 0;" src="{{ asset('img/email_icon.png') }}" alt="email">
                        <h4 style="color:#be5000">EMAIL</h4>
                        <h4>{{$item->item_value}}</h4>
                    </div>
                @endif
            @endforeach
        </div>
    </section>
    <section class="container">
        <div class="col-lg-12" style="margin:70px 0 30px 0 ">
            <div class="row">
                <div class="col-lg-3"></div>
                <h4 class="col-lg-6" style="text-align: center;">Nếu các bạn có thắc mắc xin vui lòng gửi tin nhắn cho chúng tôi!</h4>
                <div class="col-lg-3"></div>
            </div>
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
        </div>
        <div class="row" >
            <div class="col-lg-2"></div>
            <form action="{{ route('send') }}" method="get" class="col-lg-8" style="text-align: center;">
                <div class="contact_from">
                    <input type="text" name="name" placeholder="Tên của bạn...">
                    <input type="text" name="email" placeholder="Email của bạn...">
                    <input type="text" name="title" placeholder="Tiêu đề...">
                    <textarea rows="5" cols="50" name="detail" placeholder="Tin nhắn..."></textarea>
                </div>
                <button type="submit" class="contact_submit">Gửi Tin Nhắn</button>
            </form>

            <div class="col-lg-2"></div>
        </div>
    </section>

@endsection
