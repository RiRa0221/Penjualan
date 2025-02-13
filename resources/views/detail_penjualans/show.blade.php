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
    <h2>Detail Penjualan</h2>

    <table class="table">
        <tr>
            <th>Penjualan Tanggal</th>
            <td>{{ $detailPenjualan->penjualan->tanggal_penjualan }}</td>
        </tr>
        <tr>
            <th>Nama Produk</th>
            <td>{{ $detailPenjualan->produk->nama_produk }}</td>
        </tr>
        <tr>
            <th>Jumlah Produk</th>
            <td>{{ $detailPenjualan->jumlah_produk }}</td>
        </tr>
        <tr>
            <th>Subtotal</th>
            <td>{{ $detailPenjualan->formatted_subtotal }}</td>
        </tr>
    </table>

    <a href="{{ route('detail_penjualans.index') }}" class="btn btn-secondary">Kembali</a>
    <a href="{{ route('detail_penjualans.edit', $detailPenjualan) }}" class="btn btn-warning">Edit</a>

    <form action="{{ route('detail_penjualans.destroy', $detailPenjualan) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
    </form>
</div>

@include('layout.footer')

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>