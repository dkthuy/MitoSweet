<!-- Footer -->
<footer class="page-footer font-small indigo">

    <div class="container text-center text-md-left">

        <div class="row">
            <div class="col-md-12 text-center mt-5 mb-3">
                <a href="{{ route('index') }}"><img id="logo-footer" src="{{ asset('img/MITO SWEETS.png') }}"></a>
            </div>

        </div>

        <div class="row">
            <div class="col-lg-12 ">
                <nav class=" navbar navbar-expand-lg navbar-light " >
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="center collapse navbar-collapse justify-content-center" id="navbarNav">
                      <ul class="navbar-nav" id="navbar-nav">
                          <li class="nav-item" >
                            <a class="nav-link " href="{{ route('online') }}">@lang('modules.menuuser.onlineclass')</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link"  href="{{ route('order') }}">@lang('modules.menuuser.cakeorder')</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="{{ route('news') }}"  id="menu_news">@lang('modules.menuuser.news')</a>
                          </li>
                          {{-- <li class="nav-item">
                            <a class="nav-link" href="#" id="menu_schedules">@lang('modules.menuuser.schedules')</a>
                          </li> --}}
                          <li class="nav-item">
                            <a class="nav-link"  href="{{ route('free-tutorial') }}" id="menu_free_tutorials">@lang('modules.menuuser.freetutorials')</a>
                          </li>
                          <li class="nav-item" >
                            <a class="nav-link" href="{{ route('about') }}">Giới thiệu</a>
                          </li>
                          <li class="nav-item"  >
                            <a class="nav-link"  href="{{ route('contact') }}" id="menu_contacts">@lang('modules.menuuser.contacts')</a>
                          </li>
                      </ul>
                    </div>
                </nav>
            </div>
        </div>

        <hr class="w-100 hr m-0">

        <!-- Copyright -->
        <div class="footer-copyright pt-3">
            <div class="row">
                <p class="col-md-10 col-sm-8 col-7">© Copyright 2020 by <span style="font-family: 'font-medium';">MITO SWEETS</span></p>
                <div class="col-md-2 col-sm-4 col-5">
                    <a class="footer_lienhe" href="#">
                        <img src="{{ asset('img/YOUTUBE.png') }}" width="20%">
                    </a>
                    <a class="footer_lienhe" href="#">
                        <img src="{{ asset('img/FACEBOOK.png') }}" width="20%">
                    </a>
                    <a class=" footer_lienhe" href="#">
                        <img src="{{ asset('img/INSTAGRAM.png') }}" width="20%">
                    </a>
                    {{-- @foreach ($interface as $item)
                        @if (strstr($item->item_id,'youtube'))
                            <a class="footer_lienhe" href="{{$item->item_value}}">
                                <img src="{{ asset('img/YOUTUBE.png') }}" width="20%">
                            </a>
                        @elseif(strstr($item->item_id,'facebook'))
                            <a class="footer_lienhe" href="{{$item->item_value}}">
                                <img src="{{ asset('img/FACEBOOK.png') }}" width="20%">
                            </a>
                        @elseif(strstr($item->item_id,'instagram'))
                            <a class=" footer_lienhe" href="{{$item->item_value}}">
                                <img src="{{ asset('img/INSTAGRAM.png') }}" width="20%">
                            </a>
                        @endif
                    @endforeach --}}
                </div>
            </div>
        </div>
        <!-- Copyright -->
    </div>
</footer>
<!-- Footer -->
    <a type="button" class="scroll-top"><img src="{{ asset('img/back.png') }}" width="70%"></a>
    <script>
      $(document).ready(function ($) {
        if ($(window).scrollTop() > 200) {
                    $('.scroll-top').fadeIn();
              } else {
                    $('.scroll-top').fadeOut();
              }

        $(window).scroll(function () {
                if ($(this).scrollTop() > 200) {
            $('.scroll-top').fadeIn();
                } else {
                      $('.scroll-top').fadeOut();
                }
        });

        $('.scroll-top').click(function () {
                $("html, body").animate({
                      scrollTop: 0
                }, 600);
                return false;
        });
      });
    </script>
    <!-- Messenger -->
    <div id="fb-root"></div>
    <script>
        window.fbAsyncInit = function() {
            FB.init({
            xfbml            : true,
            version          : 'v9.0'
            });
        };

        (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>

<!-- Your Chat Plugin code -->
    <div class="fb-customerchat"
        attribution=setup_tool
        page_id="103818661665604"
        theme_color="#fa3c4c"
        logged_in_greeting="Chào mừng bạn đến với MitoSweets.Demo"
        logged_out_greeting="Chào mừng bạn đến với MitoSweets.Demo">
    </div>
</body>
</html>
