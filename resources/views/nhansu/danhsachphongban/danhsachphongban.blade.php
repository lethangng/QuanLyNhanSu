@extends('layouts.app')
@section('content')
        <div class="dspb-main">
            <div class="wrap">
                <div class="dspb-title">
                    <h1>Danh sách phòng ban</h1>
                </div>
                <form action="{{ route('themmoiphongban') }}">
                    <div class="btn-tpb">
                        <button class="nv">Thêm mới phòng ban</button>
                    </div>
                </form>
                <form action="{{url('timkiemphongban')}}" method="GET">
                <div class="custom-input">
                    <div class="container-search-reset">
                        <span class="icon-search-1">
                        <button class="btn btn-link p-0 m-0"><img src="{{ asset('icon/search.png') }}" alt=""></button>
                        </span>
                        <span class="icon-reset-1">
                            <a href="{{ url('danhsachphongban') }}"><img src="{{ asset('icon/reset.png') }}" alt=""></a>
                        </span>
                    </div>
                    <input class="input-search-name-1" type="text" name="tenphongban" id="tenphongban" placeholder="Nhập tên phòng ban cần tìm" >
                </div>
                </form>
                @if (\Session::has('message'))
                <div class="alert alert-danger text-center">
                <strong>{!! \Session::get('message') !!}</strong>
                </div>
                @endif
                <div class="list-dspb">
                    <table class="table-dspb table-bordered">
                        <thead>
                          <tr class = "bg-info">
                            <th class="head-table" scope="col">Mã phòng ban</th>
                            <th class="head-table" scope="col">Tên phòng ban</th>
                            <th class="head-table" scope="col"></th>
                          </tr>
                        </thead>
                        <tbody>
                        @isset($phongban)
                            @foreach ($phongban as $item)
                            <tr class="">
                            <th class="h1" scope="row">{{$item->maphongban}}</th>
                            <th class="h1" scope="row">{{$item->tenphongban}}</th>
                            <th class="h1" scope="row">
                                <a href="{{ url('suaphongban/id='.$item->id) }}">
                                    <button class="i-edit" >
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
                        @empty($phongban)
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
                {{ $phongban->links('pagination::bootstrap-4') }}
            </nav>
        </div>
    <div class="modal-delete js-modal ">
        <div class="modal-container-delete js-modal-container">
            <div class="modal-close js-modal-close">
                <i class="ti-close"></i>
            </div>

            <div class="modal-text-delete">
                <h2>Bạn có chắc chắn muốn xóa không?</h2>
                <form action="{{ url('xoaphongban')}}" method="POST" >
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

    <script>
        const buyBtns = document.querySelectorAll('.js-buy-ticket');
        const modal = document.querySelector('.js-modal');
        const modalContainer = document.querySelector('.js-modal-container')
        const modalClose = document.querySelector('.js-modal-close');

        function loadval(val){
            document.getElementById("nut2").value=val;
        }
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
@endsection
