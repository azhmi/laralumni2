@extends('layout.app')

@section('title')
    alumni
@stop
@section('beranda')
 <!-- Konten Web -->
 <div class="section">
        <br><br>
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
                <div class="col-md-8">
                    <h3 class="header-sub">Kategori forum</h3><hr
                    <br> <a href="{{route('kategori.create')}}" class="btn btn-success pull-right" style="margin-top: -8px"> tambah</a>	

                    <table class="table table-bordered table-hover">
                      <thead class="bg-foot">
                        <tr>
                          <th scope="col">No.</th>
                          <th scope="col">Nama Kategori</th>
                          <!-- <th scope="col">Jumlah posting</th> -->
                          <th scope="col">aksi</th>                          
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($kategori as $list)
                        <tr> 
                            <td scope="col"> {{++$no}} </td>
                            <td>{{$list->nama }}</td>
                            <td>
                            <form method="POST" action="{{route('kategori.destroy', $list->id)}}">
										{{csrf_field()}} {{method_field('DELETE')}}
										<a href="{{route('kategori.edit', $list->id)}}" class="btn btn-primary">edit</a>
										<button class="btn btn-danger" type="submit">hapus</button>
									</form>
                            </td>
                            
                        </tr>
                        @endforeach
                      
                      </tbody>
                    </table>
                        
                </div>

                <br>

                <!-- Pencarian dan Kategori -->
                @include('layout.Kategori')
                <!-- Pencarian dan Kategori -->
            </div>
            <br>
        </div>
    </div>
    <!-- Konten Web -->
@endsection
