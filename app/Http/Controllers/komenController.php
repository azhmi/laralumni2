<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\komen;
use Redirect;
use Illuminate\Support\Facades\File;
class komenController extends Controller
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
        $komen = new komen;   
        $komen->userID=$request['userID'];
        $komen->idforum=$request['idforum'];
        $komen->isi=$request['isi'];
        $gambar = $request->file('gambar');
        if($gambar !=''){
        $namaFile = $gambar->getClientOriginalName();
        $request->file('gambar')->move('gambar/komen', $namaFile);
        $komen->gambar = $namaFile;
        } else {
            $komen->gambar = null;
        }
        $komen->save();
        return back()->with('successkomen',' Komen berhasil ditambahkan'); 
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
        
        $komen = komen::all()->find($id);
        return view('forum.editkomen', compact('komen'));
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
        $komen = komen::find($id);
        if($request['gambar']==''){
            $komen->isi=$request['isi'];
            
        }
        else{
            $image_path = $komen->gambar;
            File::delete('gambar/komen/'.$image_path);
            $komen->isi=$request['isi'];
            $gambar = $request->file('gambar');
            $namaFile = $gambar->getClientOriginalName();
            $request->file('gambar')->move('gambar/berita', $namaFile);
            $komen->gambar = $namaFile;
        }     
        $komen->save();
        return Redirect('forum/'.$komen->idforum)->with('successkomen',' Komen berhasil diubah');
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
        $komen= komen::find($id);
        $komen->delete();
        return back()->with('successkomen',' Komen berhasil dihapus'); 
    }
}
