@extends('admin.template.template-header')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card data_bayi">
        <a href="{{ route('admin_pendaftaran') }}"><button type="submit" class="btn btn-primary">Tambah Data</button></a>
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
                @foreach( $bayi as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->nama_bayi }}</td>
                    <td>{{ $item->tempat_lahir }}, {{ $item->tanggal_lahir }}</td>
                    <td>{{ $item->jenis_kelamin }}</td>
                    <td>{{ $item->nama_wali }}</td>
                    <td>{{ $item->alamat }}</td>
                    <td class="button_intable">
                        <button type="submit" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editdata{{ $item->id }}">Edit</button>
                        <form action="/admin/data_bayi/hapus/{{ $item->id }}" method="POST">
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
                          <h5 class="modal-title" id="modalToggleLabel">Edit Data</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="/admin/data_bayi/edit/{{ $item->id }}" method="POST">
                            @csrf
                            @method('put')
                        <div class="modal-body">
                            <div class="dua_label">
                                <label for="defaultInput" class="form-label">ID</label>
                                <label for="input_tanggal_lahir"  class="form-label">Tanggal Lahir</label>
                            </div>
                            
                            

                            <div class="dua_input">
                                <input id="defaultInput" class="form-control" disabled type="text" value="{{ $item->nama_id }}" placeholder="ID Dibuat Otomatis" />
                                <input class="form-control" type="date" id="tanggal_lahir" value="{{ $item->tanggal_lahir }}" name="tanggal_lahir" />
                            </div>
                            <div class="dua_label">
                                <label for="nama_bayi" class="form-label">Nama BAyi</label>
                                <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                            </div>
                            <div class="dua_input">
                                <input id="nama_bayi" name="nama_bayi" class="form-control" type="text" value="{{ $item->nama_bayi }}" placeholder="Masukkan Nama Bayi" />
                                <input id="tempat_lahir" name="tempat_lahir" class="form-control" value="{{ $item->tempat_lahir }}" type="text" placeholder="Masukkan tempat lahir" />
                            </div>
                            <div class="dua_label">
                                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                <label for="nama_wali" class="form-label">nama wali</label>
                            </div>
                            <div class="dua_input">
                                <select id="jenis_kelamin" name="jenis_kelamin" class="form-select">
                                    <option>Default select</option>
                                    <option value="Laki - Laki"  {{ $item->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki - Laki</option>
                                    <option value="Perempuan" {{ $item->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                  </select>
                                <input id="nama_wali" name="nama_wali" class="form-control" value="{{ $item->nama_wali }}"    type="text" placeholder="Masukkan nama wali" />
                            </div>
                            <div class="label_ditengah">
                                <label for="alamat" class="form-label">Alamat</label>
                            </div>
                            <div class="input_ditengah">
                                <input id="alamat" name="alamat" class="form-control" type="text"value="{{ $item->alamat }}" placeholder="Default input" />
                            </div>
                        </div>
                        <div class="modal-footer">
                          <button class="btn btn-primary" data-bs-target="#modalToggle2" data-bs-toggle="modal" data-bs-dismiss="modal">Edit Data</button>
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

<script>
    let table = new DataTable('#myTable');
</script>

<script>
    @if(Session::has('berhasil_edit'))
  
    Swal.fire({
      title: 'Berhasil',
      text: 'Data bayi Berhasil di edit',
      icon: 'success',
      confirmButtonText: 'Oke'
    })
    @elseif(Session::has('berhasil_hapus'))
  
    Swal.fire({
      title: 'Berhasil',
      text: 'Data bayi Berhasil di hapus',
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