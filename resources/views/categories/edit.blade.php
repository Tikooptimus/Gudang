@extends('admin.main')
@section('title', 'Category Edit |')
@section('content')

<h1 class="mt-4">Category</h1>
<hr>

<ol class="breadcrumb">
    <li class="breadcrumb-item ml-auto"><a href="{{route('admin.home')}}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('category.index') }}">Category</a></li>
    <li class="breadcrumb-item active">Edit</li>
</ol>

<div class="row">
    <div class="col-md-6 mb-3">
        <div class="card">

            <div class="card-header">
                <h5>Edit Category</h5>
            </div>
            <!-- End Card Header -->

            <form role="form" action="{{route('category.update', $categories->id)}}" method="POST">
                @csrf

                <div class="card-body">
                    <input type="hidden" name="_method" value="PUT">

                    <div class="form-group">
                        <label for="name">Category</label>
                        <input type="text" name="name" value="{{$categories->name}}"
                            class="form-control {{$errors->has('name')?'is-invalid':''}}" id="name" required>
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" cols="5" rows="5"
                            class="form-control {{$errors->has('description'?'is-invalid':'')}}">{{$categories->description}}</textarea>
                    </div>

                </div>
                <!-- End Card Body -->
                
                <div class="card-footer">
                    <button class="btn btn-info">Update</button>
                </div>
                <!-- End Card Footer -->

            </form>
            <!-- End Form -->
            

        </div>
        <!-- End Card -->
    </div>
</div>
@endsection
