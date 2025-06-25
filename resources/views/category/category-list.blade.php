@extends('layouts.layout')


@section('content')
    <div class="card mt-5">
        <div class="card-header">
            <h2>Categories</h2>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Category Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->description }}</td>
                            <td>{{ $category->status == 0 ? 'inactive' : 'active' }}</td>
                        </tr>
                    @endforeach
                </tbody>
        </div>
        </table>
    </div>
    </div>
<div class="mt-3">
    {{ $categories->links() }}
</div>
@endsection
