<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>MitoSweets-Admin</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>

    <link rel="icon" href='{{ asset('img/icontitleadmin.png') }}' type="image/icon type">
    <link rel='stylesheet' type='text/css' media='screen' href='{{ asset('css/style.css') }}'>

    <link rel='stylesheet' type='text/css' media='screen' href='{{ asset('css/dashboard.css') }}'>
    <link rel='stylesheet' type='text/css' media='screen' href='{{ asset('css/bootstrap.css') }}'>
    <link rel='stylesheet' type='text/css' media='screen' href='{{ asset('css/bootstrap.min.css') }}'>

    <link href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" rel="stylesheet">

    @stack('css')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" ></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}" rel="stylesheet"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    <script src="{{ asset('lang/summernote-vi-VN.js') }}"></script>

</head>

<body>
    <header class="container-fluid" id="header-admin">
        <div class="row py-2">
            <div class="col-lg-10 col-md-10 col-sm-9 col-8">
                <h4>@lang('modules.dashboard.dashboard-title')</h4>
                <label class="switch">
                    <input type="checkbox" checked onclick="myFunction()">
                    <span class="slider round"></span>
                </label>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-3 col-4" style="text-align: right">
                <button class="btn dropdown dropdown-toggle" data-toggle="dropdown" id="adminbtn">
                    {{-- <span class="text-capitalize">Admin</span> --}}
                    <span class="text-capitalize">{{$data_user->name}}</span>
                </button>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="adminbtn">
                    <a class="dropdown-item" href="/">@lang('modules.admin.profile')</a>
                    <a class="dropdown-item" href="/logout">@lang('modules.admin.logout')</a>
                </div>
            </div>
        </div>
    </header>












