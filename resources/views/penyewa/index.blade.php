<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Penyewa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            padding-top: 50px;
        }
        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
        }
        .card-header {
            background-color: #007bff;
            color: white;
            border-radius: 15px 15px 0 0;
        }
        .card-body {
            padding: 20px;
        }
        .btn-custom {
            border-radius: 10px;
            font-weight: bold;
            border: 2px solid #007bff;
            background-color: transparent;
            color: #007bff;
            transition: background-color 0.3s, color 0.3s;
        }
        .btn-custom:hover {
            background-color: #007bff;
            color: white;
        }
        .table th, .table td {
            vertical-align: middle;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-center">
                        <h3 class="my-3">Data Penyewaan</h3>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <a href="{{ route('penyewa.create') }}" class="btn btn-md btn-success btn-custom">Tambah Daftar Penyewa</a>
                            <a href="{{ route('kendaraan.index') }}" class="btn btn-md btn-primary btn-custom">Lihat Kendaraan Sewa</a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                            <th scope="col" class="text-center">No</th>
                            <th scope="col" class="text-center">Nama Penyewa</th>
                            <th scope="col" class="text-center">Alamat</th>
                            <th scope="col" class="text-center">Nomor HP</th>
                            <th scope="col" class="text-center" style="width: 20%">Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                                @forelse ($penyewa as $index => $data)
                                    <tr>
                                        <td class="text-center">{{ ++$index }}</td>
                                        <td>{{ $data->nama_penyewa }}</td>
                                        <td>{{ $data->alamat }}</td>
                                        <td>{{ $data->no_hp }}</td>
                                        <td class="text-center">
                                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('penyewa.destroy', $data->id) }}" method="POST">
                                                <a href="{{ route('penyewa.show', $data->id) }}" class="btn btn-info btn-sm">Detail</a>
                                                <a href="{{ route('penyewa.edit', $data->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">Data Penyewa Belum Ada.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {{-- {{ $penyewa->links() }} --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>