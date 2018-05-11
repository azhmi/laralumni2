<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\forum;
use App\kategori;
use App\User;
use App\komen;
use Illuminate\Support\Facades\File;
use Redirect;
class forumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $batas =5;
        $forum = forum::join('users', 'users.NIS','=', 'forum.userID')->join('kategori','kategori.id','=','forum.id_kategori')->select('users.nama as usrnama','kategori.nama as ktrnama','forum.created_at as waktu','forum.judul as judul','forum.isi as isi','forum.gambar as gambar','forum.id as id' )->orderBy('forum.created_at','desc')->paginate($batas);
        $no= $batas*($forum->currentPage()-1);
        return view('forum.index', compact('forum','no'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $kategori= kategori::all();
        return view('forum.create', compact('kategori'));
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
        $forum = new forum;   
        $forum->userID=$request['userID'];
        $forum->judul=$request['judul'];
        $forum->isi=$request['isi'];
        $forum->slug=$request['judul'];
        $gambar = $request->file('gambar');
        if($gambar !=''){
        $namaFile = $gambar->getClientOriginalName();
        $request->file('gambar')->move('gambar/forum', $namaFile);
        $forum->gambar = $namaFile;
        } else {
            $forum->gambar = null;
        }
        $forum->id_kategori=$request['id_kategori'];
        $forum->save();
        return Redirect('forum/')->with('success','Forum berhasil di dtambah');
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
        
        $forum = forum::join('users', 'users.NIS','=', 'forum.userID')->join('kategori','kategori.id','=','forum.id_kategori')->select('users.nama as usrnama','kategori.nama as ktrnama','forum.created_at as waktu','forum.judul as judul','forum.isi as isi','forum.gambar as gambar','forum.id as id' )->find($id);
        $komen = komen::join('users', 'users.NIS','=', 'komen.userID')->select('users.nama as usrnama','komen.created_at as waktu','komen.isi as isi','komen.gambar as gambar','komen.id as id' )->where('idforum',$id)->orderBy('komen.created_at','desc')->paginate(10);
        return view('forum.detail', compact('forum','komen'));

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
        $forum = forum::find($id);
        $kategori = kategori::all();
        
        return view('forum.edit', compact('forum','kategori'));
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
        $forum = forum::find($id);
        if($request['gambar']==''){
            $forum->userID=$request['userID'];
            $forum->id_kategori=$request['id_kategori'];
            $forum->judul=$request['judul'];
            $forum->isi=$request['isi'];
            $forum->slug=$request['judul'];
        }
        else{
            $image_path = $forum->gambar;
            File::delete('gambar/forum/'.$image_path);
            $forum->userID=$request['userID'];
            $forum->id_kategori=$request['id_kategori'];
            $forum->judul=$request['judul'];
            $forum->isi=$request['isi'];
            $forum->slug=$request['judul'];
            $gambar = $request->file('gambar');
            $namaFile = $gambar->getClientOriginalName();
            $request->file('gambar')->move('gambar/forum', $namaFile);
            $forum->gambar = $namaFile;
        }     
        $forum->save();
        return Redirect('forum/')->with('success','forum telah berhasil diedit');
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
        $forum= forum::find($id);
        $image_path = $forum->gambar;
        File::delete('gambar/forum/'.$image_path);
        $forum->delete();
        return back()->with('success','forum telah berhasil dihapus');
    }
}
