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
                    <!-- Konten Berita -->
                    @foreach($forum as $list)
                    <div class="card content-center news-wide">
                        <div class="card-body">
                            <h5 class="card-title header-card">
                                <a href="forum/{{$list->id}}">
                                <small>
                                    <span class="label label-default"> {{ $list->judul}} </span>
                                </small>
                                </a>
                                <h6 class="subtitle">
                                    <small>Oleh :  {{ $list->usrnama}}</small>,
                                    <small> pada {{ $list->waktu}}</small>
                                    <span class="label label-info"><i class="nc-icon nc-check-2 lg"></i> {{ $list->ktrnama}}</span>
                                </h6><hr>
                            </h5>
                            @if(Route::has('login'))
                        @if (Auth::check())
                            @if(Auth::user()->nama== $list->usrnama)
                            
                            <form method="POST" action="{{route('forum.destroy',$list->id)}}">
										{{csrf_field()}} {{method_field('DELETE')}}
										<a href="{{route('forum.edit', $list->id)}}" class="btn btn-sm btn-outline-info btn-just-icon" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"></a>
										<button class="btn btn-sm btn-outline-info btn-just-icon" data-toggle="tooltip" data-placement="top" title="" data-original-title="Hapus" type="submit">
                                        </button>
									</form>
                            @endif
                            @endif
                            @endif
                            <div class="row">
                                <div class="col-md-4">
                                    <img src="{{ URL::asset('gambar/forum/')}}/{{ $list->gambar}}" class="img-thumbnail img-responsive">  
                                </div>
                                <div class="col-md-8">
                                    <p class="card-text justify"> {{$list->isi }}.</p>
                                    <a href="/komen" class="btn btn-outline-info btn-round btn-block"><i class="nc-icon nc-chat-33 lg"></i> 2 Komentar</a>
                                </div>
                            </div>
                        </div>
                    </div><hr>
                    <!-- Konten berita -->
                @endforeach
               

                    <hr>
                    {{ $forum->links()}}
                   
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