<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyController extends Controller
{
 public function hello()
 {
    $nama = "auny";
    $umur = 15;

    return view('hello',compact('nama','umur')); 
 }   
 public function siswa()
 {
    $data =[
    ['nama'=> 'rehan', 'kelas' => 'xi rpl 3'],
    ['nama' => 'dadan', 'kelas' => 'xi rpl 3'],
    ['nama' => 'didin', 'kelas' => 'xi rpl 3'],

    ];
    return view('siswa',compact('data'));
 }
}
