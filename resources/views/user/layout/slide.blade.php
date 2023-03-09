<section class="container-fluid">
    <div class="row">
        <div id="demo" class="carousel slide" data-ride="carousel">
            @foreach ($interface as $item)
                @if (strstr($item->item_id, 'slider'))
                    <ul class="carousel-indicators">
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

                        {{-- <div class="carousel-caption slider">
                            <h3 class="title_slider_1">Lorem ipsum dolor sit </h3>
                            <p class="title_slider_2">Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.</p>
                            <button class="button_slider" onclick="window.location.href='onlineclass.php'">Discover</button>
                        </div> --}}
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
