@extends('layout.app')

@section('title')
    Forum
@stop

@section('beranda')
	<!-- Konten Web -->
    <div class="section" id="cont-style">
        <br><br>
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <h3 class="header-sub">Diskusi terhangat</h3><hr>

                    <!-- Konten Berita -->
   
                    <div class="card content-center news-wide">
                        <div class="card-body">
                            <h5 class="card-title header-card">
                                
                                <h6 class="subtitle">
                                    <small>Oleh : {{ $forum->usrnama}}  </small>,
                                    <small> pada {{ $forum->waktu}}</small>
                                    <span class="label label-info"><i class="nc-icon nc-check-2 lg"></i> {{ $forum->ktrnama}}</span>
                                </h6><hr>
                                @if(Route::has('login'))
                        @if (Auth::check())
                            @if(Auth::user()->nama== $forum->usrnama)
                            
                            <form method="POST" action="{{route('forum.destroy',$forum->id)}}">
										{{csrf_field()}} {{method_field('DELETE')}}
										<a href="{{route('forum.edit', $forum->id)}}" class="btn btn-sm btn-outline-info btn-just-icon" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"></a>
										<button class="btn btn-sm btn-outline-info btn-just-icon" data-toggle="tooltip" data-placement="top" title="" data-original-title="Hapus" type="submit">
                                        </button>
									</form>
                                    @endif
                            @endif
                            @endif
                            <div class="row">
                                <div class="col-md-4">
                                    <img src="{{ URL::asset('gambar/forum/')}}/{{ $forum->gambar}}" class="img-thumbnail img-responsive">  
                                </div>
                                <div class="col-md-8">
                                    <p class="card-text justify"> {{$forum->isi }}.</p>
                                </div>
                            </div>
                        </div>
                    </div><hr>
                    <!-- Konten berita -->

                    <h3 class="header-sub">komen</h3><hr>
                    @if ($message = Session::get('successkomen'))
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
                    <!-- Konten Berita -->
                    @foreach($komen as $list)
                    <div class="card content-center news-wide">
                        <div class="card-body">
                            <h5 class="card-title header-card">
                            @if(Route::has('login'))
                        @if (Auth::check())
                                @if(Auth::user()->nama== $list->usrnama)
                            <form method="POST" action="{{route('komen.destroy',$list->id)}}">
										{{csrf_field()}} {{method_field('DELETE')}}
										<a href="{{route('komen.edit', $list->id)}}" class="btn btn-sm btn-outline-info btn-just-icon" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"></a>
										<button class="btn btn-sm btn-outline-info btn-just-icon" data-toggle="tooltip" data-placement="top" title="" data-original-title="Hapus" type="submit">
                                        </button>
									</form>
                            @endif
                            @endif
                            @endif
                                <h6 class="subtitle">
                                    <small>Oleh : {{$list->usrnama}} </small>,
                                    <small> pada {{$list->waktu}} </small>
                                    <span class="label label-info"><i class="nc-icon nc-check-2 lg"></i></span>
                                </h6><hr>
                            </h5>

                            <div class="row">
                                <div class="col-md-4">
                                    <img src="{{ URL::asset('gambar/komen/')}}/{{ $list->gambar}}" class="img-thumbnail img-responsive">  
                                </div>
                                <div class="col-md-8">
                                    <p class="card-text justify">{{$list->isi}} .</p>
                                </div>
                            </div>
                        </div>
                    </div><hr>
                    <!-- Konten berita -->
                    @endforeach
                    {{ $komen->links()}}

                    <hr>
                    @if(Route::has('login'))
                        @if (Auth::check())
                    <!-- Form isi berita -->
                    <h3> TUlis komentar anda </h3>
                    <form class="form-group" method="POST"  enctype="multipart/form-data" action="{{ route('komen.store')}}">
                    {{csrf_field()}}
                    <input type="hidden" name="userID" value="{{Auth::user()->NIS}}">  
                    <input type="hidden" name="idforum" value="{{ $forum->id }}">    
                                       
                        <label>foto :</label>
                        <input type="file" name="gambar" class="form-control">
                        <br>  
                        <div class="form-label-group">
                            <label for="inputEmail">{{ __('isi komen') }}</label>
                            <textarea name="isi" class="form-control" rows="4" placeholder="ketik pesan anda" > </textarea>
                        </div>
                        <button class="btn btn-outline-info btn-round btn-block" type="submit"> {{_('tambah')}}</button>
                    </form>
                    <a href="{{url('home')}}"> 
                        <button class="btn btn-outline-info btn-round btn-block"> {{_('batal')}}</button>
                        </a>
                    <hr>
                @endif
                @endif
                <!-- Form isi berita -->
                </div>

                <br>

                <!-- Pencarian dan Kategori -->
                @include('layout.Kategori')
            </div>
            <br>
        </div>
    </div>
    <!-- Konten Web -->
@stop