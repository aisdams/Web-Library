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
        <div class="table-responsive">
        <table class="table dataTable table-hover table-responsive table-sm" id="book">
          <div class="d-flex justify-content-end">
            <a href="{{ url('perpustakaan/peminjaman/create') }}" class="btn btn-primary mb-3 mt-4">Tambah Peminjaman Baru [+]</a>
          </div>
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Kode Buku</th>
                    <th scope="col">Judul Buku</th>
                    <th scope="col">Jumlah Pinjam</th>
                    <th scope="col">Tanggal Pinjam</th>
                    <th scope="col">Tanggal Kembali</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody class="alldata">
                @foreach ( $peminjaman as $item )
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $item->buku_id}}</td>
                    <td>{{ $item->buku_id}}</td>
                    <td>{{ $item->jumlahbuku_pinjam }}</td>
                    <td>{{ $item->tanggal_pinjam }}</td>
                    <td>{{ $item->tanggal_kembali }}</td>
                    <td>{{ $item->status }}</td>
                    <td>
                        <div class="dropdown">
                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                            <i class="bx bx-dots-vertical-rounded"></i>
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{ url('perpustakaan/peminjaman/'.$item->id.'/edit') }}" href="javascript:void(0);"
                            ><i class="bx bx-edit-alt me-2"></i> Edit</a
                            >
                        <!-- Modal -->
                            <a class="dropdown-item" href="javascript:void(0);"
                            >
                            <form action="{{ url('perpustakaan/peminjaman',$item->id) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" class="delete" style="background: none;border:none;color:#697a8d"
                                    data-name="{{ $item->buku_id }}"><i class="bx bx-trash me-2"></i> Delete</button>
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