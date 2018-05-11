<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\bukutamu;
use Redirect;
class bukutamuController extends Controller
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
        $bukutamu = bukutamu::orderBy('id','desc')->paginate($batas);
        $no= $batas*($bukutamu->currentPage()-1);
        return view('bukutamu.index',compact('bukutamu','no'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('bukutamu.create');
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
        $bukutamu = new bukutamu;   
        $bukutamu->nama=$request['nama'];
        $bukutamu->judul=$request['judul'];
        $bukutamu->telp=$request['telp'];
        $bukutamu->pesan=$request['pesan'];
        $bukutamu->save();
        return back()->with('success',' terimakasih telah mengisi buku tamu'); 
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
