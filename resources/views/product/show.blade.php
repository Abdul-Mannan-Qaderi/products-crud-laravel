@extends('layouts.layout')

@section('content')
    <div class="card">
        <div class="card-header"></div>
        <div class="card-body">
            @if ($product->image)
                <img src="{{ asset('storage/' . $product->image) }}" class="img-fluid mb-3" alt="{{ $product->name }}">
            @endif

            <p>Name: {{$product->name}}</p>
            <p>Description: {{$product->description}}</p>
            <p>Quantity: {{$product->quantity}}</p>
            <p>Price: ${{ number_format($product->price, 2) }}</p>
            <p>Category: {{ $product->category->name }}</p>
            <p>Status: 
              <span class="badge bg-{{$product->status==='active' ? 'success' : 'secondary'}}">
                {{ ucfirst($product->status) }}
              </span>
            </p>
            
        </div>
    </div>
@endsection
