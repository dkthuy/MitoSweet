<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>MitoSweets-Admin</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>

    <link rel="icon" href='img/icontitleadmin.png' type="image/icon type">
    <link rel='stylesheet' type='text/css' media='screen' href='css/style.css'>

    <link rel='stylesheet' type='text/css' media='screen' href='css/dashboard.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/bootstrap.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/bootstrap.min.css'>

    <link href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" rel="stylesheet">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" ></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="js/bootstrap.min.js" rel="stylesheet"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
</head>

<body class="bg-login">
    <section class="container">
        <form action="/login" method="POST" class="form-login">
            @csrf

            @if(session('status'))
                <div class="alert alert-danger alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>{{ session('status') }}
                </div>
            @endif
            @if(session('success'))
                <div class="alert alert-info alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>{{ session('success') }}
                </div>
            @endif
            <h2>@lang('modules.dashboard.dashboard-title')</h2>
            <h5>@lang('modules.dashboard.login')</h5>
            <input type="text" class="form-control" name="name" placeholder="Tên đăng nhập" >
            <div class="profile_eye" >
                <input id="pass" type="password" name="password" class="form-control" placeholder="Mật khẩu" minlength="6" >
                <span toggle="#pass" class="fa fa-fw fa-eye field-icon toggle-password"></span>
            </div>

            <button type="submit" class="signin_signin">Đăng nhập</button>
            <a href="/forgot">Quên mật khẩu?</a>
        </form>

        <script>
            $(".toggle-password").click(function() {

            $(this).toggleClass("fa-eye fa-eye-slash");
            var input = $($(this).attr("toggle"));
            if (input.attr("type") == "password") {
            input.attr("type", "text");
            } else {
            input.attr("type", "password");
            }
            });
        </script>
    </section>

</body>
</html>












