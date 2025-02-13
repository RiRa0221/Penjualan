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
    <h2>Detail Pelanggan</h2>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $pelanggan->nama_pelanggan }}</h5>
            <p class="card-text"><strong>Alamat:</strong> {{ $pelanggan->alamat }}</p>
            <p class="card-text"><strong>Nomor Telepon:</strong> {{ $pelanggan->nomor_telepon }}</p>
        </div>
    </div>

    <a href="{{ route('pelanggans.index') }}" class="btn btn-secondary mt-3">Kembali</a>
    <a href="{{ route('pelanggans.edit', $pelanggan) }}" class="btn btn-warning mt-3">Edit</a>
</div>

@include('layout.footer')

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
