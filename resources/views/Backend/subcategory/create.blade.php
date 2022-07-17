@extends('Backend.layouts.master')
@section('title')
    Create SubCategory
@endsection
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 ml-4 text-gray-800">SubCategory</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">SubCategory</li>
        </ol>
    </div>

    <div class="row justify-content-center">


        <div class="col-lg-10">
            <form action="{{route('subcategory.store')}}" method="POST" >
                @csrf
                <div class="card mb-6">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Create SubCategory</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" name="name" class="form-control is-invalid" id="" aria-describedby=""
                                   placeholder="Enter name of subcategory">
                            @error('name')
                            <span class="text-danger">{{ $message }}</span>

                            @enderror

                        </div>
                        <div class="form-group">
                            <label for="">Choose Category</label>
                            <select name="category" class="form-control is-invalid" >
                                <option value="">select</option>
                                @foreach($categories as $Category)
                                    <option value="{{$Category->id}}">{{$Category->name}}</option>
                                @endforeach

                            </select>

                            @error('category')
                            <span class="text-danger">{{ $message }}</span>

                            @enderror

                        </div>


                        <button type="submit" class="btn btn-primary">Submit</button>

                    </div>
                </div>
            </form>

        </div>
    </div>
@endsection
