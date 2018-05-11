@extends('layout.app')
@section('title')
    Edit alumni
@stop
@section('beranda')
<!-- Konten Web --> 
<div class="section">
        <div class="container">
            <h2 class="header-news">Status Alumni</h2>
            <hr>    
        </div>
        <br>
        <div class="container">
            <div class="row">

                <!-- Form isi berita -->
                <div class="col-md-8">
                    <hr>
                    <form class="form-group" method="POST" action="{{ route('status.store')}}">
                    {{csrf_field()}} 
                    <div class="form-label-group">
                        <label for="inputEmail">{{ __('Nama Alumni') }}</label>
                        <select id="kategori" class="form-control" name="NIS">
							@foreach($user as $list)
							<option value="{{$list->NIS}}"> {{$list->nama }}</option>
							@endforeach
			    		</select>
                        </div>
                        <div class="form-label-group">
                        <label for="inputEmail">{{ __('Status pernikahan') }}</label>
                            <select id="kategori" class="form-control" name="nikah">
		    	 				<option value="0">{{ __('belum') }} </option>
                                 <option value="1">{{ __('sudah') }} </option>
				            </select>		
                        </div>
                        
                        <div class="form-label-group">
                            <label for="inputEmail">{{ __('kerja') }}</label>
                            <input id="email" type="text" class="form-control" name="kerja" required autofocus>
                        </div> 
                        <div class="form-label-group">
                            <label for="inputEmail">{{ __('kuliah') }}</label>
                            <input id="email" type="text" class="form-control" name="kuliah" required autofocus>
                                
                        </div>                
                        <button class="btn btn-outline-info btn-round btn-block" type="submit"> {{_('tambah')}}</button>
                    </form>
                    <a href="{{url('status')}}"> 
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
