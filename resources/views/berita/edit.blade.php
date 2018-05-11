@extends('layout.app')
@section('title')
    Edit alumni
@stop
@section('beranda')
<!-- Konten Web --> 
<div class="section">
        <div class="container">
            <h2 class="header-news">Edit Berita</h2>
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
                    <form class="form-group" method="POST"  enctype="multipart/form-data" action="{{route('berita.update', $berita->id)}}">
                    {{csrf_field()}} {{method_field('PATCH')}}         
                    <div class="form-label-group">
                            <label for="inputEmail">{{ __('Nama') }}</label>
                            <select id="kategori" class="form-control" name="userID">
							<option value="{{Auth::user()->NIS}}"> {{Auth::user()->nama }}</option>
							
			    		</select>
                           
                        </div>  
                        <div class="form-label-group">
                            <label for="inputEmail">{{ __('Judul') }}</label>
                            <input id="email" type="text" class="form-control" value="{{$berita->judul}}" name="judul" required autofocus>
                        </div>
                        <br>

                        <label>foto :</label>
                        <input type="file" name="gambar" class="form-control">
                        <br>  
                        <div class="form-label-group">
                            <label for="inputEmail">{{ __('isi berita') }}</label>
                            <textarea name="isi" class="form-control" rows="4">{{$berita->isi}} </textarea>
                        </div>  
                        <button class="btn btn-outline-info btn-round btn-block" type="submit"> {{_('tambah')}}</button>
                    </form>
                    <a href="/"> 
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
