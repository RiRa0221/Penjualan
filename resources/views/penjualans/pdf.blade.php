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
    <h2>Data Penjualan</h2>
    <table>
        <thead>
            <tr>
                <th>Pelanggan</th>
                <th>Tanggal</th>
                <th>Total Harga</th>
            </tr>
        </thead>
        <tbody>
            @foreach($penjualans as $penjualan)
                <tr>
                    <td>{{ $penjualan->pelanggan->nama_pelanggan }}</td>
                    <td>{{ $penjualan->tanggal_penjualan }}</td>
                    <td>Rp {{ number_format($penjualan->total_harga, 2) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>