@extends('user.layout.layout')
@section('content')

<section class="order-detail">
    <div class="container mt-3">
        <nav aria-label="breadcrumb" >
            <ol class="breadcrumb">
                {{-- <li class="breadcrumb-item"><a href="{{ url('index') }}">Trang chủ</a></li> --}}
                <li class="breadcrumb-item"><a href="{{ route('index') }}">Khóa học trực tuyến</a></li>
                @foreach ($online as $item)
                    <li class="breadcrumb-item active" aria-current="page">{{$item->title}}</li>
                @endforeach
            </ol>
        </nav>
    </div>
    <div class="container">
        <div class="row detail mb-3">
            <div class="col-lg-7 col-md-12 col-12" id="my-img">
                <div id="demo" class="carousel slide" data-ride="carousel">
                    @foreach ($online as $item)
                        <ul class="carousel-indicators">
                            @for ($i = 0; $i < count(explode(",", $item->img)); $i++)
                                @if ($i == 0)
                                    <li data-target="#demo" data-slide-to="{{$i}}" class="active"></li>
                                @else
                                    <li data-target="#demo" data-slide-to="{{$i}}"></li>
                                @endif
                            @endfor
                        </ul>
                        <div class="carousel-inner">
                            @foreach (explode(",", $item->img) as $key=>$slide)
                                @if ($key == 0)
                                    <div class="carousel-item active">
                                        <img src="{{$slide}}" width="100%" >
                                    </div>
                                @else
                                    <div class="carousel-item">
                                        <img src="{{$slide}}" width="100%" >
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    @endforeach
                    <a class="carousel-control-prev " href="#demo" data-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </a>
                    <a class="carousel-control-next" href="#demo" data-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </a>
                </div>
            </div>

            <div class="col-lg-5 col-md-12 col-12">
                <div class="online-title-detail">
                    <h5 class="ontitle mb-3">Chi tiết</h5>
                    <i class="icon-detail"><img src="{{ asset('img/level1.png') }}"></i>
                    @foreach ($online as $item)
                        @foreach ($level as $levels)
                            @if ($item->level == $levels->id)
                                <span>{{ $levels->title }}</span>
                            @endif
                        @endforeach
                    @endforeach
                    <br>
                    <i class="icon-detail"><img src="{{ asset('img/icon_1.png') }}"></i>
                    @foreach ($online as $item)
                        <span>{{ $item->lesson }} bài</span>
                        @if (Cart::get($item->id))
                            <div class="section_7_signup" style="text-align:left"><a style="color: white!important" onclick="return confirm('Giỏ hàng bạn đã có khóa học này!')">Mua</a></div>
                        @elseif (Cart::get($item->id) == false)
                            <div class="section_7_signup" style="text-align:left"><a href="{{ route('cart', ['id'=>$item->id]) }}" >Mua</a></div>
                        @endif
                    @endforeach
                </div>
                <div class="col-lg-12 section_7_title">
                    <button class="btn icon-show collapsed" data-toggle="collapse" data-target="#intro" style="margin:0 10px 3px 0;"></button>
                    <a style="text-transform: uppercase;">Giới thiệu</a>
                </div>
                <div class="col-lg-12"><hr class="hr mt-0"></div>
                <div id="intro" class="col-lg-12 section_7_content collapse">
                    @foreach ($online as $item)
                        <h5>{{$item->summary}}</h5>
                    @endforeach
                    <div class="body-detail">
                        <div class="content-detail">
                            <div class="row btn-detail">
                                <div class="col-md-6 col-6 btn-trailer">
                                    @foreach ($online as $item)
                                        @if ($item->trailer != '')
                                            <button type="button" class="btn text-uppercase" data-toggle="modal" data-target="#modalVideo">trailer</button>
                                        @endif
                                    @endforeach
                                </div>
                                <div class="col-md-6 col-6 btn-buy">
                                    <button type="button" class="btn text-uppercase">Mô tả</button>
                                </div>
                                <div class="col-lg-12"><hr class="hr mt-4 mb-0"></div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="modal modal-img">
            <span class="close">&times;</span>
            <div id="zoom-slide" class="carousel slide" data-ride="carousel" data-interval="false">
                @foreach ($online as $item)
                    <div class="carousel-inner">
                        @foreach (explode(",", $item->img) as $key=>$slide)
                            @if ($key == 0)
                                <div class="carousel-item active">
                                    <img class="modal-content modal-img-content" src="{{$slide}}" width="100%" >
                                </div>
                            @else
                                <div class="carousel-item">
                                    <img class="modal-content modal-img-content" src="{{$slide}}" width="100%" >
                                </div>
                            @endif
                        @endforeach
                    </div>
                @endforeach
                <a class="carousel-control-prev" href="#zoom-slide" data-slide="prev">
                    <i class="fas fa-chevron-left"></i>
                </a>
                <a class="carousel-control-next" href="#zoom-slide" data-slide="next">
                    <i class="fas fa-chevron-right"></i>
                </a>
            </div>
        </div>
    <script>
        var img = document.querySelectorAll('#my-img img'),
        modal = document.querySelector('.modal'),
        modalImg = document.getElementById("img01");

        img.forEach(function (image) {

            image.addEventListener('click', function(event) {

                modal.style.display = 'block';
                modalImg.src = this.src;
            });
        });
        var span = document.getElementsByClassName("close")[0];

        span.onclick = function() {
            modal.style.display = "none";
        }
    </script>
        <div class="modal fade" id="modalVideo">
            <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                      <h5>Trailer</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <div class="embed-responsive embed-responsive-16by9">
                        @foreach ($online as $item)
                            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{$item->trailer}}"></iframe>
                        @endforeach
                    </div>
                  </div>
                </div>
              </div>
        </div>

        <div class="content d-none">
            @foreach ($online as $item)
                {!!$item->detail!!}
            @endforeach
        </div>
        <script>
            $('.btn-buy').click(function() {
                if ($('.content').hasClass('d-none')) {
                    $('.content').removeClass('d-none');
                }else{
                    $('.content').addClass('d-none');
                }
            })
        </script>
    </div>
</section>

<section class="container">
    <div class="col-lg-12">
    <div class="row mt-5">
        <div class="col-lg-3 title-related">Khóa học tương tự</div>
        <div class="col-lg-9 strong"></div>
    </div>
    </div>
</section>

<section class="related">
    <div class="container">
        <div id="mixedSlider">
            <div class="MS-content">
                @foreach ($onl as $onls)
                    @foreach ($online as $item)
                        @if ($item->level == $onls->level)
                        <div class="item">
                            <div class="imgTitle">
                                <div class="card" onclick="window.location.href='{{ route('onldetail', ['id' => $onls->id]) }}'">
                                    @php
                                        $db = explode(",", $onls->img);
                                    @endphp
                                    <img src="{{ $db[0] }}" class="card-img-top">
                                    @foreach ($level as $levels)
                                        @if ($onls->level == $levels->id)
                                            <h6 class="content_slider">Cấp độ: {{ $levels->title }}</h6>
                                        @endif
                                    @endforeach
                                    {{-- <div class="hover-item d-none" style="bottom: 10%; padding: 5px 25px; position: absolute;">
                                        <a href="{{ url('online-class') }}/{{$onls->id}}">{{$onls->title}}</a>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                        @endif
                    @endforeach
                @endforeach
            <div class="MS-controls d-none">
                <button class="MS-left"><img src="{{ asset('img/arrow_left.png') }}" style="width: 50%;"></button>
                <button class="MS-right"><img src="{{ asset('img/arrow_right.png') }}" style="width: 50%;"></button>
            </div>
        </div>
    </div>
</section>




    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="{{ asset('js/multislider.js') }}"></script>
    <script>
        var a = $('.item').length;
        if (a > 4 && $('.MS-controls').hasClass('d-none')) {
            $('.MS-controls').removeClass('d-none');
            $('#mixedSlider').multislider({
                duration: 500,
                interval: 3000
            });
        } else {
            $('.MS-controls').addClass('d-none')
            $('#mixedSlider').multislider({
                duration: 0,
                interval: 0
            });
        }

    </script>

@endsection
