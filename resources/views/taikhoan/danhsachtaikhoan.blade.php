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
                    <input class="input-search-name-1" type="text" placeholder="Nhập mã trạng thái">
                   
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
                        <tbody>
                          <tr class="">
                            <th class="h1" scope="row">1</th>
                            <th class="h1" scope="row">1</th>
                            <th class="h1" scope="row">Vũ Trí Thành</th>
                            <th class="h1" scope="row">thanhvu@</th>
                            <th class="h1" scope="row">*****</th>
                            <th class="h1" scope="row">
                                <a href="{{ route('suataikhoan') }}">
                                    <button class="i-edit">
                                        <i class='bx bx-edit'></i>
                                     </button>
                                </a>
                                <a href="#">
                                    <button class="i-rotate js-buy-ticket">
                                        <i class='bx bx-trash'></i>
                                    </button>
                                </a>
                            </th>
                          </tr>
                
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