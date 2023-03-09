@component('mail::message')
    <h1>Xác nhận thanh toán khóa học</h1>
    <h2>Chúng tôi đã nhận được thanh toán từ <strong>{{$data['name']}}</strong>, bạn vui lòng kiểm tra trang cá nhân của mình xem khóa học bạn đã mua.</h2>
    <h3>Thông tin Khóa học</h3>
    <p>
        @foreach ($data['title'] as $item)
            Tên khóa học : {{$item}} <br>
        @endforeach
    </p>
    Cảm ơn bạn đã mua khóa học tại cửa hàng chúng tôi.
    <h4>{{config('app.name')}}</h4>
@endcomponent

