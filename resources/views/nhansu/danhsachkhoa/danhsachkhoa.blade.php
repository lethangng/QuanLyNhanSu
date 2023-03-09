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
                            <img src="{{ asset('icon/search.png') }}" alt="">
                        </span>
                        <span class="icon-reset-1">
                            <img src="{{ asset('icon/reset.png') }}" alt="">
                        </span>
                    </div>


                    <input class="input-search-name-1" type="text" placeholder="Nhập tên khoa">

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
                                <th class="h1" scope="row">{{ $item->id }}</th>
                                    <th class="h1" scope="row">{{ $item->tenkhoa }}</th>
                                    <th class="h1" scope="row">
                                        <a href="{{ route('suakhoa') }}">
                                            <button class="i-edit">
                                                <i class='bx bx-edit'></i>
                                            </button>
                                        </a>
                                        <button class="i-rotate js-buy-ticket">
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

    <div class="modal-delete js-modal ">
        <div class="modal-container-delete js-modal-container">
            <div class="modal-close js-modal-close">
                <i class="ti-close"></i>
            </div>

            <div class="modal-text-delete">
                <h2>Bạn có chắc chắn muốn xóa không?</h2>
                <div class="modal-buttons">
                    <button class="confirm-btn">Xác nhận</button>
                    <button class="cancel-btn">Hủy</button>
                </div>
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
@endsection
