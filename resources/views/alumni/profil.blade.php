@extends('layout.app')
@section('title')
    Edit alumni
@stop
@section('beranda')
<!-- Konten Web --> 
<div class="section">
        <div class="container">
            <h2 class="header-news">profile saya</h2>
            <hr>    
        </div>
        <br>

        <div class="container">
        @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>	
                                <strong>    {{ $message }}</strong>
                        </div>
                        @endif
                        
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert">×</button>	
                            gagal
                        </div>
                        @endif
            <div class="row">

                <!-- Form isi berita -->
                <div class="col-md-8">
                    <hr>
                    <form class="form-group" method="POST" enctype="multipart/form-data"  action="{{ $alumni->NIS}}">
                    {{csrf_field()}} {{method_field('PATCH')}}
                    <div class="form-label-group">
                            <label for="inputEmail">{{ __('NIS') }}</label>
                            <input id="email" type="number" class="form-control" name="NIS" value="{{ $alumni->NIS}}" required autofocus readonly>
                                
                        </div>
                        <div class="form-label-group">
                         <label for="inputEmail">{{ __('NAMA') }}</label>
                            <input id="email" type="text" class="form-control" name="nama" value="{{ $alumni->nama}}" required autofocus>
                               
                        </div>
                        <div class="form-label-group">
                            <label for="inputEmail">{{ __('alamat') }}</label>
                            <input id="email" type="text" class="form-control" name="alamat" value="{{ $alumni->alamat}}"required autofocus>
                                
                        </div>
                        <div class="form-label-group">
                            <label for="inputEmail">{{ __('telp') }}</label>
                            <input id="email" type="number" class="form-control" name="telp" value="{{ $alumni->telp}}" required autofocus>
                                
                        </div>             
                        <div class="form-label-group">
                            <label for="inputEmail">{{ __('ayah') }}</label>
                            <input id="email" type="text" class="form-control" name="ayah" value="{{ $alumni->ayah}}" required autofocus>
                                
                        </div>
                        <div class="form-label-group">
                            <label for="inputEmail">{{ __('ibu') }}</label>
                            <input id="email" type="text" class="form-control" name="ibu" value="{{ $alumni->ibu}}" required autofocus>
                                
                        </div>             
                        <div class="form-label-group">
                            <label for="inputEmail">{{ __('angkatan') }}</label>
                            <input id="email" type="number" class="form-control" name="angkatan" value="{{ $alumni->angkatan}}"required autofocus>
                                
                        </div>                           
                        <button class="btn btn-outline-info btn-round btn-block" type="submit"> {{_('ubah')}}</button>
                    </form>
                    
                    <hr>
                </div>
                <!-- Form isi berita -->

                

                <!-- Pencarian dan Kategori -->
                @include('layout.kategori')
                <!-- Pencarian dan Kategori -->

            </div>
            <br>
        </div>
    </div> 

@endsection
