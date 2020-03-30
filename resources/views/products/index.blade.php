@extends('admin.main')
@section('title', 'Product |')
@section('content')

<h1 class="mt-4">Product</h1>
<hr>

<ol class="breadcrumb">
    <li class="breadcrumb-item ml-auto"><a href="{{route('admin.home')}}">Home</a></li>
    <li class="breadcrumb-item active">Product</a></li>
</ol>

<div class="row">
    <div class="col-md-12">
        <div class="card">

            <div class="card-header">
                <a href="{{route('product.create')}}" class="btn btn-primary">
                    <i class="fa fa-plus"></i> Add Product
                </a>

                <!-- Alert -->
                @if(Session::has('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    {{Session::get('success')}}
                    <button type="button" class="close" data-dismiss="alert">
                        &times;
                    </button>
                </div>
                @endif

            </div>
            <!-- End Card Header -->

            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Img</th>
                            <th class="text-center">Product Name</th>
                            <th>Stock</th>
                            <th>Price</th>
                            <th>Category</th>
                            <th>Last Update</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @forelse ($products as $pr)
                        <tr>
                            <td>
                                @if (!empty($pr->photo))
                                <img src="{{asset('uploads/product/' . $pr->photo)}}" alt="{{$pr->name}}" width="50px"
                                    height="50px">

                                @else
                                <img src="http://via.placeholder.com/50x50" alt="{{$pr->name}}">

                                @endif
                            </td>
                            <td>
                                <sup class="label label-success">({{$pr->code}})</sup>                                
                                <strong>{{ucfirst($pr->name)}}</strong>
                            </td>
                            <td>{{$pr->stock}}</td>
                            <td>$ {{number_format($pr->price)}}</td>
                            <td>{{$pr->category->name}}</td>
                            <td>{{$pr->updated_at}}</td>
                            <td>
                                <form action="{{route('product.destroy', $pr->id)}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="_method" value="DELETE">
                                    <a href="{{route('product.edit', $pr->id)}}" class="btn btn-warning btn-sm">
                                        <i class="fa fa-edit"></i> Edit
                                    </a>                                                                       
                                    <button class="btn btn-danger btn-sm">
                                        <i class="fa fa-trash"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty

                        <tr>
                            <td colspan="7" class="text-center">Data Not Found</td>
                        </tr>

                        @endforelse

                    </tbody>

                </table>
            </div>

        </div>
        <!-- End Card -->

    </div>
</div>

@endsection
