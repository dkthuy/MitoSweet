@extends('user.layout.layout')
@section('content')

<div id="news_box_content" class="mt-5">
    <section class="news_content_button bg-product" id="Free_tutorials_content">
        <div class="container">
            <div class="row product-category">
                @foreach ($free as $item)
                    <div class="col-md-4">
                        <div class="card" style="background:#F5F2F0;">
                            <iframe width="100%" height="250px" src="https://www.youtube.com/embed/{{$item->video}}">
                            </iframe>
                            <div class="news_card_body">
                                <a href="https://www.youtube.com/watch/{{$item->video}}" target="_blank" class="news_title">{{$item->title}}</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</div>

    <script src="js/multislider.js"></script>
    <script type="text/javascript" src="js/style.js"></script>

@endsection
