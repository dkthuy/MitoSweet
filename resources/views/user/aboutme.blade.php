@extends('user.layout.layout')
@section('content')
    <section class="order-detail">
        <div class="container mt-3">
            <nav aria-label="breadcrumb" >
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('index') }}">Trang chủ</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Giới thiệu</li>
                </ol>
            </nav>
        </div>
    </section>

    <section class="about-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Giới thiệu</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    @foreach ($interface as $item)
                        @if (strstr($item->item_id, 'about-content'))
                            {!! $item->item_value !!}
                        @endif
                    @endforeach
                </div>
            </div>
            {{-- <div class="row">
                <div class="col-lg-8 col-md-8 col-12 paragraph" style="font-weight: 900">
                    <p>
                        Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi.</p>
                    <p>
                        Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus.</p>
                    <p>
                        Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus.
                    </p>
                </div>
                <div class="col-lg-4 col-md-4 col-12">
                    <img src="img/anh1.png" width="100%">
                </div>
            </div>

            <div class="row my-5">
                <div class="col-lg-4 col-md-4 col-12">
                    <img src="img/MitoSweets_Homepage_02.jpg" width="100%">
                </div>
                <div class="col-lg-8 col-md-8 col-12 paragraph" style="font-weight: 900">
                    <p>
                        Cras ultricies mi eu turpis hendrerit fringilla. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; In ac dui quis mi consectetuer lacinia. Nam pretium turpis et arcu. Duis arcu tortor, suscipit eget, imperdiet nec, imperdiet iaculis, ipsum. Sed aliquam ultrices mauris. Integer ante arcu, accumsan a, consectetuer eget, posuere ut, mauris. Praesent adipiscing. Phasellus ullamcorper ipsum rutrum nunc.</p>
                    <p>
                        Nunc nonummy metus. Vestibulum volutpat pretium libero. Cras id dui. Aenean ut eros et nisl sagittis vestibulum.</p>
                    <p>
                        Donec mollis hendrerit risus. Phasellus nec sem in justo pellentesque facilisis. Etiam imperdiet imperdiet orci. Nunc nec neque. Phasellus leo dolor, tempus non, auctor et, hendrerit quis, nisi.</p>
                    <p>
                        Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a.
                    </p>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 paragraph" style="font-weight: 900">
                    <p>
                        Phasellus consectetuer vestibulum elit. Aenean tellus metus, bibendum sed, posuere ac, mattis non, nunc. Vestibulum fringilla pede sit amet augue. In turpis. Pellentesque posuere. Praesent turpis. Aenean posuere, tortor sed cursus feugiat, nunc augue blandit nunc, eu sollicitudin urna dolor sagittis lacus. Donec elit libero, sodales nec, volutpat a, suscipit non, turpis.</p>
                    <p>
                        Nullam sagittis. Suspendisse pulvinar, augue ac venenatis condimentum, sem libero volutpat nibh, nec pellentesque velit pede quis nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Fusce id purus.</p>
                    <p>
                        Phasellus consectetuer vestibulum elit. Aenean tellus metus, bibendum sed, posuere ac, mattis non, nunc. Vestibulum fringilla pede sit amet augue. In turpis. Pellentesque posuere. Praesent turpis. Aenean posuere, tortor sed cursus feugiat, nunc augue blandit nunc, eu sollicitudin urna dolor sagittis lacus. Donec elit libero, sodales nec, volutpat a, suscipit non, turpis.
                    </p>
                </div>
            </div> --}}
        </div>
    </section>

    <section class="album my-5 ">
        <div class="container-fluid">
            <div class="row row-cols-5" id="my-img">
                @foreach ($interface as $item)
                    @if (strstr($item->item_id, 'about-img'))
                        <div class="col">
                            <figure class="row">
                                <img src="{{$item->item_value}}" width="100%">
                            </figure>
                        </div>
                    @endif
                @endforeach
            </div>

            <div class="modal modal-img">
            <span class="close">&times;</span>
            <img class="modal-content modal-img-content" id="img01">
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
    </section>

@endsection
