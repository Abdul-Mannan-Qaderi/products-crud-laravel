<div class="row">
    <div class="mb-3 col-md-6">
        <label for="name" class="form-label">Product Name</label>
        <input type="text" name='name' class="form-control" value="{{ old('name', $product->name ?? '') }}">

        @error('name')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3 col-md-6">
        <label for="description" class="form-label">Description</label>
        <input type="text" name='description' class="form-control col-md-6"
            value="{{ old('description', $product->description ?? '') }}">

        @error('description')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
</div>


<div class="row">
    <div class="mb-3 col-md-6">
        <label for="price" class="form-label">Price</label>
        <input type="text" name='price' class="form-control" value="{{ old('price', $product->price ?? '') }}">
        @error('price')
            <div class="text-danger">{{ $message }}</div>
        @enderror

    </div>

    <div class="mb-3 col-md-6">
        <label for="quantity" class="form-label">Quantity</label>
        <input type="text" name='quantity' class="form-control"
            value="{{ old('quantity', $product->quantity ?? '') }}">
        @error('quantity')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
</div>


<div class="row">
    <div class="mb-3 col-md-6">
        <label for="category" class="form-label">Category</label>
        <select class="form-select" id="category_id" aria-label="Default select" name="category_id">
            @foreach ($categories as $category)
                <option
                    value="{{ $category->id }}"
                    {{ $category->id == old('category_id', $product->category_id ?? '') ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
        @error('category_id')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3 col-md-6">
        <label for="status" class="form-label">Status</label>
<select class="form-select" name="status" required>
    <option value="" disabled {{ old('status', $product->status ?? '') === '' ? 'selected' : '' }}>Status</option>
    <option value="active" {{ old('status', $product->status ?? '') === 'active' ? 'selected' : '' }}>Active</option>
    <option value="inactive" {{ old('status', $product->status ?? '') === 'inactive' ? 'selected' : '' }}>Inactive</option>
</select>
        
        @error('status')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="mb-3">
    <label for="image" class="form-label">Product Image</label>
    <input type="file" name='image' class="form-control" value="{{ old('image', $product->image ?? '') }}">
    @error('image')
        <div class="text-danger">{{ $message }}</div>
    @enderror
    @if (!empty($product->image))
        <img src="{{ asset('storage/' . $product->image) }}" alt="Product Image" class="img-thumbnail mt-2"
            style="max-width: 200px;">
    @endif
</div>
