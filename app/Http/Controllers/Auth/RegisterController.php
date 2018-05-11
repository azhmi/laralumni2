<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/alumni';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data,[
            'NIS' => 'required|string|max:255',
            'nama' => 'required|string|max:255',

        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    { 
        return User::create([
            'NIS' => $data['NIS'],
            'nama' => $data['nama'],
            'foto' => 'profil.png',
            'password' => Hash::make($data['NIS']),
            'level' => '1',
            'alamat' =>$data['alamat'],
            'telp' => $data['telp'],
            'ayah' => $data['ayah'],
            'ibu' => $data['ibu'],
            'angkatan' => $data['angkatan'],
        ])->with('success','Kategori suskes diubah');
    }
}
