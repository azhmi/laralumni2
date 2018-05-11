@extends('layout.login')

@section('title')
    Login
@stop

@section('login')
	<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Favicon -->
    <link rel="icon" href="../assets/img/education-icon1.png" type="image/x-icon">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
    <!-- Custom styles -->
    <link href="../assets/css/floating-labels.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">

    <title>Alumni</title>
  </head>

  <body>
    <form class="form-signin">
      <div class="text-center mb-4">
        <img class="mb-4" src="../assets/img/education-icon1.png" alt="" width="132" height="auto" id="logo">
        <h1 class="h2 mb-3 font-weight-normal alumni" >Alumni</h1>
        <p>Silahkan masuk untuk melanjutkan</p>
        <hr>
      </div>

      <div class="form-label-group">
        <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
        <label for="inputEmail">Alamat email</label>
      </div>

      <div class="form-label-group">
        <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <label for="inputPassword">Kata sandi</label>
      </div>

      <div class="checkbox mb-3" id="daftar">
        <label>
          <a href="/"> Klik disini!</a>
        </label>
      </div>
      
      <button class="btn btn-lg btn-primary btn-block" type="submit" id="login">Masuk</button> 
      <p class="mt-5 mb-3 text-muted text-center"><strong>Mtwo</strong> Cyber &copy; 2018</p>
    </form>
  </body>
</html>

@stop