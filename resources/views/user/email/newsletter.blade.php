@component('mail::message')
    <h2 class="text-center">Tiêu đề: Đăng ký nhận tin mới nhất</h2>
    <h3>Email: {{$data['email']}}</h3>
    @component('mail::button', ['url' =>'mailto:'.$data['email']])
        Phản hồi {{$data['email']}}
    @endcomponent
    Cảm ơn {{config('app.name')}}
@endcomponent

