@include('user.layout.header')
@include('user.layout.khoantrong')

@yield('content')

@include('user.layout.newsletter')
@include('user.layout.footer')
@stack('scripts')
