@extends('user.layout.layout')
@section('content')

<section class="news-detail mt-5">
    <div class="container">
        <div class="row">
            @foreach ($news as $item)
            <div class="col-lg-12">
                <h1>{{$item->title}}</h1>
            </div>

            <div class="col-lg-12">
                <img src="{{$item->img}}" width="100%">
            </div>

            <div class="col-lg-12 paragraph">
                {!!$item->detail!!}
            </div>
            @endforeach
        </div>
        <div class="row">
            <nav class="col-lg-12">
                <ul class="pagination">
                    @for ($i = 1; $i <= count($new); $i++)
                        @foreach ($news as $item)
                            @if ($i == 1 && $item->id == $i)
                                <li class="col-lg-6"></li>
                                <li class="col-lg-6 page-item next"><a class="page-link" href="{{ route('newsdetail', ['id' => $i+1]) }}">
                                    Sau
                                <svg class="bi bi-chevron-right" width="1em" height="1em" viewBox="0 2 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
                                </svg></a></li>
                            @elseif($i == count($new) && $item->id == $i)
                                <li class="col-lg-6 page-item prev"><a class="page-link" href="{{ route('newsdetail', ['id' => $i-1]) }}">
                                    <svg class="bi bi-chevron-left" width="1em" height="1em" viewBox="0 2 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
                                    </svg>
                                    Trước</a>
                                </li>
                                <li class="col-lg-6"></li>
                            @elseif ($i != 1 && $i != count($new) && $item->id == $i)
                                    <li class="col-lg-6 page-item prev"><a class="page-link" href="{{ route('newsdetail', ['id' => $i-1]) }}">
                                        <svg class="bi bi-chevron-left" width="1em" height="1em" viewBox="0 2 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
                                        </svg>
                                    Trước</a></li>
                                    <li class="col-lg-6 page-item next"><a class="page-link" href="{{ route('newsdetail', ['id' => $i+1]) }}">
                                        Sau
                                    <svg class="bi bi-chevron-right" width="1em" height="1em" viewBox="0 2 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
                                    </svg></a></li>
                                    @break
                            @endif
                        @endforeach
                    @endfor

                </ul>
            </nav>
        </div>
    </div>
</section>

@endsection
