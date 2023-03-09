@extends('user.layout.layout')
@section('content')

    <section class="container-fluid signin_box">
        <div class="row">
            <div class="col-lg-3 col-1"></div>
            <div class="col-lg-6 col-10 signin_box_content">
                <h3>Quên mật khẩu</h3>
                <div class="col-lg-12" style="text-align: center; margin-top:15px;">
                    <h6 style="font-size: 15px; color: black">Vui lòng nhập email của bạn để được cấp lại mật khẩu.</h6>
                </div>
                <div class="col-lg-12">
                    <input type="text" class="signin_email col-lg-12" placeholder="Email của bạn....." >
                </div>
                <div class="col-lg-12">
                    <a href="#" class="signin_signin" style="font-size: 20px">Quên mật khẩu</a>
                </div>
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-1"></div>
                        <div class="col-lg-10">
                            <h6 class="signin_title">
                                <a href="{{ route('signin') }}" class="signin_title_pp">‹ Quay về Đăng nhập</a></h6>
                        </div>
                        <div class="col-lg-1"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
