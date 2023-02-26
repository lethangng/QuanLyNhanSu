@extends('nhansu.manager')
@section('title')
    {{ $title }}
@endsection
@section('content')
    <h1>{{ $title }}</h1>
    <hr>
    <a href="{{ route('khenthuong.create') }}" class="btn btn-primary">Thêm mới</a>
    @if (session()->has('message'))
        {{-- @if (session('message')) --}}
        {{-- <div class="alert alert-info alert-dismissible fade show mt-3" role="alert">
            {{ session()->get('message') }} --}}
        {{-- {{ session('message') }} --}}
        {{-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div> --}}
    @endif
    <hr>
    <table class="table table-striped table-bordered align-middle">
        <thead class="table-warning">
            <th>STT</th>
            {{-- <th>ID</th> --}}
            <th>Tên khen thưởng</th>
            <th>Tiền thưởng</th>
            <th>Sửa</th>
            <th>Xóa</th>
        </thead>
        <tbody>
            @forelse ($khenthuongs as $khenthuong)
                <tr class="table-info">
                    <td>{{ $loop->index + 1 }}</td>
                    {{-- <td>{{ $khenthuong->id }}</td> --}}
                    <td>{{ $khenthuong->TenKhenThuong }}</td>
                    <td>{{ $khenthuong->TienThuong }}</td>
                    <td><a href="{{ route('khenthuong.edit', ['id' => $khenthuong->id]) }}"
                            class="btn btn-warning text-light">Sửa</a></td>
                    <td>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Xóa
                        </button>
                        @if ($khenthuongs->count() > 0)
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Xóa khen thưởng</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Bạn chắc chắn muốn xóa ?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Đóng</button>
                                            <form action="{{ route('khenthuong.destroy', ['id' => $khenthuong->id]) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Xóa</a>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </td>
                </tr>
            @empty
                <tr class="table-info">
                    <td colspan="100%" class="text-center">Không có dữ liệu.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    <nav aria-label="Page navigation example">
        {{ $khenthuongs->links('pagination::bootstrap-4') }}
    </nav>
@endsection
