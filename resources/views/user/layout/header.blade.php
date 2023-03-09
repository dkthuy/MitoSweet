<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>MitoSweets</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>

    <link rel="icon" href='{{ asset('img/icon.png') }}' type="image/icon type">
    <link rel='stylesheet' type='text/css' media='screen' href='{{ asset('css/style.css') }}'>

    <link rel='stylesheet' type='text/css' media='screen' href='{{ asset('css/bootstrap.css') }}'>
    <link rel='stylesheet' type='text/css' media='screen' href='{{ asset('css/bootstrap.min.css') }}'>

    <link href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" rel="stylesheet">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" ></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}" rel="stylesheet"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>



<body>
    <header class="container-fluid scrollview2" id="scrollview2">
        <div class="row">
            <div class="col-lg-4 col-4 ">
                <!-- <div class="dropdown box_language_header">
                    <img src="img/qua dia cau.png" alt="qua_dia_cau" width="20px">
                    <a class="dropdown-toggle nostyle black" href="#"  id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      English
                    </a>
                    <div class="dropdown-menu" >
                      <a class="dropdown-item black" href="#">VietNamese</a>
                    </div>
                </div> -->
            </div>
            <div class="col-lg-4 col-4">
            </div>
            <div class="col-lg-4 col-4 logo_right_header">
                <a href="#" class="text-black-50 nostyle">
                   <img src="{{ asset('img/SEARCH.png') }}" width="20px" height="20px">
                </a>
               &ensp;
                <a href="{{ route('cart-index') }}" class=" text-black-50 nostyle">
                    <img src="{{ asset('img/CART.png') }}" width="20px" height="20px">
                </a>
               &ensp;

               <a href="{{ route('signin') }}" class=" text-black-50 nostyle">
                    <img src="{{ asset('img/USER.png') }}" width="20px" height="20px">
               </a>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4"></div>
            <div class="col-lg-4 box_logo_header">
                <a href="{{ route('index') }}"><img src="{{ asset('img/MITO SWEETS.png') }}" alt="Logo_main" width="300px"></a>
            </div>
            <div class="col-lg-4"></div>
        </div>
        <div class="row">
            <div class="col-lg-2">
            </div>
            <div class="col-lg-8 thanh_phan_cach">
            </div>
            <div class="col-lg-2">
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
                          {{-- <li class="nav-item" >
                            <a class="nav-link" href="{{ route('offline') }}">@lang('modules.menuuser.handsonclass')</a>
                          </li> --}}
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
    </header>

    <header class="container-fluid scrollview" id="scrollview">
      <div class="row">
          <div class="col-lg-2 col-2 ">
          </div>
          <div class="col-lg-8 col-8">
            <nav class=" navbar navbar-expand-lg navbar-light ">
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="center collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item" >
                      <a class="nav-link " href="{{ route('online') }}">@lang('modules.menuuser.onlineclass')</a>
                    </li>
                    {{-- <li class="nav-item" >
                      <a class="nav-link" href="{{ route('offline') }}">@lang('modules.menuuser.handsonclass')</a>
                    </li> --}}
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
          <div class="col-lg-2 col-2 logo_right_header">
              <a href="#" class="text-black-50 nostyle">
                   <img src="{{ asset('img/SEARCH.png') }}" width="20px" height="20px">
                </a>
               &ensp;
                <a href="{{ route('cart-index') }}" class=" text-black-50 nostyle">
                    <img src="{{ asset('img/CART.png') }}" width="20px" height="20px">
                </a>
               &ensp;

               <a href="{{ route('signin') }}" class=" text-black-50 nostyle">
                    <img src="{{ asset('img/USER.png') }}" width="20px" height="20px">
               </a>
          </div>
      </div>
      <div class="row">
          <div class="col-lg-12 ">
          </div>
      </div>
    </header>

    <header class="container-fluid scrollview1" id="scrollview1">
      <div class="row">
          <div class="col-lg-4 col-4 ">
            <nav class=" navbar navbar-expand-lg navbar-light "  style="width:200px;">
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="center collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item" >
                      <a class="nav-link " href="{{ route('online') }}">@lang('modules.menuuser.onlineclass')</a>
                    </li>
                    {{-- <li class="nav-item" >
                      <a class="nav-link" href="{{ route('offline') }}">@lang('modules.menuuser.handsonclass')</a>
                    </li> --}}
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
          <div class="col-lg-4 col-4 logo_768">
            <a href="{{ route('index') }}"><img src="{{ asset('img/MITO SWEETS.png') }}" alt="Logo_main" ></a>
          </div>
          <div class="col-lg-4 col-4 logo_right_header">
               <a href="#" class="text-black-50 nostyle">
                   <img src="{{ asset('img/SEARCH.png') }}" width="20px" height="20px">
                </a>
               &ensp;
                <a href="{{ route('cart-index') }}" class=" text-black-50 nostyle">
                    <img src="{{ asset('img/CART.png') }}" width="20px" height="20px">
                </a>
               &ensp;

               <a href="{{ route('signin') }}" class=" text-black-50 nostyle">
                    <img src="{{ asset('img/USER.png') }}" width="20px" height="20px">
               </a>
          </div>
      </div>
    </header>

    {{-- scrollTop --}}
    {{-- <button onclick="topFunction()" id="myBtn" title="Go to top">
        <img src="img/back.png" width="70%">
    </button>
    <script>
        var mybutton = document.getElementById("myBtn");

        window.onscroll = function() {scrollFunction()};

        function scrollFunction() {
        if (document.body.scrollTop > 70 || document.documentElement.scrollTop > 70) {
            mybutton.style.display = "block";
        } else {
            mybutton.style.display = "none";
        }
        }

        function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
        }
    </script> --}}

    <script>
        $(document).scroll(function () {
        if ($(this).scrollTop() > 80 && $(window).width() >= 975) {
          $(".scrollview").show();
        } else {
          $(".scrollview").hide();
        }
      });
    </script>
    <script>
      $(document).scroll(function () {
        if ($(window).width() < 975) {
          $(".scrollview1").show();
          $(".scrollview2").hide();
        } else {
          $(".scrollview1").hide();
          $(".scrollview2").show();
        }
      });
    </script>












