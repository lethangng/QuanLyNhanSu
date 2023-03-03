<form action="@yield('route')" method="post" enctype="multipart/form-data">
    @csrf
    <input type="file" name="upfile" accept=".doc,.docx,.pdf,image/*" />
    <button type="submit" class="btn btn-primary">Tải lên</button>
</form>
