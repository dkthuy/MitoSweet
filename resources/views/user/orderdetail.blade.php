@extends('user.layout.layout')
@section('content')

<section class="order-detail">
    <div class="container">
        <nav aria-label="breadcrumb" >
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('order') }}">Đặt bánh</a></li>
            </ol>
        </nav>
        <div class="row detail mb-3">
            <div class="col-lg-6 col-md-12 col-12" id="my-img">
                <div id="demo" class="carousel slide" data-ride="carousel">
                    @foreach ($cake as $item)
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
            <div class="col-lg-6 col-md-12 col-12">
                <div class="title-detail">
                    @foreach ($cake as $item)
                        <h5>{{$item->title}}</h5>
                    @endforeach
                </div>
                <hr class="hr mt-4">
                <div class="body-detail">
                    <div class="content-detail pr-4">
                        @foreach ($cake as $item)
                            <p><b>Mã:</b> {{$item->code}}</p>
                            <p><b>Kích thước:</b>
                            @foreach ($size as $sizes)
                                @foreach (explode(",", $item->cake_sizes) as $s)
                                    @if ($s == $sizes->id)
                                        {{ $sizes->title }}&nbsp;
                                    @endif
                                @endforeach
                            @endforeach</p>
                            <p><b>Mô tả:</b> {!!$item->detail!!}</p>
                            @if ($item->note != '')
                                <p><b>Ghi chú:</b> {{$item->note}}</p>
                            @endif
                            <p><b>Giá tiền:</b> <br>
                                @foreach ($size as $sizes)
                                    @foreach (explode(",", $item->cake_sizes) as $i)
                                        @if ($i == $sizes->id)
                                        Kích thước {{$sizes->title}}: {{ ($item->price)*($sizes->heso) }}₫<br>
                                        @endif
                                    @endforeach
                                @endforeach
                        @endforeach
                    </div>

                    <div class="row btn-detail">
                        <div class="col-md-6 col-6">
                            @foreach ($cake as $item)
                                <button type="button" onclick="window.location.href='{{route('form', ['id'=> $item->id])}}'" class="btn btn-order text-uppercase">Đặt bánh</button>
                            @endforeach
                        </div>
                    </div>
                    <hr class="hr mt-4">
                    </div>
                </div>
            </div>
        </div>
        <div class="modal modal-img">
            <span class="close">&times;</span>
            <div id="zoom-slide" class="carousel slide" data-ride="carousel" data-interval="false">
                @foreach ($cake as $item)
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
    </div>
</section>

<section class="container">
    <div class="col-lg-12">
    <div class="row">
        <div class="col-lg-3 title-related">Bánh cùng loại</div>
        <div class="col-lg-9 strong"></div>
    </div>
    </div>
</section>

<section class="related">
    <div class="container">
        <div id="mixedSlider">
            <div class="MS-content">
                @foreach ($cakes as $cakes)
                    @foreach ($cake as $item)
                        @if ($item->cake_types == $cakes->cake_types)
                        <div class="item">
                            <div class="imgTitle">
                                <div class="card">
                                    @php
                                        $db = explode(",", $cakes->img);
                                    @endphp
                                    <img src="{{ $db[0] }}" class="card-img-top">
                                    <div class="card-body">
                                        <h5 class="card-title" style="font-family:'font-thin';">{{$cakes->title}}</h5>
                                        <button type="button" class="btn btn-contact text-uppercase" onclick="window.location.href='{{ route('ordetail', ['id' => $cakes->id]) }}'">Liên hệ</button>
                                    </div>
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
