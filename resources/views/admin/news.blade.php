@extends('admin.layout.main')
{{-- @push('css')
@endpush --}}

@section('header-body')
    <div class="row">
        <div class="col-lg-9">
            <div class="breadcrumb-admin d-inline">
                <i class="far fa-newspaper"></i>
                @lang('modules.dashboard.menu.news')
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
                    <form method="POST" action="news/add" class="change-form" enctype="multipart/form-data">
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
                        <label for="" class="required control-label">@lang('modules.news.name')</label>
                        <input class="form-control" name="title" required>
                        <label for="" class="required control-label">@lang('modules.news.summary')</label>
                        <input class="form-control" name="summary" required>
                        <label for="" class="required control-label">@lang('modules.news.content')</label>
                        <textarea class="detail" name="detail">{!! old('detail', $detail ?? '') !!}</textarea>
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
    <button type="submit" class="btn btn-danger btn-del">
        <i class="fas fa-trash-alt"></i>
    </button>
</div>

<div class="table-responsive">
    <table class="table table-bordered text-center"  id="data_news">
        <thead>
        <tr>
            <th scope="col" class="btn-gr d-none">#</th>
            <th scope="col">Hình ảnh</th>
            <th scope="col">Tên tin tức</th>
            <th scope="col">Tóm tắt</th>
            {{-- <th scope="col">Nội dung</th> --}}
            <th scope="col">Thời gian tạo</th>
            <th scope="col">Chức năng</th>
        </tr>
        </thead>
        <tbody id="search-body">
            @foreach ($new as $news)
            <tr>
                <td class="btn-gr d-none"><input type="checkbox" class="check" name="delete[]" value="{{ $news->id }}"></td>
                <td><img src="{{ $news->img }}" class="preview-img"></td>
                <td>{{ $news->title }}</td>
                <td>{{ $news->summary }}</td>
                <td>{{ $news->created_at }}</td>
                {{-- <td class="compact">{{ $news->detail }}</td> --}}
                <td>
                    <div class="btn-group-sm btn-func">
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editModal{{$news->id}}">
                            <span class="fas fa-edit"></span>
                        </button>
                        <a href="{{ url('news/delete') }}/{{$news->id}}" class="btn btn-primary" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">
                            <span class="fas fa-trash-alt"></span>
                        </a>
                    </div>
                </td>
                {{-- form edit --}}
                <div class="modal fade" id="editModal{{$news->id}}">
                    <div class="modal-dialog modal-xl modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5>@lang('modules.button.edit')</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form method="POST" action="{{ url('news/edit') }}/{{$news->id}}" class="change-form" enctype="multipart/form-data">
                                    @csrf
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                            <a id="btn-edit-img" data-input="thumbnail-edit" data-preview="edit-img" class="btn btn-outline-primary">
                                            Chọn tệp:
                                            </a>
                                        </span>
                                        {{-- <input class="form-control thumbnail-edit" type="text" name="filepath" value="{!! old('img', $news->img) !!}"> --}}
                                        <input class="form-control thumbnail-edit" type="text" name="filepath" value="{{ $news->img }}">
                                    </div>
                                    <div class="box-preview-img edit-img"><img src="{{ $news->img }}"></div>
                                    <label for="" class="required control-label">@lang('modules.news.name')</label>
                                    <input class="form-control" value="{{$news->title}}" name="title" required>
                                    <label for="" class="required control-label">@lang('modules.news.summary')</label>
                                    <input class="form-control" value="{{$news->summary}}" name="summary" required>
                                    <label for="" class="required control-label">@lang('modules.news.content')</label>
                                    <textarea class="edit-detail" name="detail">{!! old('detail', $news->detail) !!}</textarea>
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
    {{$new->links('admin.layout.pagination')}}
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
