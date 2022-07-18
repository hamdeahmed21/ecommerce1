@extends('Backend.layouts.master')
@section('title')
    Create Product
@endsection
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 ml-4 text-gray-800">Product</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Product</li>
        </ol>
    </div>
        <div class="col-lg-10" id="app">
            <form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card mb-6">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Create Product</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" name="name" class="form-control is-invalid " id="" aria-describedby=""
                                   placeholder="Enter name of product">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror

                        </div>
                        <div class="form-group">
                            <label for="">Description</label>
                            <textarea name="description" id="" class="form-control is-invalid "></textarea>
                            @error('description')
                            <span class="text-danger">{{ $message }}</span>

                            @enderror

                        </div>
                        <div class="form-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input is-invalid " id="customFile" name="image">
                                <label class="custom-file-label  " for="customFile">Choose file</label>
                                @error('image')
                                <span class="text-danger">{{ $message }}</span>

                                @enderror
                            </div>

                        </div>

                        <div class="form-group">
                            <label for="">Price($)</label>
                            <input type="number" name="price" class="form-control is-invalid " id="" aria-describedby=""
                            >
                            @error('name')
                            <span class="text-danger">{{ $message }}</span>

                            @enderror

                        </div>
                        <div class="form-group">
                            <label for="">Additional information</label>
                            <textarea name="additional_info" id="summernote1" class="form-control is-invalid "></textarea>
                            @error('additional_info')
                            <span class="text-danger">{{ $message }}</span>

                            @enderror

                        </div>
                        <div class="form-group">
                            <label for="">Choose Category</label>
                            <select name="category"  class="form-control is-invalid" >
                                <option value="">select</option>
                                @foreach($categories as $Category)
                                    <option value="{{$Category->id}}">{{$Category->name}}</option>
                                @endforeach

                            </select>

                            @error('category')
                            <span class="text-danger">{{ $message }}</span>

                            @enderror

                        </div>


                        <div class="form-group">
                            <label for="">Choose Subcategory</label>
                            <select name="subcategory"  class="form-control is-invalid" >

                                <option value="">select</option>
                                @foreach($subcategories as $SubCategory)
                                    <option value="{{$SubCategory->id}}">{{$SubCategory->name}}</option>
                                @endforeach

                            </select>


                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>

                    </div>
                </div>
            </form>

        </div>
    </div>
@endsection




