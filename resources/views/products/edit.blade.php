@extends('admin.main')
@section('title', 'Product Edit |')
@section('content')

<h1 class="mt-4">Product</h1>
<hr>

<ol class="breadcrumb">
    <li class="breadcrumb-item ml-auto"><a href="{{route('admin.home')}}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('product.index') }}">Product</a></li>
    <li class="breadcrumb-item active">Edit</li>
</ol>

<div class="row">
    <div class="col-md-6 mb-3">
        <div class="card">

            <div class="card-header">
                <h5>Edit Category</h5>
            </div>
            <!-- End Card Header -->

            <form action="{{route('product.update', $product->id)}}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="card-body">
                    <input type="hidden" name="_method" value="PUT">

                    <div class="form-group">
                        <label for="">Foto</label>
                        <input type="file" name="photo"
                            class="form-control">
                        <p class="text-danger">{{$errors->first('photo')}}</p>
                        @if (!empty($product->photo))
                        <hr>
                        <img src="{{asset('uploads/product/' . $product->photo)}}" alt="{{$product->name}}"
                            width="150px" height="150px">
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="">Product Code</label>
                        <input type="text" name="code" maxlength="10" readonly value="{{$product->code}}"
                            class="form-control {{$errors->has('code') ? 'is-invalid' : ''}}" required>
                        <p class="text-danger">{{$errors->first('code')}}</p>
                    </div>

                    <div class="form-group">
                        <label for="">Product Name</label>
                        <input type="text" name="name" value="{{$product->name}}"
                            class="form-control {{$errors->has('name') ? 'is-invalid' : ''}}" required>
                        <p class="text-danger">{{$errors->first('name')}}</p>
                    </div>

                    <div class="form-group">
                        <label for="">Description</label>
                        <textarea name="description" cols="5" rows="5"
                            class="form-control {{$errors->has('description') ? 'is-invalid' : ''}}">{{$product->description}}</textarea>
                        <p class="text-danger">{{$errors->first('description')}}</p>
                    </div>

                    <div class="form-group">
                        <label for="">Stock</label>
                        <input type="number" name="stock" value="{{$product->stock}}"
                            class="form-control {{$errors->has('stock') ? 'is-invalid' : ''}}" required>
                        <p class="text-danger">{{$errors->first('stock')}}</p>
                    </div>

                    <div class="form-group">
                        <label for="">Price</label>
                        <input type="number" name="price" value="{{$product->price}}"
                            class="form-control {{$errors->has('price') ? 'is-invalid' : ''}}" required>
                        <p class="text-danger">{{$errors->first('price')}}</p>
                    </div>

                    <div class="form-group">
                        <label for="">Category</label>
                        <select name="category_id" id="category_id"
                            class="form-control {{$errors->has('price') ? 'is-invalid' : ''}}" required>
                            <option value="">Select Categories</option>
                            @foreach ($categories as $ct)
                            <option value="{{$ct->id}}" {{$ct->id == $product->category_id ? 'selected' : ''}}>
                                {{ucfirst($ct->name)}}
                            </option>
                            @endforeach
                        </select>
                        <p class="text-danger">{{$errors->first('category_id')}}</p>
                    </div>

                </div>
                <!-- End Card Body -->

                <div class="card-footer">
                    <div class="form-group">
                        <button class="btn btn-info">
                            <i class="fa fa-save"></i> Update
                        </button>
                    </div>
                </div>
                <!-- End Card Footer -->

            </form>
            <!-- End Form -->

        </div>
        <!-- End Card -->

    </div>
</div>

@endsection
