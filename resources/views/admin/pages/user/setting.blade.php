@extends('admin.main')
@section('title', 'Setting User |')
@section('content')
<h1 class="mt-4">User</h1>
<hr>

@if(session('result') == 'success')
<div class="alert alert-success alert-dismissiable fade show">
    <strong>Updated !</strong> Berhasil diupdate.
    <button type="button" class="close" data-dismiss="alert">
        &times;
    </button>
</div>

@elseif(session('result') == 'fail')
<div class="alert alert-danger alert-dismissiable fade show">
    <strong>Failed !</strong> Gagal diupdate.
    <button type="button" class="close" data-dismiss="alert">
        &times;
    </button>
</div>

@endif

<div class="row">
    <div class="col-md-6">
        <form method="post" action="{{ route('admin.user.setting') }}">
            <div class="card mb-3">
                <div class="card-header">
                    <h5>Setting</h5>
                </div>
                <div class="card-body">
                    @csrf

                    <div class="form-group form-label-group">
                        <label for="iName">Name</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                            value="{{ old('name', $dt->name) }}" id="iName" placeholder="Name" required>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group form-label-group">
                        <label for="iEmail">Email</label>
                        <input type="text" name="email" class="form-control @error('email') is-invalid @enderror"
                            value="{{ old('email', $dt->email) }}" id="iEmail" placeholder="Email" required>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group form-label-group">
                        <label for="iPassword">Password</label>
                        <input type="password" name="password"
                            class="form-control @error('password') is-invalid @enderror" id="iPassword"
                            placeholder="Password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <div class="form-text text-muted">
                            <small>Kosongkan Password apabila tidak diubah.</small>
                        </div>
                    </div>

                    <div class="form-group form-label-group">
                        <label for="iRePassword">Re Password</label>
                        <input type="password" name="repassword"
                            class="form-control @error('repassword') is-invalid @enderror" id="iRePassword"
                            placeholder="Re Password">
                        @error('repassword')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary shadow-sm">Update</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
