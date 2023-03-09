@extends('layouts.app')
@section('title')
    {{ $title ?? 'Danh sách khen thưởng' }}
@endsection
@section('content')
    <div class="dskt-main">
        <div class="wrap">
            <div class="dskt-title">
                <h1>Danh sách khen thưởng</h1>
            </div>
            <div class="btn-tkt">
                <a href="{{ route('khenthuong.create') }}">
                    <button class="nv">
                        Thêm mới khen thưởng
                    </button>
                </a>
            </div>
            <form action="{{ route('khenthuong.search') }}" method="post">
                @csrf
                <div class="date">
                    <label for="">
                        Tháng
                        <select name="thang">
                            <option value="">MM</option>
                            @for ($i = 1; $i < 13; $i++)
                                <option @isset($data) @selected( $i == (int)$data['thang'])  @endisset
                                    value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                    </label>
                    @php
                        use Carbon\Carbon;
                        $year = Carbon::now()->year;
                    @endphp
                    <label for="">
                        Năm
                        <select name="nam" id="">
                            <option value="">YYYY</option>
                            @for ($i = 2000; $i <= $year; $i++)
                                <option @isset($data) @selected( $i == (int)$data['nam'])  @endisset
                                    value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                    </label>
                </div>

                <div class="custom-input">
                    <div class="container-search-reset">
                        <button class="icon-search-1" type="submit" style="border: none">
                            <img src="{{ asset('icon/search.png') }}" alt="">
                        </button>
                        <a href="{{ route('khenthuong.index') }}">
                            <span class="icon-reset-1">
                                <img src="{{ asset('icon/reset.png') }}" alt="">
                            </span>
                        </a>
                    </div>
                    <input class="input-search-name-1" type="text" placeholder="Nhập mã nhân viên cần tìm" name="manv"
                        @isset($data) value="{{ $data['manv'] }}"  @endisset>
                </div>
            </form>


            <div class="list-dskt">
                <table class="table-dskt table-bordered">
                    <thead>
                        <tr class="bg-info">
                            <th class="head-table" scope="col">Mã nhân viên</th>
                            <th class="head-table" scope="col">Tên nhân viên</th>
                            <th class="head-table" scope="col">Ngày khen thưởng</th>
                            <th class="head-table" scope="col">Lý do</th>
                            <th class="head-table" scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($khenthuongs as $khenthuong)
                            <tr class="">
                                <th class="h1" scope="row">{{ $khenthuong->manv }}</th>
                                <th class="h1" scope="row">{{ $khenthuong->nhanvien->tennv }}</th>
                                <th class="h1" scope="row">
                                    @php
                                        $newDate = date('d-m-Y', strtotime($khenthuong->ngaykhenthuong));
                                    @endphp
                                    {{ $newDate }}
                                </th>
                                <th class="h1" scope="row">{{ $khenthuong->lydo }}</th>
                                <th class="h1" scope="row">
                                    <a href="{{ asset('uploads/files/' . $khenthuong->chitietkhenthuong) }}"
                                        style="text-decoration: none;">
                                        <button class="i-save">
                                            <img src="{{ asset('icon/save.png') }}" alt="">
                                        </button>
                                    </a>
                                    <a href="{{ route('khenthuong.edit', ['id' => $khenthuong->id]) }}"
                                        style="text-decoration: none;">
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
                    </tbody>
                </table>
            </div>
        </div>
        <div class="container-footer-kt">
            <nav aria-label="Page navigation example" class="ml-5 footer-kt">
                {{ $khenthuongs->links('pagination::bootstrap-5') }}
            </nav>
        </div>

        <div class="modal-kt js-modal ">
            <div class="modal-container-kt js-modal-container">
                <div class="modal-close js-modal-close">
                    <i class="ti-close"></i>
                </div>

                <div class="modal-text-kt">
                    <h2>Bạn có chắc chắn muốn xóa không?</h2>
                    <form class="modal-buttons" action="{{ route('khenthuong.destroy', ['id' => $khenthuong->id]) }}"
                        method="post">
                        @method('DELETE')
                        @csrf
                        <button class="confirm-btn" type="submit">Xác nhận</button>
                        <button class="cancel-btn">Hủy</button>
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
