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
        <div class="dsk-main">
            <div class="wrap">
                <div class="dsk-title">
                    <h1>Danh sách khoa</h1>
                </div>
                <div class="btn-tmk">
                    <button class="nv">Thêm mới khoa</button>
                </div>


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
                          <tr class="">
                            <th class="h1" scope="row">1</th>
                            <th class="h1" scope="row">CNTT</th>
                            <th class="h1" scope="row">
                                <button class="i-edit">
                                    <i class='bx bx-edit'></i>
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