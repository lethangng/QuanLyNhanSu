@extends('layouts.app')
@section('title')
    {{ $title ?? 'Danh sách tăng lương' }}
@endsection
@section('content')
    <div class="dskt-main">
        <div class="wrap">
            <div class="dskt-title">
                <h1>Danh sách tăng lương</h1>
            </div>
            <div class="btn-tkt">
                <a href="{{ route('tangluong.create') }}">
                    <button class="nv">
                        Thêm mới tăng lương
                    </button>
                </a>
            </div>
            <form action="{{ route('tangluong.search') }}" method="post">
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
                        <a href="{{ route('tangluong.index') }}">
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
                            <th class="head-table" scope="col">Mã tăng lương</th>
                            <th class="head-table" scope="col">Mã nhân viên</th>
                            <th class="head-table" scope="col">Tên nhân viên</th>
                            <th class="head-table" scope="col">Ngày tăng lương</th>
                            <th class="head-table" scope="col">Lý do</th>
                            <th class="head-table" scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tangluongs as $tangluong)
                            <tr class="">
                                <th class="h1" scope="row">{{ $tangluong->id }}</th>
                                <th class="h1" scope="row">{{ $tangluong->manv }}</th>
                                <th class="h1" scope="row">{{ $tangluong->nhanvien->tennv }}</th>
                                <th class="h1" scope="row">
                                    @php
                                        $newDate = date('d-m-Y', strtotime($tangluong->ngaytangluong));
                                    @endphp
                                    {{ $newDate }}
                                </th>
                                <th class="h1" scope="row">{{ $tangluong->lydo }}</th>
                                <th class="h1" scope="row">
                                    @php
                                        if ($tangluong->chitiettangluong) {
                                            $url = asset('uploads/files/' . $tangluong->chitiettangluong);
                                        } else {
                                            $url = '#';
                                        }
                                    @endphp
                                    <a href="{{ $url }}" style="text-decoration: none;" target="_blank">
                                        <button class="i-save">
                                            <img src="{{ asset('icon/save.png') }}" alt="">
                                        </button>
                                    </a>
                                    <a href="{{ route('tangluong.edit', ['id' => $tangluong->id]) }}"
                                        style="text-decoration: none;">
                                        <button class="i-edit">
                                            <i class='bx bx-edit'></i>
                                        </button>
                                    </a>
                                    <button class="i-rotate js-buy-ticket" type="submit">
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
                {{ $tangluongs->links('pagination::bootstrap-5') }}
            </nav>
        </div>

        <div class="modal-delete js-modal ">
            <div class="modal-container-delete js-modal-container">
                <div class="modal-close js-modal-close">
                    <i class="ti-close"></i>
                </div>

                <div class="modal-text-delete">
                    <h2>Bạn có chắc chắn muốn xóa không?</h2>
                    <form class="modal-buttons" action="{{ route('tangluong.destroy', ['id' => $tangluong->id]) }}"
                        method="post">
                        @method('DELETE')
                        @csrf
                        <button class="confirm-btn">Xác nhận</button>
                        <button class="cancel-btn" type="button" onclick="hideBuyTickets()">Hủy</button>
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
