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

                <div class="custom-input">
                    <div class="container-search-reset">
                        <span class="icon-search-1">
                           <img src="{{ asset('icon/search.png') }}" alt="" onclick="findname()">
                        </span>
                        <span class="icon-reset-1">
                            <a href="{{ url('danhsachkhoa') }}"><img src="{{ asset('icon/reset.png') }}" alt="" ></a>
                        </span>
                    </div>


                    <input class="input-search-name-1" type="text" id="tenkhoa" placeholder="Nhập tên khoa" onkeyup="checkch(this)">

                </div>
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
        function findname() {
        var tenkhoa = document.getElementById("tenkhoa").value;
        let chck=tenkhoa;
        let dem=0;
        for (let i = 0; i < chck.length; i++) {
            if(chck.charAt(i)==" "){
                dem=dem+1;
            }
        }
        if(tenkhoa!="" && dem!=chck.length){
            var url="{{ URL::to('timkiemkhoa/tenkhoa=name') }}";
            url=url.replace('name',tenkhoa);
            window.location.assign(url);
        }
    }
    </script>
@endsection
