@component('mail::message')
    <h1>Xác nhận đặt bánh</h1>
    <h2>Chúng tôi đã nhận được đơn hàng của bạn, bạn vui lòng chuẩn bị tới lấy bánh đúng ngày.</h2>
    <h3>Thông tin đơn hàng</h3>
    <p>
        Tên bánh : {{$data['title']}}<br>
        Loại bánh : {{$data['type']}}<br>
        Kích thước bánh : {{$data['size']}}<br>
    </p>
    <p>
        Tên người nhận: {{$data['name']}}<br>
        Số điện thoại : {{$data['phone']}}<br>
        Địa chỉ : {{$data['address']}}<br>
        Ngày nhận bánh : {{$data['date']}}<br>
    </p>
    Cảm ơn bạn đã đặt bánh tại cửa hàng chúng tôi.
    <h4>{{config('app.name')}}</h4>
@endcomponent

