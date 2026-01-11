<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Product</title>
</head>
<body>

<h1>Edit Product</h1>

@if ($errors->any())
    <ul style="color:red;">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="{{ route('products.update', $product->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Product Name:</label><br>
    <input type="text" name="name" value="{{ old('name', $product->name) }}"><br><br>

    <label>Price:</label><br>
    <input type="number" step="0.01" name="price" value="{{ old('price', $product->price) }}"><br><br>

    <button type="submit">Update</button>
</form>

<br>
<a href="{{ route('products.index') }}">⬅ Back</a>

</body>
</html>
