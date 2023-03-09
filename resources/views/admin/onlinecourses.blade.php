@extends('admin.layout.main')
{{-- @push('css')

@endpush --}}

@section('header-body')
    <div class="row">
        <div class="col-lg-9 col-md-8">
            <div class="breadcrumb-admin d-inline">
                <i class="fas fa-graduation-cap"></i>
                @lang('modules.dashboard.menu.class.online')
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
                    <form method="POST" action="online/add" class="change-form" enctype="multipart/form-data">
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
                        <label for="" class="required control-label">@lang('modules.online.name')</label>
                        <input class="form-control" name="title" required>
                        <label for="" class="required control-label">@lang('modules.online.summary')</label>
                        <input class="form-control" name="summary" required>
                        <label for="" class="required control-label">@lang('modules.online.content')</label>
                        <textarea class="detail" name="detail">{!! old('detail', $detail ?? '') !!}</textarea>
                        <label for="" class="required control-label">@lang('modules.online.level')</label>
                        <select class="js-level form-control" name="level">
                            @foreach ($level as $item)
                                <option value="{{$item->id}}">{{$item->title}}</option>
                            @endforeach
                        </select>
                        <label for="" class="required control-label">@lang('modules.online.price')</label>
                        <input class="form-control" name="price" required>
                        <label for="" class="control-label">@lang('modules.online.promo_price')</label>
                        <input class="form-control" name="promo">
                        <label for="" class="required control-label">@lang('modules.online.lesson')</label>
                        <input class="form-control" name="lesson" required>
                        <label for="" class="control-label">@lang('modules.online.trailer')</label>
                        <input class="form-control" name="trailer">
                        <label for="" class="control-label">@lang('modules.online.video')</label>
                        <div class="form-add-video" ></div>

                        <a class="d-block add-video" style="font-family: font-medium; color:2e1503; cursor: pointer;">Thêm...</a>
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
    <button type="submit" class="btn btn-danger btn-onl">
        <i class="fas fa-trash-alt"></i>
    </button>
</div>

<div class="table-responsive">
    <table class="table table-bordered text-center"  id="data_news">
        <thead>
        <tr>
            <th scope="col" class="btn-gr d-none">#</th>
            <th scope="col">Hình ảnh</th>
            <th scope="col">Tên khóa học</th>
            <th scope="col">Cấp độ</th>
            <th scope="col">Số bài học</th>
            <th scope="col">Giá</th>
            <th scope="col">Thời gian tạo</th>
            <th scope="col">Chức năng</th>
        </tr>
        </thead>
        <tbody id="search-body">
            @foreach ($online as $courses)
            <tr>
                <td class="btn-gr d-none"><input type="checkbox" class="check" name="delete[]" value="{{ $courses->id }}"></td>
                <td>@php
                        $db = explode(",", $courses->img);
                    @endphp
                    <img src="{{ $db[0] }}" class="preview-img">
                </td>
                <td>{{ $courses->title }}</td>
                <td>@foreach ($level as $levels)
                        @if ($courses->level == $levels->id)
                            {{ $levels->title }}
                        @endif
                    @endforeach
                </td>
                <td>{{ $courses->lesson }}</td>
                <td>{{ $courses->price }}</td>
                <td>{{ $courses->created_at }}</td>
                <td>
                    <div class="btn-group-sm btn-func">
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editModal{{$courses->id}}">
                            <span class="fas fa-edit"></span>
                        </button>
                        <a href="{{ url('online/delete') }}/{{$courses->id}}" class="btn btn-primary" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">
                            <span class="fas fa-trash-alt"></span>
                        </a>
                    </div>
                </td>
                {{-- form edit --}}
                <div class="modal fade" id="editModal{{$courses->id}}">
                    <div class="modal-dialog modal-xl modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5>@lang('modules.button.edit')</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form method="POST" action="{{ url('online/edit') }}/{{$courses->id}}" class="change-form" enctype="multipart/form-data">
                                    @csrf
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                            <a id="btn-edit-img" data-input="thumbnail-edit" data-preview="edit-img" class="btn btn-outline-primary">
                                            Chọn tệp:
                                            </a>
                                        </span>
                                        <input class="form-control thumbnail-edit" type="text" name="filepath" value="{{ $courses->img }}">
                                    </div>
                                    <div class="box-preview-img edit-img">
                                        @foreach (explode(",", $courses->img) as $item)
                                            <img src="{{ $item }}">
                                        @endforeach
                                    </div>
                                    <label for="" class="required control-label">@lang('modules.online.name')</label>
                                    <input class="form-control" value="{{$courses->title}}" name="title" required>
                                    <label for="" class="required control-label">@lang('modules.online.summary')</label>
                                    <input class="form-control" value="{{$courses->summary}}" name="summary" required>
                                    <label for="" class="required control-label">@lang('modules.online.content')</label>
                                    <textarea class="edit-detail" name="detail">{!! old('detail', $courses->detail) !!}</textarea>
                                    <label for="" class="required control-label">@lang('modules.online.level')</label>
                                    <select class="js-level form-control" name="level">
                                        @foreach ($level as $item)
                                            @if ($courses->level == $item->id)
                                                <option selected value="{{$item->id}}">{{$item->title}}</option>
                                            @else
                                                <option value="{{$item->id}}">{{$item->title}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    <label for="" class="required control-label">@lang('modules.online.price')</label>
                                    <input class="form-control" value="{{$courses->price}}" name="price" required>
                                    <label for="" class="control-label">@lang('modules.online.promo_price')</label>
                                    <input class="form-control" value="{{$courses->promo_price}}" name="promo">
                                    <label for="" class="required control-label">@lang('modules.online.lesson')</label>
                                    <input class="form-control" value="{{$courses->lesson}}" name="lesson" required>
                                    <label for="" class="control-label">@lang('modules.online.trailer')</label>
                                    <input class="form-control" value="{{$courses->trailer}}" name="trailer">
                                    <label for="" class="control-label">@lang('modules.online.video')</label>
                                    <div class="form-add-video">
                                        @foreach (explode(",", $courses->video) as $item)
                                            <div class="video">
                                                <textarea class="form-control" name="video[]" placeholder="Đường link video...">{{$item}}</textarea>
                                                <hr>
                                            </div>
                                        @endforeach
                                    </div>
                                    <a class="d-block add-video" style="font-family: font-medium; color:2e1503; cursor: pointer;">Thêm...</a>

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
    {{$online->links('admin.layout.pagination')}}
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
