<!DOCTYPE html>
<html>
<head>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid black;
        }

        th, td {
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Data Detail Penjualan</h2>
    <table>
        <thead>
            <tr>
                <th>Penjualan</th>
                <th>Produk</th>
                <th>Jumlah</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($detail_penjualans as $key => $detail)
                <tr>
                    <td>{{ $detail->penjualan->pelanggan->nama_pelanggan ?? 'Tidak Ada Data' }}</td>
                    <td>{{ $detail->produk->nama_produk }}</td>
                    <td>{{ $detail->jumlah_produk }}</td>
                    <td>{{ $detail->formatted_subtotal }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>