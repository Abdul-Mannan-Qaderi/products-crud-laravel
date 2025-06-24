@extends('layouts.layout');

@section('content')
contin
    <div class="card">
        <div class="card-header">
            <h2>Add New Product</h2>
        </div>

        <div class="card-body">
            <form action="{{route('products.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                @include('layouts.form')
                <input type="submit" class="btn btn-primary" value="Save">
                <a href="{{ route('products.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
@endsection 
