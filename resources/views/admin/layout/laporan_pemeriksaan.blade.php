@extends('admin.template.template-header')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card laporan_pemeriksaan">
        <div style="gap: 15px; display: flex;"><a href="{{ route('admin_pemeriksaan') }}"><button type="submit" class="btn btn-primary">Tambah Data Pemeriksaan</button></a><button type="submit" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#print">Print</button></div>
        
        <div class="text-nowrap table-responsive pt-0">
            <table id="myTable" class="datatables-basic table border-top">
              <thead>
                <tr>
                  <th>id</th>
                  <th>Nama Bayi</th>
                  <th>Jenis kelamin</th>
                  <th>Nama Wali</th>
                  <th>tanggal pemeriksaan</th>
                  <th>TB</th>
                  <th>BB</th>
                  <th>Status Gizi</th>
                  <th>Keterangan</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach($pemeriksaan as $item)
                <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->bayi->nama_bayi }}</td>
                <td>{{ $item->bayi->jenis_kelamin }}</td>
                <td>{{ $item->bayi->nama_wali }}</td>
                <td>{{ $item->tanggal_timbang }}</td>
                <td>{{ $item->tinggi_badan }}</td>
                <td>{{ $item->berat_badan }}</td>
                <td>{{ $item->status_gizi }}</td>
                <td>{{ $item->keterangan }}</td>
                <td>
                  <button type="submit" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editdata{{ $item->id }}">Edit</button>
                  <form action="/admin/pemeriksaan/hapus/{{ $item->id }}" method="POST">
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
                    <div class="modal-body">
                      
                    <div class="dua_label">
                      <label for="tinggi_badan" class="form-label">Tinggi badan</label>
                      <label for="berat_badan" class="form-label">Berat badan</label>
                  </div>
                  <div class="dua_input">
                      <input id="tinggi_badan" name="tinggi_badan" class="form-control" type="text" value="{{ $item->tinggi_badan }}" placeholder="Masukkan Nama Bayi" />
                      <input id="berat_badan" name="berat_badan" class="form-control" value="{{ $item->berat_badan }}" type="text" placeholder="Masukkan tempat lahir" />
                  </div>
                    <div class="dua_label">
                      <label for="status_gizi" class="form-label">status</label>
                      <label for="keterangan" class="form-label">keterangan</label>
                  </div>
                  <div class="dua_input">
                      <input id="status_gizi" name="status_gizi" class="form-control" type="text" value="{{ $item->status_gizi }}" placeholder="Masukkan Nama Bayi" />
                      <input id="keterangan" name="keterangan" class="form-control" value="{{ $item->keterangan }}" type="text" placeholder="Masukkan tempat lahir" />
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

        
        <div class="modal fade" id="print" aria-labelledby="modalToggleLabel" tabindex="-1" style="display: none;" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="modalToggleLabel">Pilih tanggal</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <form action="/cetakpemeriksaan/masuk" method="POST">
              @csrf
              <div class="modal-body">
                <input class="form-control" name="tanggalprint" type="date"  id="html5-date-input" />
              </div>
              <div class="modal-footer">
                <button class="btn btn-primary" data-bs-target="#modalToggle2" data-bs-toggle="modal" data-bs-dismiss="modal">Cetak Pemeriksaan</button>
              </div>
            </form>
            </div>
          </div>
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
    text: 'Data pemeriksaan Berhasil di edit',
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