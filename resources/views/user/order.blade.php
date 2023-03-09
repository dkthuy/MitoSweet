@extends('user.layout.layout')
@section('content')

<section class="container-fluid">
    <div class="row">
        <div id="demo" class="carousel slide" data-ride="carousel">
            @foreach ($interface as $item)
                @if (strstr($item->item_id, 'slider'))
                    <ul class="carousel-indicators slider_right">
                        @for ($i = 0; $i < count(explode(",", $item->item_value)); $i++)
                            @if ($i == 0)
                                <li data-target="#demo" data-slide-to="{{$i}}" class="active"></li>
                            @else
                                <li data-target="#demo" data-slide-to="{{$i}}"></li>
                            @endif
                        @endfor
                    </ul>
                    <div class="carousel-inner">
                        @foreach (explode(",", $item->item_value) as $key=>$slide)
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
                @endif
            @endforeach
            <a class="carousel-control-prev" href="#demo" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#demo" data-slide="next">
                <span class="carousel-control-next-icon"></span>
            </a>
        </div>
    </div>
</section>
<section class="bg-product">
    <div class="container">
        <div class="row pb-3">
            <nav class="col-md-12 navbar navbar-expand-lg navbar-light bg-light">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarorder" aria-controls="navbarorder" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarorder">
                    <ul class="navbar-nav">
                        <li class="nav-item filler active">
                            <a class="nav-link text-uppercase types" type="button">Tất cả</a>
                        </li>
                        @foreach ($type as $item)
                            <li class="nav-item filler">
                                <a class="nav-link text-uppercase types" type="button">{{$item->title}}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </nav>
        </div>

        <div class="row product-category">
            @foreach ($cake as $cakes)
                <div class="col-md-3 cakes">
                    @php
                        $db = explode(",", $cakes->img);
                    @endphp
                    <div class="card">
                        <img src="{{$db[0]}}" class="card-img-top" >
                        <div class="hover_title_section_7">
                            <a type="button">Loại:
                                @foreach ($type as $types)
                                    @if ($cakes->cake_types == $types->id)
                                        {{ $types->title }}
                                    @endif
                                @endforeach
                            </a>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title" style="font-family:'font-thin';">{{$cakes->title}}</h5>
                            <button type="button"  onclick="window.location.href='{{ route('ordetail', ['id' => $cakes->id]) }}'" class="btn btn-contact text-uppercase">Liên hệ</button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        {{$cake->links('admin.layout.pagination')}}
    </div>
</section>

@endsection
@push('scripts')
    <script>
        $(".filler").on("click", function() {
            $(".filler").removeClass('active');
            $(this).addClass('active');
        });
        $(".types").on("click", function() {
            var value = $(this).text().toLowerCase();
            if (value == 'tất cả') {
                $(".product-category .cakes").show();
            } else {
                $(".product-category .cakes").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().search(value) > -1);
                });
            }
        });
    </script>
@endpush
