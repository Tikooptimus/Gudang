@extends('admin.main')
@section('title', 'Product |')
@section('content')

<h1 class="mt-4">Category</h1>
<hr>

<ol class="breadcrumb">
    <li class="breadcrumb-item ml-auto"><a href="{{route('admin.home')}}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('product.index') }}">Product</a></li>
    <li class="breadcrumb-item active">Add</li>
</ol>

<div class="row">
    <div class="col-md-12">
        <div class="card">

            <div class="card-header">
                <h5>Add Product</h5>
            </div>
            <!-- End Card Header -->

            <form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="card-body">

                    <div class="form-group">
                        <label for="">Foto</label>
                        <input type="file" name="photo" class="form-control">
                        <p class="text-danger">{{$errors->first('photo')}}</p>
                    </div>

                    <div class="form-group">
                        <label for="">Code Product</label>
                        <input type="text" name="code" maxlength="10"
                            class="form-control {{$errors->has('code')?'is-invalid':''}}" required>
                        <p class="text-danger">{{$errors->first('code')}}</p>
                    </div>

                    <div class="form-group">
                        <label for="">Product Name</label>
                        <input type="text" name="name" class="form-control {{$errors->has('name')?'is-invalid':''}}"
                            required>
                        <p class="text-danger">{{$errors->first('name')}}</p>
                    </div>

                    <div class="form-group">
                        <label for="">Description</label>
                        <textarea name="description" id="description" cols="5" rows="5"
                            class="form-control {{$errors->has('description')?'is-invalid':''}}"></textarea>
                        <p class="text-danger">{{$errors->first('description')}}</p>
                    </div>

                    <div class="form-group">
                        <label for="">Stock</label>
                        <input type="number" name="stock" class="form-control {{$errors->has('stock')?'is-invalid':''}}"
                            required>
                        <p class="text-danger">{{$errors->first('stock')}}</p>
                    </div>

                    <div class="form-group">
                        <label for="">Price</label>
                        <input type="number" name="price" class="form-control {{$errors->has('price')?'is-invalid':''}}"
                            required>
                        <p class="text-danger">{{$errors->first('price')}}</p>
                    </div>

                    <div class="form-group">
                        <label for="">Category</label>
                        <select name="category_id" id="category_id"
                            class="form-control {{$errors->has('category')?'is-invalid':''}}" required>
                            <option value="">Select Categories :</option>
                            @foreach ($categories as $ct)
                            <option value="{{($ct->id)}}">{{ucfirst($ct->name)}}</option>
                            @endforeach
                        </select>
                        <p class="text-danger">{{$errors->first('category_id')}}</p>
                    </div>

                </div>
                <!-- End Card Body -->

                <div class="card-footer">
                    <button class="btn btn-primary">
                        <i class="fa fa-plus"></i> Add
                    </button>
                </div>

            </form>
            <!-- End Form -->

        </div>
        <!-- End Card -->

    </div>
</div>

@endsection
