@extends('admin.main')
@section('title', 'Tambah Produk |')
@section('content')

<h1 class="mt-4">Produk</h1>
<hr>

<ol class="breadcrumb">
    <li class="breadcrumb-item ml-auto"><a href="{{route('admin.home')}}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('admin.produk') }}">Produk</a></li>
    <li class="breadcrumb-item active">Tambah</li>
</ol>

<div class="row">
    <div class="col-md-6 mb-3">
        <form method="POST" action="{{route('admin.produk.add')}}" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-header">
                    <h5>Buat Produk Baru</h5>
                </div>
                <!-- End Card Header -->

                <div class="card-body">

                    <!-- Input Gambar -->
                    <label for="iGambar">Gambar Produk</label>
                    <div class="form-group form-label-group">
                        <input type="file" name="gambar" class="form-control {{$errors->has('gambar')?'is-invalid':''}}"
                            accept="image/*" id="iGambar" placeholder="Gambar Produk">
                        @if ($errors->has('gambar'))
                        <div class="invalid-feedback">
                            {{$errors->first('gambar')}}
                        </div>
                        @endif
                    </div>

                    <!-- Input Kode Produk -->
                    <label for="iKode">Kode Produk</label>
                    <div class="form-group form-label-group">
                        <input type="text" name="kode" class="form-control {{$errors->has('kode')?'is-invalid':''}}"
                            value="{{old('kode')}}" id="iKode" placeholder="Kode Produk" required>
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
                            value="{{old('nama_produk')}}" id="iNamaProduk" placeholder="Nama Produk" required>
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
                            value="{{old('harga')}}" id="iHarga" placeholder="Harga" required>
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
                            value="{{old('stok')}}" id="iStok" placeholder="Stok" required>
                        @if ($errors->has('stok'))
                        <div class="invalid-feedback">
                            {{$errors->first('stok')}}
                        </div>
                        @endif
                    </div>

                    <!-- Input Kategori -->
                    <div class="form-group">
                        <select name="kategori" class="form-control {{$errors->has('kategori')?'is-invalid':''}}" required>
                            @php
                                $val = old('kategori');
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
                    <button class="btn btn-primary" type="submit">Simpan</button>
                </div>
                <!-- End Card -->

            </div>
            <!-- End Card -->
        </form>
    </div>
</div>
<!-- End Row -->

@endsection

@push('js')
<script type="text/javascript">
    // Fungsi menampilkan gambar yang dipilih
    function filePreview(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#iGambar + img').remove();
                $('#iGambar').after('<img src="' + e.target.result + '" width="100" class="mt-3" />');
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    // Perintah menjalankan fungsi filePrewiew
    $(function () {
        $('#iGambar').change(function () {
            filePreview(this);
        })
    })

</script>
@endpush
