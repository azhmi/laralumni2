<?php

namespace App\Http\Controllers;
use App\forum;
use App\kategori;
use App\User;
use Illuminate\Http\Request;

class detailforumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $forum = forum::join('users', 'users.NIS','=', 'forum.userID')->join('kategori','kategori.id','=','forum.id_kategori')->select('users.nama as usrnama','kategori.nama as ktrnama','forum.created_at as waktu','forum.judul as judul','forum.isi as isi','forum.gambar as gambar','forum.id as id')->where('forum.id','=', $id);
        $komen = komen::join('forum','forum.id','=','komen.idforum')->join('users','users.id','=','komen.userID')->where('idforum','=',$id);
        return view('detailforum.index', compact('forum', 'komen'));
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
    }
}
