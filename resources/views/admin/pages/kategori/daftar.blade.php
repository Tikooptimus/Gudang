@extends('admin.main')
@section('title', 'Kategori |')
@section('content')

<h1 class="mt-4">Kategori</h1>
<hr>

<ol class="breadcrumb">
    <li class="breadcrumb-item ml-auto"><a href="{{route('admin.home')}}">Home</a></li>
    <li class="breadcrumb-item active">Kategori</a></li>
</ol>

@if (session('result') == 'success')
<div class="alert alert-success alert-dismissible fade show">
    <strong>Saved !</strong> Berhasil disimpan.
    <button type="button" class="close" data-dismiss="alert">
        &times;
    </button>
</div>
@endif

@if (session('result') == 'update')
<div class="alert alert-success alert-dismissible fade show">
    <strong>Updated !</strong> Berhasil diupdate.
    <button type="button" class="close" data-dismiss="alert">
        &times;
    </button>
</div>
@endif

@if (session('result') == 'fail-delete')
<div class="alert alert-danger alert-dismissible fade show">
    <strong>Failed !</strong> Gagal dihapus.
    <button type="button" class="close" data-dismiss="alert">
        &times;
    </button>
</div>
@endif

<div class="row">
    <div class="col-md-6 mb-3">
        <a href="{{route('admin.kategori.add')}}" class="btn btn-primary">
            <i class="fa fa-w fa-plus"></i> Tambah
        </a>
    </div>

    <div class="col-md-6 mb-3">
        <form method="GET" action="{{route('admin.kategori')}}">
            <div class="input-group">
                <input type="text" name="keyword" class="form-control" value="{{request('keyword')}}">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-primary">
                        Cari!
                    </button>
                </div>
            </div>
            <!-- End Input Group -->
        </form>
    </div>
</div>
<!-- End Row -->

<table class="table table-striped mb-3">
    <tr>
        <th>Kategori</th>
        <th class="text-center">Aksi</th>
    </tr>
    @foreach ($data as $dt)
    <tr>
        <td>{{$dt->nama_kategori}}</td>
        <td>
            <center>

                <a href="{{route('admin.kategori.edit',['id'=>$dt->id])}}" class="btn btn-warning btn-sm">
                    <i class="fa fa-w fa-edit"></i> Edit
                </a>

                <!-- Button trigger modal -->
                <button type="button" class="btn btn-danger btn-sm btn-trash" data-id="{{$dt->id}}"
                    data-target="#exampleModal">
                    <i class="fa fa-w fa-trash"></i> Hapus
                </button>

                <!-- Modal -->
                <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Delete</h5>
                                <button type="button" class="close" data-dismiss="modal">
                                    <span aria-hidden="true">x</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Apakah anda yakin ingin menghapusnya?
                                <form id="form-delete" method="post" action="{{route('admin.kategori')}}">
                                    @csrf
                                    {{ method_field('delete')}}
                                    <input type="hidden" name="id" id="input-id">
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button type="button" class="btn btn-primary btn-delete">Delete</button>
                            </div>
                        </div>
                    </div>
                </div>

            </center>
        </td>
    </tr>
    @endforeach
</table>

{{
    $data->appends(request()->only('keyword'))
        ->links('vendor.pagination.bootstrap-4')
}}

@endsection

@push('js')
<script type="text/javascript">
    $(function () {
        $('.btn-trash').click(function () {
            id = $(this).attr('data-id');
            $('#input-id').val(id);
            $('#deleteModal').modal('show');
        });

        $('.btn-delete').click(function () {
            $('#form-delete').submit();
        });
    });

</script>
@endpush
