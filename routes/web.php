<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RelasiController;
use App\Models\Wali;
use App\Models\Hobi;






 //controller harus di import / di panggil

Route::get('/', function () {
    return view('welcome');
});
//basic
route::get('about',function(){
    return '<h1>hallo<?h1>'.
    '<br>selamat datang di perpustakaan digital';
});


Route::get('aku', function () {
    return 'nama: salsa agustina' .
        '<br>kelas:xi rpl 3' .
        '<br>alamat:citamiang';
});

Route::get('buku', function () {
    return view('buku');
});

Route::get('menu', function () {
    $data = [
        ['nama_makanan' => 'Bala-bala', 'harga' => 1000, 'jumlah' => '10'],
        ['nama_makanan' => 'Gehu Pedas', 'harga' => 2000, 'jumlah' => '15'],
        ['nama_makanan' => 'Cireng Isi Ayam', 'harga' => 2500, 'jumlah' => '5'],
    ];
    $resto = "Resto MPL - Makanan Penuh Lemak";
    //compact fungsinya untuk mengirim collection data(array)
    //yang di variabel kedalam sebuah view
    return view('menu', compact('data', 'resto'));
});

//route prameter (nilai)
route::get('book/{judul}',function($a){
    return 'judul buku :' .$a;
});

// route::get('post/{title}/{kategory}',function($a,$b){
//     //compact assosiatif
//     return view('post',['judul'=>$a, 'cat' =>$b]); 
// });

//route optional parameter
//ditandai dengan tanda tanya
route::get('profil/{nama?}',function($a ="guest"){
    return 'hallo nama saya' . $a;
});

route::get('order/{harga}', function ($a = "nasi") {
    return view('order',compact('a'));
});

Route::get('/barang-total', function () {
    $barang = [
        ['nama' => 'Buku', 'harga' => 15000, 'qty' => 2],
        ['nama' => 'Pensil', 'harga' => 3000, 'qty' => 5],
        ['nama' => 'Penggaris', 'harga' => 7000, 'qty' => 1],
    ];
    return view('barang-total', compact('barang'));
});


Route::get('/nilai/{nama}/{mapel}/{nilai}', function ($nama, $mapel, $nilai) {
    return view('nilai', compact('nama', 'mapel', 'nilai'));
});


Route::get('/grading/{nama?}/{nilai?}', function ($nama = 'Guest', $nilai = 0) {
    $grade = 'E';
    if ($nilai >= 90) {
        $grade = 'A';
    } elseif ($nilai >= 80) {
        $grade = 'B';
    } elseif ($nilai >= 70) {
        $grade = 'C';
    } elseif ($nilai >= 60) {
        $grade = 'D';
    }

    return view('grading', compact('nama', 'nilai', 'grade'));
});


Route::get('/nilai-ratarata', function () {
    $siswa1 = ['nama' => 'Andi', 'nilai' => 85];
    $siswa2 = ['nama' => 'Budi', 'nilai' => 70];
    $siswa3 = ['nama' => 'Citra', 'nilai' => 95];

    $totalNilai  = $siswa1['nilai'] + $siswa2['nilai'] + $siswa3['nilai'];
    $jumlahSiswa = 3;

    $rataRata = $totalNilai / $jumlahSiswa;
    $status   = $rataRata >= 75 ? 'Lulus' : 'Remedial';

    return view('nilai-ratarata', [
        'siswa'    => [$siswa1, $siswa2, $siswa3],
        'rataRata' => $rataRata,
        'status'   => $status,
    ]);
});

route::get('test-model', function(){
    //menampilkaan semua data dari model post
    $data = App\Models\Post::all();
    return $data;
});

route::get('create-data-post', function(){
    //membuat data baru melalui model
    $data = App\Models\Post::create([
        'title'=> 'belajar php2',
        'content'=>'lorem ipsum'
    ]);
    return $data;
});

route::get('show-data/{id}', function($id){
    //menampilkan data berdasarkan prameter 'id'
    $data =App\Models\Post::find($id);
    return $data;
});

route::get('edit-data/{id}',function($id){
  //mengupdate data berdasarkan id
  $data  =App\Models\Post::find($id);
  $data->title ="membangun projct dengan laravel";
  $data->save();
  return$data;
});

//pemanggilan url menggunakan controller
route::get('greeting',[MyController::class,'hello']);
route::get('student', [MyController::class, 'siswa']);

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//post
route::get('post', [PostController::class, 'index'])->name('post.index');
route::get('post/create', [PostController::class, 'create'])->name('post.create');
route::post('post',[PostController::class, 'store'])->name('post.store');


route::get('post/{id}/edit',[PostController::class,'edit'])->name('post.edit');
route::put('post/{id}', [PostController::class, 'update'])->name('post.update');

//show data post
route::get('post/{id}',[PostController::class,'show'])->name('post.show');

//hapus data
route::delete('post/{id}',[PostController::class, 'destroy'])->name('post.delete');

Route::resource('produk', App\Http\Controllers\ProdukController::class)->middleware('auth');

// routes/web.php
Route::get('/one-to-one', [RelasiController::class, 'index']);

Route::get('/wali-ke-mahasiswa', function () {
    $wali = Wali::with('mahasiswa')->first();
    return "{$wali->nama} adalah wali dari {$wali->mahasiswa->nama}";
});
Route::get('/one-to-many', [RelasiController::class, 'oneToMany']);
Route::get('/many-to-many', [RelasiController::class, 'manyToMany']);

Route::get('eloquent', [RelasiController::class, 'eloquent']);

