@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="css/style2.css">
<div class="text-header">
    <h1>Thông tin cái nhân</h1>
</div>
<div class="container">
    <div class="container-content-1">
        <div class="name_and_img">
            <h3 class="text-content" >Nguyễn Văn A</h3>
            <img class="image" src="css/Img/avt.jpeg" alt="">
        </div>
        <div class="container-form-1">
            <form class="form-1">
                <label class="label-1" for="">Chức vụ:</label>
                <select style="width: 100px">
                    <option ></option>
                    <option >Giảng viên</option>
                    <option >Nhân viên</option>
                    <option >Trưởng phòng</option>
                    <option >Phó phòng</option>
                </select>
              </form>
            
              <form class="form-2" >
                <label class="label-2" for="">Phòng ban:</label>
                <select>
                    <option ></option>
                    <option >Phong đào tạo</option>
                    <option >Phòng tài chính - Kế toán</option>
                
                </select>
              </form>
        </div>
        <div class="container-form-2">
            <form class="form-3" >
                <label class="label-3" for="">Khoa:</label>
                <input type="text" id="fname" style="width: 200px">
            </form>
            <form class="form-4" >
                <label class="label-4" for="">Ảnh đại diện:</label>
                <input type="text" id="fname" style="width: 200px">
            </form>
        </div>
    </div>
    <div class="container-content-2">
        <div class="btn">
            <button class="btn-update">Cập nhật</button>
            <button class="btn-seen">Xem bảng lương</button>
            <button class="btn-changePassword">Đổi mật khẩu</button>
        </div>
    </div>
    <div class="container-content-3">
        <div class="container-form-3">
            <form class="form-5">
                <label class="label-5" for="">Họ:</label>
                <input type="text" id="fname">
                <label class="label-6" for="">Tên:</label>
                <input type="text" id="fname">
                <label class="label-7" for="">Họ và tên:</label>
                <input type="text" id="fname">
              </form>
        </div>
        <div class="container-form-4">
            <form class="form-6">
                <label class="label-8" for="">Ngày sinh:</label>
                <input type="text" id="fname">
                <label class="label-9" for="">Nơi sinh:</label>
                <input type="text" id="fname">
                <label class="label-10" for="">Giới tính:</label>
                <input type="text" id="fname">
              </form>
        </div>
        <div class="container-form-5">
            <form class="form-7">
                <label class="label-11" for="">Dân tộc:</label>
               <select>
                    <option ></option>
                    <option >Kinh</option>
                    <option >Tày</option>
               </select>
                <label class="label-12" for="">Tôn giáo:</label>
               <select>
                    <option ></option>
                    <option ></option>
               </select>
                    <label class="label-13" for="">Số điện thoại:</label>
                    <input type="text" id="fname">
              </form>
        </div>
    </div>
</div>
@endsection