@extends('admin.layout.main')
{{-- @push('css')
@endpush --}}
@php
    $day = array('Thứ hai', 'Thứ ba', 'Thứ tư', 'Thứ năm', 'Thứ sáu', 'Thứ bảy', 'Chủ nhật');
@endphp
@section('header-body')
    <div class="row">
        <div class="col-9 col-md-8">
            <div class="breadcrumb-admin d-inline">
                <i class="far fa-calendar-alt"></i>
                @lang('modules.dashboard.menu.schedule')
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
        <div class="col-3 col-md-4">
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
                    <form method="POST" action="schedules/add" class="change-form" enctype="multipart/form-data">
                        @csrf
                        <label for="" class="required control-label">@lang('modules.schedule.name')</label>
                        <select class="js-type form-control" name="title">
                            @foreach ($offline as $item)
                                <option value="{{$item->id}}">{{$item->title}}</option>
                            @endforeach
                        </select>
                        <div class="form-row">
                            <div class="col-lg-3 col-md-6 col-12">
                                <label for="" class="required control-label">@lang('modules.schedule.start_day')</label>
                                <input type="text" onfocus="(this.type='date')" onblur="(this.value == '' ? this.type='text' : this.type='date')" class="form-control" name="start_day" placeholder="Ngày bắt đầu khóa học" required>
                            </div>
                            <div class="col-lg-3 col-md-6 col-12">
                                <label for="" class="required control-label">@lang('modules.schedule.end_day')</label>
                                <input type="text" onfocus="(this.type='date')" onblur="(this.value == '' ? this.type='text' : this.type='date')" class="form-control" name="end_day" placeholder="Ngày kết thúc khóa học" required>
                            </div>
                            <div class="col-lg-3 col-md-6 col-12">
                                <label for="" class="required control-label">@lang('modules.schedule.start')</label>
                                <input type="text" onfocus="(this.type='time')" onblur="(this.value == '' ? this.type='text' : this.type='time')" class="form-control" name="start" required>
                            </div>
                            <div class="col-lg-3 col-md-6 col-12">
                                <label for="" class="required control-label">@lang('modules.schedule.end')</label>
                                <input type="text" onfocus="(this.type='time')" onblur="(this.value == '' ? this.type='text' : this.type='time')" class="form-control" name="end" required>
                            </div>
                        </div>
                        <label for="" class="required control-label d-block">@lang('modules.schedule.week')</label>
                        @foreach ($day as $id => $days)
                            <input type="checkbox" class="size" name="day[]" value="{{ $id }}">
                            {{$days}} &emsp;
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
            <th scope="col">Tên khóa học</th>
            <th scope="col">Thời lượng khóa học</th>
            <th scope="col">Giờ học</th>
            <th scope="col">Ngày học trong tuần</th>
            <th scope="col">Chức năng</th>
        </tr>
        </thead>
        <tbody id="search-body">
            @foreach ($schedule as $schedules)
            <tr>
                <td class="btn-gr d-none"><input type="checkbox" class="check" name="delete[]" value="{{ $schedules->id }}"></td>
                <td>@foreach ($offline as $items)
                        @if ($schedules->course_id == $items->id)
                            {{ $items->title }}
                        @endif
                    @endforeach
                </td>
                <td>{{date('d/m/Y', $schedules->start_day)}} &rarr; {{date('d/m/Y', $schedules->end_day)}}</td>
                <td>{{date('H:i', $schedules->start_time)}} &rarr; {{date('H:i', $schedules->end_time)}}</td>
                <td>@foreach ($day as $id => $days)
                        @foreach (explode(",", $schedules->weekday) as $item)
                            @if ($item == $id)
                                {{ $days }}<br>
                            @endif
                        @endforeach
                    @endforeach
                </td>
                <td>
                    <div class="btn-group-sm btn-func">
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editModal{{$schedules->id}}">
                            <span class="fas fa-edit"></span>
                        </button>
                        <a href="{{ url('schedules/delete') }}/{{$schedules->id}}" class="btn btn-primary" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">
                            <span class="fas fa-trash-alt"></span>
                        </a>
                    </div>
                </td>
                {{-- form edit --}}
                <div class="modal fade" id="editModal{{$schedules->id}}">
                    <div class="modal-dialog modal-xl modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5>@lang('modules.button.edit')</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form method="POST" action="{{ url('schedules/edit') }}/{{$schedules->id}}" class="change-form" enctype="multipart/form-data">
                                    @csrf
                                    <label for="" class="required control-label">@lang('modules.schedule.name')</label>
                                    <select class="js-type form-control" name="title">
                                        @foreach ($offline as $item)
                                            @if ($schedules->course_id == $item->id)
                                                <option selected value="{{$item->id}}">{{$item->title}}</option>
                                            @else
                                                <option value="{{$item->id}}">{{$item->title}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    <div class="form-row">
                                        <div class="col-lg-3 col-md-6 col-12">
                                            <label for="" class="required control-label">@lang('modules.schedule.start_day')</label>
                                            <input type="text" onfocus="(this.type='date')" onblur="(this.value == '' ? this.type='text' : this.type='date')" class="form-control" placeholder="{{date('d/m/Y', $schedules->start_day)}}" name="start_day" required>
                                        </div>
                                        <div class="col-lg-3 col-md-6 col-12">
                                            <label for="" class="required control-label">@lang('modules.schedule.end_day')</label>
                                            <input type="text" onfocus="(this.type='date')" onblur="(this.value == '' ? this.type='text' : this.type='date')" class="form-control" placeholder="{{date('d/m/Y', $schedules->end_day)}}"  name="end_day" required>
                                        </div>
                                        <div class="col-lg-3 col-md-6 col-12">
                                            <label for="" class="required control-label">@lang('modules.schedule.start')</label>
                                            <input type="text" onfocus="(this.type='time')" onblur="(this.value == '' ? this.type='text' : this.type='time')" class="form-control" placeholder="{{date('H:i', $schedules->start_time)}}"  name="start" required>
                                        </div>
                                        <div class="col-lg-3 col-md-6 col-12">
                                            <label for="" class="required control-label">@lang('modules.schedule.end')</label>
                                            <input type="text" onfocus="(this.type='time')" onblur="(this.value == '' ? this.type='text' : this.type='time')" class="form-control" placeholder="{{date('H:i', $schedules->end_time)}}"  name="end" required>
                                        </div>
                                    </div>
                                    <label for="" class="control-label d-block">@lang('modules.schedule.week')</label>
                                    @foreach ($day as $id => $days)
                                        {{-- kiểm tra g/trị $sizes->id có trong mảng explode(",", $schedules->cake_sizes) hay k? --}}
                                        @if(in_array($id, explode(",", $schedules->weekday)))
                                            <input type="checkbox" class="size" name="day[]" value="{{ $id }}" checked>
                                            {{ $days }} &emsp;
                                        @else
                                            <input type="checkbox" class="size" name="day[]" value="{{ $id }}">
                                            {{ $days }} &emsp;
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
    {{$schedule ?? ''->links('admin.layout.pagination')}}
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
