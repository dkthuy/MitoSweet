@component('mail::message')
    <h2 class="text-center">Tiêu đề: {{$data['title']}}</h2>
    <h3>Tên: {{$data['name']}}</h3>
    <h3>Email: {{$data['email']}}</h3>
    <h3>Xin chào MitoSweets,</h3>
    <p>
        Nội dung: {{$data['detail']}}
    </p>
    @component('mail::button', ['url' =>'mailto:'.$data['email']])
        Phản hồi {{$data['name']}}
    @endcomponent
    Cảm ơn {{config('app.name')}}
@endcomponent

