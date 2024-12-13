@extends('admin.master.layout')
@if (isset($product))
    @section('title', 'Update Product')
@else
    @section('title', 'Create Product')
@endif
@section('content')
    <div class="container">
        @if (isset($product))
            <form action="{{ route('product.update', ['product' => $product]) }}" method="POST" enctype="multipart/form-data"
                class="mt-5">
                @method('PATCH')
            @else
                <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data" class="mt-5">
        @endif
        @csrf
        <div class="mb-3 row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
                <input type="text" name="name" class="form-control" id="staticEmail"
                    value="{{ isset($product) ? $product->name : old('name') }}">
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Description</label>
            <div class="col-sm-10">
                <textarea name="description" id="description" class="form-control">{{ isset($product) ? $product->description : old('description') }}</textarea>
                @error('description')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Category</label>
            <div class="col-sm-10">
                <select name="category_id" id="category_id" class="form-control">
                    <option value="default"> -- Please select category --</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ isset($product) && $product->category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->name }} </option>
                    @endforeach
                </select>
                @error('category_id')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Image</label>
            <div class="col-sm-10">
                <input type="file" class="form-control" id="inputPassword" name="image">
                @error('image')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                @if (isset($product))
                    @if ($product->hasMedia('product'))
                        <div class="mt-5 mb-5">
                            Product Image:
                            <img src="{{ $product->firstMedia('product')->getUrl() }}" alt="{{ $product->name }}"
                                style="width: 100%; height: 300px; object-fit: cover; display: block;">
                        </div>
                    @endif
                @endif
            </div>
        </div>

        <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Color</label>
            <div class="col-sm-10">
                <input type="color" class="form-control" id="inputPassword" name="color" value="{{ isset($product) ? $product->color : old('color') }}">
                @error('color')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Code</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputPassword" name="code"
                    value="{{ isset($product) ? $product->code : old('code') }}">
                @error('code')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Page Title</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputPassword" name="title"
                    value="{{ isset($product) ? $product->title : old('title') }}">
                @error('title')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="mb-3 row">
            <div class="col-sm-10">
                <button type="submit" class="btn btn-primary btn-block"> Submit </button>
            </div>
        </div>
        </form>
    </div>
@endsection
