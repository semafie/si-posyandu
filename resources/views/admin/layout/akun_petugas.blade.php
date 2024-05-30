@extends('admin.template.template-header')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card petugas">
      <a ><button type="submit" class="btn btn-primary btn_petugas" data-bs-toggle="modal" data-bs-target="#tambahakun">Tambah akun</button></a>
        <div class="text-nowrap table-responsive pt-0">
            <table id="myTable" class="datatables-basic table border-top">
              <thead>
                <tr>
                  <th>id</th>
                  <th>nama</th>
                  <th>alamat</th>
                  <th>jenis_kelamin</th>
                  <th>username</th>
                  <th>email</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($user as $item)
                    <tr>
                      <td>{{ $item->id }}</td>
                      <td>{{ $item->nama_user }}</td>
                      <td>{{ $item->alamat }}</td>
                      <td>{{ $item->jenis_kelamin }}</td>
                      <td>{{ $item->name }}</td>
                      <td>{{ $item->email }}</td>
                      <td class="button_intable">
                        <button type="submit" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editdata{{ $item->id }}">Edit</button>
                        <form action="/admin/imunisasi/hapus/{{ $item->id }}" method="POST">
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
                          <form action="/admin/pemeriksaan/edit/{{ $item->id }}" method="POST">
                              @csrf
                              @method('put')
                          <div class="modal-body akun_petugas">
                            <div class="dua_label">
                              <label for="defaultInput" class="form-label">ID</label>
                              <label for="nama"  class="form-label">Nama petugas</label>
                          </div>

                          
                         <div class="dua_input">
                              <input id="defaultInput" class="form-control" readonly type="text" value="{{ $item->id }}" placeholder="ID Dibuat Otomatis" />
                              <input class="form-control" type="text" placeholder="Masukkan nama" id="nama" value="{{ $item->nama_user }}" name="nama" />
                          </div>
                            <div class="dua_label">
                              <label for="alamat" class="form-label">alamat</label>
                              <label for="jenis_kelamin"  class="form-label">jenis_kelamin</label>
                          </div>
                         <div class="dua_input">
                              <input id="alamat" name="alamat" class="form-control"  type="text" value="{{ $item->alamat }}" placeholder="Masukkan alamat" />
                              <select id="jenis_kelamin" name="jenis_kelamin" class="form-select">
                                <option>Default select</option>
                                <option value="Laki - Laki">Laki - Laki</option>
                                <option value="Perempuan">Perempuan</option>
                              </select>
                          </div>
                            <div class="dua_label">
                              <label for="username" class="form-label">username</label>
                              <label for="email"  class="form-label">email</label>
                          </div>
                         <div class="dua_input">
                              <input id="username" name="username" class="form-control"  type="text" value="{{ $item->name }}" placeholder="Masukkan username" />
                              <input class="form-control" type="text" id="email" value="{{ $item->email }}" placeholder="Masukkan email" name="email" />
                          </div>
                          </div>
                          <div class="modal-footer">
                            <button class="btn btn-primary" data-bs-target="#modalToggle2" data-bs-toggle="modal" data-bs-dismiss="modal">Edit akun</button>
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
        <h5 class="modal-title" id="modalToggleLabel">Tambah Akun</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>  
      <div class="modal-body akun_petugas">
        <div class="dua_label">
          <label for="defaultInput" class="form-label">ID</label>
          <label for="nama"  class="form-label">Nama petugas</label>
      </div>
      <form action="/admin/akun_petugas/tambah" method="POST">
      @csrf
      
     <div class="dua_input">
          <input id="defaultInput" class="form-control" disabled type="text" value="" placeholder="ID Dibuat Otomatis" />
          <input class="form-control" type="text" placeholder="Masukkan nama" id="nama" value="" name="nama" />
      </div>
        <div class="dua_label">
          <label for="alamat" class="form-label">alamat</label>
          <label for="jenis_kelamin"  class="form-label">jenis_kelamin</label>
      </div>
     <div class="dua_input">
          <input id="alamat" name="alamat" class="form-control"  type="text" value="" placeholder="Masukkan alamat" />
          <select id="jenis_kelamin" name="jenis_kelamin" class="form-select">
            <option>Default select</option>
            <option value="Laki - Laki">Laki - Laki</option>
            <option value="Perempuan">Perempuan</option>
          </select>
      </div>
        <div class="dua_label">
          <label for="username" class="form-label">username</label>
          <label for="email"  class="form-label">email</label>
      </div>
     <div class="dua_input">
          <input id="username" name="username" class="form-control"  type="text" value="" placeholder="Masukkan username" />
          <input class="form-control" type="text" id="email" value="" placeholder="Masukkan email" name="email" />
      </div>
        <div class="dua_label">
          <label for="password" class="form-label">password</label>
          <label for="confirm_password"  class="form-label">confirm_password</label>
      </div>
     <div class="dua_input">
          <input id="password" type="password" class="form-control" name="password"  type="text" value="" placeholder="Masukkan password" />
          <input class="form-control" type="password" id="confirm_password" placeholder="masukkan confirm password" value="" name="confirm_password" />
      </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" data-bs-target="#modalToggle2" data-bs-toggle="modal" data-bs-dismiss="modal">Tambah AKun</button>
      </div>
    </form>
    </div>
  </div>
</div>

<script>
  let table =new DataTable('#myTable')
</script>

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

  @elseif(Session::has('password ga sama'))

  Swal.fire({
    title: 'Gagal',
    text: 'Pastikan password dan confirm password sama',
    icon: 'error',
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