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
    <h2>Edit Detail Penjualan</h2>

    <form action="{{ route('detail_penjualans.update', $detailPenjualan) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Penjualan</label>
            <select name="penjualan_id" class="form-control" required>
                @foreach($penjualans as $penjualan)
                    <option value="{{ $penjualan->id }}" {{ $detailPenjualan->penjualan_id == $penjualan->id ? 'selected' : '' }}>
                        {{ $penjualan->pelanggan->nama_pelanggan }} - {{ $penjualan->tanggal_penjualan }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Produk</label>
            <select name="produk_id" class="form-control" required>
                @foreach($produks as $produk)
                    <option value="{{ $produk->id }}" {{ $detailPenjualan->produk_id == $produk->id ? 'selected' : '' }}>
                        {{ $produk->nama_produk }} (Stok: {{ $produk->stok }})
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Jumlah Produk</label>
            <input type="number" name="jumlah_produk" class="form-control" value="{{ $detailPenjualan->jumlah_produk }}" required>
        </div>

        <button type="submit" class="btn btn-success">Simpan Perubahan</button>
        <a href="{{ route('detail_penjualans.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>

@include('layout.footer')

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>