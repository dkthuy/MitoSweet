@extends('user.layout.layout')
@section('content')

    <section class="profile">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 profile-title" id="profile-title">
                    <h4 style="text-transform: uppercase;">Cài đặt tài khoản</h4>
                    <h1 class="profile-header" id="pi-title">Thông tin cá nhân</h1>
                    <h1 class="content_none profile-header" id="ms-title">Khóa học trực tuyến</h1>
                    {{-- <h1 class="content_none profile-header" id="cp-title">Contact Preferences</h1>
                    <h1 class="content_none profile-header" id="oh-title">Order History</h1> --}}
                    <h1 class="content_none profile-header" id="coupon-title">Phiếu giảm giá</h1>
                    <h5 class="account-name">vivamus21288993</h5>
                </div>

                <div class="col-lg-4 col-md-5">
                    <div class="col-lg-12" style="background-color:#CEF0CD; margin-bottom: 30px;">
                        <ul class="profile-list list-group" id="nav-profile" style="cursor: pointer;">
                            <li class="profile-item list-item active2" onclick="onclick_navbar(this.id);" id="personal" style="margin-top: 20px">
                                <a class="profile-link personal">Thông tin cá nhân</a>
                            </li>
                            <li class="profile-item list-item" onclick="onclick_navbar(this.id);" id="manage">
                                <a class="profile-link manage" onclick="onclick_navbar()">Khóa học trực tuyến</a>
                            </li>
                            {{-- <li class="profile-item list-item" onclick="onclick_navbar(this.id);" id="contact">
                                <a class="profile-link contact" onclick="onclick_navbar()">contact preferences</a>
                            </li>
                            <li class="profile-item list-item" onclick="onclick_navbar(this.id);" id="history">
                                <a class="profile-link history"  onclick="onclick_navbar()">order history</a>
                            </li> --}}
                            <li class="profile-item list-item" onclick="onclick_navbar(this.id);" id="coupon" style="margin-bottom: 20px">
                                <a class="profile-link coupon" onclick="onclick_navbar()">phiếu giảm giá</a>
                            </li>
                        </ul>
                    </div>

                    {{-- <button class="col-lg-12 btn btn-outline-success" id="btn-help" type="button">account setting help</button> --}}
                </div>

                <script>
                    // Add active class to the current button (highlight it)
                    var header = document.getElementById("nav-profile");
                    var btns = header.getElementsByClassName("profile-item");
                    for (var i = 0; i < btns.length; i++) {
                    btns[i].addEventListener("click", function() {
                        var current = document.getElementsByClassName("active2");
                        current[0].className = current[0].className.replace(" active2", "");
                        this.className += " active2";
                        });
                    }
                </script>

                <script>
                    function onclick_navbar( name_id ){
                        var header = document.getElementById("profile_box_content");
                        var btns = header.getElementsByClassName("profile_content_button");
                        for (var i = 0; i < btns.length; i++) {
                        var current = document.getElementsByClassName("profile_content_button");
                        current[i].classList.add('content_none');
                        }
                        var title1 = document.getElementById("profile-title");
                        var btns1 = header.getElementsByClassName("profile-header");
                        for (var j = 0; j < btns.length; j++) {
                        var current = document.getElementsByClassName("profile-header");
                        current[j].classList.add('content_none');
                        }
                        if( name_id == "personal"){
                            document.getElementById("personal_content").classList.remove('content_none');
                            document.getElementById("pi-title").classList.remove('content_none');
                        }
                        if( name_id == "manage"){
                            document.getElementById("manage_content").classList.remove('content_none');
                            document.getElementById("ms-title").classList.remove('content_none');
                        }
                        // if( name_id == "contact"){
                        //     document.getElementById("contact_content").classList.remove('content_none');
                        //     document.getElementById("cp-title").classList.remove('content_none');
                        // }
                        // if( name_id == "history"){
                        //     document.getElementById("history_content").classList.remove('content_none');
                        //     document.getElementById("oh-title").classList.remove('content_none');
                        // }
                        if( name_id == "coupon"){
                            document.getElementById("coupon_content").classList.remove('content_none');
                            document.getElementById("coupon-title").classList.remove('content_none');
                        }
                    }

                </script>

                <div class="col-lg-8 col-md-7 mb-5" id="profile_box_content">
                    <section class="profile_content_button " id="personal_content">
                        <div class="main-profile">
                            <div class="row">
                                <div class="col-lg-8 col-6">
                                    <h5>Thông tin</h5>
                                </div>
                                <div class="col-lg-4 col-6 edit">
                                    <i class="far fa-edit"></i>
                                    <a data-toggle="collapse" href="#collapse" role="button" aria-expanded="false" aria-controls="collapse">
                                        Chỉnh sửa
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="account">
                            <div class="row">
                                <div class="col-lg-3 col-md-4 col-4">
                                    <img src="img/avatar.png" width="100%">
                                </div>
                                <div class="col-lg-9 col-md-8 col-8 infor">
                                    <h5>Tên hiển thị</h5>
                                    <h4>vivamus21288993</h4>
                                </div>
                                <div class="col-lg-12 mt-3">
                                    <div class="collapse" id="collapse">
                                        <form action="">
                                            <label for="">Tên hiển thị mới</label>
                                            <input type="text" name="name" class="form-control" placeholder="Tên hiển thị mới...">
                                            <button class="btn btn-outline-success mt-1" type="submit">Lưu</button>
                                            <button class="btn btn-outline-danger mt-1" type="submit">Hủy</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="add">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h5>Email & Mật khẩu</h5>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <form class="form-send">
                                    <input type="email" name="addemail" class="form-control" placeholder="Nhập email của bạn..." required>
                                    <div class="profile_eye" >
                                        <input id="pass" type="password" name="addpass" class="form-control" placeholder="Tạo mật khẩu (ít nhất 6 ký tự)..." minlength="6" required>
                                        <span toggle="#pass" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                </div>
                                    <button id="btn-add" class="btn btn-outline-success" type="button">Thêm email & mật khẩu</button>
                                </form>
                                <script>
                                    $(".toggle-password").click(function() {

                                        $(this).toggleClass("fa-eye fa-eye-slash");
                                        var input = $($(this).attr("toggle"));
                                        if (input.attr("type") == "password") {
                                        input.attr("type", "text");
                                        } else {
                                        input.attr("type", "password");
                                        }
                                    });
                                </script>
                            </div>

                            <div class="col-lg-6 why-question">
                                <h5>Tại sao phải thêm email và mật khẩu? </h5>
                                <ul>
                                    <li>
                                        Đăng nhập bằng email
                                    </li>
                                    <li>
                                        Nhận tin tức và phiếu giảm giá trong hộp thư đến của bạn!
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </section>

                    <section class="profile_content_button content_none profile" id="manage_content">
                        <div class="main-manage">
                            <div class="row">
                                <div class="col-lg-12">
                                    <p>5/31/2020 is the last day Bluprint will be taking orders</p>
                                    <button type="button" onclick="window.location.href='class.php'" class="learn-more">Bắt đầu học</button>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="add">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h5>Payment</h5>
                                </div>
                            </div>
                        </div>
                        <div class="manage-payment">
                            <div class="row">
                                <div class="col-lg-12">
                                    You don't have any saved payment methods.
                                </div>
                            </div>
                        </div> --}}
                    </section>

                    {{-- <section class="profile_content_button content_none contact_content" id="contact_content">
                        <div class="col-lg-12 main-profile" style="padding-left: 0;">
                            <div class="row">
                                <div class="row collapsed" data-toggle="collapse" data-target="#emailpreferences" style="padding-left:15px;">
                                    <button class="btn icon-down" style="padding-top: 0%;"></button>
                                    <h5>Email Preferences</h5>
                                </div>
                                <div id="emailpreferences" class="col-lg-12 collapse">
                                    <div class="main-manage">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <h3>Need some space?</h3>
                                                <p>Or perhaps you want to take this relationship to the next level.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="manage-check">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <h5>Announcements and tips</h5>
                                                <p>Inspiration for your next project, sale alerts, updates on new products, plus useful articles and tips.</p>
                                            </div>
                                            <div class="col-lg-12 form-check">
                                                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                                                <label class="form-check-label" for="exampleRadios1">
                                                    All promotional emails
                                                </label>
                                            </div>
                                            <div class="col-lg-12 form-check">
                                                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                                                <label class="form-check-label" for="exampleRadios2">
                                                    One promotional email a week
                                                </label>
                                            </div>
                                            <div class="col-lg-12 form-check">
                                                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios3" value="option3">
                                                <label class="form-check-label" for="exampleRadios3">
                                                    No promotional emails
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="manage-check2">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <h5>Your Activity</h5>
                                                <p>Pattern and project updates and replies to your questions and comments.</p>
                                            </div>
                                            <div class="col-lg-12 form-check">
                                                <input class="form-check-input" type="checkbox" id="Checkbox1" value="option1" aria-label="...">
                                                <label class="form-check-label" for="Checkbox1">
                                                    All activity alerts
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="button" class="btn-save">Save</button>
                                    <div class="manage-unsubscribe">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <h5>Unsubscribe</h5>
                                                <p>Unsubscribe from all Bluprint email. (You will still get critical emails about your purchases.)</p>
                                                <button type="button" class="btn-save">Unsubscribe All</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 main-profile" style="padding-left: 0; border-top: 0;">
                            <div class="row">
                                <div class="row collapsed" data-toggle="collapse" data-target="#mailpreferences" style="padding-left:15px;">
                                    <button class="btn icon-down" style="padding-top: 0%;"></button>
                                    <h5>Mail Preferences</h5>
                                </div>
                                <div id="mailpreferences" class="col-lg-12 collapse">
                                    <div class="main-manage">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <h3>Mailbox Overstuffed?</h3>
                                                <p>Or maybe you have room for just a bit more...</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="manage-check">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <h5>CATALOGS & COLLATERAL</h5>
                                                <p>Seasonal catalogs, postcards and coupons, plus inspiration and information on our favorite brands and products.</p>
                                            </div>
                                            <div class="col-lg-12 form-check">
                                                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                                                <label class="form-check-label" for="exampleRadios1">
                                                    Yes, send me physical mail (just like the good old days!)
                                                </label>
                                            </div>
                                            <div class="col-lg-12 form-check">
                                                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                                                <label class="form-check-label" for="exampleRadios2">
                                                    No, I don't want physical mail (I'd rather save the trees!)
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="button" class="btn-save">Save</button>
                                </div>
                            </div>
                        </div>
                    </section>

                    <section class="profile_content_button content_none profile" id="history_content">
                        <div class="shopping-empty">
                            <img class="mx-auto d-block" src="img/shoppingcart.png" width="15%">
                            <span class="mx-auto d-block">No orders placed yet</span>
                            <p class="text-center">If you think this may be a mistake, please contact <a href="#" style="font-weight: 600;text-decoration: none;">customer support</a>.</p>
                        </div>
                    </section> --}}

                    <section class="profile_content_button content_none profile coupon_content" id="coupon_content">
                        <div class="coupon-title">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h4>Member Perks</h4>
                                </div>
                            </div>
                        </div>
                        <div class="main-coupon">
                            <div class="row">
                                <div class="col-lg-12">
                                    <svg class="bi bi-gift" width="5em" height="5em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M2 6v8.5a.5.5 0 0 0 .5.5h11a.5.5 0 0 0 .5-.5V6h1v8.5a1.5 1.5 0 0 1-1.5 1.5h-11A1.5 1.5 0 0 1 1 14.5V6h1zm8-5a1.5 1.5 0 0 0-1.5 1.5c0 .098.033.16.12.227.103.081.272.15.49.2A3.44 3.44 0 0 0 9.96 3h.015L10 2.999l.025.002h.014A2.569 2.569 0 0 0 10.293 3c.17-.006.387-.026.598-.073.217-.048.386-.118.49-.199.086-.066.119-.13.119-.227A1.5 1.5 0 0 0 10 1zm0 3h-.006a3.535 3.535 0 0 1-.326 0 4.435 4.435 0 0 1-.777-.097c-.283-.063-.614-.175-.885-.385A1.255 1.255 0 0 1 7.5 2.5a2.5 2.5 0 0 1 5 0c0 .454-.217.793-.506 1.017-.27.21-.602.322-.885.385a4.434 4.434 0 0 1-1.104.099H10z"/>
                                        <path fill-rule="evenodd" d="M6 1a1.5 1.5 0 0 0-1.5 1.5c0 .098.033.16.12.227.103.081.272.15.49.2A3.44 3.44 0 0 0 5.96 3h.015L6 2.999l.025.002h.014l.053.001a3.869 3.869 0 0 0 .799-.076c.217-.048.386-.118.49-.199.086-.066.119-.13.119-.227A1.5 1.5 0 0 0 6 1zm0 3h-.006a3.535 3.535 0 0 1-.326 0 4.435 4.435 0 0 1-.777-.097c-.283-.063-.614-.175-.885-.385A1.255 1.255 0 0 1 3.5 2.5a2.5 2.5 0 0 1 5 0c0 .454-.217.793-.506 1.017-.27.21-.602.322-.885.385a4.435 4.435 0 0 1-1.103.099H6zm1.5 12V6h1v10h-1z"/>
                                        <path fill-rule="evenodd" d="M15 4H1v1h14V4zM1 3a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1H1z"/>
                                    </svg>
                                </div>
                                <div class="col-lg-12">
                                    <h7>It looks like you're not a member yet. Join now to unlock exclusive perks like own-forever classes and discounts every time you shop!
                                    </h7>
                                </div>
                                <div class="col-lg-12">
                                    <button type="button" class="btn-save">Start Free Trial</button>
                                </div>
                                <div class="col-lg-12">
                                    <button type="button" class="btn-more">Learn More</button>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </section>

@endsection
