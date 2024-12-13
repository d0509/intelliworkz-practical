@extends('admin.master.layout')
@section('title', $product->name)
@section('content')
    <div class="container mt-5">
        <div class="card">
            {{-- <div class="bg-image hover-overlay" data-mdb-ripple-init data-mdb-ripple-color="light">
                <img src="{{ $product->firstMedia('product')->getUrl() }}" class="img-fluid" />
                <a href="#!">
                    <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                </a>
            </div> --}}
            <div class="bg-image hover-overlay" data-mdb-ripple-init data-mdb-ripple-color="light"
                style="position: relative; height: 300px; overflow: hidden;">
                <!-- Blurred background -->
                <div class="blurry-bg"
                    style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; filter: blur(10px); background-size: cover; background-position: center; z-index: 1;">
                </div>

                <!-- Main image -->
                <img src="{{ $product->firstMedia('product')->getUrl() }}" class="img-fluid"
                    style="object-fit: cover; width: 100%; height: 100%; z-index: 2; position: relative;" />
                <a href="#!" style="z-index: 3; position: relative;">
                    <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                </a>
            </div>

            <div class="card-body">
                <h5 class="card-title"> {{ ucfirst($product->name) }} </h5>
                <p class="card-text"> {{ ucfirst($product->description) }} </p>
                <div class="flex justify-content-around">
                    <a href="{{ route('product.index') }}" class="btn btn-primary" data-mdb-ripple-init> Back </a>
                    <a href="{{ route('product.edit',['product' => $product->id]) }}" class="btn btn-primary" data-mdb-ripple-init> Edit </a>

                </div>

            </div>
        </div>
    </div>
@endsection
