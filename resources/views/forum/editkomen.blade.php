@extends('layout.app')
@section('title')
    Edit alumni
@stop
@section('beranda')
<!-- Konten Web --> 
<div class="section">
        <div class="container">
            <h2 class="header-news">Edit Postingan Anda</h2>
            <hr>    
        </div>
        <br>
        <div class="container">
            <div class="row">
                
                <!-- Form isi berita -->
                <div class="col-md-8">
                    <hr>
                    <form class="form-group" method="POST"  enctype="multipart/form-data" action="{{route('komen.update', $komen->id)}}">
                    {{csrf_field()}}               {{method_field('PATCH')}}                 
                    <label>foto :</label>
                        <input type="file" name="gambar" class="form-control">
                        <br>  
                        <div class="form-label-group">
                            <label for="inputEmail">{{ __('isi komen') }}</label>
                            <textarea name="isi" class="form-control" rows="4" placeholder="ketik pesan anda" > {{ $komen->isi }} </textarea>
                        </div>

                        <button class="btn btn-outline-info btn-round btn-block" type="submit"> {{_('tambah')}}</button>
                    </form>
                    <a href="{{url('home')}}"> 
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
