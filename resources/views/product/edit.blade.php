<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap Form Example</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Product Form</h2>
        <form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name</label>
                <input name="name" value="{{ old('name', $product->name) }}" type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Enter product name">
                @error('name')
                <p class="invalid-feedback">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input name="price" value="{{ old('price', $product->price) }}" type="number" step="0.01" class="form-control @error('price') is-invalid @enderror" id="price" placeholder="Enter product price">
                @error('price')
                <p class="invalid-feedback">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="sku">SKU</label>
                <input name="sku" value="{{ old('sku', $product->sku) }}" type="text" class="form-control @error('sku') is-invalid @enderror" id="sku" placeholder="Enter product SKU">
                @error('sku')
                <p class="invalid-feedback">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" class="form-control" id="description" rows="3" placeholder="Enter product description">{{ old('description', $product->description) }}</textarea>
            </div>
            <div class="form-group">
                <label for="image">Upload Image</label>
                <input value="{{ old('sku', $product->image) }}" name="image" type="file" class="form-control-file" id="image">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
