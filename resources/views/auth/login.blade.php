@extends('layout.login')
@section('title')
    Login
@stop

@section('login')
   <form class="form-signin" method="POST" action="{{ route('login') }}">
                        @csrf   
     <div class="text-center mb-4">
        <img class="mb-4" src="{{ URL::asset('img/education-icon1.png') }}" alt="" width="132" height="auto" id="logo">
        <h1 class="h2 mb-3 font-weight-normal alumni" >Alumni</h1>
        <p>Silahkan masuk untuk melanjutkan</p>
        <hr>
      </div>                 
                        <div class="form-label-group">
                            <input id="email" type="number" class="form-control{{ $errors->has('NIS') ? ' is-invalid' : '' }}" name="NIS" value="{{ old('NIS') }}" required autofocus>
                             @if ($errors->has('NIS'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('NIS') }}</strong>
                                    </span>
                                @endif
                                <label for="inputEmail">{{ __('NIS') }}</label>
                        </div>
                        <div class="form-label-group">
                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                                <label for="inputPassword">{{ __('Kata sandi') }}</label>
                        </div>
                        <div class="checkbox mb-3" id="daftar">
                            <label>
                            <a href="/"> Klik disini!</a>
                            </label>
                        </div>
                        
                        <button class="btn btn-lg btn-primary btn-block" type="submit" id="login"> {{ __('Masuk')}}</button> 
                        <p class="mt-5 mb-3 text-muted text-center"><strong>Mtwo</strong> Cyber &copy; 2018</p>                        
                        
                    </form>
        
@endsection
