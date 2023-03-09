@extends('admin.layout.main')
{{-- @push('css')
@endpush --}}

@section('header-body')
    <div class="row">
        <div class="col-lg-9">
            <div class="breadcrumb-admin d-inline">
                <i class="fas fa-file-alt"></i>
                @lang('modules.dashboard.menu.class.bill')
            </div>
        </div>
        <div class="col-lg-3">
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
    <table class="table table-bordered"  id="data_news">
        <thead>
        <tr class="text-center">
            <th scope="col">Mã hóa đơn</th>
            <th scope="col">Thông tin khách hàng</th>
            <th scope="col">Sản phẩm</th>
            {{-- <th scope="col">Hình thức thanh toán</th> --}}
            <th scope="col">Trạng thái</th>
            <th scope="col">Thời gian tạo</th>
            <th scope="col">Chức năng</th>
        </tr>
        </thead>
        <tbody id="search-body">
            @foreach ($order as $orders)
           <tr>
                <td>{{ $orders->bill_id }}</td>
               <td>
                   <span>
                       Khách hàng: {{ $orders->name }} <br>
                       Số điện thoại: {{ $orders->phone }}<br>
                       Email: {{ $orders->email }}
                   </span>
               </td>
               <td>
                   <span>
                        @foreach (explode(',',$orders->course_id) as $item)
                            Mã số khóa học: {{$item}}<br>
                            @foreach ($course as $onl)
                                @if ($item == $onl->course_id)
                                    Tên khóa học: {{ $onl->title }} <br>
                                @endif
                            @endforeach
                        @endforeach
                        @if ($orders->discount == 0 || $orders->discount == null)
                            Tổng tiền: {{$orders->total}}
                        @else
                            Giảm: {{$orders->discount}} <br>
                            Tổng tiền: {{$orders->total}}
                        @endif
                   </span>
               </td>
               <td>
                   @if ( $orders->status == 1)
                       <span style="color:green; font-family:'font-medium'">Đã duyệt</span>
                   @else
                       <span style="color:red; font-family:'font-medium'">Đang chờ</span>
                   @endif
               </td>
               <td>{{ $orders->created_at }}</td>
               <td>
                    <div class="btn-group-sm btn-func">
                        @if ( $orders->status == 1)
                            <a href="{{ url('order-course/del') }}/{{$orders->id}}" class="btn btn-primary" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">
                                <span class="fas fa-trash-alt"></span>
                            </a>
                        @else
                            <a href="order-course/send/{{$orders->bill_id}}" class="btn btn-success" onclick="return confirm('Bạn có chắc chắn muốn xác nhận?')">
                                <span class="fas fa-check"></span>
                            </a>
                            <a href="" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn hủy?')">
                                <span class="fas fa-times"></span>
                            </a>
                        @endif
                    </div>
               </td>
           </tr>
           @endforeach
       </tbody>
    </table>
    {{-- {{$new->links('admin.layout.pagination')}} --}}
</div>



@endsection

@push('scripts')

    <script type="text/javascript" src="..\js\main.js"></script>
    <script type="text/javascript" src="..\js\upload.js"></script>
    {{-- <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script> --}}
    {{-- <script>
        var route_prefix = "laravel-filemanager";
        $('#btn-img').filemanager('image', {prefix: route_prefix});
        $('a#btn-edit-img').filemanager('image', {prefix: route_prefix});
    </script> --}}
@endpush
