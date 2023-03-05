@extends('layouts.app')
@section('content')
<div class="tmnv-main">
    <div class="wrap">
        <div class="tmnv-title">
            <h1>Thêm mới khen thưởng</h1>
        </div>
        <div class="container">
            <div class="row">
              <div class="col-sm left-inf">
                    <div class="tnv">
                        <label for="">Tên nhân viên:</label>
                    </div>
                    <input class="ip-tnv" type="text" name="" id="" placeholder="Mã nhân viên">
                    <div class="mnv">
                        <label for="">Mã nhân viên</label>
                    </div>
                    <input class="ip-mnv" type="text" name="" id="" placeholder="Tên nhân viên">
                    <div class="ngkt">
                        <label for="">Ngày khen thưởng:</label>
                    </div>
                    <input class="ip-ngkt" type="date" name="" id="">
                    <div class="ld">
                        <label for="">Lý do:</label>
                    </div>
                    <input class="ip-ld" type="text" name="" id="" placeholder="Nhập lý do">
                    <div class="ctkt">
                        <label for="">Chi tiết khen thưởng:</label>
                    </div>
                    <input class="ip-ctkt" type="file" name="" id="">
                    <div class="btn-xacnhan">
                        <button class="text-xacnhan js-buy-ticket">Xác nhận</button>
                    </div>
              </div>
            </div>
          </div>
    </div>
</div>
<div class="modal js-modal ">
    <div class="modal-container js-modal-container">
        <div class="modal-close js-modal-close">
            <i class="ti-close"></i>
        </div>

        <div class="Update-successful">
            <span class="icon-successfull">
                <img src="{{ asset('css/Img/image 36.png') }}" alt="">
            </span>
            <div class="text-dmk">
                <span>Thêm thành công</span>
            </div>
            <form action="{{ route('khenthuong.index') }}">
                <div class="footer-Update-successful">
                    <button class="confirm"> Xác nhận</button>
                </div>
            </form>
           
        </div>
    </div>
</div>
<script>
    const buyBtns = document.querySelectorAll('.js-buy-ticket');
    const modal = document.querySelector('.js-modal');
    const modalContainer = document.querySelector('.js-modal-container')
    const modalClose = document.querySelector('.js-modal-close');

    function showBuyTickets() {
        modal.classList.add('open')
    }

    function hideBuyTickets() {
        modal.classList.remove('open')
    }
    for (const buyBtn of buyBtns) {
        buyBtn.addEventListener('click', showBuyTickets)
    }
    modalClose.addEventListener('click', hideBuyTickets)
    modal.addEventListener('click', hideBuyTickets)

    modalContainer.addEventListener('click', function(event) {
        event.stopPropagation()
    })
</script>
</div>
@endsection