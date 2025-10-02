 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
 </head>
 <body>
     <p>Nama: {{ $nama }}</p>
     <p>Mata Pelajaran: {{ $mapel }}</p>
     <p>Nilai: {{ $nilai }}</p>
     <p>Status:
         @if ($nilai >= 75)
         Lulus
         @else
         Tidak Lulus
         @endif
     </p>

 </body>
 </html>

