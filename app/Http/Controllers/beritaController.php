<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\berita;
use Redirect;
class beritaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $batas =2;
        $berita = berita::join('users','users.NIS','=','berita.userID')->orderBy('berita.created_at','desc')->paginate($batas);
        $no= $batas*($berita->currentPage()-1);
        return view('index', compact('berita','no'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('berita.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $berita = new berita;   
        $berita->userID=$request['userID'];
        $berita->judul=$request['judul'];
        $berita->isi=$request['isi'];
        $berita->slugjudul=$request['judul'];
        $gambar = $request->file('gambar');
        if($gambar !=''){
        $namaFile = $gambar->getClientOriginalName();
        $request->file('gambar')->move('gambar/berita', $namaFile);
        $berita->gambar = $namaFile;
        }
        else{
            $berita->gambar = null;
        }
        $berita->save();
        return Redirect('/')->with('success','Berita berhasil di tambahkan');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $berita = berita::join('users', 'users.NIS', '=', 'berita.userID');
        $berita = berita::find($id);
        return view ('berita.detail',compact('berita'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $berita = berita::find($id);
        return view('berita.edit', compact('berita'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $berita = berita::find($id);
        if($request['gambar']==''){
            $berita->userID=$request['userID'];
            $berita->judul=$request['judul'];
            $berita->isi=$request['isi'];
            $berita->slugjudul=$request['judul'];
        }
        else{
            $image_path = $berita->gambar;
            File::delete('gambar/berita/'.$image_path);
            $berita->userID=$request['userID'];
            $berita->judul=$request['judul'];
            $berita->isi=$request['isi'];
            $berita->slugjudul=$request['judul'];
            $gambar = $request->file('gambar');
            $namaFile = $gambar->getClientOriginalName();
            $request->file('gambar')->move('gambar/berita', $namaFile);
            $berita->gambar = $namaFile;
        }     
        $berita->save();
        return Redirect('/')->with('success','Berita berhasil di ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $berita= berita::find($id);
        $image_path = $berita->gambar;
        File::delete('gambar/berita/'.$image_path);
        $berita->delete();
        return back()->with('success','Berita berhasil di hapus');
    }
}
