@extends('layouts.app')
@section('content')
<div class="tmcv-main">
    <div class="wrap">
        <div class="tmcv-title">
            <h1>Thêm mới chức vụ</h1>
        </div>
        <div class="container">
            <div class="row">
                <form action="{{url('themchucvu')}}" method="POST">
                @csrf
                <div class="col-sm left-inf">
                        <div class="label-name-tmcv">
                            <label for="">Mã chức vụ:</label>
                        </div>
                        <input class="inp-tmcv" type="text" name="machucvu" id="" placeholder="Nhập mã chức vụ">
                        <div class="label-name-tmcv">
                            <label for="">Tên chức vụ:</label>
                        </div>
                        <input class="inp-tmcv" type="text" name="tenchucvu" id="" placeholder="Nhập tên chức vụ">
                </div>
                @if (\Session::has('message'))
                <div class="alert alert-danger">
                <strong>{!! \Session::get('message') !!}</strong>
                </div>
                @endif
                <div class="btn-tmcv">
                    <button class="text-xacnhan js-buy-ticket">Xác nhận</button>
                </div>
                </form>
            </div>

        </div>
    </div>
</div>
{{-- modal them chuc vu moi --}}
<!-- <div class="modal-delete js-modal ">
        <div class="modal-container-delete js-modal-container">
            <div class="modal-close js-modal-close">
                <i class="ti-close"></i>
            </div>
            <div class="modal-text-delete-2">
                <span class="icon-successfull-delete-2">
                    <img src="{{ asset('css/Img/image 36.png') }}" alt="">
                </span>
                <h2>Thêm thành công</h2>
            </div>

        </div>
    </div> -->

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
</div>
@endsection
