@extends('layout.app')

@section('title')
    Home
@stop

@section('beranda')
    @include('berita.slider')

    <!-- Konten Web -->
    <div class="section" id="cont-style">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <h3 class="header-sub">Berita Terbaru</h3><hr>

                    <!-- Konten Berita -->
 
                    <div class="card content-center news-wide">
                        <div class="card-body">
                            <h5 class="card-title header-card">{{ $berita->judul}} 
                                <h6 class="subtitle">
                                {{$berita->created_at}}
                                    oleh Admin
                                </h6> <hr>
                                @if(Route::has('login'))
                                            @if (Auth::check())
                                                @if(Auth::user()->level==0)
                                <form method="POST" action="{{route('berita.destroy',$berita->id)}}">
										{{csrf_field()}} {{method_field('DELETE')}}
										<a href="{{route('berita.edit', $berita->id)}}" class="btn btn-sm btn-outline-info btn-just-icon" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"></a>
										<button class="btn btn-sm btn-outline-info btn-just-icon" data-toggle="tooltip" data-placement="top" title="" data-original-title="Hapus" type="submit">
                                        </button>
									</form>
                                    @endif
                                    @endif
                                    @endif
                                    
                            </h5>

                            <div class="row">
                                <div class="col-md-4">
                                    <img src="{{ URL::asset('gambar/berita')}}/{{ $berita->gambar}}" class="img-thumbnail img-responsive">  
                                </div>
                                <div class="col-md-8">
                                    <p class="card-text justify">{{ $berita->isi}}.</p>
                                </div>
                            </div>
                        </div>
                    </div><hr>
 
                    <!-- Konten berita -->


                    <hr>

                    
                </div>

                <br>

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
    <!-- Konten Web -->


    @stop
