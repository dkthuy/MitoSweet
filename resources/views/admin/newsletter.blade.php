@extends('admin.layout.main')
{{-- @push('css')
@endpush --}}

@section('header-body')
    <div class="row">
        <div class="col-lg-9 col-md-8">
            <div class="breadcrumb-admin d-inline">
                <i class="far fa-sticky-note"></i>
                @lang('modules.dashboard.menu.sendnews')
            </div>
        </div>
        <div class="col-lg-3 col-md-4">
            <input class="form-control d-inline" name="search" id="search" placeholder="Tìm kiếm...">
        </div>
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
    <table class="table table-bordered text-center"  id="data_cake">
        <thead>
        <tr>
            <th scope="col">Địa chỉ email</th>
            <th scope="col">Thời gian tạo</th>
            <th scope="col">Chức năng</th>
        </tr>
        </thead>
        <tbody id="search-body">
            @foreach ($newsletter as $item)
            <tr>
                <td>{{ $item->email }}</td>
                <td>{{ $item->created_at }}</td>
                <td>
                    <div class="btn-group-sm btn-func">
                        <a href="{{ url('newsletter/delete') }}/{{$item->id}}" class="btn btn-primary" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">
                            <span class="fas fa-trash-alt"></span>
                        </a>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{$newsletter->links('admin.layout.pagination')}}
</div>

@endsection

