<!DOCTYPE html>
<html>
<head>
    <title>Detail Hobi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h2>Detail Hobi</h2>

        <table class="table">
            <tr>
                <th>Nama Hobi</th>
                <td>{{ $hobi->nama_nama }}</td>
            </tr>
        </table>

        <a href="{{ route('hobi.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
</body>
</html>
