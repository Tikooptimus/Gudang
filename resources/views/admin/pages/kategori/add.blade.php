@extends('admin.main')
@section('title', 'Tambah Kategori |')
@section('content')

<h1 class="mt-4">Kategori</h1>
<hr>

<ol class="breadcrumb">
    <li class="breadcrumb-item ml-auto"><a href="{{route('admin.home')}}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('admin.kategori') }}">Kategori</a></li>
    <li class="breadcrumb-item active">Tambah</li>
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
        <form method="POST" action="{{route('admin.kategori.add')}}">
            @csrf
            <div class="card">

                <div class="card-header">
                    <h5>Buat Kategori Baru</h5>
                </div>
                <!-- End Card Header -->

                <div class="card-body">
                    <div class="form-group form-label-group">
                        <label for="iKategori">Kategori</label>
                        <input type="text" name="kategori"
                            class="form-control {{$errors->has('kategori')?'is-invalid':''}}"
                            value="{{old('kategori')}}" id="iKategori" placeholder="Kategori" required>
                        @if ($errors->has('kategori'))
                        <div class="invalid-feedback">{{$errors->first('kategori')}}</div>
                        @endif
                    </div>
                    <!-- End Form Group -->
                </div>
                <!-- End Card Body -->

                <div class="card-footer">
                    <button class="btn btn-primary" type="submit">Simpan</button>
                </div>
                <!-- End Card Footer -->

            </div>
            <!-- End Card -->
        </form>
    </div>
</div>
@endsection
