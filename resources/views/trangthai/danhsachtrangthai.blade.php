@extends('layouts.app')
@section('content')
        <div class="dstt-main">
            <div class="wrap">
                <div class="dstt-title">
                    <h1>Danh sách trạng thái</h1>
                </div>
                <form action="{{ route('themmoitrangthai') }}">
                    <div class="btn-tmtt">
                        <button class="nv">Thêm mới trạng thái</button>
                    </div>
                </form>

                <div class="custom-input">
                    <div class="container-search-reset">
                        <span class="icon-search-1">
                            <img src="{{ asset('icon/search.png') }}" alt="">
                        </span>
                        <a href="{{ route('danhsachtrangthai') }}">
                            <span class="icon-reset-1">
                                <img src="{{ asset('icon/reset.png') }}" alt="">
                            </span>
                        </a>
                        
                    </div>
                    <input class="input-search-name-1" type="text" placeholder="Nhập mã trạng thái">
                   
                </div>
                <div class="list-dspb">
                    <table class="table-dspb table-bordered">
                        <thead>
                          <tr class = "bg-info">
                            <th class="head-table" scope="col">Mã trạng thái</th>
                            <th class="head-table" scope="col">Tên trạng thái</th>
                            <th class="head-table" scope="col"></th>
                          </tr>
                        </thead>
                        <tbody id='trangthai'>
                        @foreach ($listData as $data   )
                            <tr class="" >
                            <th class="h1" scope="row">{{ $data->matrangthai }}</th>
                            <th class="h1" scope="row">{{ $data->tentrangthai }}</th>
                            <th class="h1" scope="row">
                                <a href="{{ route('suatrangthai' , ['id' => $data->id]) }}">
                                    <button class="i-edit">
                                        <i class='bx bx-edit'></i>
                                    </button>
                                </a>
                                {{-- <a href="{{ route('xoatrangthai' , ['id' => $data->id]) }}"> --}}
                                    <button class="i-rotate js-buy-ticket">
                                        <i class='bx bx-trash'></i>
                                    </button>
                                </a>
                            </th>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="container-footer-kt">
                        <nav aria-label="Page navigation example" class="ml-5 footer-kt">
                            {{ $listData->links('pagination::bootstrap-4') }}
                        </nav>
                    </div>
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
                    <button class="confirm-btn">
                        <input type="hidden" value="{{ $data->id }}" id='val_del' >
                        Xác nhận</button>
                    <button class="cancel-btn">Hủy</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-delete js-modal-del ">
        <div class="modal-container-delete js-modal-container">
            <div class="modal-close js-modal-close">
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
    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM="
    crossorigin="anonymous"></script>
    <script>
        const buyBtns = document.querySelectorAll('.js-buy-ticket');
        const modal = document.querySelector('.js-modal');
        const modalContainer = document.querySelector('.js-modal-container')
        const modalClose = document.querySelector('.js-modal-close');
        const tableBody = document.getElementById("trangthai");
        $('.icon-search-1').click(function (e) { 
            e.preventDefault();
            $.ajax({
                url: '/danhsachtrangthai/tim',
                method: 'POST',
                data: {
                    'data': $('.input-search-name-1').val(),
                },
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                        'content')
                },
                success: function(data) {
                    $('#trangthai').html(data.msg)
                    
                },
            });
            
        });
          
        $('.icon-reset-1').click(function (e) { 
            e.preventDefault();
            $.ajax({
                url: '/danhsachtrangthai/tim',
                method: 'GET',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                        'content')
                },
                success: function(data) {
                    if (data.check == true) {
                        $('#trangthai').html(data.msg)

                    } else {
                        $('.input-search-name-1').val(data.msg)
                    }
                },
            });
            
        });


        $('.confirm-btn').click(function (e) { 
            modal.classList.remove('open')
            e.preventDefault();
            $.ajax({
                url: '/danhsachtrangthai/xoa',
                method: 'POST',
                data: {
                    'data': $('#val_del').val(),
                },
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                        'content')
                },
                success: function(data) {
                    $('#trangthai').html(data.msg)
                    document.querySelector('.js-modal-del').classList.add('open')
                    setTimeout(function() { 
                        document.querySelector('.js-modal-del').classList.remove('open')
                    }, 1000);
                },
            });
            
        });
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