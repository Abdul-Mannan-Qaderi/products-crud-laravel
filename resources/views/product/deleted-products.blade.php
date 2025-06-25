@extends('layouts.layout') @section('content')


    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card mt-5">
        <div class="card-header">
            <div class="row">
                <div class="col-md-8">
                    <h2>Deleted List</h2>
                </div>

                <div class="col-md-4 my-auto">
                    <form class="d-flex" method="GET" action="{{ route('products.deleted') }}">
                        <input name="search"  class="form-control me-2" type="search" placeholder="Search"
                            aria-label="Search">
                        <button class="btn btn-outline-primary" type="submit">Search</button>
                    </form>
                </div>

            </div>
        </div>

        <div class="card-body">

            @if (count($products) > 0)
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Category</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Price</th>
                            <th scope="col">Status</th>
                            <th scope="col" colspan="2">Description</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <th scope="row">{{ $product->id }}</th>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->category->name }}</td>
                                <td>{{ $product->quantity }}</td>
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->status }}</td>
                                <td>{{ $product->description }}</td>


                                <td>
                                    <div class="d-flex justify-content-center gap-2">
                                        <!-- Delete Button (triggers modal) -->
                                        <form action="{{ route('products.restore', $product->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-outline-success px-1 py-0">
                                                Restore
                                            </button>
                                        </form>

                                        <a href="{{ route('products.forceDelete', $product->id) }}"
                                            class="btn btn-outline-danger px-1 py-0">
                                            Delete
                                        </a>
                                    </div>

                                    <!-- Modal -->
                                    <div class="modal fade" id="confirmDeleteModal-{{ $product->id }}" tabindex="-1"
                                        aria-labelledby="confirmDeleteLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header bg-danger text-white">
                                                    <h5 class="modal-title" id="confirmDeleteLabel">Confirm Delete</h5>
                                                    <button type="button" class="btn-close btn-close-white"
                                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Are you sure you want to delete <strong>{{ $product->name }}</strong>?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Cancel</button>
                                                    <form action="{{ route('products.destroy', $product) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Yes, Delete</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div>
                    <p colspan="7" class="text-center m-0">No deleted products found</p>
                </div>
            @endif
        </div>
    </div>
    <div class="mt-3">
        {{ $products->links() }}
    </div>
@endsection
