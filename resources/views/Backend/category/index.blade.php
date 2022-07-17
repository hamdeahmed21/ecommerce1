@extends('Backend.layouts.master')
@section('title')
    All Categories
@endsection
@section('content')
    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Category Tables</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="./">Home</a></li>
                <li class="breadcrumb-item">Category</li>
                <li class="breadcrumb-item active" aria-current="page">category Tables</li>
            </ol>
        </div>

        <div class="row">
            <div class="col-lg-12 mb-4">
                <!-- Simple Tables -->
                <div class="card">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">All Categories</h6>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                            <tr>
                                <th>SN</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Action</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @php($i=1)
                                @foreach($categories as $Category)
                                    <tr>

                                        <td><a href="#">{{$i++}}</a></td>
                                        <td><img src="{{Storage::url($Category->image)}}" width="100"></td>
                                        <td>{{$Category->name}}</td>
                                        <td>{{$Category->description}}</td>

                                        <td>
                                            <a href="{{route('category.edit',[$Category->id])}}" class="btn btn-sm btn-primary">Edit</a>
                                            <a href="{{route('category.destroy',[$Category->id])}}" class="btn btn-sm btn-danger">Delete</a>

                                        </td>
                                    </tr>
                                @endforeach



                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer"></div>
                </div>
            </div>
        </div>
        <!--Row-->
    </div>

@endsection
