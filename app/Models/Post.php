<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //secara otomatis model ini menganggap
    // table yang digunakan adalah table 'posts'

    // apa saja yang boleh di isi
    public $fillable = ['tittle','content'];

    // apa yang boleh ditampilkan 
    public $visible =['id','tittle', 'content'];

    // mengisi tanggal kapan di buat dan kapan di update secara otomatis
    public $timestamps = true;
}
