@extends('layout.app')
@section('title')
    Edit alumni
@stop
@section('beranda')
<!-- Konten Web --> 
<div class="section">
        <div class="container">
            <h2 class="header-news">Isi Buku tamu</h2>
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
                    <form class="form-group" method="POST" action="{{route('bukutamu1.store')}}">
                    {{csrf_field()}}                       
                        <div class="form-label-group">
                            <label for="inputEmail">{{ __('Nama') }}</label>
                            <input id="email" type="text" class="form-control" name="nama" required autofocus>
                        </div>  
                        <div class="form-label-group">
                            <label for="inputEmail">{{ __('Judul') }}</label>
                            <input id="email" type="text" class="form-control" name="judul" required autofocus>
                        </div>  
                        <div class="form-label-group">
                            <label for="inputEmail">{{ __('telp') }}</label>
                            <input id="email" type="number" class="form-control" name="telp" required autofocus>
                        </div> 
                        <div class="form-label-group">
                            <label for="inputEmail">{{ __('pesan') }}</label>
                            <textarea name="pesan" class="form-control" rows="4" placeholder="ketik pesan anda" > </textarea>
                           
                        </div>   
                        <button class="btn btn-outline-info btn-round btn-block" type="submit"> {{_('tambah')}}</button>
                    </form>
                    <a href="{{url('status')}}"> 
                        <button class="btn btn-outline-info btn-round btn-block"> {{_('batal')}}</button>
                        </a>
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
