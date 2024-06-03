<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.8/dist/sweetalert2.all.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.8/dist/sweetalert2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/login_register.css') }}">
    <title>SiPosyandu | login</title>
</head>
<body>
    <div class="login">
        <img src="{{ asset('img/gambar_login.png') }}" class="gambar_login" alt="">
        <div class="kanan_login">
                <h1>Sign in</h1>
                <p>Let’s Login to your account</p>
                <form action="/loginakun" method="POST">
                    @csrf
                <div class="input" >
                    <label for="">Username</label>
                    <br>
                    <input class="name" name="email" type="email" placeholder="Masukkan Email" old>
                </div>
                <div class="input">
                    <label for="">Password</label>
                    <br>
                    <input class="halo" name="password" type="password" placeholder="Masukkan Password">
                </div>
                
                <button type="submit" class="btn_login">Login</button>
        </form>
        <div class='lupa_password'><a href="">Forgot your password?</a></div>
                <div class="back_home"><a href="{{ route('home') }}">kembali ke home?</a></div>
                
        </div>
    </div>
    <script>
        @if(Session::has('gagal_login'))
        Swal.fire({
          title: 'Gagal Login',
          text: 'Coba cek email atau password kembali',
          icon: 'error',
          confirmButtonText: 'Oke'
        })
      
        @elseif(Session::has('login_dulu'))
        Swal.fire({
          title: 'Anda Belum Login',
          text: 'Coba login terlebih dahulu',
          icon: 'error',
          confirmButtonText: 'Oke'
        })
      
        @elseif(Session::has('success_delete'))
      
        Swal.fire({
          title: 'Berhasil',
          text: 'Data anda berhasil di Dihapus',
          icon: 'success',
          confirmButtonText: 'Oke'
        })
        @elseif(Session::has('berhasil register'))
      
        Swal.fire({
          title: 'Berhasil',
          text: 'Anda berhasil registrasi',
          icon: 'success',
          confirmButtonText: 'Oke'
        })
        @endif
        </script>
</body>
</html>