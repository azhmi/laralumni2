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
                <div class="col-md-10">
                    <h3 class="header-sub">Daftar Alumni</h3><hr
                    <br> <a href="{{route('register')}}" class="btn btn-success pull-right" style="margin-top: -8px"> tambah</a>	

                    <table class="table table-bordered table-hover">
                      <thead class="bg-foot">
                        <tr>
                          <th scope="col">No.</th>
                          <th scope="col">NISN</th>
                          <th scope="col">Foto</th>
                          <th scope="col">Nama</th>
                          <th scope="col">Angkatan</th>
                          <th scope="col">Kontak</th>
                          <th scope="col">Alamat</th>
                          <th scope="col">ayah</th>
                          <th scope="col">ibu</th>

                          <th scope="col">aksi</th>                          
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($user as $data)
							<tr>
								<td scope="col">{{ ++$no}}</td>
								<td>{{ $data->NIS}}</td>
                                <td> <img src="{{ URL::asset('gambar/profil')}}/{{ $data->foto}}" alt="Circle Image" class="img-thumbnail img-responsive">
                                </td>
								<td>{{ $data->nama}}</td>
								<td>{{ $data->angkatan}}</td>
								<td>{{ $data->telp}}</td>
								<td>{{ $data->alamat}}</td>
                                <td>{{ $data->ayah}}</td>
                                <td>{{ $data->ibu}}</td>
                                
                                </td>
								<td>
									<form method="POST" action="{{route('alumni.destroy', $data->NIS)}}">
										{{csrf_field()}} {{method_field('DELETE')}}
										<a href="{{route('alumni.edit', $data->NIS)}}" class="btn btn-primary">edit</a>
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
                <div class="col-md-2">
                    <h3 class="header-sub">Pencarian</h3><hr>
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Cari" aria-describedby="basic-addon1">
                        <span class="input-group-addon" id="basic-addon1"><i class="nc-icon nc-zoom-split" aria-hidden="true"></i></span>
                    </div>
                    <br>
                    <hr>
                </div>
                <!-- Pencarian dan Kategori -->
            </div>
            <br>
        </div>
    </div>
    <!-- Konten Web -->
@endsection
