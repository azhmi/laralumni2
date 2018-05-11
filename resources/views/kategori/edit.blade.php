@extends('layout.app')
@section('title')
    Edit alumni
@stop
@section('beranda')
<!-- Konten Web --> 
<div class="section">
        <div class="container">
            <h2 class="header-news">Kategori Forum</h2>
            <hr>    
        </div>
        <br>
        <div class="container">
            <div class="row">

                <!-- Form isi berita -->
                <div class="col-md-8">
                    <hr>
                    <form class="form-group" method="POST" action="{{route('kategori.update', $kategori->id) }}">
                    {{csrf_field()}}  {{method_field('PATCH')}}                     
                        <div class="form-label-group">
                            <label for="inputEmail">{{ __('Nama Kategori') }}</label>
                            <input id="email" type="text" class="form-control" name="nama" required autofocus value="{{ $kategori->nama }}">
                        </div>  
                        <button class="btn btn-outline-info btn-round btn-block" type="submit"> {{_('tambah')}}</button>
                    </form>
                    <a href="{{url('kategori')}}"> 
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
