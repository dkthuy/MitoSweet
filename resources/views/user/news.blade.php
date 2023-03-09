@extends('user.layout.layout')
@section('content')

    <div id="news_box_content" class="mt-5">
        <section class="news_content_button news_content bg-product" id="news_content">
            <div class="container">
            <div class="row product-category">
                @foreach ($news as $new)
                    <div class="col-md-4">
                        <div class="card" style="background:#F5F2F0;">
                            <img src="{{$new->img}}" class="card-img-top" style="height: 22vw">
                            <div class="news_card_body">
                                <span class="news_title">{{$new->title}}</span>
                                <a href="{{ route('newsdetail', ['id' => $new->id]) }}" class="news_readmore">Đọc tiếp >></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            {{$news->links('admin.layout.pagination')}}
        </section>
    </div>

    <script src="{{ asset('js/multislider.js') }}"></script>

@endsection
