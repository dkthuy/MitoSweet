@include('user.layout.header')
@include('user.layout.khoantrong')
@include('user.layout.slide')

@yield('content-index')

@include('user.layout.newsletter')
@include('user.layout.footer')
@stack('scripts')
