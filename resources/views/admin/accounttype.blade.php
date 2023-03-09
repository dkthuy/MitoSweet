@extends('admin.layout.main')
{{-- @push('css')
@endpush --}}

@section('header-body')
    <div class="row">
        <div class="col-lg-9">
            <div class="breadcrumb-admin d-inline">
                <i class="fas fa-barcode"></i>
                    Loại tài khoản
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
                    <form method="POST" action="account-types/add" class="change-form" enctype="multipart/form-data">
                        @csrf
                        <label for="" class="required control-label">Tên loại tài khoản</label>
                        <input class="form-control mb-3" name="name" required>
                        <label for="" class="required control-label">Quyền tài khoản</label>
                        <div class="mb-3">
                            @foreach ($role as $roles)
                                <div style="display: block; margin-bottom: 5px">
                                    <input type="checkbox" name="role[]" value="{{ $roles->id }}">
                                    {{$roles->name}}
                                </div>
                            @endforeach
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
            <th scope="col">Loại tài khoản</th>
            <th scope="col">Thời gian tạo</th>
            <th scope="col">Chức năng</th>
        </tr>
        </thead>
        <tbody id="search-body">
            @foreach ($type as $item)
            <tr>
                <td>{{ $item->name }}</td>
                <td>{{ $item->created_at }}</td>
                <td>
                    @if ($item->id == 1)
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
                            <a href="{{ url('account-types/delete') }}/{{$item->id}}" class="btn btn-primary" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">
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
                                <form method="POST" action="{{ url('account-types/edit') }}/{{$item->id}}" class="change-form" enctype="multipart/form-data">
                                    @csrf
                                    <label for="" class="required control-label" style="font-family: 'font-medium';">Tên loại tài khoản</label>
                                    <input class="form-control mb-3" value="{{$item->name}}" name="name" required>
                                    <label for="" class="required control-label" style="font-family: 'font-medium';">Quyền tài khoản</label>
                                    <div class="mb-3">
                                        @foreach ($role as $roles)
                                            @if(in_array($roles->id, explode(",", $item->roles)))
                                            <div style="display: block; margin-bottom: 5px">
                                                <input type="checkbox" name="role[]" value="{{ $roles->id }}" checked>
                                                {{$roles->name}}
                                            </div>
                                            @else
                                            <div style="display: block; margin-bottom: 5px">
                                                <input type="checkbox" name="role[]" value="{{ $roles->id }}">
                                                {{$roles->name}}
                                            </div>
                                            @endif
                                        @endforeach
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
    {{$type->links('admin.layout.pagination')}}
</div>

@endsection

@push('scripts')

    <script type="text/javascript" src="..\js\main.js"></script>
    <script type="text/javascript" src="..\js\upload.js"></script>
    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
    <script>
        // var route_prefix = "laravel-filemanager";
        // $('#btn-img').filemanager('image', {prefix: route_prefix});
        // $('a#btn-edit-img').filemanager('image', {prefix: route_prefix});
        $('#btn-img').filemanager('image');
        $('a#btn-edit-img').filemanager('image');
    </script>
@endpush
