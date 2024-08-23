<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('assets')}}/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{asset('assets')}}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('assets')}}/dist/css/adminlte.min.css">
  <!-- Sweetalert -->
  <link rel="stylesheet" href="{{asset('assets')}}/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="{{asset('assets')}}/index2.html" class="h1"><b>Login</b></a>
    </div>
    <div class="card-body">

      <form action="{{ route('cek-login') }}" method="post">
        @csrf
        @error('nik')
            <small style="color: red">{{ $message }}</small>
        @enderror
        <div class="input-group mb-3">
          <input type="number" class="form-control @error('nik') is-invalid @enderror" name="nik" placeholder="Nik">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-id-card"></span>
            </div>
          </div>
        </div>
        @error('nama')
            <small style="color: red">{{ $message }}</small>
        @enderror
        <div class="input-group mb-3">
          <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" placeholder="Nama">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        @error('password')
            <small style="color: red">{{ $message }}</small>
        @enderror
        <div class="input-group mb-3">
          <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col mb-2">
            <button type="submit" class="btn btn-primary btn-block">Masuk</button>
          </div>
        </div>
      </form>
      <p class="mb-0">
        <a href="{{ route('register') }}" class="text-center">Daftar Sebagai Pengguna Baru</a>
      </p>
    </div>
  </div>
</div>

<script src="{{asset('assets')}}/plugins/jquery/jquery.min.js"></script>
<script src="{{asset('assets')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('assets')}}/dist/js/adminlte.min.js"></script>
<script src="{{ asset('assets') }}/plugins/sweetalert2/sweetalert2.min.js"></script>
@if ($message = Session::get('success'))
    <script>
        Swal.fire({
            title: "Berhasil!",
            text: '{{ $message }}',
            icon: "success"
        });
    </script>
@endif

@if ($message = Session::get('failed'))
    <script>
        Swal.fire({
            icon: "error",
            title: "Oops ...",
            text: '{{ $message }}',
        });
    </script>
@endif
</body>
</html>
