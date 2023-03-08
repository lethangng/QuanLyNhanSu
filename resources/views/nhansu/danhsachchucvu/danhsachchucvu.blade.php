@extends('layouts.app')
@section('content')
<div class="modal js-modal ">
    <div class="modal-container js-modal-container">
        <div class="modal-close js-modal-close">
            <i class="ti-close"></i>
        </div>
        <div class="Update-successful">
            <p style="line-height:12;">Bạn có chắc chắn muốn xóa không</p>
            <button class="btn btn-primary" style="width:50%;height:20%;position:absolute;bottom: 0;left:0;">xác nhận</button>
            <button class="btn btn-danger" style="width:50%;height:20%;position:absolute;bottom: 0;right:0;">Hủy</button>
        </div>
    </div>
</div>
        <div class="dscv-main">
            <div class="wrap">
                <div class="dscv-title">
                    <h1>Danh sách chức vụ</h1>
                </div>
                <form action="{{ route('themmoichucvu') }}">
                    <div class="btn-tcv">
                        <button class="nv">Thêm mới chức vụ</button>
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
                    <input class="input-search-name-1" type="text" placeholder="Nhập tên nhân viên cần tìm">
                </div>
                <div class="list-dscv">
                    <table class="table-dscv table-bordered">
                        <thead>
                          <tr class = "bg-info">
                            <th class="head-table" scope="col">Mã chức vụ</th>
                            <th class="head-table" scope="col">Tên chứ vụ</th>
                            <th class="head-table" scope="col"></th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr class="">
                            <th class="h1" scope="row">1</th>
                            <th class="h1" scope="row">Giám đốc</th>
                            <th class="h1" scope="row">
                                <button class="i-edit-cv">
                                    <a href="{{ route('suachucvu')}}">
                                        <i class='bx bx-edit'></i>
                                    </a>
                                </button>
                                <button class="i-rotate">
                                    <i class='bx bx-trash js-buy-ticket'></i>
                                </button>
                                
                            </th>
                          </tr>
                          <tr class="">
                            <th class="h1" scope="row">2</th>
                            <th class="h1" scope="row">Phó giám đốc</th>
                            <th class="h1" scope="row">
                                <button class="i-edit-cv">
                                    <a href="{{ route('suachucvu')}}">
                                        <i class='bx bx-edit'></i>
                                    </a>
                                </button>
                                <button class="i-rotate">
                                    <i class='bx bx-trash js-buy-ticket'></i>
                                </button>
                            </th>
                          </tr>
                        </tbody>
                      </table>
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