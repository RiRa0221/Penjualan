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
    <h2>Daftar Penjualan</h2>
    <a href="{{ route('penjualans.create') }}" class="btn btn-danger">Tambah Penjualan</a>
    <a href="{{ route('penjualans.pdf') }}" class="btn btn-light">Export To Pdf</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Pelanggan</th>
                <th>Tanggal</th>
                <th>Total Harga</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($penjualans as $penjualan)
                <tr>
                    <td>{{ $penjualan->pelanggan->nama_pelanggan }}</td>
                    <td>{{ $penjualan->tanggal_penjualan }}</td>
                    <td>Rp {{ number_format($penjualan->total_harga, 2) }}</td>
                    <td>
                        <a href="{{ route('penjualans.show', $penjualan) }}" class="btn btn-info">Detail</a>
                        <a href="{{ route('penjualans.edit', $penjualan) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('penjualans.destroy', $penjualan) }}" method="POST" style="display:inline;">
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