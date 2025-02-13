@include('layout.header')
@include('layout.menu')
@include('layout.navbar')
<br>
<br>
<br>
<br>
<br>
<br>
<br>

<div class="container mt-5">
    <h2>Daftar Produk</h2>
    <a href="{{ route('produks.create') }}" class="btn btn-danger">Tambah Produk</a>
    <a href="{{ route('produks.pdf') }}" class="btn btn-light">Export To Pdf</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Nama Produk</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($produks as $produk)
                <tr>
                    <td>{{ $produk->nama_produk }}</td>
                    <td>Rp {{ number_format($produk->harga, 2) }}</td>
                    <td>{{ $produk->stok }}</td>
                    <td>
                        <a href="{{ route('produks.show', $produk) }}" class="btn btn-info">Detail</a>
                        <a href="{{ route('produks.edit', $produk) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('produks.destroy', $produk) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@include('layout.footer')

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>