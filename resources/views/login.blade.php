<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
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
            
                            <form id="register-form" role="form" autocomplete="off" class="form" method="post">
            
                              <div class="form-group">
                                <div class="input-group">
                                  <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                                  <input id="email" name="email" placeholder="email address" class="form-control"  type="email">
                                </div>
                              </div>
                              <div class="form-group">
                                <input name="recover-submit" class="btn btn-lg btn-primary btn-block" value="Reset Password" type="submit">
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
                <form action="" class="form-login">
                    <div class="form-group">
                        <i class="far fa-user"></i>
                        <input type="text" class="form-input" placeholder="Email Id">
                    </div>
                    <div class="form-group">
                        <i class="fas fa-key"></i>
                        <input type="password" class="form-input" placeholder="Password">
                    </div>
                </form>
                <div class="container-btn">
                    <a href="{{route('nhansu')}}" class="btn-login"> Login</a>
                </div>
                <div class="footer">
                    <a class="text-forgot textjs">Forgot Username / Password?</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<script>
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