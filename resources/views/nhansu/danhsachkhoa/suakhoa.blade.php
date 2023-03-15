@extends('layouts.app')
@section('content')
<div class="sk-main">
    <div class="wrap">
        <div class="sk-title">
            <h1>Sửa khoa</h1>
        </div>
        <div class="container">
            <div class="row">
            <form action="{{ url('capnhatkhoa/id='.$khoa->id) }}" method="POST">
                    @csrf
                <div class="col-sm left-inf">
                    @isset($khoa)
                        <div class="label-name-sk">
                            <label for="">Mã khoa:</label>
                        </div>
                        <input class="inp-tmcv" type="text" value="{{$khoa->makhoa}}" name="makhoa" id="" placeholder="Nhập mã khoa">
                        <div class="label-name-sk">
                            <label for="">Tên khoa:</label>
                        </div>
                        <input class="inp-tmcv" type="text" value="{{$khoa->tenkhoa}}" name="tenkhoa" id="" placeholder="Nhập tên khoa">
                        @endisset
                        @empty($khoa)
                        <h1>Sai router ,truy vấn hoặc không có data</h1>
                    @endempty

                </div>
                @if (\Session::has('message'))
                <div class="alert alert-danger">
                <strong>{!! \Session::get('message') !!}</strong>
                </div>
                @endif
                <div class="btn-sk">
                    <button class="text-xacnhan js-buy-ticket">Xác nhận</button>
                </div>
                </form>
            </div>

        </div>
    </div>
</div>
<!--  <div class="modal-delete js-modal ">
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
