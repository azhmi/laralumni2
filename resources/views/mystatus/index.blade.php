@extends('layout.app')

@section('title')
    Alumni
@stop

@section('beranda')
	<!-- Konten Web -->
    <div class="section" id="cont-style">
        <br><br>
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <h3 class="header-sub">My Status</h3><hr>
                    @if($cek==0)
                    <a href="{{route('mystatus.create')}}" class="btn btn-primary">buat Status </a>
                    @else
                    @foreach($status as $list )
                    <div class="card content-center news-wide">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-3 col-sm-12">
                                     <img src="{{ URL::asset('gambar/profil')}}/{{ $list->foto}}" class="img-thumbnail img-responsive" style="max-width: 160px;">  
                                </div>
                                <div class="col-md-9">
                                    <h5 class="card-title header-card">
                                        <strong>{{ $list->nama}}</strong>
                                        <button class="btn btn-sm btn-outline-info btn-just-icon" data-toggle="tooltip" data-placement="top" title="" data-original-title="Terkonfirmasi">
                                        <i class="nc-icon nc-check-2 lg"></i>
                                        </button>
                                        <form method="POST" action="{{ route('mystatus.destroy', $list->id)}}">
										{{csrf_field()}} {{method_field('DELETE')}}
										<a href="{{route('mystatus.edit', $list->id)}}" class="btn btn-sm btn-outline-info btn-just-icon" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"></a>
										<button class="btn btn-sm btn-outline-info btn-just-icon" data-toggle="tooltip" data-placement="top" title="" data-original-title="Hapus" type="submit">
                                        </button>
									</form>
                                    
                                        <hr>
                                    </h5>
                                    <h6 class="description">{{ $list->kerja}}</h6>
                                    <h5 class="description">{{ $list->nikah==0 ? 'belum ' :'sudah' }} Menikah</h5>
                                    <h5 class="description">{{ $list->kuliah }}</h5>
                                    
                                    <p>
                                        Teks untuk deskripsi diri, tentang. panjang-panjang teks juga gapapa. asalkan yang sopan ya sayang.
                                    </p>
                                    <br>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <hr>
                    @endif
                    <!-- Komentar kontestan -->
                    
                </div>

                <br>

                <!-- Pencarian dan Kategori -->
                @include('layout.kategori')
                <!-- Pencarian dan Kategori -->
            </div>
            <br>
        </div>
    </div>
    <!-- Konten Web -->
@stop