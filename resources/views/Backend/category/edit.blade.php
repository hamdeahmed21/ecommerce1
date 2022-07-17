@extends('Backend.layouts.master')
@section('title')
    Update Category
@endsection
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 ml-4 text-gray-800">Category</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Category</li>
        </ol>
    </div>

        <div class="col-lg-10">
            <form action="{{route('category.update',[$category->id])}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card mb-6">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Update Category</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" name="name" class="form-control is-invalid " id="" aria-describedby=""
                                   placeholder="Enter name of category" value="{{$category->name}}">
                            @error('name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror

                        </div>
                        <div class="form-group">
                            <label for="">Description</label>
                            <textarea name="description" class="form-control  is-invalid ">
                      	{{$category->description}}
                      </textarea>
                            @error('description')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror

                        </div>
                        <div class="form-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input " id="customFile" name="image">
                                <label class="custom-file-label is-invalid " for="customFile">Choose file</label>
                                <img src="{{Storage::url($category->image)}}" width="100" height="100">
                                @error('image')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                        </div>
                        <br>

                        <button type="submit" class="btn btn-primary">Update</button>

                    </div>
                </div>
            </form>

        </div>
    </div>
@endsection