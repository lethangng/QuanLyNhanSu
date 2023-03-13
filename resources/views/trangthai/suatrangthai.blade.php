@extends('layouts.app')
@section('content')
<div class="tmtt-main">
    <div class="wrap">
        <div class="tmtt-title">
            <h1>Sửa trạng thái</h1>
        </div>
        <div class="container">
            <div class="row">
                <form id='update' action="" method='POST' >
                    @csrf
                    <input type="hidden" name="id" value="{{ $data->id }}">
                    <div class="col-sm left-inf">
                            <div class="label-name-tmcv">
                                <label for="">Mã trạng thái:</label>
                            </div>
                            <input class="inp-tmcv" type="text" name="matrangthai" id="" value="{{ $data->matrangthai }}" placeholder="Nhập mã trạng thái">
                            <small class="text-danger error-text matrangthai_err"></small>
                            <div class="label-name-tmcv">
                                <label for="">Tên trạng thái:</label>
                            </div>
                            <input class="inp-tmcv" type="text" name="tentrangthai" id="" value="{{ $data->tentrangthai }}"  placeholder="Nhập tên trạng thái">
                            <small class="text-danger error-text tentrangthai_err"></small>
                        </div>
        
                    <div class="btn-tmcv">
                        <button type="submit" class="text-xacnhan js-buy-ticket " id='js-buttom' >Xác nhận</button>
                    </div>
                </form>
            </div>
            
        </div>
    </div>
</div>
{{-- modal them chuc vu moi --}}
    <div class="modal-delete js-modal ">
        <div class="modal-container-delete js-modal-container">
            <div class="modal-close js-modal-close">
                <i class="ti-close"></i>
            </div>
    
            <div class="modal-text-delete-2">
                <span class="icon-successfull-delete-2">
                    <img src="{{ asset('css/Img/image 36.png') }}" alt="">
                </span>
                <h2>Sửa thành công</h2>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM="
    crossorigin="anonymous"></script>
    <script>

        const buyBtn = document.querySelector('.js-buy-ticket');
        const modal = document.querySelector('.js-modal');
        const modalContainer = document.querySelector('.js-modal-container')
        const modalClose = document.querySelector('.js-modal-close');
        $("#update").on('submit', function(e) {
            console.log(1)
            e.preventDefault();
            $.ajax({
                url: $(this).attr('action'),
                method: 'POST',
                data: $(this).serialize(),
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                        'content')
                },
                processData: false,
                success: function(data) {
                    var error = document.querySelectorAll(".error-text");
                    for (var i = 0; i < error.length; i++) {
                        error[i].innerHTML = "";
                    }
                    if (data.errCheck == true) {
                        modal.classList.add('open')
                        setTimeout(function() { 
                            window.location.href = data.url;
                        },1000);
                    } else {
                        printErrorMsg(data.error, '_err');
                    }
                }
            });
        });
        function printErrorMsg(msg, $err) {
            $.each(msg, function(key, value) {
                $('.' + key + $err).text(value);
            });
        }
        function showBuyTickets(){
            modal.classList.add('open')
        }

        function hideBuyTickets(){
            modal.classList.remove('open')
        }

        // for (const buyBtn of buyBtns){
        //                     buyBtn.addEventListener('click', showBuyTickets)
        //                 }

        modalClose.addEventListener('click', hideBuyTickets)

        modal.addEventListener('click', hideBuyTickets)
        
        modalContainer.addEventListener('click', function(event)
        {
            event.stopPropagation()
        })
    </script>
</div>
@endsection