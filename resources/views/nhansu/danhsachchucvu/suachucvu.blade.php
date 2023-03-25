@extends('layouts.app')
@section('content')
<div class="scv-main">
    <div class="wrap">
        <div class="scv-title">
            <h1>Sửa chức vụ</h1>
        </div>
        <div class="container">
            <div class="row">
            <form action="{{ url('capnhatchucvu/id='.$chucvu->id) }}" method="POST">
                    @csrf
                <div class="col-sm left-inf">
                    @isset($chucvu)
                        <div class="label-name-scv">
                            <label for="">Mã chức vụ:</label>
                        </div>
                        <input class="inp-tmcv" type="text" name="machucvu" id="" value="{{$chucvu->machucvu}}" placeholder="Nhập mã chức vụ" >
                        <div class="label-name-scv">
                            <label for="">Tên chức vụ:</label>
                        </div>
                        <input class="inp-tmcv" type="text" name="tenchucvu" id="" value="{{$chucvu->tenchucvu}}" placeholder="Nhập tên chức vụ" >
                        @endisset
                        @empty($chucvu)
                        <h1>Sai router ,truy vấn hoặc không có data</h1>
                    @endempty

                </div>
                @if (\Session::has('message'))
                <div class="alert alert-danger">
                <strong>{!! \Session::get('message') !!}</strong>
                </div>
                @endif
                <div class="btn-scv">
                    <button class="text-xacnhan">Xác nhận</button>
                </div>
                </form>
            </div>

        </div>
    </div>
</div>
{{-- modal them chuc vu moi --}}

    <div class="modal-delete js-modal ">
        <div class="modal-container-delete js-modal-container">
            <a href="{{url('danhsachchucvu')}}">
                <div class="modal-close js-modal-close">
                <i class="ti-close"></i>
                </div>
            </a>
            <div class="modal-text-delete-2">
                <span class="icon-successfull-delete-2">
                    <img src="{{ asset('css/Img/image 36.png') }}" alt="">
                </span>
                <h2>Sửa thành công</h2>
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
