<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- <link rel="stylesheet" href="css/style.css"> --}}
    <link rel="stylesheet" href="css/login.css">


    <!------ Include the above in your HEAD tag ---------->

</head>

<body>
    <!--form forgot password-->

    <div class="over-lay"></div>
    <div class="form-forgot-js">
        <div class="close-form">
            <i class="fa-solid fa-xmark"></i>
        </div>
        <div class="panel panel-default">
            <div class="panel-body forgotpw-js">
                <div class="text-center">
                    <h1><i class="fa fa-lock fa-4x"></i></h1>
                    <h2 class="text-center">Lấy lại mật khẩu</h2>
                    <p>Bạn cần nhập email để lấy lại mật khẩu</p>
                    <div class="panel-body">

                        {{-- <form id="register-form" role="form" autocomplete="off" class="form" method="POST"
                            action="{{ route('fogotPassword') }}"> --}}

                        <form id="register-form" role="form" class="form" method="POST"
                            action="{{ route('fogotPassword') }}" autocomplete="off">
                            @csrf
                            <div class="">
                                <div class="input-email">
                                    <div>
                                        <span class="addon">
                                            <i class="glyphicon glyphicon-envelope color-blue"></i>
                                        </span>
                                        <input name="email" placeholder="Email" class="form-control" type="email">
                                    </div>
                                    {{-- <i class="ik ik-user"></i> --}}
                                    <small class="text-danger error-text email_err_forgot_pass"></small>
                                </div>
                            </div>
                            <div class="btn-reset">
                                {{-- <input name="recover-submit" class="btn btn-lg btn-primary btn-block" value="Reset Password" type="submit"> --}}
                                <button type="submit" class="btn btn-lg btn-primary ">Gửi Email</button>
                            </div>
                            <input type="hidden" class="hide" name="token" id="token" value="">
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!------------------------------------------------>

    <!--form login -->
    <div class="wrap-login">
        <div class="login-box">
            <div class="row">
                <div class="d-flex">
                    <div class=" col-12 col-sm-12 col-md-6 ">
                        <div class="img">
                            <img src="css/Img/download.jpeg" alt="">
                        </div>
                    </div>
                    <div class=" col-12 col-sm-12 col-md-6 ">
                        <div class="login">
                            <h2>Đăng nhập</h2>
                            <div class="form-login">
                                <form action="{{ route('submitLogin') }}" method="POST" class="form-login"
                                    id='loginForm'>
                                    @csrf
                                    <div class="form-group">
                                        <i class="far fa-user"></i>
                                        <input type="text" name='email' id='email' class="form-input"
                                            placeholder="Email">
                                        {{-- <i class="ik ik-user"></i> --}}
                                        <small class="text-danger error-text email_err"></small>
                                    </div>
                                    <div class="form-group">
                                        <i class="fas fa-key"></i>
                                        <input type="password" name='password' id='password' class="form-input"
                                            placeholder="Mật khẩu">
                                        {{-- <i class="ik ik-lock"></i> --}}
                                        <small class="text-danger error-text password_err"></small>
                                    </div>
                                    <div class="container-btn">
                                        <button type="submit" class="btn-login">Đăng nhập</button>
                                    </div>
                                </form>
                            </div>
                            <div class="forget-pass ">
                                <a href="javascript:;" class="text-forgot textjs">Quên mật khẩu?</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM="
        crossorigin="anonymous"></script>

    <script>
        const formforgot = document.querySelector('.form-forgot-js');
        const panelbody = document.querySelector('.forgotpw-js');
        const textforgot = document.querySelector('.textjs');
        $("#loginForm").on('submit', function(e) {
            console.log(1)
            e.preventDefault();
            $.ajax({
                url: $(this).attr('action'),
                method: $(this).attr('method'),
                data: $(this).serialize(),
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                        'content')
                },
                processData: false,
                success: function(data) {
                    console.log(data)
                    var error = document.querySelectorAll(".error-text");
                    for (var i = 0; i < error.length; i++) {
                        error[i].innerHTML = "";
                    }
                    if (data.error_check == true) {
                        console.log(data.msg)
                        checklogin(data.checkUser, data.msg)
                    } else if (data.error_check == false) {
                        console.log(data.msg)
                        window.location.href = data.url;
                    } else {
                        console.log(data.msg)
                        printErrorMsg(data.error, '_err');
                    }
                }
            });
        });
        $("#register-form").on('submit', function(e) {
            e.preventDefault();
            $.ajax({
                url: $(this).attr('action'),
                method: $(this).attr('method'),
                data: $(this).serialize(),
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                        'content')
                },
                processData: false,
                success: function(data) {
                    var error = document.querySelectorAll(".error-text");
                    error.innerHTML = "";
                    if (data.error_check == true) {
                        $('.email_err_forgot_pass').text(data.msg);
                    } else if (data.error_check == false) {
                        console.log(data.msg)
                        formforgot.classList.remove("opend");
                        // window.location.href = data.url;
                    } else {
                        printErrorMsg(data.error, '_err_forgot_pass');
                    }
                }
            });
        });

        function checklogin(checkUser, msg) {
            if (checkUser) {
                $('.' + 'password' + '_err').text(msg);
            } else {
                $('.' + "email" + '_err').text(msg);
            }
        }

        function printErrorMsg(msg, $err) {
            $.each(msg, function(key, value) {
                $('.' + key + $err).text(value);
            });
        }

        formforgot.addEventListener("click", () => {
            formforgot.classList.remove("open");
        })
        panelbody.addEventListener("click", (e) => {
            e.stopPropagation();
            formforgot.classList.add("open");
        })
        textforgot.addEventListener("click", () => {
            formforgot.classList.add("open");
        })
        // 

        $('.textjs').click(function() {
            $('.form-forgot-js').addClass('opend')
            $('.over-lay').addClass('active')
        })
        $('.close-form').click(function() {
            $('.form-forgot-js').removeClass('opend')
            $('.over-lay').removeClass('active')
        })
        $('.over-lay').click(function() {
            $('.form-forgot-js').removeClass('opend')
            $('.over-lay').removeClass('active')
        })
    </script>
</body>

</html>
