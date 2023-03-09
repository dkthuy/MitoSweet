@extends('user.layout.main')
@section('content-index')

<section class="container-fluid ">
    @foreach ($interface as $item)
        @if (strstr($item->item_id,'online'))
            @if ($item->item_id == 'online-banner')
                <div class="row" style="background: url({{$item->item_value}}) no-repeat; background-position: center; background-size: cover;">
                    <div class="col-lg-12 khoancach"></div>
                    <div class="col-lg-9 col-2"></div>
                    @foreach ($online as $onl)
                        @php
                            $db = explode(",", $onl->img);
                        @endphp
                        <div class="col-lg-2 col-8 background_section_2">
                            <img src="{{$db[0]}}" width="50%">
                            <h5>{{$onl->title}}</h5>
                            <h6>{{$onl->summary}}</h6>
                            <a href="{{ route('onldetail', ['id' => $onl->id]) }}">xem tiếp ></a>
                        </div>
                    @endforeach
                    <div class="col-lg-1 col-2"></div>
                    <div class="col-lg-7">
                        @elseif ($item->item_id == 'online-title')
                            <h2 class="title_main_section title_main_section_2">{{$item->item_value}}</h2>
                        @else
                            <h5 class="title_section title_section_2">{{$item->item_value}}</h5>
                        <section class="center">
                            <button class="button_section_2 button_section" onclick="window.location.href='{{ route('online') }}'">Khám phá</button>
                        </section>
                    </div>
                    <div class="col-lg-5">
                    </div>
                </div>
            @endif
        @endif
    @endforeach
</section>

<section class="container-fluid ">
    @foreach ($interface as $item)
        @if (strstr($item->item_id,'order'))
            @if ($item->item_id == 'order-banner')
                <div class="row" style="background: url({{$item->item_value}}) no-repeat; background-position: center; background-size: cover;">
                  <div class="col-lg-12 khoancach"></div>
                  <div class="col-lg-9 col-2"></div>
                  @foreach ($cake as $cakes)
                        @php
                            $db = explode(",", $cakes->img);
                        @endphp
                        <div class="col-lg-2 col-8 background_section_4">
                            <img src="{{$db[0]}}" width="50%">
                            <h5>{{$cakes->title}}</h5>
                            <h6>{{$cakes->summary}}</h6>
                            <a href="{{ route('ordetail', ['id' => $cakes->id]) }}">xem tiếp ></a>
                        </div>
                    @endforeach
                  <div class="col-lg-1 col-2"></div>
                  <div class="col-lg-7">
                    @elseif ($item->item_id == 'order-title')
                        <h2 class="title_main_section title_main_section_2">{{$item->item_value}}</h2>
                    @else
                        <h5 class="title_section title_section_2">{{$item->item_value}}</h5>
                        <section class="center">
                            <button class="button_section_3 button_section" onclick="window.location.href='{{ route('order') }}'">Khám phá</button>
                        </section>
                  </div>
                  <div class="col-lg-5"></div>
                </div>
            @endif
        @endif
    @endforeach
</section>

<section class="container-fluid computer">
    @foreach ($interface as $item)
        @if (strstr($item->item_id,'about'))
            @if ($item->item_id == 'about-title')
                <div class="row">
                    <div class="col-lg-7">
                        <div class="box_section_1">
                            <h2 class="title_main_section_1 title_main_section">{{ $item->item_value }}</h2>
                        @elseif ($item->item_id == 'about-description')
                            <h5 class="title_section_1 title_section">{{ $item->item_value }}</h5>
                            <button class="button_section_1 button_section" onclick="window.location.href='{{ route('about') }}'">Khám phá</button>
                        </div>
                    </div>
                    @else
                    <div class="col-lg-5 img_section_1" >
                        <img src="{{$item->item_value}}" alt="anh1" width="80%">
                    </div>
                </div>
            @endif
        @endif
    @endforeach
</section>

    {{-- <section class="container-fluid phone">
      <div class="row">
          <div class="col-lg-5 img_section_1" >
              <img src="img/anh1.png" alt="anh1" width="80%">
          </div>
          <div class="col-lg-7">
              <div class="box_section_1">
                  <h2 class="title_main_section_1 title_main_section">About me</h2>
                  <h5 class="title_section_1 title_section">Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.</h5>
                  <button class="button_section_1 button_section" onclick="window.location.href='aboutme.php'">Khám phá</button>
              </div>
          </div>

      </div>
    </section> --}}

    <!--Story-->

<section class="story py-5">
    <div class="container">
        <div class="row">
            <h2 class="col-md-12 text-center text-uppercase" style="font-family:'font-medium';">Câu chuyện của tôi</h2>
            <hr class="hr mt-4 mb-0">
        </div>

        <div class="row pt-5">
            <div class="col-md-4">
                @foreach ($interface as $item)
                    {{-- @if (strstr($item->item_id,'schedule'))
                        @if ($item->item_id == 'schedule-img')
                            <div class="card">
                                <img src="{{$item->item_value}}" class="card-img-top" >
                                <div class="card-body">
                                    <a href="schedules.php">
                                        <h5 class="card-title" style="font-family:'font-medium'; font-weight:100;">Lịch học &nbsp;<i class="fas fa-angle-right"></i></h5>
                                    </a>
                                @else
                                    <p class="card-text">{{$item->item_value}}</p>
                                </div>
                            </div>
                        @endif
                    @elseif (strstr($item->item_id,'free'))
                        @if ($item->item_id == 'free-img')
                            <div class="card">
                                <img src="{{$item->item_value}}" class="card-img-top">
                                <div class="card-body">
                                    <a href="{{ route('free-tutorial') }}">
                                        <h5 class="card-title" style="font-family:'font-medium';font-weight:100;">Hướng dẫn miễn phí &nbsp;<i class="fas fa-angle-right"></i></h5>
                                    </a>
                                    @else
                                    <p class="card-text">{{$item->item_value}}</p>
                                </div>
                            </div>
                        @endif
                    @endif --}}
                    @if (strstr($item->item_id,'free'))
                        @if ($item->item_id == 'free-img')
                            <div class="card">
                                <img src="{{$item->item_value}}" class="card-img-top">
                                <div class="card-body">
                                    <a href="{{ route('free-tutorial') }}">
                                        <h5 class="card-title" style="font-family:'font-medium';font-weight:100;">Hướng dẫn miễn phí &nbsp;<i class="fas fa-angle-right"></i></h5>
                                    </a>
                                    @else
                                    <p class="card-text">{{$item->item_value}}</p>
                                </div>
                            </div>
                        @endif
                    @endif
                @endforeach
            </div>
            <div class="col-md-4">
                @foreach ($interface as $item)
                    {{-- @if (strstr($item->item_id,'galleries'))
                        @if ($item->item_id == 'galleries-img')
                            <div class="card">
                                <img src="{{$item->item_value}}" class="card-img-top">
                                <div class="card-body">
                                    <a href="galleries.php">
                                        <h5 class="card-title" style="font-family:'font-medium';font-weight:100;">Thư viện ảnh &nbsp;<i class="fas fa-angle-right"></i></h5>
                                    </a>
                                    @else
                                    <p class="card-text">{{$item->item_value}}</p>
                                </div>
                            </div>
                        @endif
                    @endif --}}
                    @if (strstr($item->item_id,'news'))
                        @if ($item->item_id == 'news-img')
                            <div class="card">
                                <img src="{{$item->item_value}}" class="card-img-top" >
                                <div class="card-body">
                                    <a href="{{ route('news') }}">
                                        <h5 class="card-title" style="font-family:'font-medium'; font-weight:100;">Tin tức &nbsp;<i class="fas fa-angle-right"></i></h5>
                                    </a>
                                @else
                                    <p class="card-text">{{$item->item_value}}</p>
                                </div>
                            </div>
                        @endif
                    @endif
                @endforeach
            </div>

            <div class="col-md-4">
                @foreach ($interface as $item)
                    @if (strstr($item->item_id,'contact'))
                        @if ($item->item_id == 'contact-img')
                            <div class="card">
                                <img src="{{$item->item_value}}" class="card-img-top">
                                <div class="card-body">
                                    <a href="{{ route('contact') }}">
                                        <h5 class="card-title" style="font-family:'font-medium';font-weight:100;">Liên hệ &nbsp;<i class="fas fa-angle-right"></i></h5>
                                    </a>
                                    @else
                                    <p class="card-text">{{$item->item_value}}</p>
                                </div>
                            </div>
                        @endif
                    @endif
                    {{-- @if (strstr($item->item_id,'news'))
                        @if ($item->item_id == 'news-img')
                            <div class="card">
                                <img src="{{$item->item_value}}" class="card-img-top" >
                                <div class="card-body">
                                    <a href="{{ route('news') }}">
                                        <h5 class="card-title" style="font-family:'font-medium'; font-weight:100;">Tin tức &nbsp;<i class="fas fa-angle-right"></i></h5>
                                    </a>
                                @else
                                    <p class="card-text">{{$item->item_value}}</p>
                                </div>
                            </div>
                        @endif
                    @elseif (strstr($item->item_id,'contact'))
                        @if ($item->item_id == 'contact-img')
                            <div class="card">
                                <img src="{{$item->item_value}}" class="card-img-top">
                                <div class="card-body">
                                    <a href="{{ route('contact') }}">
                                        <h5 class="card-title" style="font-family:'font-medium';font-weight:100;">Liên hệ &nbsp;<i class="fas fa-angle-right"></i></h5>
                                    </a>
                                    @else
                                    <p class="card-text">{{$item->item_value}}</p>
                                </div>
                            </div>
                        @endif
                    @endif --}}
                @endforeach
            </div>

        </div>
    </div>
</section>
    <!--Story-->

    <!--Follow-->
<section class="album py-5">
    <div class="container">
        <div class="row">
            <h2 class="col-md-12 text-center" style="font-family:'font-medium';">Theo dõi tôi <a href="https://www.instagram.com/mitosweets" target="_blank">@mitosweets</a></h2>
            <hr class="hr mt-4 mb-0">
        </div>
        <div class="row pt-5" id="my-img">
            <div class="col-md-3">
                <figure>
                    <a href="https://www.instagram.com/mitosweets/?hl=vi&fbclid=IwAR2uPiAxrkcwGLmO1pEKz45nUn3eIguFT01eaLA7wfswHgGesbs-zndMOns" target="_blank">
                    <img src="{{ asset('img/MitoSweets_Homepage_03.png') }}" style="width: 100%; height: 100%;">
                    </a>
                </figure>
            </div>
            <div class="col-md-3">
                <figure>
                    <a href="https://www.instagram.com/mitosweets/?hl=vi&fbclid=IwAR2uPiAxrkcwGLmO1pEKz45nUn3eIguFT01eaLA7wfswHgGesbs-zndMOns" target="_blank">
                    <img src="{{ asset('img/MitoSweets_Homepage_05.jpg') }}" style="width: 100%; height: 100%;">
                    </a>
                </figure>
            </div>
            <div class="col-md-3">
                <figure>
                    <a href="https://www.instagram.com/mitosweets/?hl=vi&fbclid=IwAR2uPiAxrkcwGLmO1pEKz45nUn3eIguFT01eaLA7wfswHgGesbs-zndMOns" target="_blank">
                    <img src="{{ asset('img/MitoSweets_Homepage_07.jpg') }}" style="width: 100%; height: 100%;">
                    </a>
                </figure>
            </div>
            <div class="col-md-3">
                <figure>
                    <a href="https://www.instagram.com/mitosweets/?hl=vi&fbclid=IwAR2uPiAxrkcwGLmO1pEKz45nUn3eIguFT01eaLA7wfswHgGesbs-zndMOns" target="_blank">
                    <img  src="{{ asset('img/MitoSweets_Homepage_09.jpg') }}" style="width: 100%; height: 100%;">
                    </a>
                </figure>
            </div>
            <div class="col-md-3">
                <figure>
                    <a href="https://www.instagram.com/mitosweets/?hl=vi&fbclid=IwAR2uPiAxrkcwGLmO1pEKz45nUn3eIguFT01eaLA7wfswHgGesbs-zndMOns" target="_blank">
                    <img  src="{{ asset('img/MitoSweets_Homepage_15.jpg') }}" style="width: 100%; height: 100%;">
                    </a>
                </figure>
            </div>
            <div class="col-md-3">
                <figure>
                    <a href="https://www.instagram.com/mitosweets/?hl=vi&fbclid=IwAR2uPiAxrkcwGLmO1pEKz45nUn3eIguFT01eaLA7wfswHgGesbs-zndMOns" target="_blank">
                    <img  src="{{ asset('img/MitoSweets_Homepage_16.jpg') }}" style="width: 100%; height: 100%;">
                    </a>
                </figure>
            </div>
            <div class="col-md-3">
                <figure>
                    <a href="https://www.instagram.com/mitosweets/?hl=vi&fbclid=IwAR2uPiAxrkcwGLmO1pEKz45nUn3eIguFT01eaLA7wfswHgGesbs-zndMOns" target="_blank">
                    <img  src="{{ asset('img/MitoSweets_Homepage_17.jpg') }}" style="width: 100%; height: 100%;">
                    </a>
                </figure>
            </div>
            <div class="col-md-3">
                <figure>
                    <a href="https://www.instagram.com/mitosweets/?hl=vi&fbclid=IwAR2uPiAxrkcwGLmO1pEKz45nUn3eIguFT01eaLA7wfswHgGesbs-zndMOns" target="_blank">
                    <img src="{{ asset('img/MitoSweets_Homepage_18.jpg') }}" style="width: 100%; height: 100%;">
                    </a>
                </figure>
            </div>
        </div>
    </div>
</section>
    <!--Follow-->

@endsection

