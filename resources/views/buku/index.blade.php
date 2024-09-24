<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <a href="{{ route('buku.create')}}" class="btn btn-primary float-end">Tambah Buku</a>
    <table class="table table-stripped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>id</th>
                <th>Judul Buku</th>
                <th>Penulis</th>
                <th>Harga</th>
                <th>Tanggal Terbit</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            @foreach ($data_buku as $buku)
                <tr>
                    <td>{{$i}}</td>
                    <td>{{ $buku->judul }}</td>
                    <td>{{ $buku->penulis }}</td>
                    <td>{{ "Rp. ".number_format($buku->harga), 2, ',', '.' }}</td>
                    <td>{{ \Carbon\Carbon::parse($buku->tgl_terbit)->format('d-m-Y') }}</td>
                    <td>
                        <form action="{{route('buku.destroy', $buku->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Yakin mau di hapus?')" type="submit"
                            class="btn btn-danger">Hapus</button>
                        </form>
                        <form action="{{route('buku.edit', $buku->id)}}" method="GET">
                            @csrf
                            <button type="submit"
                            class="btn btn-primary">Update</button>
                        </form>
                    </td>
                </tr>
                <?php $i++; ?>
            @endforeach
        </tbody>
    </table>
    <p><strong>Total Buku:</strong> {{ $jumlahBuku }}</p>
    <p><strong>Total Harga Semua Buku:</strong> {{"Rp. ".number_format($totalHarga, 2, ',', '.') }}</p>
</body>
</html>
