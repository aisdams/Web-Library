@extends('admin.layoutadmin')
@section('content')
    <div class="card">
      <a href="/book" title="Back"><button class="btn btn-primary mt-2" style="width: 120px;position: relative;left:13px">Back</button></a>
      <h4 class="text-center mt-2 fw-bold" style="letter-spacing: 2px">Form Book Edit</h4>
      <div class="card-body">
        <form action="{{ url('book',$book->id) }}" method="post" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class="form-group">
            
          <div class="row g-2">

            <div class="col mb-3">
                <label class="form-label">Kode Buku</label>
                <input type="text" placeholder="Masukkan Kode Buku" class="form-control"
                    value="{{ $book->kode_buku }}" name="kode_buku" required>
                @error('kode_buku')
                <div class="text-warning">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="col mb-3">
                <label class="form-label">Judul Buku</label>
                <input type="text" placeholder="Masukkan Judul Buku" class="form-control"
                    value="{{ $book->judul_buku }}" name="judul_buku" required>
                @error('judul_buku')
                <div class="text-warning">{{ $message }}</div>
                @enderror
            </div>
          </div>

          <div class="row g-2">

            <div class="col mb-3">
              <label class="form-label">Image</label>
              <input type="file" class="form-control" name="image">
              @error('image')
              <div class="text-warning">{{ $message }}</div>
              @enderror
              <img src="{{ asset('img/'.$book->image) }}" alt="" style="width: 30%" class="mt-3">
            </div>
            
            <div class="col mb-3">
                <label class="form-label">Penerbit Buku</label>
                <input type="text" placeholder="Masukkan Penerbit Buku" class="form-control"
                    value="{{ $book->penerbit_buku }}" name="penerbit_buku" required>
                @error('penerbit_buku')
                <div class="text-warning">{{ $message }}</div>
                @enderror
            </div>
          </div>

          <div class="row g-2">

            <div class="col mb-3">
              <label class="form-label">Stok</label>
                <input type="number" placeholder="Masukkan Stok" class="form-control"
                    value="{{ $book->stok }}" name="stok" required>
                @error('stok')
                <div class="text-warning">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="col mb-3">
                <label class="form-label">Jumlah Tersedia</label>
                <input type="number" placeholder="Masukkan Jumlah Tersedia" class="form-control"
                    value="{{ $book->jumlah_tersedia }}" name="jumlah_tersedia" required>
                @error('jumlah_tersedia')
                <div class="text-warning">{{ $message }}</div>
                @enderror
            </div>
          </div>

          <div class="row g-2">

            <div class="col mb-3">
              <label class="form-label">Jumlah Rusak</label>
                <input type="number" placeholder="Masukkan Jumlah Rusak" class="form-control"
                    value="{{ $book->jumlah_rusak }}" name="jumlah_rusak" required>
                @error('jumlah_rusak')
                <div class="text-warning">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="col mb-3">
                <label class="form-label">Jumlah Pinjam</label>
                <input type="number" placeholder="Masukkan Jumlah Pinjam" class="form-control"
                    value="{{ $book->jumlah_pinjam }}" name="jumlah_pinjam" required>
                @error('jumlah_pinjam')
                <div class="text-warning">{{ $message }}</div>
                @enderror
            </div>
          </div>

          </div>
          <button class="btn btn-outline-primary" type="submit">Submit</button>
      </form>
      </div>
    </div>
@endsection