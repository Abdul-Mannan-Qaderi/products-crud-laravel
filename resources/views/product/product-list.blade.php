@extends('layouts.layout') @section('content')

    <div class="container mt-5">
        
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="card">
            <div class="card-header">

                <div class="row">
                    <div class="col">
                        <h2>Product List</h2>
                    </div>

                    <div class="col">
                        <div class="row">
                            
                            <div class="col-md-8">
                                <form class="d-flex">
                                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                                    <button class="btn btn-outline-primary" type="submit">Search</button>
                                </form>
                            </div>
                            
                            <div class="col-md-4">
                                <a href="{{route('products.create')}}" class="float-end btn btn-primary">Add New</a>
                            </div>

                        </div>
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
                                <th scope="col">Description</th>
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
                                </tr>
                            @endforeach


                        </tbody>
                    </table>
                @else
                    <div>
                        <p colspan="7" class="text-center m-0">No products found</p>
                    </div>
                @endif
            </div>
        </div>
    </div>

@endsection
