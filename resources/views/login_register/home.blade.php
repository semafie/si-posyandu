<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <title>Document</title>
</head>
<body>
    <nav >
        <div id="navbar" class="navbar">
        <a href="">Si<span>Posyandu.</span></a>
        <a href="{{ route('login') }}"><button>Login</button></a>
        </div>
        
    </nav>
    <div class="isi">
        <h1>Jadwal Posyandu</h1>
        <p>{{ $bulan }} {{ $tahun }}</p>
    </div>
    <div class="jadwal_tengah">
        <div class="tampilan_jadwal">
            @foreach($jadwal as $item)
            <div class="satu_jadwal">
                <h1>{{ $item->tanggal }}</h1>
                <h2>{{ $item->wilayah_desa }}</h2>
                <h3>{{ $item->nama_bidan }}</h3>
            </div>
            @endforeach
            
        </div>
    </div>
    
    <script>window.addEventListener("scroll", function() {
        var navbar = document.getElementById("navbar");
        var scroll = window.scrollY;
        navbar.classList.toggle("active", scroll > 1);
    });
        </script>
</body>
</html>