@extends('admin.main')
@section('title', 'Edit Produk |')
@section('content')

<h1 class="mt-4">Produk</h1>
<hr>

<ol class="breadcrumb">
    <li class="breadcrumb-item ml-auto"><a href="{{route('admin.home')}}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('admin.produk') }}">Produk</a></li>
    <li class="breadcrumb-item active">Edit</li>
</ol>

@if (session('result') == 'fail')
<div class="alert alert-danger alert-dismissible fade show">
    <strong>Failed !</strong> Gagal disimpan.
    <button type="button" class="close" data-dismiss="alert">
        &times;
    </button>
</div>
@endif

<div class="row">
    <div class="col-md-6 mb-3">
        <form method="POST" action="{{route('admin.produk.edit',['id'=>$rc->id])}}">
            @csrf
            <div class="card">
                <div class="card-header">
                    <h5>Ubah Data Produk</h5>
                </div>
                <!-- End Card Header -->

                <div class="card-body">

                    <!-- Input Kode Produk -->
                    <label for="iKode">Kode Produk</label>
                    <div class="form-group form-label-group">
                        <input type="text" name="kode" class="form-control {{$errors->has('kode')?'is-invalid':''}}"
                            value="{{old('kode',$rc->kode_produk)}}" id="iKode" placeholder="Kode Produk" required>
                        @if ($errors->has('kode'))
                        <div class="invalid-feedback">
                            {{$errors->first('kode')}}
                        </div>
                        @endif
                    </div>

                    <!-- Input Nama Produk -->
                    <label for="iNamaProduk">Nama Produk</label>
                    <div class="form-group form-label-group">
                        <input type="text" name="nama_produk"
                            class="form-control {{$errors->has('nama_produk')?'is-invalid':''}}"
                            value="{{old('nama_produk',$rc->nama_produk)}}" id="iNamaProduk" placeholder="Nama Produk"
                            required>
                        @if ($errors->has('nama_produk'))
                        <div class="invalid-feedback">
                            {{$errors->first('nama_produk')}}
                        </div>
                        @endif
                    </div>

                    <!-- Input Harga -->
                    <label for="iHarga">Harga</label>
                    <div class="form-group form-label-group">
                        <input type="number" name="harga" class="form-control {{$errors->has('harga')?'is-invalid':''}}"
                            value="{{old('harga',$rc->harga)}}" id="iHarga" placeholder="Harga" required>
                        @if ($errors->has('harga'))
                        <div class="invalid-feedback">
                            {{$errors->first('harga')}}
                        </div>
                        @endif
                    </div>

                    <!-- Input Stok -->
                    <label for="iStok">Stok</label>
                    <div class="form-group form-label-group">
                        <input type="number" name="stok" class="form-control {{$errors->has('stok')?'is-invalid':''}}"
                            value="{{old('stok',$rc->stok)}}" id="iStok" placeholder="Stok" required>
                        @if ($errors->has('stok'))
                        <div class="invalid-feedback">
                            {{$errors->first('stok')}}
                        </div>
                        @endif
                    </div>

                    <!-- Input Kategori -->
                    <div class="form-group">
                        <select name="kategori" class="form-control {{$errors->has('kategori')?'is-invalid':''}}"
                            required>
                            @php
                            $val = old('kategori',$rc->id_kategori);
                            @endphp
                            <option value="">Pilih Kategori :</option>
                            @foreach (\App\Kategori::orderBy('nama_kategori','asc')->get() as $d)
                            <option value="{{$d->id}}" {{$val==$d->id?'selected':''}}>
                                {{$d->nama_kategori}}
                            </option>
                            @endforeach
                        </select>
                        @if ($errors->has('kategori'))
                        <div class="invalid-feedback">
                            {{$errors->first('kategori')}}
                        </div>
                        @endif
                    </div>

                </div>
                <!-- End Card Body -->

                <div class="card-footer">
                    <button class="btn btn-primary" type="submit">Update</button>
                </div>
                <!-- End Card -->

            </div>
            <!-- End Card -->
        </form>
    </div>
</div>
<!-- End Row -->

@endsection
