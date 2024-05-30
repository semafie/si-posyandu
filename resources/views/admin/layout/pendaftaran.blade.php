@extends('admin.template.template-header')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card pendaftaran">
        <form action="/admin/pendaftaran/tambah" method="POST">
        @csrf
        
        <div class="dua_label">
            <label for="defaultInput" class="form-label">ID</label>
            <label for="input_tanggal_lahir"  class="form-label">Tanggal Lahir</label>
        </div>
        <div class="dua_input">
            <input id="defaultInput" class="form-control" disabled type="text" placeholder="ID Dibuat Otomatis" />
            <input class="form-control" type="date"  value="" id="tanggal_lahir" name="tanggal_lahir" />
        </div>
        <div class="dua_label">
            <label for="nama_bayi" class="form-label">Nama BAyi</label>
            <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
        </div>
        <div class="dua_input">
            <input id="nama_bayi" name="nama_bayi" class="form-control" type="text" placeholder="Masukkan Nama Bayi" />
            <input id="tempat_lahir" name="tempat_lahir" class="form-control" type="text" placeholder="Masukkan tempat lahir" />
        </div>
        <div class="dua_label">
            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
            <label for="nama_wali" class="form-label">nama wali</label>
        </div>
        <div class="dua_input">
            <select id="jenis_kelamin" name="jenis_kelamin" class="form-select">
                <option>Default select</option>
                <option value="Laki - Laki">Laki - Laki</option>
                <option value="Perempuan">Perempuan</option>
              </select>
            <input id="nama_wali" name="nama_wali" class="form-control" type="text" placeholder="Masukkan nama wali" />
        </div>
        <div class="label_ditengah">
            <label for="alamat" class="form-label">Alamat</label>
        </div>
        <div class="input_ditengah">
            <input id="alamat" name="alamat" class="form-control" type="text" placeholder="Default input" />
        </div>
        <div class="button_diakhir">
            <button type="submit" class="btn btn-primary">Tambah Data Bayi / Balita</button>
        </div>
    </form>

    </div>
</div>


<script>
    @if(Session::has('berhasil_tambah'))
  
    Swal.fire({
      title: 'Berhasil',
      text: 'Data bayi Berhasil ditambahkan',
      icon: 'success',
      confirmButtonText: 'Oke'
    })
  
    @elseif(Session::has('gagal_tambah'))
    Swal.fire({
      title: 'Gagal',
      text: 'Data bayi gagal di tambahkan',
      icon: 'error',
      confirmButtonText: 'Oke'
    })
  
    @elseif(Session::has('kosong_tambah'))
  
    Swal.fire({
      title: 'Gagal',
      text: 'tidak boleh ada data yang kosong',
      icon: 'error',
      confirmButtonText: 'Oke'
    })
  
    @elseif(Session::has('tambah_pasien'))
  
    Swal.fire({
      title: 'Berhasil',
      text: 'Anda Berhasil menambahkan pasien',
      icon: 'success',
      confirmButtonText: 'Oke'
    })
  
    @elseif(Session::has('nik_ada'))
  
    Swal.fire({
      title: 'Gagal ',
      text: 'Nik tersebut sudah terdaftar di database',
      icon: 'error',
      confirmButtonText: 'Oke'
    })
    @endif
  
     </script>
@endsection