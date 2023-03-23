@extends('layouts.app')
@section('title')
    {{ $title ?? 'Danh sách hợp đồng lao động' }}
@endsection
@section('content')
    <div class="dskt-main">
        <div class="wrap">
            <div class="dskt-title">
                <h1>Danh sách hợp động lao động</h1>
            </div>
            <div class="btn-tkt">
                <a href="{{ route('hopdong.create') }}">
                    <button class="nv">
                        Thêm mới hợp đồng
                    </button>
                </a>
            </div>
            <form action="{{ route('hopdong.search') }}" method="post">
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
                        <a href="{{ route('hopdong.index') }}">
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
                            <th class="head-table" scope="col">Mã hợp đồng</th>
                            <th class="head-table" scope="col">Mã nhân viên</th>
                            <th class="head-table" scope="col">Tên nhân viên</th>
                            <th class="head-table" scope="col">Ngày bắt đầu</th>
                            <th class="head-table" scope="col">Ngày kết thúc</th>
                            <th class="head-table" scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 0;
                        @endphp
                        @foreach ($hopdongs as $hopdong)
                            <tr class="">
                                <th class="h1" scope="row">{{ $hopdong->id }}</th>
                                <th class="h1" scope="row">{{ $hopdong->manv }}</th>
                                <th class="h1" scope="row">{{ $hopdong->nhanvien->tennv }}</th>
                                <th class="h1" scope="row">
                                    @php
                                        $newBeginDate = date('d-m-Y', strtotime($hopdong->ngaybatdau));
                                    @endphp
                                    {{ $newBeginDate }}
                                </th>
                                <th class="h1" scope="row">
                                    @if ($hopdong->ngayketthuc)
                                        @php
                                            $newEndDate = date('d-m-Y', strtotime($hopdong->ngayketthuc));
                                        @endphp
                                        {{ $newEndDate }}
                                    @endif
                                </th>
                                <th class="h1" scope="row">
                                    @php
                                        if ($hopdong->chitiethopdong) {
                                            $url = asset('uploads/files/' . $hopdong->chitiethopdong);
                                        } else {
                                            $url = '#';
                                        }
                                    @endphp
                                    <a href="{{ $url }}" style="text-decoration: none;" target="_blank">
                                        <button class="i-save">
                                            <img src="{{ asset('icon/save.png') }}" alt="">
                                        </button>
                                    </a>
                                    <a href="{{ route('hopdong.edit', ['id' => $hopdong->id]) }}"
                                        style="text-decoration: none;">
                                        <button class="i-edit">
                                            <i class='bx bx-edit'></i>
                                        </button>
                                    </a>
                                    <button class="i-rotate js-buy-ticket" onclick="showBuyTickets({{ $i }})">
                                        <i class='bx bx-trash'></i>
                                    </button>
                                    <div class="modal-delete js-modal">
                                        <div class="modal-container-delete js-modal-container">
                                            <div class="modal-close js-modal-close"
                                                onclick="hideBuyTickets({{ $i }})">
                                                <i class="ti-close"></i>
                                            </div>
                                            <div class="modal-text-delete">
                                                <h2>Bạn có chắc chắn muốn xóa không?</h2>
                                                <form class="modal-buttons"
                                                    action="{{ route('hopdong.destroy', ['id' => $hopdong->id]) }}"
                                                    method="post">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button class="confirm-btn" type="submit">Xác nhận</button>
                                                    <button class="cancel-btn" type="button"
                                                        onclick="hideBuyTickets({{ $i }})">Hủy</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </th>
                            </tr>
                            @php
                                $i++;
                            @endphp
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @if ($hopdongs->count() > 0)
        @endif
        <div class="container-footer-kt">
            <nav aria-label="Page navigation example" class="ml-5 footer-kt">
                {{ $hopdongs->links('pagination::bootstrap-5') }}
            </nav>
        </div>


        <script>
            const buyBtns = document.querySelectorAll('.js-buy-ticket');
            const modal = document.querySelectorAll('.js-modal');
            const modalContainer = document.querySelectorAll('.js-modal-container')
            const modalClose = document.querySelectorAll('.js-modal-close');

            function showBuyTickets(i) {
                modal[i].classList.add('open')
            }

            function hideBuyTickets(i) {
                modal[i].classList.remove('open')
            }

            for (const buyBtn of buyBtns) {
                buyBtn.addEventListener('click', showBuyTickets)
            }

            // modalClose.addEventListener('click', hideBuyTickets)

            // modal.addEventListener('click', hideBuyTickets)

            $('.js-modal').click(function() {
                $(this).removeClass('open')
            })
            $('.js-modal-container').click(function() {
                $(this).stopPropagation()
            })

            // modalContainer.addEventListener('click', function(event) {
            //     event.stopPropagation()
            // })
        </script>
    </div>
@endsection
