@extends('layouts.app')
@section('content')
        <div class="dsk-main">
            <div class="wrap">
                <div class="dsk-title">
                    <h1>Danh sách khoa</h1>
                </div>
                <form action="{{ Route('themmoikhoa') }}">
                    <div class="btn-tmk">
                        <button class="nv">Thêm mới khoa</button>
                    </div>
                </form>
                <form action="{{url('timkiemkhoa')}}" method="GET">
                <div class="custom-input">
                    <div class="container-search-reset">
                        <span class="icon-search-1">
                        <button class="btn btn-link p-0 m-0"><img src="{{ asset('icon/search.png') }}" alt=""></button>
                        </span>
                        <span class="icon-reset-1">
                            <a href="{{ url('danhsachkhoa') }}"><img src="{{ asset('icon/reset.png') }}" alt="" ></a>
                        </span>
                    </div>
                    <input class="input-search-name-1" type="text" name="tenkhoa" id="tenkhoa" placeholder="Nhập tên khoa">
                </div>
                </form>
                @if (\Session::has('message'))
                <div class="alert alert-danger text-center">
                <strong>{!! \Session::get('message') !!}</strong>
                </div>
                @endif
                <div class="list-dsk">
                    <table class="table-dsk table-bordered">
                        <thead>
                          <tr class = "bg-info">
                            <th class="head-table" scope="col">Mã khoa</th>
                            <th class="head-table" scope="col">Tên khoa</th>
                            <th class="head-table" scope="col"></th>
                          </tr>
                        </thead>
                        <tbody>
                        @isset($khoa)
                            @foreach ($khoa as $item)
                                <th class="h1" scope="row">{{ $item->makhoa }}</th>
                                    <th class="h1" scope="row">{{ $item->tenkhoa }}</th>
                                    <th class="h1" scope="row">
                                        <a href="{{ url('suakhoa/id='.$item->id) }}">
                                            <button class="i-edit">
                                                <i class='bx bx-edit'></i>
                                            </button>
                                        </a>
                                        <button class="i-rotate js-buy-ticket" value="{{$item->id}}" id="nut" onclick="loadval(this.value)">
                                            <i class='bx bx-trash'></i>
                                        </button>
                                    </th>
                                </tr>
                            @endforeach
                        @endisset
                        @empty($khoa)
                        <h1>Sai router ,truy vấn hoặc không có data</h1>
                    @endempty


                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
    <div class="container-footer-kt">
            <nav aria-label="Page navigation example" class="ml-5 footer-kt">
                {{ $khoa->links('pagination::bootstrap-4') }}
            </nav>
        </div>
    <div class="modal-delete js-modal ">
        <div class="modal-container-delete js-modal-container">
            <div class="modal-close js-modal-close">
                <i class="ti-close"></i>
            </div>

            <div class="modal-text-delete">
                <h2>Bạn có chắc chắn muốn xóa không?</h2>
                <form action="{{ url('xoakhoa')}}" method="POST" >
                @csrf
                <div class="modal-buttons">
                    <input type="text" id="nut2" name="idxoa" hidden>
                    <button class="confirm-btn">Xác nhận</button>
                    <button class="cancel-btn" type="button" onclick="hideBuyTickets()">Hủy</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal-delete js-modal2 ">
        <div class="modal-container-delete js-modal-container2">
                <div class="modal-close js-modal-close2">
                <i class="ti-close"></i>
                </div>
            <div class="modal-text-delete-2">
                <span class="icon-successfull-delete-2">
                    <img src="{{ asset('css/Img/image 36.png') }}" alt="">
                </span>
                <h2>Xóa thành công</h2>
            </div>
        </div>
    </div>

    <script>
        const buyBtns = document.querySelectorAll('.js-buy-ticket');
        const modal = document.querySelector('.js-modal');
        const modalContainer = document.querySelector('.js-modal-container')
        const modalClose = document.querySelector('.js-modal-close');

        const modal2 = document.querySelector('.js-modal2');
        const modalContainer2 = document.querySelector('.js-modal-container2')
        const modalClose2 = document.querySelector('.js-modal-close2');

        function loadval(val){
            document.getElementById("nut2").value=val;
        }
        function showBuyTickets(){
            modal.classList.add('open')
        }

        function hideBuyTickets(){
            modal.classList.remove('open')
        }
        function hideBuyTickets2(){
            modal2.classList.remove('open')
        }

        for (const buyBtn of buyBtns){
            buyBtn.addEventListener('click', showBuyTickets)
        }

        modalClose.addEventListener('click', hideBuyTickets)

        modal.addEventListener('click', hideBuyTickets)
        modalClose2.addEventListener('click', hideBuyTickets2)

        modal2.addEventListener('click', hideBuyTickets2)

        modalContainer.addEventListener('click', function(event)
        {
            event.stopPropagation()
        })

    </script>
     @if (\Session::has('message2'))
    <script>
    window.addEventListener("load", (event) => {
        modal2.classList.add('open');
        });
    </script>
    @endif
@endsection
