@extends('admin.layout.main1')
@push('css')
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
@endpush
@section('statictis')
    <div class="card mb-3">
        <div class="card-header">
            <div class="breadcrumb-admin">
                <i class="fas fa-file-alt"></i>
                    Thống kê doanh thu của khóa học
            </div>
        </div>
        <div class="card-body">
            @if(session('status'))
                <div class="alert alert-info alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>{{ session('status') }}
                </div>
            @endif
            @if(session()->has('fail'))
                <div class="alert alert-danger alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    {{ session('fail') }}
                </div>
            @endif

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
            <div id="course_chart" style="height: 250px;"></div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <div class="breadcrumb-admin">
                <i class="fas fa-file-alt"></i>
                    Thống kê doanh thu của bánh
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
                    <button class="btn-change" id="filter_cake" style="padding: 6px 0">Kết quả thống kê</button>
                </div>
            </div>
            <div id="cake_chart" style="height: 250px;"></div>
        </div>
    </div>
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
                        ykeys: ['total'],
                        labels: ['Khóa học']
                        });

            $('#filter_course').click(function(){
                var from = $('#from').val();
                var to = $('#to').val();
                $.ajax({
                    url: "{{url('statictis/course')}}",
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
    <script>
        $(document).ready(function(){
            var chart1 = new Morris.Line({
                        element: 'cake_chart',
                        lineColors: ['#819C79', '#fc8710', '#FF6541', '#A4ADD3', '#766B56'],
                        parseTime: false,
                        xkey: 'date',
                        ykeys: ['total'],
                        labels: ['Khóa học']
                        });

            $('#filter_cake').click(function(){
                var from = $('#from').val();
                var to = $('#to').val();
                $.ajax({
                    url: "{{url('statictis/cake')}}",
                    method: "post",
                    dataType: "json",
                    data: {from: from, to: to, _token: '{{csrf_token()}}'},
                    success:function(data){
                        chart1.setData(data);
                    }
                })
            })
        })
    </script>
@endpush
