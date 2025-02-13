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
    <h2>Daftar Pelanggan</h2>
    <a href="{{ route('pelanggans.create') }}" class="btn btn-danger">Tambah Pelanggan</a>
    <a href="{{ route('pelanggans.pdf') }}" class="btn btn-light">Export To Pdf</a>
    
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Nomor Telepon</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pelanggans as $pelanggan)
                <tr>
                    <td>{{ $pelanggan->nama_pelanggan }}</td>
                    <td>{{ $pelanggan->alamat }}</td>
                    <td>{{ $pelanggan->nomor_telepon }}</td>
                    <td>
                        <a href="{{ route('pelanggans.show', $pelanggan) }}" class="btn btn-info">Detail</a>
                        <a href="{{ route('pelanggans.edit', $pelanggan) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('pelanggans.destroy', $pelanggan) }}" method="POST" style="display:inline;">
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
