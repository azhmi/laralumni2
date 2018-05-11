@extends('layout.app')

@section('beranda')
<!-- Konten Web --> 
<div class="section">
        <div class="container">
            <h2 class="header-news">Tambah Alumni</h2>
            <hr>    
        </div>
        <br>
        <div class="container">
            <div class="row">

                <!-- Form isi berita -->
                <div class="col-md-8">
                    <hr>
                    <form class="form-group" method="POST" enctype="multipart/form-data"  action="{{ route('register') }}">
                    {{csrf_field() }}
                        <div class="form-label-group">
                            <label for="inputEmail">{{ __('NIS') }}</label>
                            <input id="email" type="number" class="form-control" name="NIS" value="{{ old('NIS') }}" required autofocus>
                                
                        </div>
                        <div class="form-label-group">
                            <label for="inputEmail">{{ __('NAMA') }}</label>
                            <input id="email" type="text" class="form-control" name="nama" value="{{ old('nama') }}" required autofocus>
                                
                        </div>
                        <br>

                        <div class="form-label-group">
                            <label for="inputEmail">{{ __('alamat') }}</label>
                            <input id="email" type="text" class="form-control" name="alamat" value="{{ old('alamat') }}" required autofocus>
                                
                        </div>
                        <div class="form-label-group">
                            <label for="inputEmail">{{ __('telp') }}</label>
                            <input id="email" type="number" class="form-control" name="telp" value="{{ old('telp') }}" required autofocus>
                                
                        </div>             
                        <div class="form-label-group">
                            <label for="inputEmail">{{ __('ayah') }}</label>
                            <input id="email" type="text" class="form-control" name="ayah" value="{{ old('ayah') }}" required autofocus>
                                
                        </div>
                        <div class="form-label-group">
                            <label for="inputEmail">{{ __('ibu') }}</label>
                            <input id="email" type="text" class="form-control" name="ibu" value="{{ old('ibu') }}" required autofocus>
                                
                        </div>             
                        <div class="form-label-group">
                            <label for="inputEmail">{{ __('angkatan') }}</label>
                            <input id="email" type="number" class="form-control" name="angkatan" value="{{ old('angkatan') }}" required autofocus>
                                
                        </div>    
                        <button class="btn btn-outline-info btn-round btn-block"> {{_('Tambah alumni')}}</button>
                    </form>
                    <a href="{{url('alumni')}}"> 
                        <button class="btn btn-outline-info btn-round btn-block"> {{_('batal')}}</button>
                        </a>
                    <hr>
                </div>
                <!-- Form isi berita -->

                

                <!-- Pencarian dan Kategori -->
                <div class="col-md-4">
                    <h3 class="header-sub">Pencarian</h3><hr>
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Cari" aria-describedby="basic-addon1">
                        <span class="input-group-addon" id="basic-addon1"><i class="nc-icon nc-zoom-split" aria-hidden="true"></i></span>
                    </div>
                    <br>
                    <hr>
                    <h3 class="header-sub">Kategori</h3>
                    <hr>
                        <span class="label label-default">Bisnis</span>
                        <span class="label label-primary">Olahraga</span>
                        <span class="label label-info">Pendidikan</span>
                        <span class="label label-success">Kesehatan</span>
                        <span class="label label-warning">Teknologi</span>
                        <span class="label label-danger">Sosial</span>   
                </div>
                <!-- Pencarian dan Kategori -->

            </div>
            <br>
        </div>
    </div> 
<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('nama') ? ' is-invalid' : '' }}" name="nama" value="{{ old('nama') }}" required autofocus>

                                @if ($errors->has('nama'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('nama') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="number" class="form-control{{ $errors->has('nis') ? ' is-invalid' : '' }}" name="nis" value="{{ old('nis') }}" required autofocus>

                                @if ($errors->has('nis'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('nis') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> -->
@endsection
