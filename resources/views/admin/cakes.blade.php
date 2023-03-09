@extends('admin.layout.main')
{{-- @push('css')
@endpush --}}

@section('header-body')
    <div class="row">
        <div class="col-lg-9 col-md-8">
            <div class="breadcrumb-admin d-inline">
                <i class="fas fa-birthday-cake"></i>
                @lang('modules.dashboard.menu.cake.title')
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
                    <form method="POST" action="cakes/add" class="change-form" enctype="multipart/form-data">
                        @csrf
                        <div class="input-group">
                            <span class="input-group-btn">
                              <a id="btn-img" data-input="thumbnail" data-preview="box-preview-img" class="btn btn-outline-primary">
                               Chọn tệp:
                              </a>
                            </span>
                            <input class="form-control thumbnail" type="text" name="filepath">
                        </div>
                        <div class="box-preview-img"></div>
                        <label for="" class="required control-label">@lang('modules.cake.name')</label>
                        <input class="form-control" name="title" required>
                        <label for="" class="required control-label">@lang('modules.cake.summary')</label>
                        <input class="form-control" name="summary" required>
                        <label for="" class="required control-label">@lang('modules.cake.content')</label>
                        <textarea class="detail" name="detail">{!! old('detail', $detail ?? '') !!}</textarea>
                        <label for="" class="control-label">@lang('modules.cake.note')</label>
                        <input class="form-control" name="note">
                        <label for="" class="required control-label">@lang('modules.cake.type')</label>
                        <select class="js-type form-control" name="type" id="type">
                            @foreach ($type as $item)
                                <option value="{{$item->id}}">{{$item->title}}</option>
                            @endforeach
                        </select>
                        <label for="" class="required control-label">@lang('modules.cake.code')</label>
                        <input class="form-control" name="code" placeholder="VD: A123" required pattern="[A-Z]{1}[0-9]{3}">
                        <label for="" class="required control-label">Giá cho size nhỏ nhất: </label>
                        <input class="form-control" name="price" required>
                        <label for="" class="control-label d-block">@lang('modules.cake.size')</label>
                        @foreach ($size as $sizes)
                            <input type="checkbox" class="size" name="size[]" value="{{ $sizes->id }}">
                            {{$sizes->title}} &emsp;
                        @endforeach

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

{{-- Xóa nhiều--}}
<div class="btn-group-sm btn-gr d-none">
    <input type="checkbox" id="checkAll">
    <button type="submit" class="btn btn-danger btn-cake">
        <i class="fas fa-trash-alt"></i>
    </button>
</div>

<div class="table-responsive">
    <table class="table table-bordered text-center"  id="data_cake">
        <thead>
        <tr>
            <th scope="col" class="btn-gr d-none">#</th>
            <th scope="col">Hình ảnh</th>
            <th scope="col">Tên bánh</th>
            <th scope="col">Loại bánh</th>
            <th scope="col">Mã bánh</th>
            <th scope="col">Kích thước</th>
            <th scope="col">Giá sản phẩm</th>
            <th scope="col">Thời gian tạo</th>
            <th scope="col">Chức năng</th>
        </tr>
        </thead>
        <tbody id="search-body">
            @foreach ($cake as $cakes)
            <tr>
                <td class="btn-gr d-none"><input type="checkbox" class="check" name="delete[]" value="{{ $cakes->id }}"></td>
                <td>@php
                        $db = explode(",", $cakes->img);
                    @endphp
                    <img src="{{ $db[0] }}" class="preview-img">
                </td>
                <td>{{ $cakes->title }}</td>
                <td>@foreach ($type as $types)
                        @if ($cakes->cake_types == $types->id)
                            {{ $types->title }}
                        @endif
                    @endforeach
                </td>
                <td>{{ $cakes->code }}</td>
                <td>@foreach ($size as $sizes)
                        @foreach (explode(",", $cakes->cake_sizes) as $item)
                            @if ($item == $sizes->id)
                                {{ $sizes->title }}<br>
                            @endif
                        @endforeach
                    @endforeach
                </td>
                <td>@foreach ($size as $sizes)
                        @foreach (explode(",", $cakes->cake_sizes) as $item)
                            @if ($item == $sizes->id)
                                {{ ($cakes->price)*($sizes->heso) }}₫<br>
                            @endif
                        @endforeach
                    @endforeach
                </td>
                <td>{{ $cakes->created_at }}</td>
                <td>
                    <div class="btn-group-sm btn-func">
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editModal{{$cakes->id}}">
                            <span class="fas fa-edit"></span>
                        </button>
                        <a href="{{ url('cakes/delete') }}/{{$cakes->id}}" class="btn btn-primary" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">
                            <span class="fas fa-trash-alt"></span>
                        </a>
                    </div>
                </td>
                {{-- form edit --}}
                <div class="modal fade" id="editModal{{$cakes->id}}">
                    <div class="modal-dialog modal-xl modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5>@lang('modules.button.edit')</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form method="POST" action="{{ url('cakes/edit') }}/{{$cakes->id}}" class="change-form" enctype="multipart/form-data">
                                    @csrf
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                            <a id="btn-edit-img" data-input="thumbnail-edit" data-preview="edit-img" class="btn btn-outline-primary">
                                            Chọn tệp:
                                            </a>
                                        </span>
                                        <input class="form-control thumbnail-edit" type="text" name="filepath" value="{{ $cakes->img }}">
                                    </div>
                                    <div class="box-preview-img edit-img">
                                        @foreach (explode(",", $cakes->img) as $item)
                                            <img src="{{ $item }}">
                                        @endforeach
                                    </div>
                                    <label for="" class="required control-label">@lang('modules.cake.name')</label>
                                    <input class="form-control" value="{{$cakes->title}}" name="title" required>
                                    <label for="" class="required control-label">@lang('modules.cake.summary')</label>
                                    <input class="form-control" value="{{$cakes->summary}}" name="summary" required>
                                    <label for="" class="required control-label">@lang('modules.cake.content')</label>
                                    <textarea class="edit-detail" name="detail">{!! old('detail', $cakes->detail) !!}</textarea>
                                    <label for="" class="required control-label">@lang('modules.cake.type')</label>
                                    <select class="js-type form-control" name="type">
                                        @foreach ($type as $item)
                                            @if ($cakes->cake_types == $item->id)
                                                <option selected value="{{$item->id}}">{{$item->title}}</option>
                                            @else
                                                <option value="{{$item->id}}">{{$item->title}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    <label for="" class="required control-label">@lang('modules.cake.code')</label>
                                    <input class="form-control" value="{{$cakes->code}}" name="code" placeholder="VD: A123" required pattern="[A-Z]{1}[0-9]{3}">
                                    <label for="" class="required control-label">Giá cho size nhỏ nhất: </label>
                                    <input class="form-control" value="{{$cakes->price}}" name="price" required>
                                    <label for="" class="control-label d-block">@lang('modules.cake.size')</label>
                                    @foreach ($size as $sizes)
                                        {{-- kiểm tra g/trị $sizes->id có trong mảng explode(",", $cakes->cake_sizes) hay k? --}}
                                        @if(in_array($sizes->id, explode(",", $cakes->cake_sizes)))
                                            <input type="checkbox" class="size" name="size[]" value="{{ $sizes->id }}" checked>
                                            {{$sizes->title}} &emsp;
                                        @else
                                            <input type="checkbox" class="size" name="size[]" value="{{ $sizes->id }}">
                                            {{$sizes->title}} &emsp;
                                        @endif
                                    @endforeach
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
    {{$cake->links('admin.layout.pagination')}}
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

@endpush
