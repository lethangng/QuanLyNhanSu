<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lấy lại mật khẩu</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
   
    <!------ Include the above in your HEAD tag ---------->
    
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
</head>
<body>
    <!--form login -->
    <div class="login-box container ">
        <div class="row">
            <div class="column img">
                <img src="css/Img/a1.png" alt="">
            </div>
            <div class="column login">
                <h2>Lấy lại mật khẩu</h2>
                <form action="{{ route('postFormFogotPassword', [ 'id' => $id , 'token' => $token ]) }}"  method="POST" class="form-login" id='loginForm'>
                    @csrf
                    <div class="form-group">
                        <i class="far fa-user"></i>
                        <input type="text" name='password'  class="form-input" placeholder="Nhập mật khẩu">
                        <i class="ik ik-user"></i>
                        <small class="text-danger error-text password_err"></small>
                    </div>
                    <div class="form-group">
                        <i class="fas fa-key"></i>
                        <input type="text" name='password_p'  class="form-input" placeholder="Nhập lại mật khẩu">
                        <i class="ik ik-lock"></i>
                        <small class="text-danger error-text password_p_err"></small>
                    </div>
                    <div class="container-btn">
                        <button type="submit" class="btn-login">Đổi mật khẩu</button>
                    </div>
                </form>
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
                // console.log(1)
                var error = document.querySelectorAll(".error-text");
                error.innerHTML = "";
                if(data.error_check==true){
                    console.log(data.msg)
                    $('.password_p_err').text(data.msg);
                }
                else if(data.error_check==false){
                    window.location.href = data.url;
                }else{
                    printErrorMsg(data.error , '_err');
                }
            }
        });
    });
    function checkpass (checkUser,msg) {
            
        }
    function printErrorMsg (msg , $err) {
            $.each( msg, function( key, value ) {
                $('.'+key+$err).text(value);
            });
        }
    

</script>