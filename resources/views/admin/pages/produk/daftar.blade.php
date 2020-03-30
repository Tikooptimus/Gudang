@extends('admin.main')
@section('title', 'Produk |')
@section('content')

<h1 class="mt-4">Produk</h1>
<hr>

<ol class="breadcrumb">
    <li class="breadcrumb-item ml-auto"><a href="{{route('admin.home')}}">Home</a></li>
    <li class="breadcrumb-item active">Produk</a></li>
</ol>

<!-- Alert jika berhasil disimpan -->
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

<!-- Baris Tambah dan Pencarian -->
<div class="row">
    <!-- Tombol Tambah -->
    <div class="col-md-6 mb-3">
        <a href="{{route('admin.produk.add')}}" class="btn btn-primary">
            <i class="fa fa-w fa-plus"></i> Tambah
        </a>
    </div>

    <!-- Formulir Pencarian -->
    <div class="col-md-6 mb-3">
        <form method="GET" action="{{route('admin.produk')}}">
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

<!-- Baris Daftar Data -->
<table class="table table-striped mb-3">
    <tr>
        <th>Gambar</th>
        <th>Produk</th>
        <th class="text-center">Aksi</th>
    </tr>

    @foreach ($data as $dt)
    <tr>
        <!-- Kolom Gambar -->
        <td width="10%">
            <img src="{{url('storage/gambar-produk/'.$dt->gambar_produk)}}" width="75">
        </td>

        <!-- Kolom Data Produk -->
        <td width="45%">
            <small class="text-muted">{{$dt->kode_produk}}</small> <br>
            {{$dt->nama_produk}} <br>
            Harga Rp. {{number_format($dt->harga,0,',','.')}} <br>
            Jumlah Stok {{$dt->stok}} <br>
            <small class="text-muted">{{$dt->nama_kategori}}</small>
        </td>

        <!-- Kolom Tombol-->
        <td align="center" width="45%">
            <!-- Tombol Edit -->
            <a href="{{route('admin.produk.edit',['id'=>$dt->id])}}" class="btn btn-warning btn-sm">
                <i class="fa fa-w fa-edit"></i> Edit Produk
            </a>
            <br><br>
            <!-- Tombol Edit Gambar -->
            <a href="#" class="btn btn-info btn-sm">
                <i class="fa fa-w fa-edit"></i> Edit Gambar
            </a>
            <br><br>
            <!-- Tombol Hapus -->
            <button type="button" data-id="{{$dt->id}}" class="btn btn-danger btn-sm btn-trash">
                <i class="fa fa-w fa-trash"></i> Hapus
            </button>
        </td>
    </tr>

    @endforeach

</table>

<!-- Pagging/Halaman -->
{{
    $data->appends(request()->only('keyword'))
            ->links('vendor.pagination.bootstrap-4')
}}
@endsection
