<div>
    <p>Bạn đã yêu cầu xác thực email {{ $user->email }} <br>
    Để hoàn tất quá trình, hãy nhấn nút "Xác thực" dưới đây.</p>
</div>
<div style="margin:16px 0" align="left">
    <a style="color:white;text-decoration:none;background-color:#2c66ed;border-radius:4px;display:inline-block;padding:16px 32px" 
    href="{{ $url.'/'.$user->id.'/'.$user->token }}" 
    target="_blank">Xác thực </a>
</div>
<div>Nếu bạn không yêu cầu xác thực email nào, vui lòng bỏ qua email nhé!</div>