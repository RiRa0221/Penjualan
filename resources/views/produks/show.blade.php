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
    <h2>Detail Produk</h2>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $produk->nama_produk }}</h5>
            <p class="card-text"><strong>Harga:</strong> Rp {{ number_format($produk->harga, 2) }}</p>
            <p class="card-text"><strong>Stok:</strong> {{ $produk->stok }}</p>
        </div>
    </div>

    <a href="{{ route('produks.index') }}" class="btn btn-secondary mt-3">Kembali</a>
    <a href="{{ route('produks.edit', $produk) }}" class="btn btn-warning mt-3">Edit</a>
</div>

@include('layout.footer')

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>