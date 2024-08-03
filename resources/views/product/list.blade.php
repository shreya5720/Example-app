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
        @if (Session::has('success'))
        <div class="col-md-10 mt-4">
            <div class="alert alert-success">
                {{Session::get('success')}}
            </div>
        </div>
        @endif
        <div class="row mt-4">
            <div class="col-md-12 text-right">
                <a href="{{route('product.create')}}" class="btn btn-dark">Create</a>
            </div>
        </div>
        <div class="col-md-10 justify-content-center">
            <h2>Product List</h2>
        </div>
        <div class="col-md-10">
            <div class="card-body">
                <table class="table">
                    <tr>
                        <th>ID
                        </th>
                        <th></th>
                        <th>Name</th>
                        <th>Sku</th>
                        <th>Price</th>
                        <th>Created at</th>
                        <th>action</th>
                    </tr>
            @if ($product->isNotEmpty())
            @foreach ($product as $products)
            <tr>
                <td>{{$products->id}}</td>
                <td>
                    <!-- @if($products->image !="")
                    <img src="{}" alt="">
                    @endif -->
                </td>
                <<td>
                @if ($products->image)
                    <img src="{{ asset('images/' . $products->image) }}" alt="{{ $products->name }}" width="100">
                @else
                    No image
                @endif
            </td>
                <td>{{$products->sku}}</td>
                <td>{{$products->price}}</td>
                <td>{{\Carbon\Carbon::parse($products->created_at)->format('d M, Y')}}</td>
                <td>
                <a href="{{route('product.edit',$products->id)}}" class="btn btn-dark">Edit</a>

                    <a href="#" onclick="deleteProduct({{$products->id}})" class="btn btn-danger">Delete</a>
                    <form id="delete-product-form-{{$products->id}}" action="{{route('product.destroy',$products->id)}}" method="POST" style="display: none;">
                        @csrf
                        @method('delete')
                    </form>
                </td>
            </tr>
            @endforeach

            @endif
            </table>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
<script>
   function deleteProduct(id){
     if (confirm("Are you sure you want to delete product")) {
        document.getElementById("delete-product-form-"+id).submit();
     }
   }
    </script>
