<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\post;
class postcontroller extends Controller
{
    //daftar post
    public function index()
    {
        //menampilkan semua data dari model post
        $post = post::all();
        return view('post.index', compact('post'));
    }
}
