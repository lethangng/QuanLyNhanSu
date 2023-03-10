@extends('layouts.app')
@section('content')
    <div class="dsnv-main">
        <div class="wrap">
            <div class="dsnv-title">
                <h1>Danh sách nhân viên</h1>
            </div>
            <form action="{{ url('themmoinhanvien') }}">
                <div class="btn-tnv">
                    <button class="nv">Thêm mới nhân viên</button>
                </div>
            </form>

            <div class="text-filter">
                <span>Lọc theo:</span>
                <label class="form-filter">
                    <input type="radio" checked="checked" name="radio"> Phòng ban
                    <span class="checkmark"></span>
                </label>
                <label class="form-filter">
                    <input type="radio" checked="checked" name="radio"> Chức vụ
                    <span class="checkmark"></span>
                </label>
                <label class="form-filter">
                    <input type="radio" checked="checked" name="radio"> Khoa
                    <span class="checkmark"></span>
                </label>
            </div>

            <div class="custom-select-input">
                <select class="select-name" name="" id="">
                    <option value=""></option>
                    <option value="">abc</option>
                </select>
                <span class="icon-reset">
                    <img src="{{ asset('icon/reset.png') }}" alt="">
                </span>
                <span class="icon-search">
                    <img src="{{ asset('icon/search.png') }}" alt="">
                </span>

                <input class="input-search-name" type="text" placeholder="Nhập tên nhân viên cần tìm">

            </div>
            <div class="list-dsnv">
                <table class="table-dsnv table-bordered">
                    <thead>
                        <tr class="bg-info">
                            <th class="head-table" scope="col">Mã nhân viên</th>
                            <th class="head-table" scope="col">Họ tên</th>
                            <th class="head-table" scope="col">Emai</th>
                            <th class="head-table" scope="col">CMND</th>
                            <th class="head-table" scope="col">Giới tính</th>
                            <th class="head-table" scope="col">Chức vụ</th>
                            <th class="head-table" scope="col">Tên phòng ban</th>
                            <th class="head-table" scope="col">Khoa</th>
                            <th class="head-table" scope="col">Trạng thái</th>
                            <th class="head-table" scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @isset($caNhan)
                            @foreach ($caNhan as $item)
                                <tr class="">
                                    <th class="h1" scope="row">{{ $item->id }}</th>
                                    <th class="h1" scope="row">{{ $item->tennv }}</th>
                                    <th class="h1" scope="row">{{ $item->email }}</th>
                                    <th class="h1" scope="row">{{ $item->cccd }}</th>
                                    <th class="h1" scope="row">{{ $item->gioitinh }}</th>
                                    @php
                                        $d1 = 0;
                                        $d2 = 0;
                                        $d3 = 0;
                                    @endphp
                                    @foreach ($chucVu as $item2)
                                        @if ($item->machucvu == $item2->id)
                                            <th class="h1" scope="row">{{ $item2->tenchucvu }}</th>
                                            @php
                                                $d1 = 1;
                                            @endphp
                                        @break
                                        @endif
                                    @endforeach
                                    @if ($d1 == 0)
                                        <th class="h1" scope="row">Trống</th>
                                    @endif


                                    @foreach ($phongBan as $item2)
                                        @if ($item->maphongban == $item2->id)
                                            <th class="h1" scope="row">{{ $item2->tenphongban }}</th>
                                            @php
                                                $d2 = 1;
                                            @endphp
                                        @break
                                    @endif
                                    @endforeach
                                        @if ($d2 == 0)
                                            <th class="h1" scope="row">Trống</th>
                                    @endif

                                    @foreach ($khoa as $item2)
                                    @if ($item->makhoa == $item2->id)
                                        <th class="h1" scope="row">{{ $item2->tenkhoa }}</th>
                                        @php
                                            $d3 = 1;
                                        @endphp
                                    @break
                                    @endif
                                    @endforeach

                                    @if ($d3 == 0)
                                        <th class="h1" scope="row">Trống</th>
                                    @endif

                                    @foreach($trangThai as $item2)
                                        @if($item->matrangthai==$item2->id)
                                        <th class="h1" scope="row">{{ $item2->tentrangthai }}</th>
                                        @endif
                                    @endforeach
                                    <th class="h1" scope="row">
                                        <button class="i-save">
                                            <a href="{{ route('canhan.index', ['id' => $item->id]) }}">
                                                <img src="{{ asset('icon/save.png') }}" alt="">
                                            </a>
                                        </button>
                                        <a href="{{ url('suanhanvien/id='.$item->id) }}">
                                            <button class="i-edit">
                                                <i class='bx bx-edit'></i>
                                            </button>
                                        </a>
                                        <button class="i-rotate js-buy-ticket" type="button" value="{{$item->id}}" id="nut">
                                            <i class='bx bx-trash'></i>
                                        </button>

                                    </th>
                                </tr>
                            @endforeach
                        @endisset
                        @empty($caNhan)
                        <h1>Sai router ,truy vấn hoặc không có data</h1>
                    @endempty
                    </tbody>
                </table>
            </div>
    </div>
    <div class="modal-delete js-modal ">
        <div class="modal-container-delete js-modal-container">
            <div class="modal-close js-modal-close">
                <i class="ti-close"></i>
            </div>

            <div class="modal-text-delete">
                <h2>Bạn có chắc chắn muốn xóa không?</h2>
                <form action="{{ url('xoanhanvien')}}" method="POST" >
                @csrf
                <div class="modal-buttons">
                    <input type="text" id="nut2" name="idxoa" hidden>
                    <button class="confirm-btn" type="submit" >Xác nhận</button>
                    <button class="cancel-btn">Hủy</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <div class="container-footer-kt">
            <nav aria-label="Page navigation example" class="ml-5 footer-kt">
                {{ $caNhan->links('pagination::bootstrap-4') }}
            </nav>
        </div>
<script>
    const buyBtns = document.querySelectorAll('.js-buy-ticket');
    const modal = document.querySelector('.js-modal');
    const modalContainer = document.querySelector('.js-modal-container')
    const modalClose = document.querySelector('.js-modal-close');

    function showBuyTickets() {
        document.getElementById("nut2").value=document.getElementById("nut").value;
        modal.classList.add('open');
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
</body>

</html>
@endsection
