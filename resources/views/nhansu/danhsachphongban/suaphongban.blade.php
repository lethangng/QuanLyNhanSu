@extends('layouts.app')
@section('content')
<div class="spb-main">
    <div class="wrap">
        <div class="spb-title">
            <h1>Sửa phòng ban</h1>
        </div>
        <div class="container">
            <div class="row">
            <form action="{{ url('capnhatphongban/id='.$phongban->id) }}" method="POST">
                    @csrf
                <div class="col-sm left-inf">
                @isset($phongban)

                        <div class="label-name-spb">
                            <label for="">Mã phòng ban:</label>
                        </div>
                        <input class="inp-tmcv" type="text" value="{{$phongban->maphongban}}" name="maphongban" id="" placeholder="Nhập mã phòng ban">
                        <div class="label-name-spb">
                            <label for="">Tên phòng ban:</label>
                        </div>
                        <input class="inp-tmcv" type="text" value="{{$phongban->tenphongban}}" name="tenphongban" id="" placeholder="Nhập tên phòng ban">
                        @endisset
                        @empty($phongban)
                        <h1>Sai router ,truy vấn hoặc không có data</h1>
                    @endempty
                </div>
                @if (\Session::has('message'))
                <div class="alert alert-danger">
                <strong>{!! \Session::get('message') !!}</strong>
                </div>
                @endif
                <div class="btn-spb">
                    <button class="text-xacnhan js-buy-ticket">Xác nhận</button>
                </div>
            </div>

        </div>
    </div>
</div>
<!--
    <div class="modal-delete js-modal ">
        <div class="modal-container-delete js-modal-container">
            <div class="modal-close js-modal-close">
                <i class="ti-close"></i>
            </div>

            <div class="modal-text-delete-2">
                <span class="icon-successfull-delete-2">
                    <img src="{{ asset('css/Img/image 36.png') }}" alt="">
                </span>
                <h2>Sửa thành công</h2>
            </div>
        </div>
    </div> -->
{{-- modal them chuc vu moi --}}
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
