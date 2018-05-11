<?php

namespace App\Http\Controllers;
use App\user;
use Illuminate\Http\Request;
use Redirect;
class alumni extends Controller
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
        $user = user::orderBy('NIS','desc')->where('level','=','1')->paginate($batas);
        $no= $batas*($user->currentPage()-1);
        return view('alumni.index',compact('user','no'));
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
        //
        $alumni = user::find($id);
        
        return view('alumni.edit', compact('alumni'));
        
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
        $alumni = user::find($id);
        $alumni->nama= $request['nama'];
        $alumni->alamat= $request['alamat'];
        $alumni->telp= $request['telp'];
        $alumni->ayah= $request['ayah'];
        $alumni->ibu= $request['ibu'];
        $alumni->angkatan= $request['angkatan'];
        
        $alumni->save();
        return Redirect('alumni')->with('success','alumni suskes diubah');
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
        $alumni= user::find($id);
        $alumni->delete();
        return Redirect('alumni')->with('success','alumni suskes dihapus');
    }
    public function profil($id)
    {
        //
        //
        $alumni = user::find($id);
        
        return view('alumni.profil', compact('alumni'));
        
    }
    public function updateprofil(Request $request, $id)
    {
        //
        $alumni = user::find($id);
        $alumni->nama= $request['nama'];
        $alumni->alamat= $request['alamat'];
        $alumni->telp= $request['telp'];
        $alumni->ayah= $request['ayah'];
        $alumni->ibu= $request['ibu'];
        $alumni->angkatan= $request['angkatan'];
        
        $alumni->save();
        return back()->with('success','profil suskes diubah');
    }
    
}
