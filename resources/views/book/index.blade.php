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
        <h4>Form Create Book</h4>
        <div class="createnya">
            <form action="{{ url('book') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-grup">
                    <div class="row g-2">
                        <div class="col mb-3">
                            <label class="form-label">Kode Buku</label>
                            <input type="text" name="kode_buku" class="form-control" id="" placeholder="Input Kode Buku In Here" autocomplete>
                            @error('kode_buku')
                            <div class="text-warning">{{ $message }}</div>
                            @enderror
                        </div>
        
                        <div class="col mb-3">
                            <label class="form-label">Judul Buku</label>
                            <input type="text" name="judul_buku" class="form-control" id="" placeholder="Input Judul Buku In Here" autocomplete>
                            @error('judul_buku')
                            <div class="text-warning">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row g-2">
                        <div class="col mb-3">
                            <label class="form-label">Penulis Buku</label>
                            <input type="text" name="penulis_buku" class="form-control" id="" placeholder="Input Penulis Buku In Here" autocomplete>
                            @error('penulis_buku')
                            <div class="text-warning">{{ $message }}</div>
                            @enderror
                        </div>
        
                        <div class="col mb-3">
                            <label class="form-label">Penerbit Buku</label>
                            <input type="text" name="penerbit_buku" class="form-control" id="" placeholder="Input Penerbit Buku In Here" autocomplete>
                            @error('penerbit_buku')
                            <div class="text-warning">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row g-2">
                        <div class="col mb-3">
                            <label class="form-label">Stok</label>
                            <input type="number" name="stok" class="form-control" id="" placeholder="Input Stok In Here" autocomplete>
                            @error('stok')
                            <div class="text-warning">{{ $message }}</div>
                            @enderror
                        </div>
        
                        
                        <div class="col mb-3">
                            <label class="form-label">Jumlah Tersedia</label>
                            <input type="number" name="jumlah_tersedia" class="form-control" id="" placeholder="Input Jumlah Tersedia In Here" autocomplete>
                            @error('jumlah_tersedia')
                            <div class="text-warning">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row g-2">
        
                        <div class="col mb-3">
                            <label class="form-label">Jumlah Rusak</label>
                            <input type="text" name="jumlah_rusak" class="form-control" id="" placeholder="Input Jumlah Rusak In Here" autocomplete>
                            @error('jumlah_rusak')
                            <div class="text-warning">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="col mb-3">
                            <label class="form-label">Image</label>
                            <input type="file" class="form-control" name="image" required>
                            @error('image')
                            <div class="text-warning">{{ $message }}</div>
                            @enderror
                        </div>
                        
                    </div>

                    <div class="row g-2">

                        <div class="col mb-3">
                            {{-- <label class="form-label">Jumlah Terpinjam</label> --}}
                            <input type="hidden" required placeholder="Jumlah Barang Terpinjam" class="form-control" name="jumlah_pinjam"
                            value="0">
                        </div>
        
                    </div>
                    <button type="submit" class="btn btn-success mb-3 mt-4">Create</button>
                </div>
            </form>
        </div>
        <hr>
        {{-- end create --}}

        {{-- <a href="{{ url('checkpemesanan/create') }}" class="btn btn-primary mb-4"><i class="fas fa-plus"></i><span>Tambah</span></a> --}}
        <div class="table-responsive">
        <table class="table dataTable table-hover table-responsive table-sm" id="book">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Kode Buku</th>
                    <th scope="col">Judul Buku</th>
                    <th scope="col">Image</th>
                    <th scope="col">Penulis Buku</th>
                    <th scope="col">Penerbit Buku</th>
                    <th scope="col">Stok</th>
                    <th scope="col">Jumlah Tersedia</th>
                    <th scope="col">Jumlah Rusak</th>
                    <th scope="col">Jumlah Pinjam</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody class="alldata">
                @foreach ( $book as $item )
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $item->kode_buku}}</td>
                    <td>{{ $item->judul_buku }}</td>
                    <td><img src="{{ asset('img/'.$item->image) }}" alt="" style="width: 200px; position:relative;"></td>
                    <td>{{ $item->penulis_buku }}</td>
                    <td>{{ $item->penerbit_buku }}</td>
                    <td>{{ $item->stok }}</td>
                    <td>{{ $item->jumlah_tersedia }}</td>
                    <td>{{ $item->jumlah_rusak }}</td>
                    <td>{{ $item->jumlah_pinjam }}</td>
                    <td>
                        <div class="dropdown">
                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                            <i class="bx bx-dots-vertical-rounded"></i>
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{ url('book/'.$item->id.'/edit') }}" href="javascript:void(0);"
                            ><i class="bx bx-edit-alt me-2"></i> Edit</a
                            >
                        <!-- Modal -->
                            <a class="dropdown-item" href="javascript:void(0);"
                            >
                            <form action="{{ url('book',$item->id) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" class="delete" style="background: none;border:none;color:#697a8d"
                                    data-name="{{ $item->book }}"><i class="bx bx-trash me-2"></i> Delete</button>
                            </form></a
                            >
                        </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
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