<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\status;
use Redirect;
class mystatusController extends Controller
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
        return view('mystatus.create');
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
        $status = new status;   
        $status->userID=$request['NIS'];
        $status->nikah=$request['nikah'];
        $status->kerja=$request['kerja'];
        $status->kuliah=$request['kuliah'];
        $status->save();

        return Redirect::route('mystatus.show', Auth::user()->NIS);
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
        $status = status::join('users', 'users.NIS', '=', 'status.userID')->where('userID',$id)->get();
        $cek = status::where('userID',$id)->get()->count();
        
        return view('mystatus.index', compact('status','cek'));

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
        $status = status::join('users', 'users.NIS', '=', 'status.userID')->find($id);
        return view('mystatus.edit', compact('status'));
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
            return Redirect::route('mystatus.index');
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
        return Redirect::route('mystatus.show', Auth::user()->NIS);
    }
}
