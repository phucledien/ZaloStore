@extends ('admin.layouts.master')

@section ('content')

<div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
        <a href="{{ route('dashboard') }}">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
        <a href="{{ route('products.index') }}">Products</a>
        </li>
        <li class="breadcrumb-item active">Edit Product</li>
    </ol>

    @if (Session::has('success'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            {{ Session::get('success') }}
        </div>
    @endif
    <div class="card mb-3">
        <div class="card-header">
            Create Product
        </div>
        <div class="card-body">

            <form method="POST" action="{{ route('products.update',['product' => $product['id']]) }}" enctype="multipart/form-data">  
                @method('PATCH')
                @csrf
                <div class="form-group">
                    <label>Product name</label>
                    <input type="text" class="form-control" id="name" name='name' value="{{$product['name']}}">
                </div>

                <div class="form-group">
                    <label>Description</label>
                    <textarea class="form-control" id="description" name='description' rows="3" >{{$product['desc']}}</textarea>
                </div>

                <div class="form-group">
                    <label>Price</label>
                    <input type="number" class="form-control" id="price" name='price' value="{{$product['price']}}" >
                </div>

                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="inputState">Categories</label>
                        <select class="custom-select" id="cateid" name="cateid[]" size="3">
                            <option  value="" selected> Uncategorized</option>
                            @foreach ($categories as $category)
                                <option  value="{{$category['id']}}">  {{$category['name']}}</option>
                            @endforeach
                        </select>
                    </div>
                    
                </div>

                <div class="custom-file">
                    <label for="inputState">Images</label>
                    <input type="file" class="custom-file-input" id="images" name='images[]' multiple>
                    <label class="custom-file-label" for="images">Choose file...</label>
                </div>

                <button type="submit" class="btn btn-success mt-2">Success</button>
            </form>
        </div>
    </div>
</div>

@endsection