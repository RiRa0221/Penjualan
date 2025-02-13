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

    <div class="card">
        <div class="card-body">
            <p><strong>Tanggal:</strong> {{ $penjualan->tanggal_penjualan }}</p>
            <p><strong>Total Harga:</strong> Rp {{ number_format($penjualan->total_harga, decimals: 2) }}</p>
            <p><strong>Pelanggan:</strong> {{ $penjualan->pelanggan->nama_pelanggan }}</p>
        </div>
    </div>

    <a href="{{ route('penjualans.index') }}" class="btn btn-secondary mt-3">Kembali</a>
    <a href="{{ route('penjualans.edit', $penjualan) }}" class="btn btn-warning mt-3">Edit</a>
</div>

@include('layout.footer')

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>