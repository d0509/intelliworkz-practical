@extends('admin.master.layout')
@section('title', 'Products')
@section('content')
    <div class="container">
        <a href="{{ route('product.create') }}" class="btn btn-primary mt-5 mb-5">Create Product</a>

        <table class="table align-middle mb-0 bg-white table-hover">
            <thead>
                <tr>
                    <th>Sr. No.</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Code</th>
                    <th>Color</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($products as $product)
                    <tr id="product-row-{{ $product->id }}">
                        <td>{{ $loop->index + 1 }}</td>
                        <td>
                            @php
                                $imageUrl =
                                    'https://plus.unsplash.com/premium_photo-1683120880375-074c4ba3f775?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxjb2xsZWN0aW9uLXBhZ2V8MTZ8emtHaWRhdWg3bWN8fGVufDB8fHx8fA%3D%3D';
                                if ($product->hasMedia('product')) {
                                    $imageUrl = $product->firstMedia('product')->getUrl();
                                }
                            @endphp
                            <img src="{{ $imageUrl }}" alt="{{ $product->name }}" style="width: 45px; height: 45px"
                                class="rounded-circle">
                        </td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->code }}</td>
                        <td>
                            <div
                                style="width: 50px; height: 50px; background-color: {{ $product->color }}; border: 1px solid #ccc; display: inline-block;">
                            </div>
                        </td>
                        <td>{{ $product->created_at }}</td>
                        <td>{{ $product->updated_at }}</td>
                        <td>
                            <div class="d-flex text-decoration-none justify-content-around">
                                <a href="{{ route('product.show', ['product' => $product->id]) }}" class="btn btn-primary">
                                    <i class="fa-solid fa-eye"></i>
                                </a>
                                <a href="{{ route('product.edit', ['product' => $product->id]) }}"
                                    class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                <button data-url="{{ route('product.destroy', ['product' => $product->id]) }}"
                                    class="btn btn-danger delete-product" data-productId="{{ $product->id }}"><i
                                        class="fa fa-trash"></i></button>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>No Data Found!</tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
@section('contentFooter')
    <script>
        var indexUrl = "{{ route('product.index') }}";

        $(document).ready(function() {

            $('.delete-product').on('click', function() {
                var id = $(this).attr('data-productId');
                var url = "{{ route('product.destroy', ':id') }}";
                url = url.replace(':id', id);
                var token = "{{ csrf_token() }}";
                $.ajax({
                    url: url,
                    type: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    },
                    data: {
                        id: id,
                        "_token": "{{ csrf_token() }}",
                    },
                    success: function() {
                        console.log('updated successfully');
                        setTimeout(function() {
                            location.reload();
                        }, 50);
                    }
                });
            });
        });
    </script>
@endsection
