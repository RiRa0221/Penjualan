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
    <h2>Daftar Detail Penjualan</h2>
    <a href="{{ route('detail_penjualans.create') }}" class="btn btn-danger">Tambah Detail Penjualan</a>
    <a href="{{ route('detail_penjualans.pdf') }}" class="btn btn-light">Export To Pdf</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Penjualan</th>
                <th>Produk</th>
                <th>Jumlah</th>
                <th>Subtotal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($details as $detail)
                <tr>
                    <td>{{ $detail->penjualan->pelanggan->nama_pelanggan ?? 'Tidak Ada Data' }}</td>
                    <td>{{ $detail->produk->nama_produk }}</td>
                    <td>{{ $detail->jumlah_produk }}</td>
                    <td>{{ $detail->formatted_subtotal }}</td>
                    <td>

                        <a href="{{ route('detail_penjualans.show', $detail) }}" class="btn btn-info">Detail</a>
                        <a href="{{ route('detail_penjualans.edit', $detail) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('detail_penjualans.destroy', $detail) }}" method="POST" style="display:inline;">
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