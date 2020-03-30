@extends('admin.main')
@section('title', 'Category |')
@section('content')

<h1 class="mt-4">Category</h1>
<hr>

<ol class="breadcrumb">
    <li class="breadcrumb-item ml-auto"><a href="{{route('admin.home')}}">Home</a></li>
    <li class="breadcrumb-item active">Category</a></li>
</ol>

<div class="row">
    <div class="col-md-4">
        <div class="card">

            <div class="card-header">
                <h5>Add Category</h5>
            </div>
            <!-- End Card Header -->

            <form role="form" action="{{route('category.store')}}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Category</label>
                        <input type="text" name="name" class="form-control {{$errors->has('name') ? 'is-invalid' : ''}}"
                            id="name" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" cols="5" rows="5"
                            class="form-control {{$errors->has('description')?'is-invalid':''}}"></textarea>
                    </div>
                </div>
                <!-- End Card Body -->

                <div class="card-footer">
                    <button class="btn btn-primary"><i class="fa fa-plus"></i> Add</button>
                </div>
                <!-- End Card Footer -->

            </form>
            <!-- End Form -->

        </div>
        <!-- End Card -->
    </div>

    <div class="col-md-8">
        <div class="card">

            <div class="card-header">
                <h5>List Category</h5>
            </div>
            <!-- End Card Header -->

            <!-- Alert -->
            @if(Session::has('success'))
            <div class="alert alert-success alert-dismissible fade show">
                {{Session::get('success')}}
                <button type="button" class="close" data-dismiss="alert">
                    &times;
                </button>
            </div>
            @endif

            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Category</th>
                            <th>Description</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $no = 1;
                        @endphp
                        @forelse ($categories as $ct)
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$ct->name}}</td>
                            <td>{{$ct->description}}</td>
                            <td align="center">
                                <form action="{{route('category.destroy', $ct->id)}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="_method" value="DELETE">
                                    <a href="{{route('category.edit', $ct->id)}}" class="btn btn-warning btn-sm"><i
                                            class="fa fa-edit"></i> Edit
                                    </a>
                                    <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center">
                                Data Not Found
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
