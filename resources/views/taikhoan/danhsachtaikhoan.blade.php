@extends('layouts.app')
@section('content')
        <div class="dstk-main">
            <div class="wrap">
                <div class="dstk-title">
                    <h1>Danh sách tài khoản</h1>
                </div>
                <form action="{{ route('themmoitaikhoan') }}">
                    <div class="btn-tmtk">
                        <button class="nv">Thêm mới tài khoản</button>
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
                    <input class="input-search-name-1" type="text" placeholder="Nhập mã tài khoản">
                   
                </div>
                <div class="list-dspb">
                    <table class="table-dspb table-bordered">
                        <thead>
                          <tr class = "bg-info">
                            <th class="head-table" scope="col">Mã tài khoản</th>
                            <th class="head-table" scope="col">Mã nhân viên</th>
                            <th class="head-table" scope="col">Tên nhân viên</th>
                            <th class="head-table" scope="col">Email</th>
                            <th class="head-table" scope="col">Mật khẩu</th>
                            <th class="head-table" scope="col"></th>
                          </tr>
                        </thead>
                        <tbody id='danhsach'>
                            @foreach ($listData as $data )
                                <tr class="">
                                <th class="h1" scope="row">{{ $data->id }}</th>
                                <th class="h1" scope="row">{{ $data->manv }}</th>
                                <th class="h1" scope="row">{{ $data->nhanvien->tennv }}</th>
                                <th class="h1" scope="row">{{ $data->email }}</th>
                                <th class="h1" scope="row">******</th>
                                <th class="h1" scope="row">
                                    <a href="{{ route('suataikhoan' , ['id' => $data->id]) }}">
                                        <button class="i-edit">
                                            <i class='bx bx-edit'></i>
                                        </button>
                                    </a>
                                        <button class="i-rotate js-buy-ticket click_del" id="{{ $data->id }}" onclick="showBuyTickets()">
                                            <i class='bx bx-trash'></i>
                                        </button>
                                </th>
                                </tr>      
                            @endforeach
                
                        </tbody>
                      </table>

                </div>
            </div>
        </div>
    <div class="modal-delete js-modal ">
        <div class="modal-container-delete js-modal-container">
            <div class="modal-close js-modal-close">
                <i class="ti-close"></i>
            </div>
            <input type="hidden" value="" id='valDel'>
            <div class="modal-text-delete">
                <h2>Bạn có chắc chắn muốn xóa không?</h2>
                <div class="modal-buttons">
                    {{-- <button class="confirm-btn"><a href="{{ route('xoataikhoan' , ['id' => $data->id]) }}" class="confirm-btn">Xác nhận</a></button> --}}
                    <button class="confirm-btn"> 
                        Xác nhận</button>
                    <button class="cancel-btn">Hủy</button>
                </div>
            </div>
        </div>
    </div>
    {{-- modal them chuc vu moi --}}
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
        cliclbtn()
        $('.confirm-btn').click(function (e) { 
            modal.classList.remove('open')
            e.preventDefault();
            $.ajax({
                url: '/danhsachtaikhoan/xoa',
                method: 'POST',
                data: {
                    'data': $('#valDel').val(),
                },
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                        'content')
                },
                success: function(data) {
                    $('#danhsach').html(data.msg)
                    document.querySelector('.js-modal-del').classList.add('open')
                    setTimeout(function() { 
                        document.querySelector('.js-modal-del').classList.remove('open')
                    }, 1000);
                    cliclbtn()
                },
            });
            
        });

        $('.icon-search-1').click(function (e) { 
            e.preventDefault();
            $.ajax({
                url: '/danhsachtaikhoan/tim',
                method: 'POST',
                data: {
                    'data': $('.input-search-name-1').val(),
                },
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                        'content')
                },
                success: function(data) {
                    $('#danhsach').html(data.msg)
                    cliclbtn()
                },
            });
            
        });
          
        $('.icon-reset-1').click(function (e) { 
            e.preventDefault();
            $.ajax({
                url: '/danhsachtaikhoan/tim',
                method: 'GET',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                        'content')
                },
                success: function(data) {
                    $('#danhsach').html(data.msg)
                    $('.input-search-name-1').val('')
                    cliclbtn()
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
        function cliclbtn(){
            $('.click_del').click(function (e) { 
                $('#valDel').val(this.id)
                         });
        }
    </script>
@endsection