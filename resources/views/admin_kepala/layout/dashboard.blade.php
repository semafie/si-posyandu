@extends('admin_kepala.template.template-header')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="card dashboard_kepala">
      <a href="{{ route('admin_kepala_laporanpemeriksaan') }}">
        <div class="satubutton">
          <i class='bx bxs-report'></i>
          <h1>Laporan Pemeriksaan Bayi</h1>
        </div>
      </a>
      <a href="{{ route('admin_kepala_laporanimunisasi') }}">
        <div class="satubutton">
          <i class='bx bxs-report'></i>
          <h1>Laporan Imunisasi Bayi</h1>
        </div>
      </a>
      <a href="{{  route('admin_kepala_jadwal') }}">
        <div class="satubutton">
          <i class='bx bx-time-five' ></i>
          <h1>jadwal Posyandu</h1>
        </div>
      </a>
      <a href="{{ route('admin_kepala_akun') }}">
        <div class="satubutton">
          <i class='bx bxs-user-account' ></i>
          <h1>Akun Petugas</h1>
        </div>
      </a>
    
    
  </div>
</div>
@endsection