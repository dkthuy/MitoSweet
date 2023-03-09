<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>

    <link rel='stylesheet' type='text/css' media='screen' href='{{ asset('css/style.css') }}'>
    <link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet">
    <link rel='stylesheet' type='text/css' media='screen' href='{{ asset('css/bootstrap.css') }}'>
    <link rel='stylesheet' type='text/css' media='screen' href='{{ asset('css/bootstrap.min.css') }}'>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js" ></script>
    <script src="{{ asset('js/bootstrap.min.js') }}" rel="stylesheet"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
</head>
<body>
  <section>
    <div style="background: black">
        @foreach ($online as $onlines)
            <div class="class_box_video" id="class_box_video">
                <a type="button" class="class_icon_menu" id="class_icon_menu" onclick="click_navbar_vertical()" ><img src="{{ asset('img/icon_show_menu.png') }}" alt="icon_show_menu" width="30px"></a>
                <a href="#" class="class_icon_share" ><img src="{{ asset('img/icon_share.png') }}" alt="icon_show_menu" width="30px"></a>
                @php
                    $db = [];
                    $db = explode(',',$onlines->video);
                @endphp
                <div id="class_video" style="border: none; width: 100%">
                    {!!$db[0]!!}
                </div>
                {{-- <iframe width="100%" class="embed-responsive-item" id="class_video" src="https://www.youtube.com/embed/zpOULjyy-n8?rel=0" allowfullscreen style="border: none"></iframe> --}}
                <div class="class_subscription_box" style="background-color:#cef0cd">
                    <h3 class="text-uppercase">{{$onlines->title}}</h3>
                </div>
            </div>
            <div class="navbar_vertical class_dem" id="navbar_vertical" style="padding: 0;">
                <div class="col-lg-12" >
                    <div class="row class_box_close" id="class_navbar_nav" style="padding: 0 8px; background-color:#ffd1dc ">
                    <div onclick="onclick_class(this.id)" class="col-lg-4 col-4 class_menu_box active2" id="class_overview">
                        <a style="cursor: pointer;" >Tổng quan</a>
                    </div>
                    <div onclick="onclick_class(this.id)" class="col-lg-4 col-4 class_menu_box" id="class_episodes">
                        <a style="cursor: pointer;" >Bài học</a>
                    </div>
                    <div onclick="onclick_class(this.id)" class="col-lg-4 col-4 class_menu_box" id="class_comments">
                        <a style="cursor: pointer;" >Bình luận</a>
                    </div>
                    </div>
                </div>
                    <script>
                        // Add active class to the current button (highlight it)
                        var header = document.getElementById("class_navbar_nav");
                        var btns = header.getElementsByClassName("class_menu_box");
                        for (var i = 0; i < btns.length; i++) {
                            btns[i].addEventListener("click", function() {
                            var current = document.getElementsByClassName("active2");
                            current[0].className = current[0].className.replace(" active2", "");
                            this.className += " active2";
                            });
                        }
                        function onclick_class( name_id ){
                            var header = document.getElementById("navbar_vertical");
                            var btns = header.getElementsByClassName("class_close");
                            for (var i = 0; i < btns.length; i++) {
                            var current1 = document.getElementsByClassName("class_close");
                            current1[i].classList.add('content_none');
                            }
                            if( name_id == "class_overview"){
                            document.getElementById("class_overview_content").classList.remove('content_none');
                            }
                            if( name_id == "class_episodes"){
                            document.getElementById("class_episodes_content").classList.remove('content_none');
                            }

                            if( name_id == "class_comments"){
                            document.getElementById("class_comments_content").classList.remove('content_none');
                            }

                        }
                    </script>
                <div id="class_overview_content" class="class_close" >
                    <div class="col-lg-12">
                        <div class="row" id="show_image_video" style="background-color: white; padding: 0 8px;">
                            <div class="col-lg-12 class_title_1">
                                <h3 class="text-uppercase">{{$onlines->title}}</h3>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-6 class_icon">
                                <img src="{{ asset('img/class_level.png') }}" width="25px">
                                <h5>{{$onlines->level}}</h5>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-6 class_icon">
                                <img src="{{ asset('img/class_episode.png') }}" width="25px">
                                <h5>{{$onlines->lesson}} bài</h5>
                            </div>
                            {{-- <div class="col-lg-4 class_icon">
                                    <img src="{{ asset('img/class_time.png') }}" alt="time">
                                    <h5>3h 36min</h5>
                                </div>
                                <div class="col-lg-12 class_title_2">
                                    <h5>Make popular miniature French desserts - from macarons to madeleines - and master accessible pastry techniques that will transform your baking!</h5>
                                </div>
                                <div class="col-lg-12 class_title_3">
                                    <h5>Episode descriptions</h5>
                                </div>--}}
                            <div class="col-lg-12 class_box_menu_video">
                                {!!$onlines->detail!!}
                            </div>
                            <div class="col-lg-12  class_title_4">
                                <h5>Khóa Học Tương Tự</h5>
                            </div>
                            @foreach ($onl as $onls)
                                @if ($onlines->level == $onls->level)
                                    <div class="col-md-6 col-sm-6 col-12">
                                        @php
                                            $db = explode(",", $onls->img);
                                        @endphp
                                        <figure class="img_section_7 class_menu_image" style="background: url('{{ $db[0] }}') no-repeat center; background-size: cover;" >
                                            <div class="hover_section_7">
                                                <a href="{{ url('online-class') }}/{{$onls->id}}">{{$onls->title}}</a>
                                            </div>
                                            <div class="hover_title_section_7">
                                                <a href="">Cấp độ:
                                                    @foreach ($level as $levels)
                                                        @if ($onls->level == $levels->id)
                                                            {{ $levels->title }}
                                                        @endif
                                                    @endforeach
                                                </a>
                                            </div>
                                        </figure>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
                <div id="class_episodes_content" class="class_close content_none" style="background-color: white; height: 70%;" >
                    @php
                        $db = [];
                        $db = explode(',',$onlines->video);
                    @endphp
                    @for ($i = 1; $i <= count($db); $i++)
                        <div class="col-lg-12 class_category_box">
                            <div class="class_category_main">
                                <a type="button"><h5 class="text-uppercase" >{{$i}}. Bài {{$i}}</h5></a>
                            </div>
                        </div>
                    @endfor
                    {{-- <div class="col-lg-12 class_category_box">
                        <div class="class_category_main">
                            <h5>1. Madeleines <span> (18 min) </span><button  class="btn icon-show1 collapsed" data-toggle="collapse" data-target="#intro2" style="margin:-10px 10px 3px 0; float: right;"></button></h5>
                            <div class="class_category collapse" id="intro2">
                                <a class="col-lg-12" href="" >Clickable Dropdown</a>
                                <a class="col-lg-12" href="" >Clickable Dropdown</a>
                                <a class="col-lg-12" href="" >Clickable Dropdown</a>
                                <a class="col-lg-12" href="" >Clickable Dropdown</a>
                                <a class="col-lg-12" href="" >Clickable Dropdown</a>
                            </div>
                        </div>
                    </div> --}}

                </div>
                <div id="class_comments_content" class="class_close content_none" style="background-color: white" >
                    <h3 style="margin:0px">comments_content</h3>
                </div>
                <div class="col-lg-12" style="text-align: center; display: block; background-color:#ffd1dc ">
                    <a href="index.php" class="class_logo_footer" >
                    <img  src="{{ asset('img/MITO SWEETS.png') }}" width="200px">
                    </a>
                    <div class="row class_title_6">
                    <div class="col-lg-7" style="text-align: center;">
                        <h5>© Copyright 2020 bởi MITO SWEETS</h5>
                    </div>
                    <div class="col-lg-5" style="text-align: center;">
                        <a href="#"><img src="{{ asset('img/class_YOUTUBE.png') }}" alt="youtube"></a>
                        <a href="#"><img src="{{ asset('img/class_FACEBOOK.png') }}" alt="facebook"></a>
                        <a href="#"><img src="{{ asset('img/class_INSTAGRAM.png') }}" alt="instagram"></a>
                    </div>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
  </section>
          <script type="text/javascript">
             if(window.matchMedia("(max-width: 768px)").matches)
              {
                document.getElementById("navbar_vertical").classList.add('col-lg-12');
                document.getElementById("class_box_video").classList.add('col-lg-l2');
                document.getElementById("navbar_vertical").style.position = "relative";
                document.getElementById("navbar_vertical").style.transform = "none";
                document.getElementById("navbar_vertical").style.overflow = "inherit";
                document.getElementById("class_close").style.marginTop="1px";
                document.getElementById("class_icon_menu").style.display="none";
                document.getElementById("class_icon_menu").style.display="none";
              }
             if(window.matchMedia("(max-width: 500px)").matches)
              {
                document.getElementById("navbar_vertical").classList.add('col-lg-12');
                document.getElementById("class_box_video").classList.add('col-lg-l2');
                document.getElementById("navbar_vertical").style.position = "relative";
                document.getElementById("navbar_vertical").style.transform = "none";
                document.getElementById("navbar_vertical").style.overflow = "inherit";
                document.getElementById("class_close").style.marginTop="1px";
                document.getElementById("class_icon_menu").style.display="none";
                document.getElementById("class_icon_menu").style.display="none";
              }

          </script>
          <script>
            function click_navbar_vertical(){
                var classnameopen= document.getElementsByClassName("class_dem");
                if(classnameopen.length == 1){
                  document.getElementById("navbar_vertical").style.WebkitTransform = "translateX(0px)";
                    // Code for IE9
                  document.getElementById("navbar_vertical").style.msTransform = "translateX(0px)";
                  // Standard syntax
                  document.getElementById("navbar_vertical").style.transform = "translateX(0px)";
                  document.getElementById("class_box_video").style.paddingLeft = "450px";
                  document.getElementById("class_box_video").style.paddingRight = "0";
                  document.getElementById("class_video").style.height = "600px";
                  document.getElementById("class_icon_menu").style.left = "470px";
                  document.getElementById("class_icon_menu").classList.add('class_dem');
                }
                else{
                   document.getElementById("navbar_vertical").style.WebkitTransform = "translateX(-450px)";
                // Code for IE9
                  document.getElementById("navbar_vertical").style.msTransform = "translateX(-450px)";
                  // Standard syntax
                  document.getElementById("navbar_vertical").style.transform = "translateX(-450px)";
                  document.getElementById("class_box_video").style.paddingLeft = "0";
                  document.getElementById("class_icon_menu").style.left = "20px";
                  document.getElementById("class_box_video").style.paddingRight = "0";
                  document.getElementById("class_icon_menu").classList.remove('class_dem');
                  document.getElementById("class_video").style.height = "600px";
                }
              }
          </script>

</body>
</html>
