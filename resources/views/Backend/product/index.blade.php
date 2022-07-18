@extends('Backend.layouts.master')
@section('title')
    Products
@endsection
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 ml-4 text-gray-800">Product</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Product</li>
        </ol>
    </div>
    <!-- Datatables -->
    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Products</h6>
            </div>
            <div class="table-responsive p-3">
                <table class="table align-items-center table-flush" id="dataTable">
                    <thead class="thead-light">
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Additional_info</th>
                        <th>Price</th>
                        <th>Category</th>
                        <th></th>

                    </tr>
                    </thead>

                    <tbody>
                    @php($i=1)
                        @foreach($products as $Product)
                            <tr>
                                <td>
                                    <img src="{{Storage::url($Product->image)}}" width="100">
                                </td>
                                <td>{{$Product->name}}</td>
                                <td>{!!  $Product->description !!}</td>
                                <td>{!!$Product->additional_info!!}</td>
                                <td>${{$Product->price}}</td>
                                <td>{{$Product->category->name}}</td>
                                <td>
                                    <a href="{{route('product.edit',[$Product->id])}}">
                                        <button class="btn btn-primary">Edit</button>
                                    </a>
                                    <a href="{{route('product.destroy',[$Product->id])}}">
                                        <button class="btn btn-sm btn-danger">Delete</button>
                                    </a>
                                </td>

                            </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection