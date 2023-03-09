@extends('admin.layout.main')
{{-- @push('css')
@endpush --}}

@section('header-body')
    <div class="breadcrumb-admin d-inline">
        <i class="fas fa-tv"></i>
        @lang('modules.dashboard.menu.web')
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

<div class="table-responsive">
    <table class="table table-bordered text-center"  id="data_web">
        <thead>
        <tr>
            <th scope="col">Tên gọi tắt</th>
            <th scope="col">Tên trang</th>
            <th scope="col">Chức năng</th>
        </tr>
        </thead>
        <tbody id="search-body">
            @foreach ($page as $pages)
                <tr>
                    <td>{{ $pages->nick }}</td>
                    <td>{{ $pages->title }}</td>
                    <td>
                        <div class="btn-group-sm btn-func">
                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editModal{{$pages->id}}">
                                <span class="fas fa-edit"></span>
                            </button>
                        </div>
                    </td>
                    {{-- form edit 1--}}
                    <div class="modal fade" id="editModal1">
                        <div class="modal-dialog modal-xl modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5>{{ $pages->title }} &#124; @lang('modules.button.edit')</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="{{ url('pages/edit') }}/1" class="change-form" enctype="multipart/form-data">
                                        @csrf
                                        @foreach ($interface as $item)
                                            @if ($item->pages_id == 1)
                                                @if ($item->item_id == 'slider' || strlen(strstr($item->item_id, 'banner')) > 0 || strlen(strstr($item->item_id, 'img')) > 0 )
                                                    <label for="" class="control-label">{{$item->item_id}}</label>
                                                    <div class="input-group">
                                                        <span class="input-group-btn">
                                                            <a id="btn-edit-img" data-input="thumbnail-edit{{$item->item_id}}" data-preview="edit-img{{$item->item_id}}" class="btn btn-outline-primary">
                                                            Chọn tệp:
                                                            </a>
                                                        </span>
                                                        <input class="form-control thumbnail-edit{{$item->item_id}}" type="text" name="{{$item->item_id}}" value="{{ $item->item_value }}">
                                                    </div>
                                                    <div class="box-preview-img edit-img{{$item->item_id}}">
                                                        @foreach (explode(",", $item->item_value) as $slide)
                                                            <img src="{{ $slide }}">
                                                        @endforeach
                                                    </div>
                                                @elseif (strlen(strstr($item->item_id, 'title')) > 0 || strlen(strstr($item->item_id, 'description')) > 0 )
                                                    <label for="" class="control-label">{{$item->item_id}}</label>
                                                    <input class="form-control" value="{{$item->item_value}}" name="{{$item->item_id}}" required>
                                                @else
                                                    <label for="" class="control-label">{{$item->item_id}}</label>
                                                    <input class="form-control" value="{{$item->item_value}}" name="{{$item->item_id}}" required>
                                                @endif
                                            @endif
                                        @endforeach
                                        <button class="btn-change">@lang('modules.changeinfor.confirm')</button>
                                        <button class="btn-back" data-dismiss="modal">@lang('modules.back')</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- end edit 1--}}
                    {{-- form edit 2 3 4--}}
                    <div class="modal fade" id="editModal{{$pages->id}}">
                        <div class="modal-dialog modal-xl modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5>{{ $pages->title }} &#124; @lang('modules.button.edit')</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="{{ url('pages/edit') }}/{{$pages->id}}" class="change-form" enctype="multipart/form-data">
                                        @csrf
                                        @foreach ($interface as $item)
                                            @if ($item->pages_id == $pages->id)
                                                <label for="" class="control-label">{{$item->item_id}}</label>
                                                <div class="input-group">
                                                    <span class="input-group-btn">
                                                        <a id="btn-edit-img" data-input="thumbnail-edit{{$item->item_id}}" data-preview="edit-img{{$item->item_id}}" class="btn btn-outline-primary">
                                                        Chọn tệp:
                                                        </a>
                                                    </span>
                                                    <input class="form-control thumbnail-edit{{$item->item_id}}" type="text" name="{{$item->item_id}}" value="{{ $item->item_value }}">
                                                </div>
                                                <div class="box-preview-img mb-3 edit-img{{$item->item_id}}">
                                                    @foreach (explode(",", $item->item_value) as $slide)
                                                        <img src="{{ $slide }}">
                                                    @endforeach
                                                </div>
                                            @endif
                                        @endforeach
                                        <button class="btn-change">@lang('modules.changeinfor.confirm')</button>
                                        <button class="btn-back" data-dismiss="modal">@lang('modules.back')</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- end edit 2 3 4--}}
                    {{-- form edit 5--}}
                    <div class="modal fade" id="editModal5">
                        <div class="modal-dialog modal-xl modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5>Về chúng tôi &#124; @lang('modules.button.edit')</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="{{ url('pages/edit') }}/5" class="change-form" enctype="multipart/form-data">
                                        @csrf
                                        @foreach ($interface as $item)
                                            @if ($item->pages_id == 5)
                                                @if (strlen(strstr($item->item_id, 'img')) > 0 )
                                                    <label for="" class="control-label">{{$item->item_id}}</label>
                                                    <div class="input-group">
                                                        <span class="input-group-btn">
                                                            <a id="btn-edit-img" data-input="thumbnail-edit{{$item->item_id}}" data-preview="edit-img{{$item->item_id}}" class="btn btn-outline-primary">
                                                            Chọn tệp:
                                                            </a>
                                                        </span>
                                                        <input class="form-control thumbnail-edit{{$item->item_id}}" type="text" name="{{$item->item_id}}" value="{{ $item->item_value }}">
                                                    </div>
                                                    <div class="box-preview-img mb-2 edit-img{{$item->item_id}}">
                                                        @foreach (explode(",", $item->item_value) as $slide)
                                                            <img src="{{ $slide }}">
                                                        @endforeach
                                                    </div>
                                                @else
                                                    <label for="" class="control-label">{{$item->item_id}}</label>
                                                    <textarea class="edit-detail" name="{{$item->item_id}}">{!! old($item->item_id, $item->item_value) !!}</textarea>
                                                @endif
                                            @endif
                                        @endforeach
                                        <button class="btn-change">@lang('modules.changeinfor.confirm')</button>
                                        <button class="btn-back" data-dismiss="modal">@lang('modules.back')</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- end edit 5--}}
                </tr>
            @endforeach
        </tbody>
    </table>
    {{-- {{$page->links('admin.layout.pagination')}} --}}
</div>



@endsection

@push('scripts')
    <script type="text/javascript" src="..\js\main.js"></script>
    <script type="text/javascript" src="..\js\upload.js"></script>
    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
    <script>
        $('a#btn-edit-img').filemanager('image');
    </script>
@endpush
