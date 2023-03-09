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

    <!--Menu-nav-->
<section class="bg-product">
    @php
        $sort = array('Giá tăng dần', 'Giá giảm dần', 'Không sắp xếp');
    @endphp
    <div class="container">
        <div class="row pb-3">
            <div class="col-lg-9 col-md-8 col-sm-7 col-6 navbar navbar-expand-lg navbar-light bg-light"></div>
            <div class="col-lg-3 col-md-4 col-sm-5 col-6 sortby">
                <div class="col-lg-6 sortby_left">
                    <div class="dropdown">
                    <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Cấp độ
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a type="button" class="dropdown-item level">Tất cả</a>
                        @foreach ($level as $levels)
                            <a type="button" class="dropdown-item level">{{$levels->title}}</a>
                        @endforeach
                    </div>
                    </div>
                </div>
                <div class="col-lg-6 sortby_right">
                    <div class="dropdown">
                    <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Sắp xếp
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        @foreach ($sort as $sorts)
                            <a type="button" class="dropdown-item sort">{{$sorts}}</a>
                        @endforeach
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

    <!--Follow-->
<section class="section_7" >
    <div class="container">
        <div class="row mb-3" id="img-product">
            @foreach ($online as $onl)
                <div class="col-md-4">
                    @php
                        $db = explode(",", $onl->img);
                    @endphp
                    <figure class="img_section_7" style="background: url('{{ $db[0] }}') no-repeat center; background-size: cover;" >
                        <div class="hover_section_7">
                            <a href="{{ route('onldetail', ['id' => $onl->id]) }}">{{$onl->title}}</a>
                            {{-- <a href="{{ url('online-class') }}/{{$onl->title}}">Tìm hiểu thêm</a> --}}
                            {{-- <a class="price d-none">{{$onl->price}}</a> --}}
                        </div>
                        <div class="hover_title_section_7">
                            <a href="">Cấp độ:
                                @foreach ($level as $levels)
                                    @if ($onl->level == $levels->id)
                                        {{ $levels->title }}
                                    @endif
                                @endforeach
                            </a>
                        </div>
                    </figure>
                </div>
            @endforeach
        </div>
        {{$online->links('admin.layout.pagination')}}
    </div>
</section>

@endsection

@push('scripts')
    <script>
        $(".level").on("click", function() {
            var value = $(this).text().toLowerCase();
            if (value == 'tất cả') {
                $("#img-product div").show();
            } else {
                $("#img-product div").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().search(value) > -1)
                });
            }
        });
    </script>
    {{-- <script>
        $(".desc").on("click", function() {
            $(".a").sort(desc_sort).appendTo('#img-product');
            // Sắp xếp theo thứ tự giảm dần
            function desc_sort(){
                return parseInt($('.a .price').text()) < parseInt($('.a .price').text()) ? 1 : -1;
            }
        });
    </script> --}}
@endpush
