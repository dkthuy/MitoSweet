@extends('admin.layout.main')
{{-- @push('css')

@endpush --}}

@section('header-body')
    <div class="row">
        <div class="col-lg-9 col-md-8">
            <div class="breadcrumb-admin d-inline">
                <i class="fas fa-gift"></i>
                @lang('modules.dashboard.menu.class.discount')
            </div>
            <div class="btn-group-sm btn-func d-inline">
                <button type="button" class="btn btn-dark reload">
                    <i class="fas fa-sync-alt"></i>
                </button>
                <button type="button" class="btn btn-primary" onclick="openModal()">
                    <i class="fas fa-plus"></i>
                </button>
                <button type="button" class="btn btn-danger btn-del-show">
                    <i class="fas fa-trash-alt"></i>
                </button>
            </div>
        </div>
        <div class="col-lg-3 col-md-4">
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
                    <form method="POST" action="coupons/add" class="change-form" enctype="multipart/form-data">
                        @csrf
                        <label for="" class="required control-label">@lang('modules.discount.code')</label>
                        <input class="form-control" name="code" placeholder="VD: ABC20" required pattern="[A-Z]{3}[0-9]{2}">
                        <label for="" class="required control-label">@lang('modules.discount.discount')</label>
                        <input class="form-control" type="number" name="discount" min="10" max="80" placeholder="10 -> 80" required>
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

{{-- Bắt lỗi = validation --}}
{{-- @if ($errors->any())
    <div class="alert alert-danger alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif --}}

{{-- Xóa nhiều--}}
<div class="btn-group-sm btn-gr d-none">
    <input type="checkbox" id="checkAll">
    <button type="submit" class="btn btn-danger btn-dis">
        <i class="fas fa-trash-alt"></i>
    </button>
</div>

<div class="table-responsive">
    <table class="table table-bordered text-center"  id="data_news">
        <thead>
        <tr>
            <th scope="col" class="btn-gr d-none">#</th>
            <th scope="col">Mã giảm giá</th>
            <th scope="col">Giảm giá (%)</th>
            <th scope="col">Thời gian tạo</th>
            <th scope="col">Chức năng</th>
        </tr>
        </thead>
        <tbody id="search-body">
            @foreach ($discount as $coupons)
            <tr>
                <td class="btn-gr d-none"><input type="checkbox" class="check" name="delete[]" value="{{ $coupons->id }}"></td>
                <td>{{ $coupons->code }}</td>
                <td>{{ $coupons->discount }}</td>
                <td>{{ $coupons->created_at }}</td>
                <td>
                    <div class="btn-group-sm btn-func">
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editModal{{$coupons->id}}">
                            <span class="fas fa-edit"></span>
                        </button>
                        <a href="{{ url('coupons/delete') }}/{{$coupons->id}}" class="btn btn-primary" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">
                            <span class="fas fa-trash-alt"></span>
                        </a>
                    </div>
                </td>
                {{-- form edit --}}
                <div class="modal fade" id="editModal{{$coupons->id}}">
                    <div class="modal-dialog modal-xl modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5>@lang('modules.button.edit')</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form method="POST" action="{{ url('coupons/edit') }}/{{$coupons->id}}" class="change-form" enctype="multipart/form-data">
                                    @csrf
                                    <label for="" class="required control-label">@lang('modules.discount.code')</label>
                                    <input class="form-control" value="{{$coupons->code}}" name="code" placeholder="VD: ABC20" required pattern="[A-Z]{3}[0-9]{2}">
                                    <label for="" class="required control-label">@lang('modules.discount.discount')</label>
                                    <input class="form-control" type="number" value="{{$coupons->discount}}" name="discount" min="10" max="80" placeholder="10 -> 80" required>
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
    {{$discount->links('admin.layout.pagination')}}
</div>



@endsection

@push('scripts')

    <script type="text/javascript" src="..\js\main.js"></script>
    <script type="text/javascript" src="..\js\upload.js"></script>

@endpush
