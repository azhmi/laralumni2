<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\berita;
use App\user;
use App\kategori;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $batas =5;
  
        $berita = berita::orderBy('created_at','desc')->paginate($batas);
        $no= $batas*($berita->currentPage()-1);
        $kategori = kategori::all();
        // $berita = berita::join('users','users.NIS','=','berita.userID')->orderBy('berita.created_at','desc')->paginate($batas);
 
        return view('index',compact('berita','no','kategori'));
    }
}
