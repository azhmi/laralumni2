@extends('layout.app')

@section('title')
    alumni
@stop
@section('beranda')
 <!-- Konten Web -->
 <div class="section">
        <br><br>
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <h3 class="header-sub">Buku tamu</h3><hr
                    <br>

                    <table class="table table-bordered table-hover">
                      <thead class="bg-foot">
                        <tr>
                          <th scope="col">No.</th>
                          <th scope="col">Nama </th>
                          <th scope="col">judul </th>
                          <th scope="col">telp </th>
                          <th scope="col">Pesan </th>
                          
                          <!-- <th scope="col">Jumlah posting</th> -->
                                    
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($bukutamu as $list)
                        <tr> 
                            <td scope="col"> {{++$no}} </td>
                            <td>{{$list->nama }}</td>
                            <td>{{$list->judul }}</td>
                            <td>{{$list->telp }}</td>
                            <td>{{$list->pesan }}</td>
                            
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
