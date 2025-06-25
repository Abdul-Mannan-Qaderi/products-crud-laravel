@extends('layouts.layout')

@section('content')
    <div class="card rounded-3 mt-5 shadow-lg border-0">

       <div class="card-body row align-items-start g-4">
    <div class="col-md-4 text-start">
        @if ($product->image)
            <img style="width: 100%" src="{{ asset('storage/' . $product->image) }}" class="img-fluid rounded shadow-sm"
                alt="{{ $product->name }}">
        @endif
    </div>

    <div class="col-md-8 text-start">
        <h3 class="mb-3">{{ $product->name }}</h3>
        <p><strong>Quantity:</strong> {{ $product->quantity }}</p>
        <p><strong>Price:</strong> ${{ number_format($product->price, 2) }}</p>
        <p><strong>Category:</strong> {{ $product->category->name }}</p>
        <p><strong>Status:</strong>
          <span class="badge bg-{{ $product->status === 'active' ? 'success' : 'secondary' }}">
            {{ ucfirst($product->status) }}
          </span>
        </p>
        <p><strong>Description:</strong> {{ $product->description }}</p>
    </div>
</div>

    </div>
@endsection
