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
                    @foreach($forum as $list)
                    <div class="card content-center news-wide">
                        <div class="card-body">
                            <h5 class="card-title header-card">
                                <a href="{{route('detailforum.show', $list->id)}}">
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

                    <!-- Pagination -->        
                    <nav>
                        <ul class="pagination">
                            <li class="page-item">
                                <a class="page-link" href="#" tabindex="-1">Previous</a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item active">
                                <a class="page-link" href="#">4<span class="sr-only">(current)</span></a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">5</a></li>
                            <li class="page-item"><a class="page-link" href="#">6</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">Next</a>
                            </li>
                        </ul>
                    </nav>
                    <hr>
                    <!-- Pagination -->
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