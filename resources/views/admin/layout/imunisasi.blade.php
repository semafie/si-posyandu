@extends('admin.template.template-header')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card imunisasi">
        <div class="dua_label">
            <label for="id_bayis" class="form-label label_setengah">ID</label>
            <label for="input_tanggal_lahir" class="form-label">Tanggal Lahir</label>
        </div>
        <div class="dua_inputs">
            <input id="id_bayis" readonly class="form-control input_setengah" type="text" placeholder="ID Dibuat Otomatis" />
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#pilihbayi">Pilih Bayi</button>
            <input class="form-control input_setengah_akhir" readonly type="text" value="" placeholder="Masukkan tanggal lahir" id="tanggal_lahir" name="input_tanggal" />
        </div>
        <div class="dua_label">
            <label for="nama_bayi" class="form-label label_setengah">Nama BAyi</label>
            <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
        </div>
        <div class="dua_input">
            <input id="nama_bayi" name="nama_bayi" readonly class="form-control input_setengah" type="text" placeholder="Masukkan Nama Bayi" />
            <input id="tempat_lahir" name="tempat_lahir" readonly class="form-control" type="text" placeholder="Masukkan tempat lahir" />
        </div>
        <div class="dua_label">
            <label for="jenis_kelamin" class="form-label label_setengah">Jenis Kelamin</label>
            <label for="nama_wali" class="form-label">nama wali</label>
        </div>
        <div class="dua_input">
            
            <input id="jenis_kelamin" name="jenis_kelamin" readonly class="form-control  input_setengah" type="text" placeholder="Masukkan jenis kelamin" />
            <input id="nama_wali" name="nama_wali" readonly class="form-control" type="text" placeholder="Masukkan nama wali" />
        </div>
        <form action="/admin/imunisasi/tambah" method="POST">
        @csrf
        
        <div class="dua_label">
            <label for="tanggal_imunisasi" class="form-label label_setengah">Tanggal Imunisasi</label>
        </div>
        <div class="dua_input">
            <input id="id_bayi" name="id_bayi" class="form-control input_setengah" type="hidden" placeholder="ID Dibuat Otomatis" />
            <input id="tanggal_imunisasi" name="tanggal_imunisasi" class="form-control" type="text" placeholder="Masukkan tanggal imunisasi" />
        </div>

        <div class="dua_label_setengah">
            <label for="imunisasi" class="form-label">Jenis Imunisasi</label>
            <label for="vitamin" class="form-label">Jenis Vitamin</label>
        </div>
        <div class="dua_input_setengah">
            <input id="imunisasi" name="imunisasi" class="form-control" type="text" placeholder="Masukkan imunisasi" />
            <input id="vitamin" name="vitamin" class="form-control" type="text" placeholder="Masukkan vitamin" />
        </div>
        <div class="dua_label">
            <label for="keterangan" class="form-label label_setengah">Keterangan</label>
        </div>
        <div class="dua_input">
            <input id="keterangan" name="keterangan" class="form-control" type="text" placeholder="Masukkan keterangan" />
        </div>
        <div class="button_diakhir">
            <button type="submit" class="btn btn-primary">Tambah Data Imunisasi Bayi / Balita</button>
        </div>
    </form>

        <div class="modal fade" id="pilihbayi" aria-labelledby="modalToggleLabel" tabindex="-1" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="modalToggleLabel">Pilih bayi</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="text-nowrap table-responsive pt-0">
                        <table id="myTable" class="datatables-basic table border-top">
                          <thead>
                            <tr>
                              <th>id</th>
                              <th>Nama Bayi</th>
                              <th>Tempat, Tanggal Lahir</th>
                              <th>Jenis kelamin</th>
                              <th>Nama Wali</th>
                              <th>Alamat</th>
                              <th>Aksi</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($bayi as $item)
                                <tr>
                                  <td>{{ $item->id }}</td>
                                  <td>{{ $item->nama_bayi }}</td>
                                  <td>{{ $item->tempat_lahir }}, {{ $item->tanggal_lahir }}</td>
                                  <td>{{ $item->jenis_kelamin }}</td>
                                  <td>{{ $item->nama_wali }}</td>
                                  <td>{{ $item->alamat }}</td>
                                  <td><button type="button" data-bs-toggle="modal" class="btn btn-primary" 
                                    onclick="pilihbayi('{{ $item->id }}','{{ $item->nama_bayi }}' , '{{ $item->tempat_lahir }}', '{{ $item->tanggal_lahir }}' , '{{ $item->jenis_kelamin }}' , '{{ $item->nama_wali }}' , '{{ $item->alamat }}')">Pilih Bayi</button></td>
                                </tr>
                            @endforeach
                          </tbody>
                        </table>
                      </div>
                  Show a second modal and hide this one with the button below.
                </div>
                <div class="modal-footer">
                  
                </div>
              </div>
            </div>
    </div>
</div>

<script>
    var tanggalSaatIni = new Date();
  
    // Mengambil tahun, bulan, dan tanggal
    var tahun = tanggalSaatIni.getFullYear();
    var bulan = tanggalSaatIni.getMonth() + 1; // Bulan dimulai dari 0
    var tanggal = tanggalSaatIni.getDate();
  
    // Format tanggal ke dalam bentuk yyyy-mm-dd
    var tanggalFormat = tahun + "-" + pad(bulan, 2) + "-" + pad(tanggal, 2);
  
    // Menetapkan nilai tanggal ke input
    document.getElementById("tanggal_imunisasi").value = tanggalFormat;
  
    // Fungsi untuk menambahkan nol di depan angka jika hanya satu digit
    function pad(number, length) {
        var str = '' + number;
        while (str.length < length) {
            str = '0' + str;
        }
        return str;
    }
  </script>

<script>
    function pilihbayi(id,namabayi, tempat_lahir, tanggal_lahir, jenis_kelamin,nama_wali,alamat) {
    document.getElementById("nama_bayi").value = namabayi;
    document.getElementById("id_bayi").value = id;
    document.getElementById("id_bayis").value = id;
    document.getElementById("tempat_lahir").value = tempat_lahir;
    document.getElementById("tanggal_lahir").value = tanggal_lahir;
    document.getElementById("jenis_kelamin").value = jenis_kelamin;
    document.getElementById("nama_wali").value = nama_wali;
    document.getElementById("alamat").value = alamat;
  }
  
  
  </script>

<script>
    let table = new DataTable('#myTable');
  </script>

<script>
    @if(Session::has('berhasil_tambah'))
  
    Swal.fire({
      title: 'Berhasil',
      text: 'Data imunisasi Berhasil ditambahkan',
      icon: 'success',
      confirmButtonText: 'Oke'
    })
  
    @elseif(Session::has('gagal_tambah'))
    Swal.fire({
      title: 'Gagal',
      text: 'Data imunisasi gagal di tambahkan',
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