@extends('user.layout.layout')
@section('content')
    <div id="news_box_content" class="mb-5">
        <section class="news_content_button" id="Schedules_content" style="background-color:#F5F2F0; ">
            <section class="calendar">
                <div class="container">
                    <div id="calendarSlider">
                        <div class="MS-controls">
                            <button class="MS-left day-prev">
                                <svg class="bi bi-chevron-left" width="1em" height="2em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
                                </svg>
                            </button>
                            <button class="MS-right day-next">
                                <svg class="bi bi-chevron-right" width="1em" height="2em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
                                </svg>
                            </button>
                            <button type="button" class="row icon-calendar">
                                <img src="{{ asset('img/calendar.png') }}" width="60%">
                            </button>
                        </div>
                        <div class="MS-content">
                            <div class="item">
                                <!--slide1-->
                                <div class="col-lg-12 text-center weekend">
                                    {{-- <h4>7/12/2020 &rarr; 11/12/2020</h4> --}}
                                    <h4></h4>
                                </div>
                                <div class="row seven-cols days">
                                    {{-- @for ($i = 1; $i <= 7; $i++)
                                        <div class="col frame">
                                            <span class="day">1 mon</span>
                                            <div class="index">2</div>
                                        </div>
                                    @endfor --}}
                                </div>

                                <div class="row seven-cols">
                                    @for ($i = 1; $i <= 7; $i++)
                                        <div class="col schedules">
                                            <div class="card" data-toggle="modal" data-target="#schedulesModal1">
                                                <div class="card-body">
                                                    <span class="card-title">Donec vitae sapien ut...</span><br>
                                                    <span class="time">9:30Am-11:30Am</span>
                                                    <img src="img/schedules1.png" width="100%">
                                                </div>
                                            </div>
                                            <div class="card" data-toggle="modal" data-target="#schedulesModal2">
                                                <div class="card-body">
                                                    <span class="card-title">Donec vitae sapien ut...</span><br>
                                                    <span class="time">6:30pm-9:30pm</span>
                                                    <img src="img/schedules2.png" width="100%">
                                                </div>
                                            </div>
                                        </div>
                                    @endfor
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="schedulesModal1" tabindex="-1" role="dialog" aria-labelledby="schedulesModal1" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                        <button type="button" class="close share" data-dismiss="modal" aria-label="Close">
                                            <img src="img/icon_share1.png" width="50%">
                                        </button>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <span class="popup-title">Donec vitae sapien ut libero venenatis faucibus</span><br>
                                                <p class="popup-time">9:30 Am - 11:30 Am</p>
                                            </div>
                                            <div class="col-lg-12 paragraph">
                                                <p>Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc, quis gravida magna mi a libero. Fusce vulputate eleifend sapien. Vestibulum purus quam, scelerisque ut, mollis sed, nonummy id, metus. </p>
                                            </div>
                                            <div class="col-lg-8">
                                                <img src="img/PopupSchedule.png" width="100%">
                                            </div>
                                            <div class="col-lg-4">
                                                <h6>1 - 7 June, 2020</h6>
                                                <p class="paragraph pl-3">
                                                    + Duis arcu tortor<br>
                                                    + Suscipit eget<br>
                                                    + Imperdiet nec<br>
                                                    + Imperdiet iaculis
                                                </p>
                                                <h6>8 - 14 June, 2020</h6>
                                                <p class="paragraph pl-3">
                                                    + Integer ante arcu<br>
                                                    + Accumsan<br>
                                                    + Consectetuer eget<br>
                                                    + Posuere mauris<br>
                                                    + Praesent adipiscing
                                                </p>
                                            </div>

                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- show calender tháng --}}
                <div class="calendar-month d-none">
                    <div id="tail1"></div>
                    <div class="year">
                    <i class="fas fa-angle-left prev"></i>
                    <div class="date">
                        <h1></h1>
                    </div>
                    <i class="fas fa-angle-right next"></i>
                    </div>
                    <div class="month"></div>
                </div>
            </section>
        </section>
    </div>

@endsection

@push('scripts')
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="..\js\multislider.js"></script>
    <script>
    $('#calendarSlider').multislider({
        duration: 500,
        interval: 0
    });
    </script>
    <script type="text/javascript" src="..\js\script.js"></script>
@endpush
