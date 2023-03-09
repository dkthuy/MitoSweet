@extends('admin.layout.main1')
@push('css')
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
@endpush
@section('statictis')
    <div class="card mb-5">
        <div class="card-header">
            <div class="breadcrumb-admin">
                <i class="fas fa-file-alt"></i>
                    Thống kê doanh thu của cửa hàng
            </div>
        </div>
        <div class="card-body">
            <div class="form-row">
                <div class="col-lg-2">
                    <input type="date" name="from" id="from" class="form-control">
                </div>
                <div class="col-lg-2">
                    <input type="date" name="to" id="to" class="form-control">
                </div>
                <div class="col-lg-2">
                    <button class="btn-change" id="filter_course" style="padding: 6px 0">Kết quả thống kê</button>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <div id="course_chart"></div>
                </div>
                {{-- <div class="col-lg-4">
                    <div id="chart"></div>
                </div> --}}
            </div>
        </div>
    </div>

    {{-- <form action="statictis/test" method="GET">
        <div class="form-row">
            <div class="col-lg-2">
                <input type="date" name="from" id="from" class="form-control">
            </div>
            <div class="col-lg-2">
                <input type="date" name="to" id="to" class="form-control">
            </div>
            <div class="col-lg-2">
                <button class="btn-change" type="submit" style="padding: 6px 0">Kết quả thống kê</button>
            </div>
        </div>
    </form> --}}

@endsection


@push('scripts')

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    <script>
        $(document).ready(function(){
            var chart = new Morris.Line({
                        element: 'course_chart',
                        lineColors: ['#819C79', '#fc8710', '#FF6541', '#A4ADD3', '#766B56'],
                        parseTime: false,
                        xkey: 'date',
                        ykeys: ['total', 'price'],
                        labels: ['Khóa học','Đặt bánh']
                        });

            $('#filter_course').click(function(){
                var from = $('#from').val();
                var to = $('#to').val();
                $.ajax({
                    url: "{{url('statictis/statictis')}}",
                    method: "post",
                    dataType: "json",
                    data: {from:from, to:to, _token: '{{csrf_token()}}'},
                    success:function(data){
                        chart.setData(data);
                    }
                })
            })
        })
    </script>

    {{-- <script>
        $(document).ready(function(){
            var chart1 = new Morris.Donut({
                        element: 'chart',
                        resize: true,
                        colors: [
                            '#E0F7FA',
                            '#B2EBF2',
                            '#80DEEA',
                            '#4DD0E1',
                            '#26C6DA',
                            '#00BCD4',
                            '#00ACC1',
                            '#0097A7',
                            '#00838F',
                            '#006064'
                        ],
                        });

            $('#filter_course').click(function(){
                var from = $('#from').val();
                var to = $('#to').val();
                $.ajax({
                    url: "{{url('statictis/statictis')}}",
                    method: "post",
                    dataType: "json",
                    data: {from:from, to:to, _token: '{{csrf_token()}}'},
                    success:function(data){
                        chart1.select(data);
                    }
                })
            })
        })
    </script> --}}
@endpush
