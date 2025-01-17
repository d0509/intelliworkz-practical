@extends('user.master.layout')
@section('title', 'Products')
@section('content')
    <div class="container mt-5">
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @forelse ($products as $product)
            <div class="col">
                <div class="card h-100">
                    <img src="https://mdbcdn.b-cdn.net/img/new/standard/city/041.webp" class="card-img-top"
                        alt="Hollywood Sign on The Hill" />
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">
                            This is a longer card with supporting text below as a natural lead-in to
                            additional content. This content is a little bit longer.
                        </p>
                    </div>
                </div>
            </div> 
            @empty
            @endforelse


        </div>

        <!-- Pagination Links -->
        <div class="d-flex justify-content-center">
            {{ $products->links() }}
        </div>
    </div>
@endsection
