<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
   
    <!------ Include the above in your HEAD tag ---------->
    
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
</head>
<body>
    <!--form forgot password-->
    <div class="form-forgot-js" style="display:none;padding:54px;position: relative;background-color:rgba(3,3,3,0.1);z-index:9;">

        <div class="form-gap"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <div class="panel panel-default">
                      <div class="panel-body forgotpw-js">
                        <div class="text-center">
                          <h3><i class="fa fa-lock fa-4x"></i></h3>
                          <h2 class="text-center">Forgot Password?</h2>
                          <p>You can reset your password here.</p>
                          <div class="panel-body">
            
                            <form id="register-form" role="form" autocomplete="off" class="form" method="POST" action="{{route('fogotPassword')}}">
                                @csrf
                              <div class="form-group">
                                <div class="input-group">
                                  <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                                  <input name="email" placeholder="email address" class="form-control"  type="email">
                                  <i class="ik ik-user"></i>
                                  <small class="text-danger error-text email_err_forgot_pass"></small>
                                </div>
                              </div>
                              <div class="form-group">
                                {{-- <input name="recover-submit" class="btn btn-lg btn-primary btn-block" value="Reset Password" type="submit"> --}}
                                <button type="submit" class="btn btn-lg btn-primary btn-block">Reset Password</button>
                              </div>
                              
                              
                              <input type="hidden" class="hide" name="token" id="token" value=""> 
                            </form>
            
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
            </div>
        </div>
    </div>
    <!------------------------------------------------>

    <!--form login -->


    <div class="login-box">
        <div class="row">
            <div class="column img">
                <img src="css/Img/a1.png" alt="">
            </div>
            <div class="column login">
                <h2>User Login</h2>
                <form action="{{route('submitLogin')}}"  method="POST" class="form-login" id='loginForm'>
                    @csrf
                    <div class="form-group">
                        <i class="far fa-user"></i>
                        <input type="text" name='email' id='email' class="form-input" placeholder="Email Id">
                        <i class="ik ik-user"></i>
                        <small class="text-danger error-text email_err"></small>
                    </div>
                    <div class="form-group">
                        <i class="fas fa-key"></i>
                        <input type="password" name='password' id='password' class="form-input" placeholder="Password">
                        <i class="ik ik-lock"></i>
                        <small class="text-danger error-text password_err"></small>
                    </div>
                    <div class="container-btn">
                        <button type="submit" class="btn-login">Login</button>
                    </div>
                </form>
                <div class="footer">
                    <a class="text-forgot textjs">Forgot Username / Password?</a>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>

</body>
</html>
<script>
    $("#loginForm").on('submit', function(e){
        e.preventDefault();
        $.ajax({
            url:$(this).attr('action'),
            method:$(this).attr('method'),
            data: $(this).serialize(),
            headers: {'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')},
            processData:false,
            success:function(data){
                // console.log(data)
                var error = document.querySelectorAll(".error-text");
                for (var i = 0; i < error.length; i++) {
                    error[i].innerHTML = "";
                }
                if(data.error_check==true){
                    console.log(data.msg)
                    checklogin(data.checkUser , data.msg)
                }
                else if(data.error_check==false){
                    window.location.href = data.url;
                }
                else{
                    printErrorMsg(data.error , '_err');
                } 
            }
        });
    });
    $("#register-form").on('submit', function(e){
        e.preventDefault();
        $.ajax({
            url:$(this).attr('action'),
            method:$(this).attr('method'),
            data: $(this).serialize(),
            headers: {'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')},
            processData:false,
            success:function(data){
                var error = document.querySelectorAll(".error-text");
                error.innerHTML = "";
                if(data.error_check==true){
                    $('.email_err_forgot_pass').text(data.msg);
                }
                else if(data.error_check==false){
                    console.log(data.msg)
                    formforgot.classList.remove("open");
                    // window.location.href = data.url;
                }else{
                    printErrorMsg(data.error , '_err_forgot_pass');
                }
            }
        });
    });
    function checklogin (checkUser,msg) {
            if(checkUser){
                $('.'+'password'+'_err').text(msg);
            }else{
                $('.'+"email"+'_err').text(msg);
            }
        }
    function printErrorMsg (msg , $err) {
            $.each( msg, function( key, value ) {
                $('.'+key+$err).text(value);
            });
        }
    const formforgot = document.querySelector('.form-forgot-js');
    const panelbody = document.querySelector('.forgotpw-js');
    const textforgot = document.querySelector('.textjs');
    formforgot.addEventListener("click" , () =>{
        formforgot.classList.remove("open");
    })
    panelbody.addEventListener("click", (e) => {
            e.stopPropagation();
        formforgot.classList.add("open");
    })
    textforgot.addEventListener("click",() =>{
        formforgot.classList.add("open");
    })



</script>