@component('mail::message')
    <h1 class="text-center">Quên mật khẩu!</h1>
    <h2 class="text-center">Bạn nhận được email này vì chúng tôi đã nhận được yêu cầu đặt lại mật khẩu cho tài khoản của bạn.</h2>
    <h3>Email: {{$data['email']}}</h3>
    <h3>Xin chào bạn, <strong>{{$data['name']}}</strong></h3>
    <p>
        Mật khẩu mới của bạn là : {{$data['pass']}}
    </p>
    <p>Sau khi hoàn tất đăng nhập bạn vui lòng đổi lại mật khẩu của bạn để dễ ghi nhớ.</p>
    Cảm ơn bạn.
    <h4>{{config('app.name')}}</h4>
@endcomponent

