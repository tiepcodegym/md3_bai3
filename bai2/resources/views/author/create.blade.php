<form action="" method="post">
    @csrf
    <input type="text" name="name" placeholder="Nhap ten tac gia">
    <input type="text" name="country" placeholder="Nhap que quan">
    <button type="submit">Them tac gia</button>
    <a href="{{route("authors.index")}}">Quay lai</a>
</form>
