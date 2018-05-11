<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;
use App\status;
use Redirect;
class statusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $batas=5;
        $status = status::join('users','status.userID','=','users.NIS')->orderBy('status.id','desc')->paginate($batas);
        $no= $batas*($status->currentPage()-1);
        return view('status.index', compact('status','no'));  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $user = user::all();
        return view('status.create', compact('user'));
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
        $user = status::where('userID',  $request->input('NIS'))->count();

        if($user < 1 )
        {
            $status = new status;   
            $status->userID=$request['NIS'];
            $status->nikah=$request['nikah'];
            $status->kerja=$request['kerja'];
            $status->kuliah=$request['kuliah'];
            $status->save();

            return Redirect('status')->with('success','status berhasil di tambahkan'); 
        }
        return Redirect('status')->with('success','status user telah ada'); 
        
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
        $status = status::find($id);
        $user = user::All();
        $status = status::join('users', 'users.NIS', '=', 'status.userID')->find($id);
        return view('status.edit', compact('status'));
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
        $status = status::find($id);
        $status->userID=$request['userID'];
            $status->nikah=$request['nikah'];
            $status->kerja=$request['kerja'];
            $status->kuliah=$request['kuliah'];
            $status->save();
            return Redirect::route('status.index');
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
        $status= status::find($id);
        $status->delete();
        return Redirect('status/');
    }
}
