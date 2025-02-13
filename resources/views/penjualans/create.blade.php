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
    <h2>Tambah Penjualan</h2>

    <form action="{{ route('penjualans.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Tanggal Penjualan</label>
            <input type="date" name="tanggal_penjualan" class="form-control @error('tanggal_penjualan') is-invalid @enderror" value="{{ old('tanggal_penjualan') }}" required>
            @error('tanggal_penjualan')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label>Pelanggan</label>
            <select name="pelanggan_id" class="form-control" required>
                @foreach($pelanggans as $pelanggan)
                    <option value="{{ $pelanggan->id }}">{{ $pelanggan->nama_pelanggan }}</option>
                @endforeach
            </select>
        </div>


        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('penjualans.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>

@include('layout.footer')

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>