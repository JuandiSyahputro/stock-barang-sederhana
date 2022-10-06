<!DOCTYPE html>
<html>

<head>
  <style>
    * {
      font-family: Arial, Helvetica, sans-serif;
    }

    #customers {
      border-collapse: collapse;
      width: 100%;
    }

    #customers td,
    #customers th {
      border: 1px solid #ddd;
      padding: 8px;
    }

    #customers tr:nth-child(even) {
      background-color: #f2f2f2;
    }

    #customers tr:hover {
      background-color: #ddd;
    }

    #customers th {
      padding-top: 12px;
      padding-bottom: 12px;
      text-align: left;
      background-color: #FFF47D;
      color: black;
    }
  </style>
</head>

<body>

  <h1>Stock Barang</h1>
  <h2 class="king">King Kocok</h2>

  <table id="customers">
    <tr>
      <th>No</th>
      <th>Nama Barang</th>
      <th>Qty</th>
      <th>Tanggal Masuk</th>
      <th>Tanggal Keluar</th>
    </tr>

    @foreach ($data as $stock_barang)
    <tr>
      <td>{{ $loop->iteration }}</td>
      <td>{{ $stock_barang->nama_barang }}</td>
      <td>{{ $stock_barang->qty }}</td>
      <td>{{ $stock_barang->tgl_masuk }}</td>
      <td>{{ $stock_barang->tgl_keluar }}</td>
    </tr>
    @endforeach
  </table>

</body>

</html>