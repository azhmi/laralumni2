<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use App\User;
use Auth;
use Redirect;
class ubahpassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view ('ubahpass.index');
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
    public function __construct()
    {
    $this->middleware('auth');
    }
 
    public function store(Request $request)
    {
        //
        if (!(Hash::check($request->get('sandilama'), Auth::user()->password))) {
            return back()->with('error','Kata sandi lama salah !');

        }
        if(strcmp($request->get('sandilama'),$request->get('sandibaru'))== 0){
            return back()->with('error','Password pernah digunakan');
        }
        
        if(strcmp($request->get('sandibaru'),$request->get('ceksandibaru'))!= 0){
            return back()->with('error','Pasword Baru tidak cocok');
        }
        $user = Auth::user();
        $user->password = bcrypt($request->get('sandibaru'));
        $user->save();
        return back()->with('success','password berhasil di ubah');
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
