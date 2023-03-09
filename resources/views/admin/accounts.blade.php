@extends('admin.layout.main')
{{-- @push('css')
@endpush --}}

@section('header-body')
    <div class="row">
        <div class="col-lg-9">
            <div class="breadcrumb-admin d-inline">
                <i class="fas fa-list"></i>
                    Danh sách tài khoản
            </div>
            <div class="btn-group-sm btn-func d-inline">
                <button type="button" class="btn btn-dark reload">
                    <i class="fas fa-sync-alt"></i>
                </button>
                <button type="button" class="btn btn-primary" onclick="openModal()">
                    <i class="fas fa-plus"></i>
                </button>
            </div>
        </div>
        <div class="col-lg-3">
            <input class="form-control d-inline" name="search" id="search" placeholder="Tìm kiếm...">
        </div>
    </div>
    {{-- form add --}}
    <div class="modal fade" id="addModal">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>@lang('modules.button.add')</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="accounts/add" class="change-form" enctype="multipart/form-data">
                        @csrf
                        <label for="" class="required control-label">Ảnh đại diện</label>
                        <div class="input-group">
                            <span class="input-group-btn">
                              <a id="btn-img" data-input="thumbnail" data-preview="box-preview-img" class="btn btn-outline-primary">
                               Chọn tệp:
                              </a>
                            </span>
                            <input class="form-control thumbnail" type="text" name="filepath">
                        </div>
                        <div class="box-preview-img"></div>
                        <div class="form-row mb-3">
                            <div class="col-lg-3 col-md-6 col-12">
                                <label for="" class="required control-label">Tên đăng nhập</label>
                                <input class="form-control" name="name" required>
                            </div>
                            <div class="col-lg-3 col-md-6 col-12">
                                <label for="" class="required control-label">Mật khẩu</label>
                                <div class="profile_eye" >
                                    <input id="pass" type="password" name="password" class="form-control" placeholder="Mật khẩu" minlength="6" maxlength="10" required>
                                    <span toggle="#pass" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-12">
                                <label for="" class="required control-label">Họ và tên</label>
                                <input class="form-control" name="fullname" required>
                            </div>
                            <div class="col-lg-3 col-md-6 col-12">
                                <label for="" class="required control-label">Email</label>
                                <input type="email" class="form-control" name="email" required>
                            </div>
                            <div class="col-lg-3 col-md-6 col-12">
                                <label for="" class="required control-label">Số điện thoại</label>
                                <input class="form-control" name="phone" pattern="(09|03|07|08|05)+([0-9]{8})\b" required>
                            </div>
                            <div class="col-lg-3 col-md-6 col-12">
                                <label for="" class="required control-label">Loại tài khoản</label>
                                <select class="js-type form-control" name="type" id="type">
                                    @foreach ($type as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-3 col-md-6 col-12">
                                <label for="" class="required control-label">Trạng thái</label><br>
                                <input type="checkbox" name="status" value="0">Không hoạt động
                                <br>
                                <input type="checkbox" name="status" value="1">Hoạt động
                            </div>
                        </div>

                        <button class="btn-change">@lang('modules.changeinfor.confirm')</button>
                        <button class="btn-back" data-dismiss="modal">@lang('modules.back')</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- end add --}}
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

<div class="table-responsive">
    <table class="table table-bordered text-center"  id="data_news">
        <thead>
        <tr>
            {{-- <th scope="col" class="btn-gr d-none">#</th> --}}
            <th scope="col">Ảnh đại diện</th>
            <th scope="col">Tên đăng nhập</th>
            <th scope="col">Loại tài khoản</th>
            <th scope="col">Tên đầy đủ</th>
            <th scope="col">Email</th>
            <th scope="col">Số điện thoại</th>
            <th scope="col">Trạng thái</th>
            <th scope="col">Chức năng</th>
        </tr>
        </thead>
        <tbody id="search-body">
            @foreach ($account as $item)
            <tr>
                <td><img src="{{ $item->img }}" class="preview-img"></td>
                <td>{{ $item->name }}</td>
                <td>@foreach ($type as $types)
                        @if ($item->type == $types->id)
                            {{ $types->name }}
                        @endif
                    @endforeach
                </td>
                <td>{{ $item->fullname }}</td>
                <td>{{ $item->email }}</td>
                <td>{{ $item->phone }}</td>
                <td>@if ( $item->status == 1)
                        <span style="color: green; font-family:'font-medium'">Hoạt động</span>
                    @else
                        <span style="color:red; font-family:'font-medium'">Không hoạt động</span>
                    @endif

                <td>
                    @if ($item->type == 1)
                        <div class="btn-group-sm btn-func">
                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editModal{{$item->id}}">
                                <span class="fas fa-edit"></span>
                            </button>
                        </div>
                    @else
                        <div class="btn-group-sm btn-func">
                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editModal{{$item->id}}">
                                <span class="fas fa-edit"></span>
                            </button>
                            <a href="{{ url('accounts/delete') }}/{{$item->id}}" class="btn btn-primary" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">
                                <span class="fas fa-trash-alt"></span>
                            </a>
                        </div>
                    @endif
                </td>
                {{-- form edit --}}
                <div class="modal fade" id="editModal{{$item->id}}">
                    <div class="modal-dialog modal-xl modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5>@lang('modules.button.edit')</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form method="POST" action="{{ url('accounts/edit') }}/{{$item->id}}" class="change-form" enctype="multipart/form-data">
                                    @csrf
                                    <label for="" class="required control-label">Ảnh đại diện</label>
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                            <a id="btn-edit-img" data-input="thumbnail-edit" data-preview="edit-img" class="btn btn-outline-primary">
                                            Chọn tệp:
                                            </a>
                                        </span>
                                        <input class="form-control thumbnail-edit" type="text" name="filepath" value="{{ $item->img }}">
                                    </div>
                                    <div class="box-preview-img edit-img">
                                            <img src="{{ $item->img }}">
                                    </div>
                                    <div class="form-row mb-3">
                                        <div class="col-lg-3 col-md-6 col-12">
                                            <label for="" class="required control-label">Tên đăng nhập</label>
                                            <input class="form-control" name="name" value="{{$item->name}}" required>
                                        </div>
                                        <div class="col-lg-3 col-md-6 col-12">
                                            <label for="" class="required control-label">Họ và tên</label>
                                            <input class="form-control" name="fullname" value="{{$item->fullname}}" required>
                                        </div>
                                        <div class="col-lg-3 col-md-6 col-12">
                                            <label for="" class="required control-label">Email</label>
                                            <input type="email" class="form-control" name="email" value="{{$item->email}}" required>
                                        </div>
                                        <div class="col-lg-3 col-md-6 col-12">
                                            <label for="" class="required control-label">Số điện thoại</label>
                                            <input class="form-control" name="phone" pattern="(09|03|07|08|05)+([0-9]{8})\b" value="{{$item->phone}}" required>
                                        </div>
                                        <div class="col-lg-3 col-md-6 col-12">
                                            <label for="" class="required control-label">Loại tài khoản</label>
                                            <select class="js-type form-control" name="type" id="type">
                                                @foreach ($type as $types)
                                                    @if ($item->type == $types->id)
                                                        <option selected value="{{$types->id}}">{{$types->name}}</option>
                                                    @else
                                                        <option value="{{$types->id}}">{{$types->name}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-lg-3 col-md-6 col-12">
                                            <label for="" class="required control-label">Trạng thái</label><br>
                                            @if($item->status == 0)
                                                <input type="checkbox" name="status" value="0" checked>
                                                Không hoạt động
                                                <br>
                                                <input type="checkbox" name="status" value="1">
                                                Hoạt động
                                            @else
                                                <input type="checkbox" name="status" value="0">
                                                Không hoạt động
                                                <br>
                                                <input type="checkbox" name="status" value="1" checked>
                                                Hoạt động
                                            @endif
                                        </div>
                                    </div>

                                    <button class="btn-change">@lang('modules.changeinfor.confirm')</button>
                                    <button class="btn-back" data-dismiss="modal">@lang('modules.back')</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- end edit --}}
            </tr>
            @endforeach
        </tbody>
    </table>
    {{$account->links('admin.layout.pagination')}}
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
    {{-- <script>
        $(document).ready(function() {
            $('.btn-change').click(function() {
            var vnf_regex = /((09|03|07|08|05)+([0-9]{8})\b)/g;
            var mobile = $('.phone').val();
            if(mobile !==''){
                if (vnf_regex.test(mobile) == false)
                {
                    alert('Số điện thoại của bạn không đúng định dạng!');
                }else{
                    alert('Số điện thoại của bạn hợp lệ!');
                }
            }else{
                alert('Bạn chưa điền số điện thoại!');
            }
            });
        });
    </script> --}}
@endpush
