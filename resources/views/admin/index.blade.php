@extends('admin.layout.main')

@section('header-body')
    <div class="breadcrumb-admin">
        <i class="far fa-id-card"></i>
        @lang('modules.admin.profile')
    </div>
@endsection

@section('content-body')
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
    <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-6 col-12 avatar">
                <img src="{{$data_user->img}}">
                <label>@lang('modules.admin.avatar')</label>
            </div>
            <div class="col-lg-8 col-md-8 col-sm-6 col-12 profile-infor">
                <h5 class="text-capitalize">{{$data_user->name}}</h5>
                <h6>@lang('modules.dashboard.menu.admin.type') :
                    @foreach ($type as $item)
                        @if ($data_user->type == $item->id)
                            <i class="text-capitalize">{{$item->name}}</i>
                        @endif
                    @endforeach
                </h6>
                <br>

                <a type="button" id="changepass" data-toggle="modal" data-target="#pass{{$data_user->id}}">@lang('modules.admin.changepass')</a><br>
                <div class="modal fade" id="pass{{$data_user->id}}">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5>Đổi mật khẩu</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form method="POST" action="{{ url('change-pass') }}/{{$data_user->id}}" class="change-form" enctype="multipart/form-data">
                                    @csrf
                                    <div class="profile_eye" >
                                        <input id="pass" type="password" name="password" class="form-control" placeholder="Mật khẩu mới" minlength="6" maxlength="10" required>
                                        <span toggle="#pass" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                    </div>
                                    <input id="pass" type="password" name="checkpass" class="form-control" placeholder="Nhập lại mật khẩu mới" minlength="6" maxlength="10" required>

                                    <button class="btn-change">@lang('modules.changeinfor.confirm')</button>
                                    <button class="btn-back" data-dismiss="modal">@lang('modules.back')</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <a type="button" data-toggle="modal" data-target="#edit{{$data_user->id}}" id="changeinfor">@lang('modules.admin.changeinfor')</a>
                <div class="modal fade" id="edit{{$data_user->id}}">
                    <div class="modal-dialog modal-xl modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5>Chỉnh sửa thông tin cá nhân</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body text-left">
                                <form method="POST" action="{{ url('edit') }}/{{$data_user->id}}" class="change-form" enctype="multipart/form-data">
                                    @csrf
                                    <label for="" class="required control-label">Ảnh đại diện</label>
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                            <a id="btn-edit-img" data-input="thumbnail-edit" data-preview="edit-img" class="btn btn-outline-primary">
                                            Chọn tệp:
                                            </a>
                                        </span>
                                        <input class="form-control thumbnail-edit" type="text" name="filepath" value="{{ $data_user->img }}">
                                    </div>
                                    <div class="box-preview-img edit-img">
                                            <img src="{{ $data_user->img }}">
                                    </div>
                                    <div class="form-row mb-3">
                                        <div class="col-lg-3 col-md-6 col-12">
                                            <label for="" class="required control-label">Tên đăng nhập</label>
                                            <input class="form-control" name="name" value="{{$data_user->name}}" required>
                                        </div>
                                        <div class="col-lg-3 col-md-6 col-12">
                                            <label for="" class="required control-label">Họ và tên</label>
                                            <input class="form-control" name="fullname" value="{{$data_user->fullname}}" required>
                                        </div>
                                        <div class="col-lg-3 col-md-6 col-12">
                                            <label for="" class="required control-label">Email</label>
                                            <input type="email" class="form-control" name="email" value="{{$data_user->email}}" required>
                                        </div>
                                        <div class="col-lg-3 col-md-6 col-12">
                                            <label for="" class="required control-label">Số điện thoại</label>
                                            <input class="form-control" name="phone" pattern="(09|03|07|08|05)+([0-9]{8})\b" value="{{$data_user->phone}}" required>
                                        </div>
                                    </div>

                                    <button class="btn-change">@lang('modules.changeinfor.confirm')</button>
                                    <button class="btn-back" data-dismiss="modal">@lang('modules.back')</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <br><br>

                <p><i class="fas fa-envelope"></i>@lang('modules.admin.mail'): {{$data_user->email}}</p>
                <p><i class="fas fa-phone"></i>@lang('modules.admin.phone'): {{$data_user->phone}}</p>
            </div>
    </div>
@endsection
@push('scripts')

    <script type="text/javascript" src="..\js\main.js"></script>
    <script type="text/javascript" src="..\js\upload.js"></script>
    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
    <script>
        $('#btn-img').filemanager('image');
        $('a#btn-edit-img').filemanager('image');
    </script>
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
@endpush
