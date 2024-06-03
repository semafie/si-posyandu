@extends('admin.template.template-header')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card laporan_imunisasi">
        <a ><button type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahakun">Tambah Jadwal Posyandu</button></a>
        <div class="text-nowrap table-responsive pt-0">
            <table id="myTable" class="datatables-basic table border-top">
              <thead>
                <tr>
                  <th>id</th>
                  <th>nama posyandu</th>
                  <th>wilayah desa</th>
                  <th>nama bidan</th>
                  <th>hari</th>
                  <th>tanggal</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($jadwal as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->nama_posyandu }}</td>
                        <td>{{ $item->wilayah_desa }}</td>
                        <td>{{ $item->nama_bidan }}</td>
                        <td>{{ $item->hari }}</td>
                        <td>{{ $item->tanggal }}</td>
                        <td class="button_intable">
                            <button type="submit" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editdata{{ $item->id }}">Edit</button>
                        <form action="/admin/jadwal/hapus/{{ $item->id }}" method="POST">
                            @csrf
                            @method('delete')
                         <button type="submit" class="btn btn-danger">Hapus</button>
                         </form>
                        </td>
                    </tr>

                    <div class="modal fade" id="editdata{{ $item->id }}" aria-labelledby="modalToggleLabel" tabindex="-1" style="display: none;" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="modalToggleLabel">Edit Jadwal</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>  
                            <div class="modal-body akun_petugas">
                              <div class="dua_label">
                                <label for="defaultInput" class="form-label">ID</label>
                                <label for="nama"  class="form-label">Nama posyandu</label>
                            </div>
                            <form action="/admin/jadwal/edit/{{ $item->id }}" method="POST">
                            @csrf
                            @method('put')
                            
                           <div class="dua_input">
                                <input id="defaultInput" class="form-control" disabled type="text" value="{{ $item->id }}" placeholder="ID Dibuat Otomatis" />
                                <input class="form-control" type="text" placeholder="Masukkan nama" id="nama" value="{{ $item->nama_posyandu }}" name="nama_posyandu" />
                            </div>
                              <div class="dua_label">
                                <label for="alamat" class="form-label">wilayah desa</label>
                                <label for="jenis_kelamin"  class="form-label">nama bidan</label>
                            </div>
                           <div class="dua_input">
                                <input id="alamat"  class="form-control"  type="text" value="{{ $item->wilayah_desa }}" name="wilayah_desa" placeholder="Masukkan alamat" />
                                <input id="alamat" class="form-control"  type="text" value="{{ $item->nama_bidan }}" name="nama_bidan" placeholder="Masukkan alamat" />
                                
                            </div>
                              <div class="dua_label">
                                <label for="username" class="form-label">hari</label>
                                <label for="email"  class="form-label">tanggal</label>
                            </div>
                           <div class="dua_input">
                                <input id="username" class="form-control"  type="text" value="{{ $item->hari }}" name="hari" placeholder="Masukkan username" />
                                <input class="form-control" type="date" id="email" value="{{ $item->tanggal }}" placeholder="Masukkan email" name="tanggal" />
                            </div>
                            
                            </div>
                            <div class="modal-footer">
                              <button class="btn btn-primary" data-bs-target="#modalToggle2" data-bs-toggle="modal" data-bs-dismiss="modal">Edit Jadwal</button>
                            </div>
                          </form>
                          </div>
                        </div>
                      </div>
                @endforeach
              </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="tambahakun" aria-labelledby="modalToggleLabel" tabindex="-1" style="display: none;" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalToggleLabel">Tambah Jadwal Posyandu</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>  
      <div class="modal-body akun_petugas">
        <div class="dua_label">
          <label for="defaultInput" class="form-label">ID</label>
          <label for="nama"  class="form-label">nama posyandu</label>
      </div>

    <form action="/admin/jadwal/tambah" method="POST">
    @csrf
      
    <div class="dua_input">
          <input id="defaultInput" class="form-control" disabled type="text" value="" placeholder="ID Dibuat Otomatis" />
          <input class="form-control" type="text" placeholder="Masukkan nama" id="nama" value="" name="nama_posyandu" />
    </div>
    <div class="dua_label">
          <label for="alamat" class="form-label">wilayah desa</label>
          <label for="jenis_kelamin"  class="form-label">nama bidan</label>
    </div>
    <div class="dua_input">
          <input id="alamat" name="wilayah_desa" class="form-control"  type="text" value="" name="wilayah" placeholder="Masukkan wilayah desa" />
          <input id="alamat" name="nama_bidan" class="form-control"  type="text" value="" name="nama_bidan" placeholder="Masukkan nama bidan" />
    </div>
    <div class="dua_label">
          <label for="username" class="form-label">Hari</label>
          <label for="email"  class="form-label">tanggal</label>
    </div>
    <div class="dua_input">
          <input id="username" class="form-control"  type="text" name="hari" value="" placeholder="Masukkan Hari" />
          <input class="form-control" name="tanggal" type="date" id="email" value="" placeholder="Masukkan tanggal" name="tanggal" />
    </div>
    </div>
      <div class="modal-footer">
        <button class="btn btn-primary" data-bs-target="#modalToggle2" data-bs-toggle="modal" data-bs-dismiss="modal">Tambah Jadwal</button>
      </div>
    </form>
    </div>

    


  </div>
</div>
<script>
    let table = new DataTable('#myTable');
</script>
@endsection