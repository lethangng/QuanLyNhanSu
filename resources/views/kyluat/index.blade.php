@extends('layouts.app')
@section('title')
    {{ $title ?? 'Danh sách kỷ luật' }}
@endsection
@section('content')
    <div class="dskt-main">
        <div class="wrap">
            <div class="dskt-title">
                <h1>Danh sách kỷ luật</h1>
            </div>
            <div class="btn-tkt">
                <a href="{{ route('kyluat.create') }}">
                    <button class="nv">
                        Thêm mới kỷ luật
                    </button>
                </a>
            </div>
            <form action="{{ route('kyluat.search') }}" method="post">
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
                        <a href="{{ route('kyluat.index') }}">
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
                            <th class="head-table" scope="col">Ngày kỷ luật</th>
                            <th class="head-table" scope="col">Lý do</th>
                            <th class="head-table" scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 0;
                        @endphp
                        @foreach ($kyluats as $kyluat)
                            <tr class="">
                                <th class="h1" scope="row">{{ $kyluat->manv }}</th>
                                <th class="h1" scope="row">{{ $kyluat->nhanvien->tennv }}</th>
                                <th class="h1" scope="row">
                                    @php
                                        $newDate = date('d-m-Y', strtotime($kyluat->ngaykyluat));
                                    @endphp
                                    {{ $newDate }}
                                </th>
                                <th class="h1" scope="row">{{ $kyluat->lydo }}</th>
                                <th class="h1" scope="row">
                                    @php
                                        if ($kyluat->chitietkyluat) {
                                            $url = asset('uploads/files/' . $kyluat->chitietkyluat);
                                        } else {
                                            $url = '#';
                                        }
                                    @endphp
                                    <a href="{{ $url }}" style="text-decoration: none;" target="_blank">
                                        <button class="i-save">
                                            <img src="{{ asset('icon/save.png') }}" alt="">
                                        </button>
                                    </a>
                                    <a href="{{ route('kyluat.edit', ['id' => $kyluat->id]) }}"
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
                                                    action="{{ route('kyluat.destroy', ['id' => $kyluat->id]) }}"
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
        <div class="container-footer-kt">
            <nav aria-label="Page navigation example" class="ml-5 footer-kt">
                {{ $kyluats->links('pagination::bootstrap-5') }}
            </nav>
        </div>
        <div class="modal-delete js-modal-del success">
            <div class="modal-container-delete js-modal-container">
                <div class="modal-close js-modal-close" onclick="hideBuyTickets()">
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
            const modal = document.querySelectorAll('.js-modal');
            const modalContainer = document.querySelectorAll('.js-modal-container')
            const modalClose = document.querySelectorAll('.js-modal-close');

            function showBuyTickets(i) {
                modal[i].classList.add('open')
            }

            function hideBuyTickets(i) {
                if (i) {
                    modal[i].classList.remove('open')
                } else {
                    $('.success').removeClass('open')
                    window.location = location.href;
                }
            }
        </script>
        <script>
            $('.modal-buttons').submit(function(e) {
                // modal.classList.remove('open')
                e.preventDefault();
                var formData = new FormData(this);
                console.log($(this).attr('action'))
                $.ajax({
                    url: $(this).attr('action'),
                    type: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(data) {
                        if (data.check == true) {
                            document.querySelector('.success').classList.add('open')
                        } else {
                            alert('không xóa được bạn ơi!');
                        }
                    }
                });
            });
        </script>
    </div>
@endsection
