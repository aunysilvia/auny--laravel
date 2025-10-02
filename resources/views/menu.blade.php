<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<center>
    <h1>{{ $resto }}</h1>
</center>
@foreach ($data as $makanan )
Nama : {{ $makanan['nama_makanan'] }}<br>
harga : {{ $makanan['harga'] }}<br>
jumlah : {{ $makanan['jumlah'] }} <br>
@php $total = $makanan['jumlah'] * $makanan['harga']; @endphp
Total: {{ $total }}
<hr>
@endforeach
</body>
</html>
