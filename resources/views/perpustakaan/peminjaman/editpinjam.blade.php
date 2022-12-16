@extends('admin.layoutadmin')
@section('content')
    <div class="card">
      <a href="/perpustakaan/peminjaman" title="Back"><button class="btn btn-primary mt-2" style="width: 120px;position: relative;left:13px">Back</button></a>
      <h4 class="text-center mt-2 fw-bold" style="letter-spacing: 2px">Form Edit Peminjaman</h4>
      <div class="card-body">
        <form action="{{ url('perpustakaan/peminjaman',$peminjaman->id) }}" method="post" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class="form-group">
            
            <div class="row g-2">
              <div class="col mb-3">
                  <label class="form-label">Kode Buku</label>
                  <input type="text" name="kode_buku_id" class="form-control" id="" placeholder="Input Kode Buku In Here" autocomplete value="{{$peminjaman->kode_buku_id}}">
                  @error('kode_buku_id')
                  <div class="text-warning">{{ $message }}</div>
                  @enderror
              </div>

              <div class="col mb-3 readonly">
                  <label class="form-label">Judul Buku</label>
                  <input type="text" name="" class="form-control" id="" placeholder="Input Judul Buku In Here" autocomplete disabled readonly value="{{$peminjaman->buku_id}}">
                  @error('')
                  <div class="text-warning">{{ $message }}</div>
                  @enderror
              </div>
          </div>

          <div class="row g-2">

            <div class="col mb-3">
                <label class="form-label">Tanggal Peminjaman</label>
                <input type="date" name="tanggal_pinjam" class="form-control" id="" placeholder="Input Tanggal Peminjaman" autocomplete value="{{$peminjaman->tanggal_pinjam}}">
                @error('tanggal_pinjam')
                <div class="text-warning">{{ $message }}</div>
                @enderror
            </div>

            <div class="col mb-3">
                <label class="form-label">Tanggal Pengembalian</label>
                <input type="date" name="tanggal_kembali" class="form-control" id="" placeholder="Input Tanggal Pengembalian" autocomplete value="{{$peminjaman->tanggal_kembali}}">
                @error('tanggal_kembali')
                <div class="text-warning">{{ $message }}</div>
                @enderror
            </div>
            
          </div>

          <div class="row g-2">
              <div class="col mb-3">
                  <label class="form-label">Jumlah Peminjaman</label>
                  <input type="number" name="jumlahbuku_pinjam" class="form-control" id="" placeholder="Input jumlah paminjaman disini" autocomplete value="{{$peminjaman->jumlahbuku_pinjam}}">
                  @error('jumlahbuku_pinjam')
                  <div class="text-warning">{{ $message }}</div>
                  @enderror
              </div>

              
              <div class="col mb-3">
                  
              </div>
          </div>

          </div>
          <button class="btn btn-outline-primary" type="submit">Submit</button>
      </form>
      </div>
    </div>
@endsection