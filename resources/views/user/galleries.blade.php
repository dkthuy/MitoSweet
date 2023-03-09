@extends('user.layout.layout')
@section('content')

    <script src="js/multislider.js"></script>
    <script type="text/javascript" src="js/style.js"></script>
    <div id="news_box_content" class="my-5">
        <section class="news_content_button galleries_content" id="galleries_content">
            <section class="container">
                <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-3 title-related">June, 2020</div>
                    <div class="col-lg-9 strong"></div>
                </div>
                </div>
            </section>

            <section class="related">
            <div class="container">
                <div id="mixedSlider" class="item-Slider">
                    <div class="MS-content">
                        <div class="item">
                            <div class="imgTitle">
                                <div class="card">
                                <img src="img/gallery1.png" class="card-img-top">
                            </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="imgTitle">
                                <div class="card">
                                <img src="img/gallery2.png" class="card-img-top">
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="imgTitle">
                            <div class="card">
                                <img src="img/gallery3.png" class="card-img-top" >
                            </div>
                            </div>
                        </div>
                        <div class="item">
                        <div class="imgTitle">
                            <div class="card">
                            <img src="img/gallery4.png" class="card-img-top" >
                        </div>
                        </div>
                        </div>
                        <div class="item">
                        <div class="imgTitle">
                            <div class="card">
                            <img src="img/img_Slider_little_section_7_4.jpg" class="card-img-top" >
                        </div>
                        </div>
                        </div>
                    </div>
                    <div class="MS-controls">
                        <button class="MS-left"><img src="img/arrow_left.png" style="width: 50%;"></button>
                        <button class="MS-right"><img src="img/arrow_right.png" style="width: 50%;"></button>
                    </div>
                </div>
            </div>
            </section>

            <section class="container">
                <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-3 title-related">May, 2020</div>
                    <div class="col-lg-9 strong"></div>
                </div>
                </div>
            </section>

            <section class="related">
            <div class="container">
                <div id="mixedSlider" class="item-Slider1">
                    <div class="MS-content">
                        <div class="item">
                            <div class="imgTitle">
                                <div class="card">
                                <img src="img/gallery5.png" class="card-img-top">
                            </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="imgTitle">
                                <div class="card">
                                <img src="img/gallery6.png" class="card-img-top">
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="imgTitle">
                            <div class="card">
                                <img src="img/gallery7.png" class="card-img-top" >
                            </div>
                            </div>
                        </div>
                        <div class="item">
                        <div class="imgTitle">
                            <div class="card">
                            <img src="img/gallery8.png" class="card-img-top" >
                        </div>
                        </div>
                        </div>
                        <div class="item">
                        <div class="imgTitle">
                            <div class="card">
                            <img src="img/img_Slider_little_section_7_4.jpg" class="card-img-top" >
                        </div>
                        </div>
                        </div>
                    </div>
                    <div class="MS-controls">
                        <button class="MS-left"><img src="img/arrow_left.png" style="width: 50%;"></button>
                        <button class="MS-right"><img src="img/arrow_right.png" style="width: 50%;"></button>
                    </div>
                </div>
            </div>
            </section>

            <section class="container">
                <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-3 title-related">April, 2020</div>
                    <div class="col-lg-9 strong"></div>
                </div>
                </div>
            </section>

            <section class="related">
            <div class="container">
                <div id="mixedSlider" class="item-Slider2">
                    <div class="MS-content">
                        <div class="item">
                            <div class="imgTitle">
                                <div class="card">
                                <img src="img/gallery9.png" class="card-img-top">
                            </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="imgTitle">
                                <div class="card">
                                <img src="img/gallery10.png" class="card-img-top">
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="imgTitle">
                            <div class="card">
                                <img src="img/gallery11.png" class="card-img-top" >
                            </div>
                            </div>
                        </div>
                        <div class="item">
                        <div class="imgTitle">
                            <div class="card">
                            <img src="img/gallery12.png" class="card-img-top" >
                        </div>
                        </div>
                        </div>
                        <div class="item">
                        <div class="imgTitle">
                            <div class="card">
                            <img src="img/img_Slider_little_section_7_3.jpg" class="card-img-top" >
                        </div>
                        </div>
                        </div>
                    </div>
                    <div class="MS-controls">
                        <button class="MS-left"><img src="img/arrow_left.png" style="width: 50%;"></button>
                        <button class="MS-right"><img src="img/arrow_right.png" style="width: 50%;"></button>
                    </div>
                </div>
            </div>
            </section>

            <div class="col-lg-12 text-center mb-5">
                <button class="see-more">see more</button>
            </div>
            <script>
            $('.item-Slider').multislider({
                duration: 500,
                slideAll:false,
                interval: 3000
            });
            $('.item-Slider1').multislider({
                duration: 500,
                slideAll:false,
                interval: 3000
            });
            $('.item-Slider2').multislider({
                duration: 500,
                slideAll:false,
                interval: 3000
            });
            </script>
        </section>
    </div>

@endsection
