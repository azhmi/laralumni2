@extends('layout.app')

@section('beranda')
<!-- Konten Web --> 
<div class="section">
        <div class="container">
            <h2 class="header-news">Ubah Password</h2>
            <hr>    
        </div>
        <br>
        <div class="container">
            <div class="row">

                <!-- Form isi berita -->
                <div class="col-md-8">
                    <hr>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>	
                                <strong>    {{ $message }}</strong>
                        </div>
                        @endif
                        @if ($message = Session::get('error'))
                        <div class="alert alert-danger alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>	
                                <strong>{{ $message }}</strong>
                        </div>
                        @endif
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert">×</button>	
                            Gagal
                        </div>
                        @endif
                    <form class="form-group" method="POST"  action="{{route('ubahpass.store')}}">
                    {{csrf_field() }}  
                    <div class="form-label-group">
                        <label for="inputEmail">{{ __('Nama Alumni') }}</label>
                        <select id="kategori" class="form-control" name="NIS">
							
							<option value="{{Auth::user()->NIS}}"> {{Auth::user()->nama }}</option>
							
			    		</select>
                        </div>
                        <br>
                        <div class="form-label-group">
                            <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="sandilama"required>
                            <label for="inputPassword">Kata sandi Lama</label>
                        </div>
                        <div class="form-label-group">
                            <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="sandibaru" required>
                            <label for="inputPassword">Kata sandi Baru</label>
                        </div>
                        <div class="form-label-group">
                            <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="ceksandibaru" required>
                            <label for="inputPassword">ketik ulang Kata sandi baru</label>
                        </div>
                        
                        <button class="btn btn-lg btn-primary btn-block" type="submit" id="login"> {{ __('Ubah Password')}}</button> 

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
