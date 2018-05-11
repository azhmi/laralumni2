@extends('layout.app')
@section('title')
    Edit alumni
@stop
@section('beranda')
<!-- Konten Web --> 
<div class="section">
        <div class="container">
            <h2 class="header-news">Status Alumni EDIT</h2>
            <hr>    
        </div>
        <br>
        <div class="container">
            <div class="row">

                <!-- Form isi berita -->
                <div class="col-md-8">
                    <hr>
                    <form class="form-group" method="POST" action="{{ route('status.update',$status->id)}}">
                    {{csrf_field()}}   {{method_field('PATCH')}}
                    <div class="form-label-group">
                            <label for="inputEmail">{{ __('Nama Alumni') }}</label>
                            <select id="kategori" class="form-control" name="userID">
		    	 				 <option value="{{ $status->userID}}"> {{ $status->nama}} </option>
				            </select>	
                        </div>
                        <div class="form-label-group">
                            <label for="inputEmail">{{ __('Status pernikahan') }}</label>
                            <select id="kategori" class="form-control" name="nikah">
		    	 				<option value="0" {{$status->nikah==0 ? 'selected' : ''}} > {{ __('belum') }} </option>
                                 <option value="1" {{$status->nikah=='1' ? 'selected' : ''}} >{{ __('sudah') }} </option>
				            </select>		
                        </div>
                        
                        <div class="form-label-group">
                            <label for="inputEmail">{{ __('kerja') }}</label>
                            <input id="email" type="text" class="form-control" name="kerja" required autofocus value="{{$status->kerja }}">
                                
                        </div> 
                        <div class="form-label-group">
                            <label for="inputEmail">{{ __('kuliah') }}</label>
                            <input id="email" type="text" class="form-control" name="kuliah" required autofocus value="{{$status->kuliah }}">
                                
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
