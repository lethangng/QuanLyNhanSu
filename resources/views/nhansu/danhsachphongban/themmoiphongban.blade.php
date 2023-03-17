@extends('layouts.app')
@section('content')
<div class="tmpb-main">
    <div class="wrap">
        <div class="tmpb-title">
            <h1>Thêm mới phòng ban</h1>
        </div>
        <div class="container">
            <div class="row">
            <form action="{{url('themphongban')}}" method="POST">
                @csrf
                <div class="col-sm left-inf">
                        <div class="label-name-tmpb">
                            <label for="">Mã phòng ban:</label>
                        </div>
                        <input class="inp-tmcv" type="text" name="maphongban" id="" placeholder="Nhập mã phòng ban" onkeyup="checkch(this)">
                        <div class="label-name-tmpb">
                            <label for="">Tên phòng ban:</label>
                        </div>
                        <input class="inp-tmcv" type="text" name="tenphongban" id="" placeholder="Nhập tên phòng ban" onkeyup="checkch(this)">
                </div>
                @if (\Session::has('message'))
                <div class="alert alert-danger">
                <strong>{!! \Session::get('message') !!}</strong>
                </div>
                @endif
                <div class="btn-tmpb">
                    <button class="text-xacnhan">Xác nhận</button>
                </div>
                </form>
            </div>

        </div>
    </div>
</div>
<div class="modal-delete js-modal ">
        <div class="modal-container-delete js-modal-container">
            <a href="{{url('danhsachphongban')}}">
                <div class="modal-close js-modal-close">
                <i class="ti-close"></i>
                </div>
            </a>

            <div class="modal-text-delete-2">
                <span class="icon-successfull-delete-2">
                    <img src="{{ asset('css/Img/image 36.png') }}" alt="">
                </span>
                <h2>Thêm thành công</h2>
            </div>
        </div>
    </div>
    <script>
        const buyBtns = document.querySelectorAll('.js-buy-ticket');
        const modal = document.querySelector('.js-modal');
        const modalContainer = document.querySelector('.js-modal-container')
        const modalClose = document.querySelector('.js-modal-close');

        function showBuyTickets(){
            modal.classList.add('open')
        }

        function hideBuyTickets(){
            modal.classList.remove('open')
        }

        for (const buyBtn of buyBtns){
            buyBtn.addEventListener('click', showBuyTickets)
        }

        modalClose.addEventListener('click', hideBuyTickets)

        modal.addEventListener('click', hideBuyTickets)

        modalContainer.addEventListener('click', function(event)
        {
            event.stopPropagation()
        })
    </script>
    @if (\Session::has('message2'))
    <script>
    window.addEventListener("load", (event) => {
        modal.classList.add('open');
        });
    </script>
    @endif
</div>
@endsection
