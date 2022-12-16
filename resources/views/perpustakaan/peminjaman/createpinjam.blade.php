@extends('admin.layoutadmin')
@section('content')
@push('style')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
<style>
    table.dataTable thead .sorting:before,
    table.dataTable thead .sorting_asc:before,
    table.dataTable thead .sorting_desc:before,
    table.dataTable thead .sorting_asc_disabled:before,
    table.dataTable thead .sorting_desc_disabled:before {
    right: 1em;
    content: "\2191" !important;
    font-size: 18px !important;
    margin-bottom: .3rem !important;
    }
    table.dataTable thead .sorting:after,
    table.dataTable thead .sorting_asc:after,
    table.dataTable thead .sorting_desc:after,
    table.dataTable thead .sorting_asc_disabled:after,
    table.dataTable thead .sorting_desc_disabled:after {
    right: 0.5em;
    content: "\2193" !important;
    font-size: 18px !important;
    margin-bottom: .3rem !important;
    }
</style>
@endpush
<div class="card">
    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ $message }}<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    
    @endif
    <div class="card-body">
        {{-- <a href="{{ url('checkpemesanan/create') }}" class="btn btn-primary mb-4"><i class="fas fa-plus"></i><span>Tambah</span></a> --}}
        <div class="d-flex justify-content-between">
            <h4>Form Create Peminjaman</h4>
            <a href="/perpustakaan/peminjaman" title="Back"><button class="btn btn-primary mt-2" style="width: 120px;position: relative;left:13px">Back</button></a>
        </div>
        <div class="createnya">
            <form action="{{ url('perpustakaan/peminjaman') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-grup">
                    <div class="row g-2">
                        <div class="col mb-3 readonly">
                            <label class="form-label">Judul Buku</label>
                            <input type="text" name="" class="form-control" id="" placeholder="Input Judul Buku In Here" autocomplete>
                            @error('')
                            <div class="text-warning">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col mb-3">
                            <label class="form-label">Kode Buku</label>
                            <select required class="form-control form-select" name="book_id" id="book_id">
                                <option selected disabled>Choose Kode Buku</option>
                                @foreach ($book as $item)
                                <option value="{{ $item->id }}">{{ $item->kode_buku}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row g-2">
        
                      <div class="col mb-3">
                          <label class="form-label">Tanggal Peminjaman</label>
                          <input type="date" name="tanggal_pinjam" class="form-control" id="" placeholder="Input Tanggal Peminjaman" autocomplete>
                          @error('tanggal_pinjam')
                          <div class="text-warning">{{ $message }}</div>
                          @enderror
                      </div>

                      <div class="col mb-3">
                          <label class="form-label">Tanggal Pengembalian</label>
                          <input type="date" name="tanggal_kembali" class="form-control" id="" placeholder="Input Tanggal Pengembalian" autocomplete>
                          @error('tanggal_kembali')
                          <div class="text-warning">{{ $message }}</div>
                          @enderror
                      </div>
                      
                    </div>

                    <div class="row g-2">
                        <div class="col mb-3">
                            <label class="form-label">Jumlah Peminjaman</label>
                            <input type="number" name="jumlahbuku_pinjam" class="form-control" id="" placeholder="Input jumlah paminjaman disini" autocomplete>
                            @error('jumlahbuku_pinjam')
                            <div class="text-warning">{{ $message }}</div>
                            @enderror
                        </div>
        
                        
                        <div class="col mb-3">
                            
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success mb-3 mt-4">Create</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Launch demo modal
  </button> --}}
  
@endsection

@push('scripts')
<!-- jQuery -->
<script src="//code.jquery.com/jquery.js"></script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/validator/13.7.0/validator.min.js"
    integrity="sha512-rJU+PnS2bHzDCvRGFhXouCSxf4YYaUyUfjXMHsHFfMKhWDIEBr8go2LZ2EYXOqASey1tWc2qToeOCYh9et2aGQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
    integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
    integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'csrftoken': '{{ csrf_token() }}'
        }
    });
</script>

<script>
    $('.delete').click(function (event) {
        var form = $(this).closest("form");
        var name = $(this).data("name");
        event.preventDefault();
        swal({
                title: `Are you sure you want to delete ${name}?`,
                text: "If you delete this, it will be gone forever.",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    form.submit();
                    swal("Data berhasil di hapus", {
                        icon: "success",
                    });
                } else {
                    swal("Data tidak jadi dihapus");
                }
            });
    });
</script>

<script>
    $(function () {
        $('#book').DataTable().fnDestroy({
            columnDefs: [{
                paging: true,
                scrollX: true,
                lengthChange: true,
                searching: true,
                ordering: true,
                targets: [1, 2, 3, 4],
            }, ],
        });

        $('.toggle-class').change(function() {
            var status = $(this).prop('checked') == true ? 1 : 0;
            var datapemesanan_id = $(this).data('id');
                $.ajax({
                type: "GET",
                dataType: "json",
                url: '/changeStatus',
                data: {'status': status, 'datapemesanan_id': datapemesanan_id},
                success: function(data){
                console.log(data.success)
                }
            });
        })

        $('button').click(function () {
            var data = table.$('input, select', 'button', 'form').serialize();
            return false;
        });
        table.columns().iterator('column', function (ctx, idx) {
            $(table.column(idx).header()).prepend('<span class="sort-icon"/>');
        });
    });
</script>

<script>
    @if(Session::has('success'))
    toastr.success("{{ Session::get('success') }}")
    @endif
</script>

@endpush