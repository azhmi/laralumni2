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
                    <!-- Konten Berita -->
                    @foreach($berita as $list)
                    <div class="card content-center news-wide">
                        <div class="card-body">
                        <a href="berita/{{$list->id}}">
                             <h5 class="card-title header-card">{{ $list->judul}} </a>
                                <h6 class="subtitle">
                                {{$list->created_at}}
                                    oleh Admin
                                </h6> <hr>
                                @if(Route::has('login'))
                                            @if (Auth::check())
                                                @if(Auth::user()->level==0)
                                <form method="POST" action="{{route('berita.destroy',$list->id)}}">
										{{csrf_field()}} {{method_field('DELETE')}}
										<a href="{{route('berita.edit', $list->id)}}" class="btn btn-sm btn-outline-info btn-just-icon" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"></a>
										<button class="btn btn-sm btn-outline-info btn-just-icon" data-toggle="tooltip" data-placement="top" title="" data-original-title="Hapus" type="submit">
                                        </button>
									</form>
                                    @endif
                                    @endif
                                    @endif
                                    
                            </h5>

                            <div class="row">
                                <div class="col-md-4">
                                    <img src="{{ URL::asset('gambar/berita')}}/{{ $list->gambar}}" class="img-thumbnail img-responsive">  
                                </div>
                                <div class="col-md-8">
                                    <p class="card-text justify">{{ $list->isi}}.</p>
                                    <a href="/berita" class="btn btn-outline-info btn-round">
                                    <i class="nc-icon nc-zoom-split lg"></i> Lihat lebih lanjut</a>
                                </div>
                            </div>
                        </div>
                    </div><hr>
                    @endforeach
                    <!-- Konten berita -->
                    
                    
                    <hr>
                  
                    {{ $berita->links() }}
                   
                </div>

                <br>

                @include('layout.kategori')
            </div>
            <br>
        </div>
    </div>
    <!-- Konten Web -->


    @stop
