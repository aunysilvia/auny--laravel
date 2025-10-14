<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\post;
class postcontroller extends Controller
{
    //memberi middleware 'auth' untuk mengecek sudah login atau belum
    public function __construct()
    {
        $this->middleware('auth');
    }
    //daftar post
    public function index()
    {
        //menampilkan semua data dari model post
        $post = post::all();
        return view('post.index', compact('post'));
    }

    //menampilkan halaman form create
    public function create()
    {
        return view('post.create');
    }

    public function store(request $request)
    {
        //membuat data baru untuk table 'post'
        //melalui model post
        $post = new post;
        $post->title =$request->title;
        $post->content =$request->content;
        $post->save();
        return redirect()->route('post.index');
    }

    //menampilkan formulis edit data post
    public function edit($id)
    {
        //mencari data post berdasarkan prameter 'id'
        $post = Post::findOrFail($id);
        return view('post.edit',compact('post'));
    }
    public function  update(request $request,$id)
    {
        //mencari data post berdasarkan prameter 'id'
        $post =Post::findOrFail($id);
        $post->title =$request->title;
        $post->content =$request->content;
        $post->save(); //disimpan ke db
        //di alihkan ke halaman post melalui route post.index
        return redirect()->route('post.index');
    }
}
